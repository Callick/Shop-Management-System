<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CustomUsers extends Controller
{
    // to add sub-users like admin, assistant
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users,email',
            'user_phone' => 'required|string|max:15',
            'user_role' => 'required|string|in:admin,assistant', // Example roles
            'shop_id' => 'nullable|integer|exists:shops,id', // If associating with a shop
            'user_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try{
                $user = User::create([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'phone' => $request->user_phone,
                    'user_role' => $request->user_role,
                    'password' => bcrypt($request->user_password),
                ]);

                return redirect()->back()->with('activeTab', $request->active_tab)->with('success', 'User created successfully');
            }
        catch(\Exception $e){

                return redirect()->back()->with('activeTab', $request->active_tab)->with('error', 'An error occurred while creating the user: ' . $e->getMessage());

            }
    }
}