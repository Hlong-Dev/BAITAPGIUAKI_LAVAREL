<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\NganhHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhViens = SinhVien::with('nganhHoc')->get();
        $nganhHocs = NganhHoc::all(); // Thêm dòng này
    return view('sinhvien.index', compact('sinhViens', 'nganhHocs'));
    }

    public function create()
    {
        $nganhHocs = NganhHoc::all();
        return view('sinhvien.create', compact('nganhHocs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaSV' => 'required|string|max:10|unique:SinhVien,MaSV',
            'HoTen' => 'required|string|max:50',
            'GioiTinh' => 'nullable|string|max:5',
            'NgaySinh' => 'nullable|date',
            'Hinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'MaNganh' => 'required|exists:NganhHoc,MaNganh',
        ]);

        $data = $request->all();

        if ($request->hasFile('Hinh')) {
            $image = $request->file('Hinh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Content/images'), $imageName);
            $data['Hinh'] = '/Content/images/' . $imageName;
        }

        SinhVien::create($data);

        return redirect()->route('sinhvien.index')
            ->with('success', 'Sinh viên đã được thêm thành công.');
    }

    public function show($MaSV)
    {
        $sinhVien = SinhVien::with([
            'nganhHoc',
            'dangKys.chiTietDangKys.hocPhan'  // Thêm phần này để tải thông tin đăng ký
        ])->findOrFail($MaSV);
        
        return view('sinhvien.show', compact('sinhVien'));
    }

    public function edit($MaSV)
    {
        $sinhVien = SinhVien::findOrFail($MaSV);
        $nganhHocs = NganhHoc::all();
        return view('sinhvien.edit', compact('sinhVien', 'nganhHocs'));
    }

    public function update(Request $request, $MaSV)
    {
        $request->validate([
            'HoTen' => 'required|string|max:50',
            'GioiTinh' => 'nullable|string|max:5',
            'NgaySinh' => 'nullable|date',
            'Hinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'MaNganh' => 'required|exists:NganhHoc,MaNganh',
        ]);

        $sinhVien = SinhVien::findOrFail($MaSV);
        $data = $request->all();

        if ($request->hasFile('Hinh')) {
            $oldImagePath = public_path(ltrim($sinhVien->Hinh, '/'));
            if (file_exists($oldImagePath) && $sinhVien->Hinh != '/Content/images/sv1.jpg' && $sinhVien->Hinh != '/Content/images/sv2.jpg') {
                unlink($oldImagePath);
            }

            $image = $request->file('Hinh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Content/images'), $imageName);
            $data['Hinh'] = '/Content/images/' . $imageName;
        }

        $sinhVien->update($data);

        return redirect()->route('sinhvien.index')
            ->with('success', 'Thông tin sinh viên đã được cập nhật thành công.');
    }

    public function destroy($MaSV)
    {
        $sinhVien = SinhVien::findOrFail($MaSV);
        
        // Xóa hình ảnh liên quan (nếu không phải hình mặc định)
        if ($sinhVien->Hinh && $sinhVien->Hinh != '/Content/images/sv1.jpg' && $sinhVien->Hinh != '/Content/images/sv2.jpg') {
            $imagePath = public_path(ltrim($sinhVien->Hinh, '/'));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $sinhVien->delete();

        return redirect()->route('sinhvien.index')
            ->with('success', 'Sinh viên đã được xóa thành công.');
    }

    public function confirmDelete($MaSV)
    {
        $sinhVien = SinhVien::with('nganhHoc')->findOrFail($MaSV);
        return view('sinhvien.delete', compact('sinhVien'));
    }
}