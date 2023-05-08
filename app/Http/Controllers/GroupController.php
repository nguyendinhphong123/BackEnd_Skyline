<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $GroupService;
    public function __construct(GroupRepositoryInterface $GroupService)
    {
        $this->GroupService = $GroupService;
    }
    public function index(Request $request)
    {
        $items = $this->GroupService->all($request);
        return view('groups.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {

        $data = $request->except(['_token','_method']);
        $this->GroupService->store($data);
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Groups = Group::get();
        $items = $this->GroupService->find($id);
        // dd($Users);
        return view('groups.show', compact('items', 'Groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->GroupService->find($id);
        return view('groups.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request,$id)
    {
        $data = $request->except(['_token','_method']);
        $this->GroupService->update($id,$data);
            return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->GroupService->destroy($id);
        return redirect()->route('groups.index');
    }
}
