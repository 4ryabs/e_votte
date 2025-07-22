<?php

namespace App\Http\Controllers;

use App\Models\m_DetailKandidat;
use App\Models\m_Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index()
    {
        $data = m_Kandidat::with('detail')->get();
        return view('v_DataKandidat', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ketua'  => 'required',
            'nim_ketua'   => 'required',
            'name_wakil'  => 'required',
            'nim_wakil'   => 'required',
            'visi'        => 'required',
            'misi'        => 'required',
            'no_kandidat' => 'required|numeric',
            'foto_paslon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_paslon')) {
            Storage::makeDirectory('public/foto_kandidat');

            $file     = $request->file('foto_paslon');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_kandidat', $namaFile);
        } else {
            $namaFile = 'default.jpg';
        }

        $kandidat = m_Kandidat::create([
            'visi'               => $request->visi,
            'misi'               => $request->misi,
            'foto_paslon'        => $namaFile,
            'no_kandidat'        => $request->no_kandidat,
            'status_kepesertaan' => 'Aktif',
        ]);

        m_DetailKandidat::create([
            'id_kandidat' => $kandidat->id_kandidat,
            'nim'         => $request->nim_ketua,
            'name'        => $request->name_ketua,
            'jabatan'     => 'Ketua',
        ]);

        m_DetailKandidat::create([
            'id_kandidat' => $kandidat->id_kandidat,
            'nim'         => $request->nim_wakil,
            'name'        => $request->name_wakil,
            'jabatan'     => 'Wakil',
        ]);

        return redirect('/kandidat')->with('success', 'Kandidat berhasil didaftarkan!');
    }

    public function daftar()
    {
        return view('v_DaftarKandidat');
    }
}
