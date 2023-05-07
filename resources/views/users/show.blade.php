@extends('layouts.master')
@section('content')
<div class="container">
    <table class="table" >
        <h2 style="text-align:center">Chi tiết nhân viên </h2>
        <thead>
            <tr> <th>Tên sản phẩm : {{$items->name}} </th></tr>
            <tr> <th>Địa chỉ :{{($items->address)}}</th></tr>
            <tr> <th>Số điện thoại:{{$items->phone}} </th></tr>
            <tr> <th>Giới tính:{{$items->gender ==1 ? 'NAM': 'NỮ'}} </th></tr>
            <tr> <th>Ngày sinh:{{$items->birthday}} </th></tr>
            <tr> <th>Ngày tham gia :{{$items->created_at}} </th></tr>
            <tr> <th>Chức vụ :{{$items->group->name}} </th></tr>
            <tr> Ảnh  : <img  style="width:120px; height:100px" src="{{ $items->image }}" alt=""class="image_photo">   </tr>
        </thead>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-danger">Quay lại</a>
    </div>
@endsection

