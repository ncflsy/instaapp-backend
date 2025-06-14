<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = Post::with('user', 'likes', 'comments')->where('status', 'public')->inRandomOrder()->limit(10)->get();
            return response()->json([
                'success' => true,
                'message' => $posts->isEmpty() ? 'No posts found.' : 'Data retrieved successfully.',
                'data' => $posts
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve posts.',
            ], 500);
        }
    }

    public function getMyPost($id)
    {
        try {
            $posts = Post::with('user', 'likes', 'comments')->where('user_id', $id)->get();
            return response()->json([
                'success' => true,
                'message' => $posts->isEmpty() ? 'No posts found.' : 'Data retrieved successfully.',
                'data' => $posts
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve posts.',
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('posts', 'public');
            }

            $post = Post::create([
                'user_id' => $request->user_id,
                'image' => $imagePath,
                'text' => $request->text ?? null,
                'status' => $request->status ?? 'public'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post saved successfully.',
                'data' => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function storeLike(Request $request, $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found.',
                ], 404);
            }

            $search_like = Like::where('post_id', $post->post_id)->where('user_id', $request->user_id)->first();

            if ($search_like) {
                $search_like->delete();
            } else {
                Like::create([
                    'post_id' => $post->post_id,
                    'user_id' => $request->user_id
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Like saved successfully.',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function postComment(Request $request, $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found.',
                ], 404);
            }

            $post->comments()->create([
                'user_id' => $request->user_id,
                'post_id' => $post->post_id,
                'comment' => $request->comment
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment saved successfully.',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found.',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data retrieved successfully.',
                'data' => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve post.',
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
