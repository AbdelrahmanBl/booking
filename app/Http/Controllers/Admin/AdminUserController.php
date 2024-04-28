<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successResponse([
            'tableData' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserRequest $request)
    {
        $user = User::query()->create($request->validated());

        return $this->successResponse($user->toArray(), __('messages.created'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $this->successResponse($user->toArray(), __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->successResponse([], __('messages.deleted'));
    }
}
