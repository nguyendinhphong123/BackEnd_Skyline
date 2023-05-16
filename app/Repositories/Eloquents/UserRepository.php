<?php
namespace App\Repositories\Eloquents;


use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Storage;
class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
    public function paginate($request){
        $result = $this->model->paginate(2);
        return $result;
    }

    public function store($data)
    {
        if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/users');
            $url = Storage::url($path);
            $data['image'] = $url;
        }
        if( isset( $data['password'])) {
            $data['password']=bcrypt($data['password']);
        };
        return $this->model->create($data);
    }

    public function update($id,$data)
    {
         if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/users');
            $url = Storage::url($path);
            $data['image'] = $url;
        }
        if( isset( $data['password'])) {
            $data['password']=bcrypt($data['password']);
        };
        return $this->model->where('id',$id)->update($data);
    }
    public function all($request)
    {
        $query = $this->model->select('*');
        if ( $request->group_id ) {
            $query->where('group_id',$request->group_id);
        }
        if ( $request->name ) {
            $query->where('name','like','%'.$request->name.'%');
        }
        if ( $request->id ) {
            $query->where('id',$request->id);
        }
        return $query->orderBy('id','DESC')->paginate(4);
    }
    public function find($id)
    {
        $item = $this->model->find($id);
        $item->created = date('Y-m-d',strtotime($item->created_at));
        return $item;
    }
}
