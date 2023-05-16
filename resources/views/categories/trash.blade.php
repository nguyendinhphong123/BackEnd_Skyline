@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Danh sách thể loại</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Danh sách thể loại </li>
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
                                <a href="{{ route('categories.index') }}" class="btn btn-primary"> Quay lại </a>
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
                                    <th>Tên Thể loại</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        @if (Auth::user()->hasPermission('Category_restore') || Auth::user()->hasPermission('Category_forceDelete'))
                                            <td>
                                                @if (Auth::user()->hasPermission('Category_restore'))
                                                    <form action="{{ route('categories.deleteforever', [$item->id]) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('categories.restore', $item['id']) }}"
                                                            class="btn btn-info">Khôi phục</a>
                                                @endif
                                                @if (Auth::user()->hasPermission('Category_forceDelete'))

                                                    <button onclick="return confirm('Bạn có muốn Xóa vĩnh viễn không?');"
                                                        class="btn btn-danger">Xóa vĩnh viễn</button>
                                                    </form>
                                                @endif
                                            </td>
                                          @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
