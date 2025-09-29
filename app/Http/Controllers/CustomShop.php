<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CustomShop extends Controller
{
    //
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'shop_name' => 'required|string|max:255',
            'proprietor_name' => 'required|string|max:255',
            'shop_email' => 'required|string|email|max:255|unique:shops,shop_email',
            'shop_phone' => 'required|string|min:9|max:13',
            'shop_address' => 'required|string|max:255'
        ],
        [
            'shop_name.required' => 'The shop name field is required.',
            'proprietor_name.required' => 'The proprietor name field is required.',
            'shop_email.required' => 'The shop email field is required.',
            'shop_email.email' => 'The shop email must be a valid email address.',
            'shop_email.unique' => 'The shop email has already been taken.',
            'shop_phone.required' => 'The shop phone field is required.',
            'shop_phone.min' => 'The shop phone must be at least 9 characters.',
            'shop_phone.max' => 'The shop phone may not be greater than 13 characters.',
            'shop_address.required' => 'The shop address field is required.',
            'shop_address.max' => 'The shop address may not be greater than 255 characters.'
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed:', $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // when multiple operations in various tables are needed
        DB::beginTransaction();
        try
            {
                $userID = auth()->id();
                $shop = Shop::create([
                    'user_id' => $userID, // assign the authenticated user as the owner of the shop
                    'shop_name' => $request->input('shop_name'),
                    'shop_proprietor_name' => $request->input('proprietor_name'),
                    'shop_email' => $request->input('shop_email'),
                    'shop_phone' => $request->input('shop_phone'),
                    'shop_address' => $request->input('shop_address')
                ]);
                
                
                // find the exact user
                $user = User::find($userID);
                $shopID = $shop->id;
                if($user)
                    {
                        // assign the shop_id to the user table under shop_id column
                        $user->shop_id = $shopID;
                        $user->save();
                    }
                else
                    {
                        // shouldn't happen if authenticated
                        throw new \Exception('User not found!');
                    }
                // if everything is fine, commit the transaction
                DB::commit();
                return redirect()->back()->with('success', 'Shop created successfully under user-ID: '.$userID);

            }
        catch(\Exception $e)
            {
                // if any error occurs, rollback the transaction
                DB::rollBack();
                return back()->with('error', 'Failed to create shop. Please try again.')->withInput()->with('activeTab', 'shops-form');
            }
    }
}
