@extends('layouts.app')

@section('title', 'Thêm sinh viên mới')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Thêm sinh viên mới</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('sinhvien.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label for="MaSV" class="col-sm-2 col-form-label">Mã SV</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('MaSV') is-invalid @enderror" id="MaSV" name="MaSV" value="{{ old('MaSV') }}" required>
                    @error('MaSV')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="HoTen" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('HoTen') is-invalid @enderror" id="HoTen" name="HoTen" value="{{ old('HoTen') }}" required>
                    @error('HoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="GioiTinh" class="col-sm-2 col-form-label">Giới Tính</label>
                <div class="col-sm-10">
                    <select class="form-control @error('GioiTinh') is-invalid @enderror" id="GioiTinh" name="GioiTinh">
                        <option value="Nam" {{ old('GioiTinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('GioiTinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('GioiTinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="NgaySinh" class="col-sm-2 col-form-label">Ngày Sinh</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('NgaySinh') is-invalid @enderror" id="NgaySinh" name="NgaySinh" value="{{ old('NgaySinh') }}">
                    @error('NgaySinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="Hinh" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file @error('Hinh') is-invalid @enderror" id="Hinh" name="Hinh">
                    @error('Hinh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="MaNganh" class="col-sm-2 col-form-label">Ngành học</label>
                <div class="col-sm-10">
                    <select class="form-control @error('MaNganh') is-invalid @enderror" id="MaNganh" name="MaNganh" required>
                        <option value="">-- Chọn ngành học --</option>
                        @foreach($nganhHocs as $nganhHoc)
                            <option value="{{ $nganhHoc->MaNganh }}" {{ old('MaNganh') == $nganhHoc->MaNganh ? 'selected' : '' }}>
                                {{ $nganhHoc->TenNganh }}
                            </option>
                        @endforeach
                    </select>
                    @error('MaNganh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection