<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Category;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Support\Facades\Log;
class GroupController extends Controller
{
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
        $this->authorize('create', Group::class);
        $data = $request->except(['_token', '_method']);
        $this->GroupService->store($data);
        toast('thêm Thành Công!', 'success', 'top-right');
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
        $this->authorize('update', Group::class);
        $data = $request->except(['_token', '_method']);
        $this->GroupService->update($id, $data);
        toast('sửa Thành Công!', 'success', 'top-right');
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Group::class);
        $this->GroupService->destroy($id);
        toast('xóa Thành Công!', 'success', 'top-right');
        return redirect()->route('groups.index');
    }
    public function show(string $id)
    {
        $params = $this->GroupService->showGroup($id);
        $groups = [];
        foreach($params['roles'] as $role ){
            $groups[$role['group_name']][] = $role;
        }
        $params['all_roles'] = $groups;
        return view('groups.show', $params);
    }


    public function updateRoles(Request $request, $id)
    {

        try {
            $this->GroupService->updateRoles($id, $request);
            toast('cấp quyền Thành Công!', 'success', 'top-right');
            return redirect()->route('groups.index');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index');
        }
    }
}
