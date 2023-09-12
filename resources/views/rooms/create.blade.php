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
                        <input type="text" class="form-control" name="name" placeholder="Tên" value="{{ old('name') }}">
                        @error('name')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá</label>
                        <input type="text" class="form-control" name="price" placeholder="0" value="{{ old('price') }}">
                        @error('price')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Tình trạng</label>
                        <select name="status" id="" class="form-control">
                            <option value="">--Vui lòng chọn--</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Còn phòng</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Hết phòng</option>
                        </select>
                        @error('status')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Thể loại</label>
                        <select class="form-control" name="category_id">
                            <option value="">--Vui lòng chọn--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                        @error('image')<p class="text text-danger ">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" rows="4" name="description" value="{{ old('description') }}"></textarea>
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
