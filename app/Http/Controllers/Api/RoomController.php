<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\RoomServiceInterface;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    protected $roomService;
    public function __construct(RoomServiceInterface $roomService)
    {
        $this->roomService = $roomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->roomService->all($request);
        return RoomResource::collection($items);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $data = $request->except(['_token','_method']);
        $this->roomService->store($data);
        return response()->json([
            'success' => true,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->roomService->find($id);
        return new RoomResource($item);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, string $id)
    {
        $data = $request->except(['_token','_method']);
        $this->roomService->update($data, $id);
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roomService->destroy($id);
        response()->json([
            'success' => true,
        ]);
    }
    public function relatedItems($id,Request $request){
        $item=$this->roomService->find($id);
        $request->category_id = $item->category_id;
        $request->limit = 4;
        $request->all = 1;
        $request->id = 0;
        $items = $this->roomService->all($request);
        return RoomResource::collection($items);

    }
}
