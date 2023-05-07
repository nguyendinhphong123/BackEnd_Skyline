<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Category;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;

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
        $categories = Category::get();
        return view('rooms.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('rooms.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $data = $request->except(['_token','_method']);
        $this->roomService->store($data);
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::get();
        $items = $this->roomService->find($id);
        return view('rooms.show', compact('items','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $items = $this->roomService->find($id);
        $categories = Category::all();
        $room = $this->roomService->find($id);
        return view('rooms.edit', compact('items', 'categories', 'room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $this->roomService->update($id,$data);
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = $this->roomService->destroy($id);
        return redirect()->route('rooms.index');

    }
}
