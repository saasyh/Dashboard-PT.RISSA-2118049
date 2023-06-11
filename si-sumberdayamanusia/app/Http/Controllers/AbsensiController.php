<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pengajuan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();
        $pengajuan = Pengajuan::all();
        $pegawai = Pegawai::all();
        return view('absensi.index', [
            'absensi' => $absensi,
            'pengajuan' => $pengajuan,
            'pegawai'=> $pegawai
        ]);
    }

    public function create()
    {
        $pengajuan = Pengajuan::all();
        $pegawai = Pegawai::all();
        return view('absensi.create', [
        'pengajuan' => $pengajuan,
        'pegawai'=> $pegawai]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_absensi' => 'required',
            'id_karyawan' => 'required',
            'id_pengajuan'=>'required',
            'tanggal'=>'required|date',
            'shift'=>'required',
        ]);

        $array = $request->only([
            'id_absensi','tanggal', 'shift', 'id_karyawan', 'id_pengajuan'
        ]);
        $absensi = Absensi::create($array);
        return redirect()->route('absensi.index')
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
        $absensi = Absensi::find($id);
        if (!$absensi) return redirect()->route('absensi.index')
            ->with('error_message', 'Absensi dengan id'.$id.' tidak ditemukan!');

        $pengajuan = Pengajuan::all();
        $pegawai = Pegawai::all();
        return view('absensi.edit', [
            'absensi' => $absensi,
            'pengajuan' => $pengajuan,
            'pegawai'=> $pegawai

        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_absensi' => 'required',
            'id_karyawan' => 'required',
            'id_pengajuan'=>'required',
            'tanggal'=>'required|date',
            'shift'=>'required',
        ]);

        $absensi = Absensi::find($id);
        $absensi->id_karyawan = $request->id_karyawan;
        $absensi->id_pengajuan = $request->id_pengajuan;
        $absensi->tanggal = $request->tanggal;
        $absensi->shift = $request->shift;
        $absensi->save();

        return redirect()->route('absensi.index')
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
        $absensi = Absensi::find($id);
        if ($id == $request->user()->id) return redirect()->route('absensi.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($absensi) $absensi->delete();
        return redirect()->route('absensi.index')
            ->with('success_message', 'Berhasil Menghapus Data!');
    }
}
