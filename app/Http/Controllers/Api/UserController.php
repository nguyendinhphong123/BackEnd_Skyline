<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    // protected $groupService;

    public function __construct(
        UserServiceInterface $userService
    ) {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->userService->all($request);
        return UserResource::collection($items);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(StoreUserRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $this->userService->store($data);
        response()->json([
            'success' => true,
        ]);
    }


    public function show(string $id)
    {
        $item = $this->userService->find($id);
        return new UserResource($item);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->userService->update($request, $id);
        response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->destroy($id);
        response()->json([
            'success' => true,
        ]);
    }
}
