@extends('layouts.master')
@section('content')
{{--  <main id="main">  --}}
    {{--  @include('sweetalert::alert')  --}}
    <form  action="{{route('categories.update',[$item->id])}}" method="POST" enctype="multipart/form-data">
        <h2 style="color: black" class="offset-5">Chỉnh sửa</h2>
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" value='{{$item->name}}' class="form-control">
        </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
        <a href="{{route('categories.index')}}" class="btn btn-danger">Huỷ</a>
      </form>
      </main>
@endsection
