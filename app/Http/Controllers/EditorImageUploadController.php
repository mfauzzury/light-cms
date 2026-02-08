<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditorImageUploadController extends Controller
{
    /**
     * Handle image upload from Editor.js.
     */
    public function upload(Request $request): JsonResponse
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'error' => $validator->errors()->first(),
            ], 422);
        }

        try {
            // Create a temporary Content model instance for media storage
            // In a real scenario, you might want to associate this with the actual content
            // or use a dedicated media storage approach
            $content = new Content();
            $content->type = 'page';
            $content->title = 'Temporary for media';
            $content->slug = 'temp-' . uniqid();
            $content->content_json = ['blocks' => []];
            $content->status = 'draft';
            $content->author_id = auth()->id() ?? 1;
            $content->save();

            // Store the image using Spatie Media Library
            $media = $content->addMediaFromRequest('image')
                ->toMediaCollection('content_images');

            // Return the URL in Editor.js expected format
            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => $media->getUrl(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => 0,
                'error' => 'Failed to upload image: ' . $e->getMessage(),
            ], 500);
        }
    }
}
