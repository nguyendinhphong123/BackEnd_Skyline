@extends('layouts.master')
@section('content')

<div class="page-header">
  <h3 class="page-title">Chỉnh sửa phòng</h3>
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('trangchu')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page"> Chỉnh sửa phòng </li>
      </ol>
  </nav>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <form class="forms-sample" action="{{route('rooms.update',[$items->id])}}" method='post' enctype="multipart/form-data">
                @method('put')
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputName1">Tên phòng</label>
                      <input type="text" class="form-control" name="name" value='{{$items->name}}'>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail3">Giá</label>
                      <input type="text" class="form-control" name="price" value='{{$items->price}}'>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword4">Số lượng</label>
                      <input type="text" class="form-control" name="quantity" value='{{$items->quantity}}'>
                  </div>
                  <div class="form-group">
                      <label for="exampleSelectGender">Thể loại</label>
                      <select class="form-control" name="category_id">
                          @foreach ($categories as $category)
                          <option
                                  <?= $category->id == $items->category_id ? 'selected' : '' ?>
                                  value="{{ $category->id }}">
                                  {{ $category->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Ảnh</label>
                      <input type="file" name="image" class="form-control" value='{{$items->image}}'>
                      <img type="hidden" width="120px" height="120px" id="blah1" src="{{$items->image }}" alt="" />
                  </div>
                  <div class="form-group">
                      <label for="exampleTextarea1">Mô tả</label>
                      <textarea class="form-control" rows="4" name="description">{{$items->description}}</textarea>
                  </div>
                  <input type="submit" value="Cập nhật" class="btn btn-primary">
                  <a href="{{route('rooms.index')}}" class="btn btn-warning">Quay lại</a>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
