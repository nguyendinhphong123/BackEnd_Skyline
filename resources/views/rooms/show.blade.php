@extends('layouts.master')
@section('content')
<div class="container">

    <table class="table" >
        <h2 style="text-align:center">Chi tiết sản phẩm</h2>
        <thead>
            <tr> <th>ID: {{$items->id}} </th></tr>
            <tr> <th>Tên sản phẩm : {{$items->name}} </th></tr>
            <tr> <th>Giá :{{number_format($items->price)}} vnd </th></tr>
            <tr> <th>Số lượng :{{$items->quantity}} </th></tr>
            <tr> <th style="display: inline-block">Mô tả :{!!$items->description!!} </th></tr>
            <tr> <th>Thể loại :{{$items->category->name}} </th></tr>
            <tr> Ảnh  : <img  style="width:120px; height:100px" src="{{ $items->image }}" alt=""class="image_photo">   </tr>
                
        </thead>
        
        </table>
        <a href="{{ route('rooms.index') }}" class="btn btn-danger">Trở lại</a>
    </div>
@endsection