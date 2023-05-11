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
        $users = $this->model->select('*');

        if (!empty($request->key)) {
            $search = $request->key;
            $users = $users->Search($search);
        }
        return $users->orderBy('id','DESC')->paginate(3);
    }
    public function find($id)
    {
        $item = $this->model->find($id);
        $item->created = date('Y-m-d',strtotime($item->created_at));
        // dd($item);
        return $item;
    }
}
