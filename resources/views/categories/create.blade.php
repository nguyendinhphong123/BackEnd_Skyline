@extends('layouts.master')
@section('content')
 <main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{route('categories.store')}}" method='post' enctype="multipart/form-data">
                        <h2 style="color: black" class="offset-5">Thêm thể loại</h2>
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thêm danh mục</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        @error('name')
                        <div class="text text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="d-grid">
                            <button class="btn btn-info" type="submit">Thêm</button>
                            <a href="{{route('categories.index')}}" class="btn btn-warning">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


