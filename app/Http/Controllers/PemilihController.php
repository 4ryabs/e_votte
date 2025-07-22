<?php
namespace App\Http\Controllers;

use App\Models\m_DataPemilih;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PemilihController extends Controller
{
    public function index()
    {
        $data = m_DataPemilih::all();
        return view('v_DataPemilih', compact('data'));
    }

    public function simpan(Request $request)
    {
        try {
            if ($request->hasFile('foto')) {
                Storage::makeDirectory('public/foto');

                $file     = $request->file('foto');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/foto', $namaFile);
            } else {
                $namaFile = 'default.jpg';
            }

            m_DataPemilih::create([
                'name'     => $request->name,
                'nim'      => $request->nim,
                'prodi'    => $request->prodi,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'pemilih',
                'foto'     => $namaFile,
                'validasi' => 'Belum',
            ]);

            return redirect(route('login'))->with('message', 'Data berhasil disimpan');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function daftar()
    {
        return view('v_Daftar');
    }

    public function ubah_validasi($id): RedirectResponse
    {
        $data           = m_DataPemilih::findOrFail(id: $id);
        $data->validasi = 'Tervalidasi';
        $data->save();
        return redirect()->back()->with(key: 'success', value: 'Data berhasil divalidasi.');
    }

    public function hapus($id): RedirectResponse
    {
        try {
            $data = m_DataPemilih::findOrFail(id: $id);
            $data->delete();
            return redirect()->back()->with(key: 'success', value: 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->back()->with(key: 'error', value: 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
