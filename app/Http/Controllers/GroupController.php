<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

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
        $this->authorize('viewAny', Group::class);
        $items = $this->GroupService->all($request);
        return view('groups.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Group::class);
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {

        $data = $request->except(['_token', '_method']);
        $this->GroupService->store($data);
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Group::class);
        $item = $this->GroupService->find($id);
        return view('groups.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, $id)
    {

        $data = $request->except(['_token', '_method']);
        $this->GroupService->update($id, $data);
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Group::class);
        $this->GroupService->destroy($id);
        return redirect()->route('groups.index');
    }
    public function show(string $id)
    {
        $group =  $this->GroupService->show($id);
        $roles = Role::get();
        $group = $this->GroupService->find($id);
        $params = [
            'group' => $group,
            'roles'   => $roles
        ];

        return view('groups.show', $params);
    }


    public function group_detail(Request $request, $id)
    {

        try {
            $this->GroupService->group_detail($id, $request);
            return redirect()->route('groups.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index');
        }
    }
}
