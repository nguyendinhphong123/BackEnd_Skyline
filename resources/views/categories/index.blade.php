@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<h3>Danh sách thể loại</h3>
<div class="container">
    <table class="table" style="text-align:center">
        <a href="{{route('categories.create')}}" class="btn btn-info">Thêm mới</a>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($items as $key => $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <form action="{{route('categories.destroy',[$item->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('categories.edit',$item['id']) }}" class="btn btn-warning">Sửa</a>
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


