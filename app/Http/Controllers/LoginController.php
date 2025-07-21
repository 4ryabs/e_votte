<?php
namespace App\Http\Controllers;

use App\Models\m_DataPemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('v_Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = m_DataPemilih::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->validasi !== 'Tervalidasi') {
                return back()->with('error', 'Akun Anda belum tervalidasi oleh admin');
            }

            session([
                'user_id'    => $user->id,
                'user_email' => $user->email,
                'user_name'  => $user->name,
                'user_role'  => $user->role,
            ]);

            if ($user->role === 'admin') {
                return redirect('/pemilih');
            } else {
                return redirect('/kandidat');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }
}
