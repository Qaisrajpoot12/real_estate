<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Termwind\Components\Dd;

class ListsController extends Controller
{
    public function featured()
    {

        $userdata = getUser();

        if (isset($userdata['error']) && $userdata['error'] == 'invalid login token') {
            session()->forget('access_token');
            return redirect('login')->with('error', 'invalid Session ');
        }
        $user = $userdata['user'];
        return view('admin.featured_lists', compact('user'));
    }

    public function listdetail($id)
    {

        $apiUrl = env('API_URL');


        $token = session()->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/list/get", [
            'id' => $id,

        ]);
        $responseData = $response->json();
        if ($response->successful()) {

            $data = $responseData['data'];
            return view('admin.post_view', compact('data'));

            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with($responseData);
        }
    }

    public function createlisting()
    {

        return view('admin.post_add');
    }

    public function createlistingsubmit(Request $request)
    {
        $apiUrl = env('API_URL');
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg',

            ]);

            $token = session()->get('access_token');
            $imagePath = [];
            if ($request->hasFile('image')) {
                $image_arr =  $request->file('image');








                foreach ($image_arr  as $item) {


                    $extenstion = $item->getClientOriginalExtension();

                    $filename = time() . '.' . $extenstion;
                    $item->move('uploads/listing_images', $filename);

                    $imagePath[] = $filename;
                    // $imagePath[] = $item->store('listing_images', 'public');
                }
            }


            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("$apiUrl/list/create", [
                'title' => $request->title,
                'description' => $request->description,
                'featured' => $request->featured == 'on' ? 1 : 0,
                'path' => $imagePath,


            ]);
            $responseData = $response->json();


            if ($response->successful()) {

                return redirect()->route('home')->with('success', 'Created successfully');
            } else {
                return redirect()->back()->with('error', 'somthing went wrong');
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }

    public function edit($id)
    {
        $apiUrl = env('API_URL');

        $token = session()->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/list/get", [
            'id' => $id


        ]);
        $responseData = $response->json();
        $data = $responseData['data'][0];
        if ($response->successful()) {

            return view('admin.post_edit', compact('data'));
        } else {
            return redirect()->back()->with('error', 'somthing went wrong');
        }
    }


    public function editListSubmit(Request $request, $id)
    {
        $apiUrl = env('API_URL');
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required',
                // 'path' => 'image|mimes:png,jpg',
            ]);

            $token = session()->get('access_token');





            if ($request->hasFile('image')) {
                $uploadedImages = [];
                // Loop through each uploaded image

                $list = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                ])->post("$apiUrl/list/get", [
                    'id' => $id


                ]);
                $listData = $list->json();
                // getting all paths of images to be deleted
                if (!empty($listData['data'])) {
                    if (!empty($request->images_id)) {


                        $listImages = $listData['data'][0]['images'] ?? [];

                        $imagesIdParam = $request->images_id;


                        $imageIdsToDelete = strpos($imagesIdParam, ',') !== false
                            ? explode(',', $imagesIdParam)
                            : [$imagesIdParam];




                        $pathsToDelete = [];
                        foreach ($listImages as $key) {
                            if (in_array($key['id'], $imageIdsToDelete)) {



                                if (file_exists('uploads/listing_images/' . $key['path'])) {
                                    // Delete the file
                                    unlink(public_path('uploads/listing_images/' . $key['path']));
                                }
                            }
                        }
                    }
                }




                foreach ($request->file('image')  as $item) {


                    $extenstion = $item->getClientOriginalExtension();

                    $filename = time() . '.' . $extenstion;
                    $item->move('uploads/listing_images', $filename);

                    $uploadedImages[] = $filename;
                }
            }



            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("$apiUrl/list/update", [
                'id' =>   $id,
                'title' => $request->title,
                'description' => $request->description,
                'featured' => empty($request->featured) ? 0 : 1,
                'path' => empty($uploadedImages) ? "" : $uploadedImages,
                'images_id' => empty($request->images_id) ? "" : $request->images_id,
            ]);

            $responseData = $response->json();


            if ($response->successful()) {

                return redirect()->route('home')->with('success', 'Created successfully');
            } else {
                return redirect()->back()->with('error', 'somthing went wrong');
            }
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors);
        }
    }
    public function delete(Request $request, $id)
    {
        $apiUrl = env('API_URL');


        $token = session()->get('access_token');
        $list = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/list/get", [
            'id' => $id


        ]);
        $listData = $list->json();
        // getting all paths of images to be deleted


        if (!empty($listData['data'])) {
            $listImages = $listData['data'][0]['images'] ?? [];


            foreach ($listImages as $key) {

                if (file_exists('uploads/listing_images/' . $key['path'])) {
                    // Delete the file
                    unlink(public_path('uploads/listing_images/' . $key['path']));
                }
            }
        }



        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("$apiUrl/list/delete", [
            'id' => $id,

        ]);





        $responseData = $response->json();
        if ($response->successful()) {

            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with($responseData);
        }
    }
}
