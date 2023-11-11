<?php

namespace App\Http\Controllers;

use App\Models\Nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class NguoidungController extends Controller
{
    public function showLoginForm()
    {
        return view('User.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('UserName');
        $password = $request->input('PassWord');

        // Kiểm tra xem tên người dùng tồn tại trong cơ sở dữ liệu
        $user = Nguoidung::where('username', $username)
        ->where('password', $password) // Điều kiện mật khẩu
        ->first();

        if (!$user) {
            // Tên người dùng không tồn tại
            echo '<script>alert("Tên người dùng không tồn tại")</script>';
            return back()->with('error', 'Tên người dùng không tồn tại');
        }
         else {
            // Mật khẩu không đúng
            echo '<script>alert("Mật khẩu không đúng")</script>';
            return redirect('duyettin');
        }
        
    }
   
}
