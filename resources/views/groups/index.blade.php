
@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Danh sách nhóm quyền</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Danh sách nhóm quyền </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row mb-2">
                            <div class="col">
                                <a href="{{ route('groups.create') }}" class="btn btn-primary"> Thêm mới </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}" name="id">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Nhập name" class="form-control" value="{{ request()->name }}" name="name">
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
                                    <th>Tên</th>
                                    <th>Người đảm nhận </th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>Hiện có {{ count($item->users) }} người</td>
                                        <td>
                                            <form action="{{route('groups.destroy',[$item->id])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                    <a href="{{ route('groups.edit',$item['id']) }}" class="btn btn-info">Sửa</a>
                                                    <a class="btn btn-primary " href="{{route('groups.show', $item->id)}}">Trao Quyền</a>
                                                        <button onclick="return confirm('Bạn có muốn xóa  này không?');"
                                                        class="btn btn-danger">Xóa</button>
                                                    </form>
                                        </td>
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
