@extends('layouts.app')

@section('title', 'Danh sách học phần đã đăng ký')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Danh sách học phần đã đăng ký</h2>
    </div>
    <div class="card-body">
        @if(count($cart) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã HP</th>
                            <th>Tên học phần</th>
                            <th>Số tín chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $MaHP => $details)
                        <tr>
                            <td>{{ $details['MaHP'] }}</td>
                            <td>{{ $details['TenHP'] }}</td>
                            <td>{{ $details['SoTinChi'] }}</td>
                            <td>
                                <form action="{{ route('hocphan.remove-from-cart', $MaHP) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này khỏi danh sách đăng ký?')">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Tổng số tín chỉ:</th>
                            <th>
                                {{ array_sum(array_column($cart, 'SoTinChi')) }}
                            </th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="mt-3">
                <form action="{{ route('dangky.save') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu đăng ký
                    </button>
                </form>
                
                <form action="{{ route('hocphan.clear-cart') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ danh sách đăng ký?')">
                        <i class="fas fa-trash-alt"></i> Xóa đăng ký
                    </button>
                </form>
                
                <a href="{{ route('hocphan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Bạn chưa đăng ký học phần nào.
            </div>
            
            <a href="{{ route('hocphan.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Quay lại đăng ký học phần
            </a>
        @endif
    </div>
</div>
@endsection