<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subscription\SubscribeRequest;
use App\Http\Requests\Subscription\UnSubscribeRequest;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Validation\ValidationException;

/**
 * @group Subscription
 *
 * Subscription API
 * @unauthenticated
 */
class SubscriptionController extends Controller
{
    /**
     * Subscribe
     *
     * This endpoint lets store subscribe.
     */
    public function subscribe(SubscribeRequest $request, Website $website)
    {
        $subscriber = Subscriber::firstOrCreate($request->validated());

        if ($website->subscribers()->find($subscriber)) {
            throw ValidationException::withMessages([
                'email' => trans('Already subscribed.')
            ]);
        }

        $website->subscribers()->attach($subscriber);

        return ['message' => trans('Subscribed successfully.')];
    }

    /**
     * UnSubscribe
     *
     * This endpoint lets unsubscribe.
     */
    public function unsubscribe(UnSubscribeRequest $request, Website $website)
    {
        $subscriber = Subscriber::firstOrCreate($request->validated());

        if (!$website->subscribers()->find($subscriber)) {
            throw ValidationException::withMessages([
                'email' => trans('No Subscription found.')
            ]);
        }

        $website->subscribers()->detach($subscriber);

        return ['message' => trans('Unsubscribed successfully.')];
    }
}
