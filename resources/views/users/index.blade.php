@extends('layouts.master')
@section('content')
<h3>Danh sách khách hàng</h3>
<div class="container">
    <table class="table" style="text-align:center">
        <a href="{{route('users.create')}}" class="btn btn-info">Thêm mới</a>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Số điện thoại</th>
                <th>Trao quyền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            @foreach($items as $key => $item)
            <tr>
                <td>{{  ++$key }}</td>
                <td><a href="{{ route('users.show', $item->id) }}"><img id="avt" src="{{asset( $item->image)}}" alt=""></a></td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->phone}}</td>
                <td> {{ isset($item->group->name) ? $item->group->name : 'chưa phân quyền'  }}</td>
                <td>
                    <form action="{{route('users.destroy',[$item->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('users.edit',$item['id']) }}" class="btn btn-warning">Sửa</a>
                        <button onclick="return confirm('Bạn có muốn xóa  này không?');"
                            class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
