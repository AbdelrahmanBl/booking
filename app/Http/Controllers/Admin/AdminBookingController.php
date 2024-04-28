<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBookingRequest;
use App\Http\Resources\Admin\AdminBookingResource;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse([
            'tableData' => AdminBookingResource::collection(
                Booking::query()->with(['user', 'room'])->get()
            ),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
    public function update(AdminBookingRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return $this->successResponse(AdminBookingResource::make($booking->load('user', 'room')), __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Booking $booking)
    // {
    //     //
    // }
}
