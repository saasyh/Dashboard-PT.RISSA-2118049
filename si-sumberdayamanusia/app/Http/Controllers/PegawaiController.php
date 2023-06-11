<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use App\Models\Tunjangan;
use App\Models\User;
use Illuminate\Http\Request;

use PDF;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $pendidikan = Pendidikan::all();
        $pengembangan = Pengembangan::all();
        $tunjangan = Tunjangan::all();
        $users = User::all();
        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'pendidikan'=>$pendidikan,
            'pengembangan'=>$pengembangan,
            'tunjangan'=>$tunjangan,
            'users'=>$users
        ]);
    }

    public function create()
    {
        $pendidikan = Pendidikan::all();
        $pengembangan = Pengembangan::all();
        $tunjangan = Tunjangan::all();
        $users = User::all();
        return view('pegawai.create', [
            'pendidikan'=>$pendidikan,
            'pengembangan'=>$pengembangan,
            'tunjangan'=>$tunjangan,
            'users'=>$users
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'no_rekening' => 'required',
            'pemilik_rekening' => 'required',
            'npwp' => 'required',
            'jabatan' => 'required',
            'id_pendidikan' => 'required',
            'id_pengembangan' => 'required',
            'id_tunjangan' => 'required',
            'id' => 'required',
        ]);

        $array = $request->only([
            'id_karyawan','nama', 'jenis_kelamin', 'alamat','no_hp','agama','status','no_rekening','pemilik_rekening', 'npwp','jabatan','id_pendidikan','id_pengembangan','id_tunjangan', 'id'
        ]);
        $pegawai = Pegawai::create($array);
        return redirect()->route('pegawai.index')
            ->with('success_message', 'Berhasil Menambah Data!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $pendidikan = Pendidikan::all();
        $pengembangan = Pengembangan::all();
        $tunjangan = Tunjangan::all();
        $users = User::all();
        if (!$pegawai) return redirect()->route('pegawai.index')
            ->with('error_message', 'Pegawai dengan id'.$id.' tidak ditemukan!');

        return view('pegawai.edit', [
            'pegawai' => $pegawai,
            'pendidikan'=>$pendidikan,
            'pengembangan'=>$pengembangan,
            'tunjangan'=>$tunjangan,
            'users'=>$users
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'no_rekening' => 'required',
            'pemilik_rekening' => 'required',
            'npwp' => 'required',
            'jabatan' => 'required',
            'id_pendidikan' => 'required',
            'id_pengembangan' => 'required',
            'id_tunjangan' => 'required',
            'id' => 'required',
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->id_karyawan = $request->id_karyawan;
        $pegawai->nama = $request->nama;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->agama = $request->agama;
        $pegawai->status = $request->status;
        $pegawai->no_rekening = $request->no_rekening;
        $pegawai->pemilik_rekening = $request->pemilik_rekening;
        $pegawai->npwp = $request->npwp;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->id_pendidikan = $request->id_pendidikan;
        $pegawai->id_pengembangan = $request->id_pengembangan;
        $pegawai->id_tunjangan = $request->id_tunjangan;
        $pegawai->id = $request->id;
        $pegawai->save();

        return redirect()->route('pegawai.index')
            ->with('success_message', 'Berhasil Mengubah Data!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        // if ($pegawai == $request->user()->id) return redirect()->route('pegawai.index')
            // ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($pegawai) $pegawai->delete();
        return redirect()->route('pegawai.index')
            ->with('success_message', 'Berhasil Menghapus Data!');
    }
    public function cetak()
    {
        $pegawai = Pegawai::get();
        $pdf = Pdf::loadview('pegawai\cetak', ['pegawai' => $pegawai])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-pegawai.pdf');
    }
}
