<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->userService->all($request);
        return view('users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = User::all();
        $groups = Group::all();

        return view('users.create', compact('items', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        // // $request['group_id']=5;
        //    dd(($request->all()));
        $data = $request->except(['_token', '_method']);
        // dd($data);
        $this->userService->store($data);
        return redirect()->route('users.index');
    }


    public function show($id)
    {
        $Users = User::get();
        $items = $this->userService->find($id);
        // dd($Users);
        return view('users.show', compact('items', 'Users'));
    }


    public function edit($id)
    {
    }


    public function update($request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
