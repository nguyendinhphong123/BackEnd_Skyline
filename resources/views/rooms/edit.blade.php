@extends('layouts.master')
@section('content')

<main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{route('rooms.update',[$items->id])}}" method='post' enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <h2 style="color: black" class="offset-5">Chỉnh Sửa Phòng</h2>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Phòng</label>
                          <input type="text" class="form-control" name="name" value='{{$items->name}}' aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Giá</label>
                          <input type="text" class="form-control" name="price" value='{{$items->price}}'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Số Lượng</label>
                            <input type="text" class="form-control" name="quantity" value='{{$items->quantity}}' >
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mô Tả</label>
                            <textarea class="form-control" placeholder="Miêu tả" id="editor"  name="description" rows="4" cols="4">{{$items->description}}</textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Thể Loại</label>
                            <select name="category_id" id="" class="form-control">
                              <option value="">--Vui lòng chọn--</option>
                              @foreach ($categories as $category)
                              <option
                                  @selected($category->id == $items->category_id)
                                  value="{{ $category->id }}">
                                  {{ $category->name }}</option>
                          @endforeach
                          </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" value='{{$items->image}}'>
                            <img type="hidden" width="120px" height="120px" id="blah1"
                                                src="{{$items->image }}" alt="" />
                          </div>
                          <input type="submit" value="Cập nhật" class="btn btn-primary">
                          <a href="{{route('rooms.index')}}" class="btn btn-danger">Huỷ</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
