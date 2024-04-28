<?php

namespace App\Http\Controllers\Client;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientBookingRequest;
use App\Http\Resources\Client\ClientBookingResource;

class ClientBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse([
            'tableData' => ClientBookingResource::collection(
                request()->user()
                ->bookings()
                ->with('room')
                ->latest('id')
                ->get()
            ),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientBookingRequest $request)
    {
        $booking = $request->user()->bookings()->firstOrCreate([
            'room_id' => $request->validated('room_id'),
            'status' => BookingStatus::PENDING,
        ]);

        if(! $booking->wasRecentlyCreated) {
            return $this->errorResponse([], __('messages.booked_before', [
                'booking_number' => $booking->booking_number
            ]));
        }

        return $this->successResponse([], __('messages.booked', ['booking_number' => $booking->booking_number]));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Booking $booking)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Booking $booking)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Booking $booking)
    // {
    //     //
    // }
}
