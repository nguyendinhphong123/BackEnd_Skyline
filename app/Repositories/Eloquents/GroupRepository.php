<?php
namespace App\Repositories\Eloquents;

use App\Models\Group;
use App\Models\Role;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Auth;

class GroupRepository extends EloquentRepository implements GroupRepositoryInterface
{
    public function getModel()
    {
        return Group::class;
    }
    public function paginate($data){
        $result = $this->model->paginate();
        return $result;
    }

    public function all($request)
    {
        $Groups = $this->model->select('*');

        if (!empty($request->key)) {
            $search = $request->key;
            $Groups = $Groups->Search($search);
        }
        return $Groups->orderBy('id','DESC')->paginate(5);
    }
    public function show($id)
    {
        $group = Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];

        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return $params;
    }
    public function group_detail($id, $request)
    {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
    }
}
