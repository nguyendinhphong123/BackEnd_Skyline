@extends('layouts.master')
@section('content')
<div class="page-header">
    <h3 class="page-title">Thêm mới phòng</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Thêm mới phòng </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('rooms.store') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên phòng</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên">
                        @error('name')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="0">
                        @error('price')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng</label>
                        <input type="text" class="form-control" name="quantity" placeholder="0">
                        @error('quantity')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Thể loại</label>
                        <select class="form-control" name="category_id">
                            <option value="">--Vui lòng chọn--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" rows="4" name="description"></textarea>
                        @error('description')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Thêm </button>
                    <a href="{{route('rooms.index')}}" class="btn btn-warning">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection