<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Category;
use App\Models\Room;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RoomsExport;

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

        $this->authorize('viewAny', Room::class);
        $items = $this->roomService->all($request);
        $categories = Category::get();
        return view('rooms.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Room::class);
        $categories = Category::all();
        return view('rooms.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $this->authorize('create', Room::class);
        $data = $request->except(['_token','_method']);
        $this->roomService->store($data);
        toast('Thêm Mới Phòng Thành Công!', 'success', 'top-right');
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
        $this->authorize('update', Room::class);
        $items = $this->roomService->find($id);
        $categories = Category::all();
        // dd($items);
        $room = $this->roomService->find($id);
        return view('rooms.edit', compact('items', 'categories', 'room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, $id)
    {

        $this->authorize('update', Room::class);
        $data = $request->except(['_token','_method']);
        $this->roomService->update($id,$data);
        toast('Sửa Phòng Thành Công!', 'success', 'top-right');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete', Room::class);
        $items = $this->roomService->destroy($id);
        toast('Phòng Đã Được Đưa Vào Thùng Rác!', 'success', 'top-right');
        return redirect()->route('rooms.index');
    }
    public function getTrashed()
    {
        $items = $this->roomService->getTrashed();
        $softs = Room::onlyTrashed()->paginate(3);
        $categories = Category::get();
        return view('rooms.trash', compact('softs','categories'));
    }
    public function restore($id)
    {
        try {
            $items = $this->roomService->restore($id);
            toast('Khôi phục Phòng Thành Công!', 'success', 'top-right');
            return redirect()->route('rooms.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('rooms.index');
        }
    }
    public function deleteforever($id)
    {

        try {
            $items = $this->roomService->deleteforever($id);
            toast('Xóa Vĩnh Viễn Sản Phẩm Thành Công!', 'success', 'top-right');
            return redirect()->route('rooms.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('rooms.index');
        }
    }

    public function export()
    {
        return Excel::download(new RoomsExport, 'rooms.xlsx');
    }

}
