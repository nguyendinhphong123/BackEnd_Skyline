<?php
namespace App\Repositories\Eloquents;

use App\Models\Group;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

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
}
