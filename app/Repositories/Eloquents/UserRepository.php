<?php
namespace App\Repositories\Eloquents;

use App\Http\Requests\ChangePassWordByMailRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use  App\Repositories\Eloquents\Str;
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
        return $this->model->create($data);
    }

    public function update($id,$data)
    {
         if( isset( $data['image']) && $data['image']->isValid() ){
            $path = $data['image']->store('public/users');
            $url = Storage::url($path);
            $data['image'] = $url;
        }
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
    public function changepassmail(ChangePassWordByMailRequest $request){
        $user = DB::table('users')->where('email', $request->emails)->first();
        if(!$user){
            toast('Email: ' . $request->emails.'<br> Không tồn tại', 'error', 'top-right');
            return back()->withInput();
        }
        if($request->emails == $user->email){
            try {
            $password = Str::random(6);
            $item=User::find($user->id);
            $item->password= bcrypt($password);
            $item->save();
            $params = [
                'name' => $user->name,
                'password' => $password,
            ];
            Mail::send('shop.emails.password', compact('params'), function ($email) use($user) {
                $email->subject('TCC-Shop');
                $email->to($user->email, $user->name);
            });
            toast('Gửi yêu cầu mật khẩu!'.'<br>'.' Thành Công', 'success', 'top-right');
            return back()->withInput();
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
            toast('Gửi yêu cầu mật khẩu!'.'<br>'.' Không thành Công', 'error', 'top-right');

            return back()->withInput();
        }
        } else{

            toast('Email: ' . $request->emails. '<br> Không tồn tại', 'error', 'top-right');
            return back()->withInput();
            }
    }
}
