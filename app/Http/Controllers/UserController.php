<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassWordByMailRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;
// use App\Repositories\Interfaces\GroupServiceInterface;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected $userService;
    // protected $groupService;

    public function __construct(
        UserServiceInterface $userService
        // GroupServiceInterface $groupService
    )
    {
        $this->userService = $userService;
        // $this->groupService = $groupService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $items = $this->userService->all($request);
        return view('users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $items = User::all();
        $groups = Group::all();
        return view('users.create', compact('items', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $this->userService->store($data);
        alert()->success('Thêm thành công!');
        return redirect()->route('users.index');
    }


    public function show($id)
    {
        $Users = User::get();
        $items = $this->userService->find($id);
        return view('users.show', compact('items', 'Users'));
    }


    public function edit($id)
    {
        $this->authorize('update', User::class);
        $groups = Group::all();
        $item = $this->userService->find($id);
        return view('users.edit', compact('item', 'groups'));
    }


    public function update(UpdateUserRequest $request, $id)
    {

        $data = $request->except(['_token', '_method']);
        $this->userService->update($id, $data);
        alert()->success('Sửa thành công!');
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        $this->userService->destroy($id);
        alert()->success('xóa thành công!');
        return redirect()->route('users.index');
    }

    public function forget_password()
    {
        return view('emails.password');
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
