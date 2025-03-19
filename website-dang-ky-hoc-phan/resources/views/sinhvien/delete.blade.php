@extends('layouts.app')

@section('title', 'Xác nhận xóa sinh viên')

@section('content')
<div class="card">
    <div class="card-header bg-danger text-white">
        <h2>Xác nhận xóa sinh viên</h2>
    </div>
    <div class="card-body">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i> Bạn có chắc chắn muốn xóa sinh viên này không? Hành động này không thể hoàn tác.
        </div>
        
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
        
        <div class="mt-3">
            <form action="{{ route('sinhvien.destroy', $sinhVien->MaSV) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Xác nhận xóa
                </button>
                <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Hủy bỏ
                </a>
            </form>
        </div>
    </div>
</div>
@endsection