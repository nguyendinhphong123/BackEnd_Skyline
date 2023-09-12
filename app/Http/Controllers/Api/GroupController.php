<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $GroupService;
    public function __construct(GroupRepositoryInterface $GroupService)
    {
        $this->GroupService = $GroupService;
    }
    public function index(Request $request)
    {
        $items = $this->GroupService->all($request);
        return GroupResource::collection($items);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $this->GroupService->store($request);
        response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->GroupService->find($id);
        return new GroupResource($item);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->GroupService->update($request, $id);
        response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->GroupService->destroy($id);
        response()->json([
            'success' => true,
        ]);
    }
}
