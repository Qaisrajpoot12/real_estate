<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profileEdit(Request $request)
    {
        try {
            $user = $request->user();

            if ($request->hasFile('image')) {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                    'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);
            } else {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|max:255|unique:users,email,' . $user->id,

                ]);
            }


            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Handle image upload

            if (!empty($request->path)) {


                if ($user->profileImage != null) {
                    $user->profileImage->delete();
                }

                $user->profileImage()->create(['path' => $request->path[0]]);
                return response()->json(['message' => 'Profile updated successfully']);
            }



            return response()->json(['message' => 'Profile updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()]);
        }
    }

    public function userDetail(Request $request)
    {




        $user  = [];
        $user['userdetail'] = $request->user();
        $user['profileImage'] = $request->user()->profileImage;
        $user['listing'] = $request->user()->Listings;
        $user['list_images']  = Listing::where('user_id', $request->user()->id)->with('images')->get();

        return response()->json(['user' => $user]);
    }



    public function changePassword(Request $request)
    {




        try {
            $user = $request->user();


            $request->validate([
                'old_password' => 'required',
                'password' => 'required',
                'c_password' => 'required|same:password',

            ]);
            // return response()->json(['message' => $user->password], 200);

            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);

                return response()->json(['success' => 'Password updated successfully']);
            } else {
                return response()->json(['error' => 'Invalid old Password']);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()]);
        }
    }
}
