@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Quản lý phòng</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Quản lý phòng </li>
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
                                @if (Auth::user()->hasPermission('room_create'))
                                    <a href="{{ route('rooms.create') }}" class="btn btn-primary"> Thêm mới </a>
                                @endif
                                <a href="{{ route('rooms.export') }}" class="btn btn-warning">Xuất excel</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}"
                                    name="id">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Nhập tên" class="form-control"
                                    value="{{ request()->name }}" name="name">
                            </div>
                            <div class="col">
                                <select class="form-control" name="category_id">
                                    <option value="">Tất cả danh mục</option>
                                    @foreach ($categories as $category)
                                        <option @selected(request()->category_id == $category->id) value="{{ $category->id }}">
                                            {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-info"> Tìm </button>
                                <a href="{{ route('rooms.index') }}" type="submit" class="btn btn-secondary">Đặt lại</a>
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
                                    <th>Hình ảnh</th>
                                    <th>Mã phòng</th>
                                    <th>Giá</th>
                                    <th>Tình trạng</th>
                                    <th>Thể loại phòng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="py-1">
                                            <a href="{{ route('rooms.show', $item['id']) }}">
                                                <img src="{{ $item->image }}" alt="image">
                                            </a>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ number_format($item->price) }} VND</td>
                                        <td>{{ $item->quantity == 1 ? 'Còn phòng' : 'Hết phòng' }}</td>
                                        <td> @if ($item->category)
                                            {{ $item->category->name }}
                                        @else
                                            Thể loại không tồn tại
                                        @endif</td>
                                        <td>{{ $item->category->name}}</td>
                                        @if (Auth::user()->hasPermission('room_update') || Auth::user()->hasPermission('room_delete'))
                                            <td>
                                                @if (Auth::user()->hasPermission('room_update'))
                                                <form action="{{ route('rooms.destroy', [$item->id]) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('rooms.edit', [$item->id]) }}"
                                                        class="btn btn-info">Sửa</a>
                                                @endif
                                                @if (Auth::user()->hasPermission('room_delete'))
                                                    <button
                                                        onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
                                                        class="btn btn-danger">Xóa</button>
                                                @endif
                                                </form>
                                            </td>
                                        @endif
                                @endforeach
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <nav class="float-right">
                        {{ $items->appends(request()->all())->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
