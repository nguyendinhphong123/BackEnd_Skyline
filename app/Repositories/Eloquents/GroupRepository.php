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
        $query = $this->model->select('*');
        if ( $request->name ) {
            $query->where('name','like','%'.$request->name.'%');
        }
        if ( $request->id ) {
            $query->where('id',$request->id);
        }
        return $query->orderBy('id','DESC')->paginate(5);
    }
    public function show($id)
    {
        $group = $this->find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        $roles = Role::all()->toArray();
        $group_names = [];

        // /////lấy tên nhóm quyền
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
    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }
    public function updateRoles($id, $request)
    {

        $group = $this->find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
    }
    public function showGroup($id){
        $roles = Role::get();
        $group = $this->model->find($id);
        $active_roles = $group->roles->pluck('id')->toArray();
        $params = [
            'group' => $group,
            'roles'   => $roles,
            'active_roles'   => $active_roles,
        ];
        return $params;
    }
}
