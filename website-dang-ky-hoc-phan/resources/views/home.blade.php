@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Website Đăng Ký Học Phần</h1>
    <p class="lead">Chào mừng đến với Website Đăng Ký Học Phần. Đây là nơi sinh viên có thể đăng ký các học phần trong học kỳ.</p>
    <hr class="my-4">
    
    @guest
        <p>Vui lòng đăng nhập để sử dụng các chức năng của hệ thống.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">
            <i class="fas fa-sign-in-alt"></i> Đăng nhập
        </a>
    @else
        <p>Xin chào, {{ Auth::user()->sinhVien->HoTen ?? Auth::user()->username }}!</p>
        <p>Bạn có thể đăng ký học phần hoặc quản lý thông tin sinh viên.</p>
        <a class="btn btn-primary btn-lg mr-2" href="{{ route('hocphan.index') }}" role="button">
            <i class="fas fa-book"></i> Đăng ký học phần
        </a>
        <a class="btn btn-success btn-lg" href="{{ route('sinhvien.index') }}" role="button">
            <i class="fas fa-user-graduate"></i> Quản lý sinh viên
        </a>
    @endguest
</div>
@endsection