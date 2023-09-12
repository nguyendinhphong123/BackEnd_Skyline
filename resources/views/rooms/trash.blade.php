@extends('layouts.master')
@section('content')

<div class="page-header">
    <h3 class="page-title">Thùng rác</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Thùng rác phòng </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                    <div class="row mb-2">
                        <div class="col">
                            <a href="{{route('rooms.index')}}" class="btn btn-primary"> Quay lại </a>
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Tình trạng</th>
                                <th>Thể loại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($softs  as $key => $item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td class="py-1">
                                    <a href="{{route('rooms.show',$item['id'])}}">
                                        <img src="{{ $item->image }}" alt="image">
                                    </a>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format( $item->price) }} VND</td>
                                <td>{{ $item->status == 1 ? 'Còn phòng' : 'Hết phòng' }}</td>
                                <td>{{$item->category ->name}}</td>
                                <td>
                                    <form action="{{route('rooms.deleteforever',[$item->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{route('rooms.restore',[$item->id])}}" class="btn btn-info">Khôi phục</a>
                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
                                            class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <nav class="float-right">
                    {{ $softs->links() }}
                  </nav>
            </div>
        </div>
    </div>
</div>
@endsection
