<?php

namespace App\Http\Controllers;

use App\Models\DangKy;
use App\Models\ChiTietDangKy;
use App\Models\HocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DangKyController extends Controller
{
    public function saveRegistration()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('hocphan.cart')
                ->with('error', 'Không có học phần nào để đăng ký.');
        }

        // Bắt đầu giao dịch
        DB::beginTransaction();

        try {
            // Tạo đăng ký mới
            $dangKy = DangKy::create([
                'NgayDK' => now(),
                'MaSV' => Auth::user()->MaSV
            ]);

            // Thêm chi tiết đăng ký và giảm số lượng sinh viên cho mỗi học phần
            foreach ($cart as $MaHP => $details) {
                $hocPhan = HocPhan::findOrFail($MaHP);

                // Kiểm tra số lượng còn lại
                if ($hocPhan->SoLuong <= 0) {
                    DB::rollback();
                    return redirect()->route('hocphan.cart')
                        ->with('error', 'Học phần ' . $hocPhan->TenHP . ' đã hết chỗ.');
                }

                // Tạo chi tiết đăng ký
                ChiTietDangKy::create([
                    'MaDK' => $dangKy->MaDK,
                    'MaHP' => $MaHP
                ]);

                // Giảm số lượng của học phần
                $hocPhan->decrement('SoLuong', 1);
            }

            // Hoàn tất giao dịch
            DB::commit();

            // Xóa giỏ hàng sau khi đăng ký thành công
            Session::forget('cart');

            return redirect()->route('hocphan.index')
                ->with('success', 'Đăng ký học phần thành công!');
        } catch (\Exception $e) {
            // Có lỗi, hủy giao dịch
            DB::rollback();
            return redirect()->route('hocphan.cart')
                ->with('error', 'Đã xảy ra lỗi trong quá trình đăng ký: ' . $e->getMessage());
        }
    }
}