<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoomStatus;
use App\Enums\RoomType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRoomRequest;
use App\Models\Room;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse([
            'roomTypeOptions' => RoomType::options(),
            'roomStatusOptions' => RoomStatus::options(),
            'tableData' => Room::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoomRequest $request)
    {
        $room = Room::query()->create($request->validated());

        return $this->successResponse($room->refresh()->toArray(), __('messages.created'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(Room $room)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoomRequest $request, Room $room)
    {
        $room->update($request->validated());

        return $this->successResponse($room->refresh()->toArray(), __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return $this->successResponse([], __('messages.deleted'));
    }
}
