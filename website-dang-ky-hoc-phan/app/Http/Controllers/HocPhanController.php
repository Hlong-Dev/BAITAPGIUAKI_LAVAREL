<?php

namespace App\Http\Controllers;

use App\Models\HocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HocPhanController extends Controller
{
    public function index()
{
    $hocPhans = HocPhan::all();
    $cart = Session::get('cart', []); // Thêm dòng này
    return view('hocphan.index', compact('hocPhans', 'cart')); // Thêm cart vào compact
}

    public function addToCart($MaHP)
    {
        $hocPhan = HocPhan::findOrFail($MaHP);
        $cart = Session::get('cart', []);

        if (isset($cart[$MaHP])) {
            return back()->with('error', 'Học phần này đã có trong danh sách đăng ký.');
        }

        $cart[$MaHP] = [
            'MaHP' => $hocPhan->MaHP,
            'TenHP' => $hocPhan->TenHP,
            'SoTinChi' => $hocPhan->SoTinChi
        ];

        Session::put('cart', $cart);
        return back()->with('success', 'Đã thêm học phần vào danh sách đăng ký.');
    }

    public function cart()
    {
        $cart = Session::get('cart', []);
        return view('hocphan.cart', compact('cart'));
    }

    public function removeFromCart($MaHP)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$MaHP])) {
            unset($cart[$MaHP]);
            Session::put('cart', $cart);
        }
        return back()->with('success', 'Đã xóa học phần khỏi danh sách đăng ký.');
    }

    public function clearCart()
    {
        Session::forget('cart');
        return back()->with('success', 'Đã xóa toàn bộ danh sách đăng ký.');
    }
}