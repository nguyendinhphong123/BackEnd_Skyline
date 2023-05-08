@extends('layouts.master')
@section('content')
<h3>Danh sách nhóm quyền</h3>
<div class="container">
    <table class="table" style="text-align:center">
        <a href="{{route('groups.create')}}" class="btn btn-info">Thêm mới</a>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <form action="{{route('groups.destroy',[$item->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-primary " href="{{route('groups.show', $item->id)}}">Trao Quyền</a>
                        <a href="{{ route('groups.edit',$item['id']) }}" class="btn btn-warning">Sửa</a>
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
