@extends('layouts.master')
@section('content')

<div class="container">
 
    <table class="table" style="text-align:center">
        <h2 style="text-align:center">Thùng Rác</h2>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Thể loại</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($softs as $key => $item)
            <tr data-expanded="true" class="item-{{ $item->id }}">
                <td style="width:5%">{{ $key + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price) }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    <a href="{{route('rooms.show',$item['id'])}}">
                        <img  style="width:120px; height:100px" src="{{ $item->image }}" alt=""class="image_photo">
                    </a>
                </td>

                <td>

                    <form action="{{ route('rooms.deleteforever', [$item->id]) }}"
                        method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('rooms.restore', [$item->id]) }}"
                            class="btn btn-primary">Khôi phục</a>
                        <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                            class="btn btn-danger">Xóa vĩnh viễn</button>
                    </form>
                </td>
                    @endforeach
                </tr>
            </tbody>

        </table>
        
        {{ $softs->links() }}
    </div>
@endsection