@extends('layouts.app')

@section('title', 'Thông tin chi tiết sinh viên')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Thông tin chi tiết sinh viên</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($sinhVien->Hinh)
                    <img src="{{ $sinhVien->Hinh }}" alt="{{ $sinhVien->HoTen }}" class="img-thumbnail mb-3" style="max-height: 200px;">
                @else
                    <img src="/Content/images/default.jpg" alt="Default" class="img-thumbnail mb-3" style="max-height: 200px;">
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Mã sinh viên:</th>
                        <td>{{ $sinhVien->MaSV }}</td>
                    </tr>
                    <tr>
                        <th>Họ và tên:</th>
                        <td>{{ $sinhVien->HoTen }}</td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td>{{ $sinhVien->GioiTinh }}</td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td>{{ $sinhVien->NgaySinh ? date('d/m/Y', strtotime($sinhVien->NgaySinh)) : '' }}</td>
                    </tr>
                    <tr>
                        <th>Ngành học:</th>
                        <td>{{ $sinhVien->nganhHoc->TenNganh }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <!-- Thêm phần lịch sử đăng ký học phần -->
        <div class="mt-4">
            <h3>Lịch sử đăng ký học phần</h3>
            
            @if($sinhVien->dangKys->count() > 0)
                @foreach($sinhVien->dangKys as $dangKy)
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <strong>Đợt đăng ký: {{ date('d/m/Y', strtotime($dangKy->NgayDK)) }}</strong>
                            <span class="badge badge-light float-right">Mã đăng ký: {{ $dangKy->MaDK }}</span>
                        </div>
                        <div class="card-body">
                            @if($dangKy->chiTietDangKys->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Mã HP</th>
                                                <th>Tên học phần</th>
                                                <th>Số tín chỉ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dangKy->chiTietDangKys as $chiTiet)
                                                <tr>
                                                    <td>{{ $chiTiet->hocPhan->MaHP }}</td>
                                                    <td>{{ $chiTiet->hocPhan->TenHP }}</td>
                                                    <td>{{ $chiTiet->hocPhan->SoTinChi }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Tổng số tín chỉ:</th>
                                                <th>{{ $dangKy->chiTietDangKys->sum('hocPhan.SoTinChi') }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Không có học phần nào trong đợt đăng ký này.
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Sinh viên chưa có lịch sử đăng ký học phần nào.
                </div>
            @endif
        </div>
        
        <div class="mt-3">
            <a href="{{ route('sinhvien.edit', $sinhVien->MaSV) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Chỉnh sửa
            </a>
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>
    </div>
</div>
@endsection