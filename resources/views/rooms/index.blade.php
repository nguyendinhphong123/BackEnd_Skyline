@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="page-header">
    <h3 class="page-title">Quản lý sản phẩm</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Quản lý sản phẩm </li>
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
                            <a href="{{route('rooms.create')}}" class="btn btn-primary"> Thêm mới </a>
                            <button type="button" class="btn btn-success "> Xuất execl </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Nhập ID" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập tên" class="form-control">
                        </div>
                        <div class="col">
                            <select class="form-control">
                                <option value="">Tất cả danh mục</option>
                                <option value="">Cá</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-info"> Tìm </button>
                            <button type="button" class="btn btn-secondary "> Đặt lại </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Ngày cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="assets/images/faces-clipart/pic-1.png"
                                        alt="image">
                                </td>
                                <td>Herman Beck</td>
                                
                                <td>$ 77.99</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <a href="#" class="btn btn-info">Sửa</a>
                                    <button type="button" class="btn btn-danger"> Xóa </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="assets/images/faces-clipart/pic-2.png"
                                        alt="image">
                                </td>
                                <td>Messsy Adam</td>
                                
                                <td>$245.30</td>
                                <td>July 1, 2015</td>
                                <td>
                                    <a href="#" class="btn btn-info">Sửa</a>
                                    <button type="button" class="btn btn-danger"> Xóa </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="assets/images/faces-clipart/pic-3.png"
                                        alt="image">
                                </td>
                                <td>John Richards</td>
                                
                                <td>$138.00</td>
                                <td>Apr 12, 2015</td>
                                <td>
                                    <a href="#" class="btn btn-info">Sửa</a>
                                    <button type="button" class="btn btn-danger"> Xóa </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="assets/images/faces-clipart/pic-4.png"
                                        alt="image">
                                </td>
                                <td>Peter Meggik</td>
                                
                                <td>$ 77.99</td>
                                <td>May 15, 2015</td>
                                <td>
                                    <a href="#" class="btn btn-info">Sửa</a>
                                    <button type="button" class="btn btn-danger"> Xóa </button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <nav class="float-right">
                    <ul class="pagination mb-0">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
</div>

@endsection
