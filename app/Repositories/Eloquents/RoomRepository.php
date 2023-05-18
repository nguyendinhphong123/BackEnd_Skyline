<?php
namespace App\Repositories\Eloquents;

use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Storage;

class RoomRepository extends EloquentRepository implements RoomRepositoryInterface
{
    public function getModel()
    {
        return Room::class;
    }

    /*
    - Do PostRepository đã kế thừa EloquentRepository nên không cần triển khai
    các phương thức trừu tượng của PostRepositoryInterface
    - Có thể ghi đè phương thức ở đây
    - Nếu muốn thêm phương thức mới cần:
        + Khai báo thêm ở PostRepositoryInterface
        + Triển khai lại ở đây
    - Ví dụ: paginate() không có sẵn trong RepositoryInterface, để thêm chúng ta thêm:
        + Khai báo paginate() ở PostRepositoryInterface
        + Triển khai lại ở PostRepository
    */
    public function paginate($request){
        $result = $this->model->paginate();
        return $result;
    }
    public function store($data)
    {
        if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/rooms');
            $url = Storage::url($path);
            $data['image'] = $url;

        }

        return $this->model->create($data);
    }

    public function update($id,$data)
    {
         if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/rooms');
            $url = Storage::url($path);
            $data['image'] = $url;
        }
        return $this->model->where('id',$id)->update($data);
    }



    public function all($request)
    {
        $query = $this->model->select('*');
        if ( $request->category_id ) {
            $query->where('category_id',$request->category_id);
        }
        if ( $request->name ) {
            $query->where('name','like','%'.$request->name.'%');
        }
        if ( $request->id ) {
            $query->where('id',$request->id);
        }
        if ( $request->limit ) {
            $query->take($request->limit);
        }
        if ( $request->all ) {
            return $query->orderBy('id','DESC')->get();
        }
        return $query->orderBy('id','DESC')->paginate(4);
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
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

}
