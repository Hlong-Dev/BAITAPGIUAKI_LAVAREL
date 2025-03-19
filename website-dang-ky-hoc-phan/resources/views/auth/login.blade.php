@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2>Đăng nhập</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- resources/views/home.blade.php -->
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