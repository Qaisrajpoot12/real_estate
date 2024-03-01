<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function home()
    {
        $userdata = getUser();

        if (isset($userdata['error']) && $userdata['error'] == 'invalid login token') {
            session()->forget('access_token');
            return redirect('login')->with('error', 'invalid Session ');
        }
        $user = $userdata['user'];
        return view('admin.home', compact('user'));
    }
    public function editprofile()
    {
        $userdata = getUser();

        if (isset($userdata['error']) && $userdata['error'] == 'invalid login token') {
            session()->forget('access_token');
            return redirect('login')->with('error', 'invalid Session ');
        }
        $user = $userdata['user']['userdetail'];
        return view('admin.profile', compact('user'));
    }

    public function editProfileSubmit(Request $request)
    {

        $userdata = getUser();
        $apiUrl = env('API_URL');
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
            ]);

            $token = session()->get('access_token');
            $imagePath = [];
            if ($request->hasFile('image')) {

                if ($userdata['user']['userdetail']) {
                    Storage::disk('public')->delete($userdata['user']['userdetail']['profile_image']['path'] ?? '');
                }

                $image_arr =  $request->file('image');
                $imagePath[] = $image_arr->store('profile_image', 'public');
            }


            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("$apiUrl/profileEdit", [
                'name' => $request->name,
                'email' => $request->email,
                'path' => $imagePath

            ]);
            $responseData = $response->json();

            if ($response->successful()) {

                return redirect()->back()->with('success', 'profile updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Somthing went wrong');
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    public function changePassword(Request $request)
    {

        $userdata = getUser();
        $apiUrl = env('API_URL');
        try {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|min:4',
                'confirm_password' => 'required|same:password',
            ]);

            $token = session()->get('access_token');



            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("$apiUrl/changepassword", [
                'old_password' => $request->old_password,
                'password' => $request->password,
                'c_password' => $request->confirm_password

            ]);
            $responseData = $response->json();

            if ($response->successful()) {

                return redirect()->back()->with($responseData);
            } else {
                return redirect()->back()->with($responseData);
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }
}
