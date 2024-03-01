<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ListController extends Controller
{
    public function create(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                // 'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'path' => 'required'

            ]);


            $user = $request->user();
            $list = Listing::create(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $user->id,
                    'featured' => $request->featured,
                ]
            );
            foreach ($request->path as $item) {
                $list->images()->create(['path' => $item]);
            }
            // Handle image upload
            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('listing_images', 'public');

            //     $list->images()->create(['path' => $imagePath]);
            // }

            if ($list) {
                return response()->json(['message' => 'Successfully created']);
            } else {
                return response()->json(['error' => 'failed to created post']);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }


    public function updatelist(Request $request)
    {

        try {
            $request->validate([
                'id' => 'required',
                'title' => 'required',
                'description' => 'required|string',

            ]);

            $user = $request->user();

            $list = $user->listings()->find($request->id);




            if (!empty($list)) {

                $list->update(
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'featured' => $request->featured,
                    ]
                );

                if (!empty($request->path)) {

                    // $list->images()->whereIn('id', $request->images_id)->delete();
                    if (!empty($request->images_id)) {
                        $imagesIdParam = empty($request->images_id);

                        // Determine if it's a single ID or multiple IDs

                        $imageIdsToDelete = strpos($imagesIdParam, ',') !== false
                            ? explode(',', $imagesIdParam)
                            : [$imagesIdParam];
                        $deletedRows = $list->images()->whereIn('id', $imageIdsToDelete)->delete();;
                    }


                    foreach ($request->path as $item) {
                        $list->images()->create(['path' => $item]);
                    }
                }






                return response()->json(['message' => 'Successfully updated']);
            } else {
                return response()->json(['error' => 'failed to updated post']);
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }



    public function get(Request $request)
    {


        $user = $request->user();
        // $list = $user->listings()->find($request->id)->with('image');
        $list  = Listing::where(['user_id' => $request->user()->id, 'id' => $request->id])->with('images')->get();

        if ($list) {

            return response()->json(['message' => 'success', 'data' => $list]);
        } else {
            return response()->json(['error' => 'Failed to get list']);
        }
    }

    public function delete(Request $request)
    {

        $user = $request->user();
        $listingToDelete = $user->listings()->find($request->id);


        if ($listingToDelete) {
            $listingToDelete->delete();

            return response()->json(['message' => 'Successfully deleted']);
        } else {
            return response()->json(['error' => 'Failed to delete list']);
        }
    }
}
