<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomCustomer extends Controller
{
    //
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|min:9|max:13',
            'product_name' => 'required|string|max:255',
            'product_issue' => 'required|string|max:1000'
        ],
        [
            'customer_name.required' => 'The customer name field is required.',
            'customer_phone.required' => 'The customer phone field is required.',
            'customer_phone.min' => 'The customer phone must be at least 9 characters.',
            'customer_phone.max' => 'The customer phone may not be greater than 13 characters.',
            'product_name.required' => 'The product name field is required.',
            'product_issue.required' => 'The product issue field is required.',
            'product_issue.max' => 'The product issue may not be greater than 1000 characters.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // when multiple operations in various tables are needed
        DB::beginTransaction();
        try
            {
                // Ensure the customer_id is unique
                $Cusid = Str::random(6);
                
                // Regenerate if the ID already exists
                do
                    {
                        $Cusid = Str::random(6);
                    }
                while (Customer::where('customer_id', $Cusid)->exists());

                $shopID = Shop::where('user_id', auth()->id())->value('id');
                $customer = Customer::create([
                    'customer_name' => $request->input('customer_name'),
                    'customer_id' => $Cusid,
                    'customer_phone' => $request->input('customer_phone'),
                    'product_name' => $request->input('product_name'),
                    'product_issue' => $request->input('product_issue'),
                    'shop_id' => $shopID
                ]);

                DB::commit();
                return redirect()->back()->with('success', 'Customer added successfully.');
            }
        catch (\Exception $e)
            {
                DB::rollBack();
                return redirect()->back()->with('error', 'An error occurred while adding the customer. Please try again.');
            }
    }
}
