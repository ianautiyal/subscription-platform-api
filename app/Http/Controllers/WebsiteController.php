<?php

namespace App\Http\Controllers;

use App\Http\Requests\Website\DeleteRequest;
use App\Http\Requests\Website\ListRequest;
use App\Http\Requests\Website\ShowRequest;
use App\Http\Requests\Website\StoreRequest;
use App\Http\Requests\Website\UpdateRequest;
use App\Models\Website;

/**
 * @group Website
 *
 * Website API
 * @unauthenticated
 */
class WebsiteController extends Controller
{
    /**
     * List
     *
     * This endpoint lets fetch website.
     */
    public function index(ListRequest $request)
    {
        return Website::query()
            ->search($request->input('search'))
            ->latest()
            ->jsonPaginate($request->input('length'));
    }

    /**
     * Store
     *
     * This endpoint lets store new website.
     */
    public function store(StoreRequest $request)
    {
        Website::create($request->validated());

        return ['message' => trans('Website created successfully.')];
    }

    /**
     * Show
     *
     * This endpoint lets fetch website.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     */
    public function show(ShowRequest $request, Website $website)
    {
        return $website;
    }

    /**
     * Update
     *
     * This endpoint lets update website.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     */
    public function update(UpdateRequest $request, website $website)
    {
        $website->update($request->validated());

        return ['message' => trans('Website updated successfully.')];
    }

    /**
     * Delete
     *
     * This endpoint lets delete website.
     *
     * @urlParam website string required The domain of the website. Example: example.com
     */
    public function delete(DeleteRequest $request, website $website)
    {
        $website->delete();
        return ['message' => trans('Website deleted successfully.')];
    }
}
