<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Storage;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }
    // public function paginate($data){
    //     $result = $this->model->paginate();
    //     return $result;
    // }

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

    public function getTrashed()
    {
        $result = $this->model->onlyTrashed()->get();
        return $result;
    }
    public function restore($id)
    {
        $result = $this->model->withTrashed()->find($id)->restore();
        return $result;
    }

    public function deleteforever($id)
    {
        // try {

            $result = $this->model->onlyTrashed()->find($id);
            $result->forceDelete();
            return $result;

    }
    public function store($data)
    {
        if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/categories');
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
            $path = $data['image']->store('public/categories');
            $url = Storage::url($path);
            $data['image'] = $url;
        }
        if( isset( $data['password'])) {
            $data['password']=bcrypt($data['password']);
        };
        return $this->model->where('id',$id)->update($data);
    }

}
