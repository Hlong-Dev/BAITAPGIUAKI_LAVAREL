@extends('layouts.app')

@section('title', 'Danh sách sinh viên')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Danh sách sinh viên</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('sinhvien.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Thêm sinh viên mới
        </a>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Mã SV</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Ngành Học</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinhViens as $sinhVien)
                    <tr>
                        <td class="text-center">
                            @if($sinhVien->Hinh)
                                <img src="{{ $sinhVien->Hinh }}" alt="{{ $sinhVien->HoTen }}" class="img-thumbnail" style="max-height: 50px;">
                            @else
                                <img src="/Content/images/default.jpg" alt="Default" class="img-thumbnail" style="max-height: 50px;">
                            @endif
                        </td>
                        <td>{{ $sinhVien->MaSV }}</td>
                        <td>{{ $sinhVien->HoTen }}</td>
                        <td>{{ $sinhVien->GioiTinh }}</td>
                        <td>{{ $sinhVien->NgaySinh ? date('d/m/Y', strtotime($sinhVien->NgaySinh)) : '' }}</td>
                        <td>{{ $sinhVien->nganhHoc->TenNganh }}</td>
                        <td>
                            <a href="{{ route('sinhvien.show', $sinhVien->MaSV) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Chi tiết
                            </a>
                            <a href="{{ route('sinhvien.edit', $sinhVien->MaSV) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="{{ route('sinhvien.confirm-delete', $sinhVien->MaSV) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection