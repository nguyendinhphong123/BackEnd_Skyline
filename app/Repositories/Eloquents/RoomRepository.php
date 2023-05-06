<?php
namespace App\Repositories\Eloquents;

use App\Models\Room;
use App\Models\RoomImage;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

    public function create($data)
    {
        try {
            $room = $this->model;
            $room->name = $data['name'];
            $room->price = $data['price'];
            $room->quantity = $data['quantity'];
            $room->description = $data['description'];
            $room->category_id = $data['category_id'];
            if ($data['inputFile']) {
                $file = $data['inputFile'];
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = time(); // create file name by curent time
                $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
                $data['inputFile']->storeAs('uploads/room', $newFileName); //save file in public/images/brand with newname is newFileName
                $data['image'] = $newFileName;
                $room->image = $data['image'];
            }
            $room->save();

            //create product_images
            if ($data['file_names']) {
                foreach ($data['file_names'] as $key => $file_detail) {
                    $fileExtension = $file_detail->getClientOriginalExtension();
                    $newFileName =  $key . '.' . $fileExtension;
                    $file_detail->storeAs('uploads/room', $newFileName);
                    $room->room_images()->saveMany([
                        new RoomImage([
                            'image' => $newFileName,
                        ]),
                    ]);
                }
            }
            return $room;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $room;
    }

    public function all($request)
    {
        $rooms = $this->model->select('*');
        if (!empty($request->key)) {
            $search = $request->key;
            $rooms = $rooms->Search($search);
        }
        return $rooms->orderBy('id','DESC')->paginate(5);
    }
    
}