<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\DeleteRequest;
use App\Http\Requests\Post\ListRequest;
use App\Http\Requests\Post\ShowRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\Website;

/**
 * @group Post
 *
 * Post API
 * @unauthenticated
 */
class PostController extends Controller
{
    /**
     * List
     *
     * This endpoint lets fetch post.
     */
    public function index(ListRequest $request, Website $website)
    {
        return $website->posts()
            ->search($request->input('search'))
            ->latest()
            ->jsonPaginate($request->input('length'));
    }

    /**
     * Store
     *
     * This endpoint lets store new post.
     */
    public function store(StoreRequest $request, Website $website)
    {
        $website->posts()->create($request->validated());

        return ['message' => trans('Post created successfully.')];
    }

    /**
     * Show
     *
     * This endpoint lets fetch post.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     * @urlParam post string required The ID of the post. Example: 1
     */
    public function show(ShowRequest $request, Website $website, Post $post)
    {
        return $post;
    }

    /**
     * Update
     *
     * This endpoint lets update post.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     * @urlParam post string required The ID of the post. Example: 1
     */
    public function update(UpdateRequest $request, Website $website, Post $post)
    {
        $post->update($request->validated());

        return ['message' => trans('Post updated successfully.')];
    }

    /**
     * Delete
     *
     * This endpoint lets delete post.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     * @urlParam post string required The ID of the post. Example: 1
     */
    public function delete(DeleteRequest $request, Website $website, Post $post)
    {
        $post->delete();
        return ['message' => trans('Post deleted successfully.')];
    }
}
