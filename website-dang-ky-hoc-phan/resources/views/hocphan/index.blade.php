@extends('layouts.app')

@section('title', 'Đăng ký học phần')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Đăng ký học phần</h2>
    </div>
    <div class="card-body">
        @guest
            <div class="alert alert-warning">
                <i class="fas fa-info-circle"></i> Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để đăng ký học phần.
            </div>
        @else
            <div class="mb-3">
                <a href="{{ route('hocphan.cart') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-cart"></i> Xem danh sách đăng ký
                    <span class="badge badge-light">{{ count(Session::get('cart', [])) }}</span>
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã HP</th>
                            <th>Tên học phần</th>
                            <th>Số tín chỉ</th>
                            <th>Số lượng còn lại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hocPhans as $hocPhan)
                        <tr>
                            <td>{{ $hocPhan->MaHP }}</td>
                            <td>{{ $hocPhan->TenHP }}</td>
                            <td>{{ $hocPhan->SoTinChi }}</td>
                            <td>{{ $hocPhan->SoLuong }}</td>
                            <td>
                                @if($hocPhan->SoLuong > 0)
                                    <form action="{{ route('hocphan.add-to-cart', $hocPhan->MaHP) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" {{ isset(Session::get('cart', [])[$hocPhan->MaHP]) ? 'disabled' : '' }}>
                                            <i class="fas fa-plus"></i> Đăng ký
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="fas fa-ban"></i> Hết chỗ
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endguest
    </div>
</div>
@endsection