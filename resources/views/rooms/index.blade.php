@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="container">

    <table class="table" style="text-align:center">
        <a href="{{route('rooms.create')}}" class="btn btn-info">Thêm mới</a>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Phòng</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thể loại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->name}}</td>
                <td>{{number_format( $item->price) }} VND</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->category->name}}</td>
                <td>
                    <a href="{{route('rooms.show',$item['id'])}}">
                        <img  style="width:120px; height:100px" src="{{ $item->image }}" alt=""class="image_photo">
                    </a>
                    
                </td>
                <td>
                    <form action="{{route('rooms.destroy',[$item->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('rooms.edit',[$item->id])}}" class="btn btn-warning">Sửa</a>
                        <button onclick="return confirm('Bạn có muốn xóa  này không?');"
                            class="btn btn-danger">Xóa</button>
                    </form>
                </td>
                @endforeach
            </tr>
        </tbody>

    </table>

    {{ $items->links() }}
</div>

@endsection