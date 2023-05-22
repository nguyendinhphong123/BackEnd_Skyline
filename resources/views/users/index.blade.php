@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">Quản lý nhân viên </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Quản lý nhân viên </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row mb-2">
                         @if (Auth::user()->hasPermission('User_create'))
                            <div class="col">
                                <a href="{{ route('users.create') }}" class="btn btn-info">Thêm mới</a>
                            </div>
                        @endif
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}"
                                    name="id">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Nhập name" class="form-control"
                                    value="{{ request()->name }}" name="name">
                            </div>
                            <div class="col">
                                <select name="group_id" id="" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-info"> Tìm </button>
                                <a href="{{ route('groups.index') }}" type="submit" class="btn btn-secondary">Đặt lại</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Nhân viên</th>
                                    <th>Ảnh</th>
                                    <th>Số điện thoại</th>
                                    <th>Nhóm nhân viên </th>
                                    <th>Hành động </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($items as $key => $item)
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><a href="{{ route('users.show', $item->id) }}"><img
                                                    style="width:120px; height:100px" src="{{ asset($item->image) }}"
                                                    alt=""></a></td>
                                        <td>{{ $item->phone }}</td>
                                        <td> {{ isset($item->group->name) ? $item->group->name : 'chưa phân quyền' }}</td>
                                        @if (Auth::user()->hasPermission('User_update') || Auth::user()->hasPermission('User_delete'))
                                            <td>
                                                @if (Auth::user()->hasPermission('User_update'))
                                                <form action="{{ route('users.destroy', [$item->id]) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('users.edit', $item['id']) }}"
                                                        class="btn btn-info">Sửa</a>
                                                @endif
                                                @if(Auth::user()->hasPermission('User_delete'))
                                                    <button
                                                        onclick="return confirm('Bạn có muốn xóa  này không?');"class="btn btn-danger">Xóa</button>
                                                @endif
                                            </td>
                                        @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <nav class="float-right">
                        {{ $items->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
