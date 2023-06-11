<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;

use PDF;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        return view('gaji.index', [
            'gaji' => $gaji
        ]);
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('gaji.create', [
            'pegawai'=> $pegawai
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_gaji'=> 'required',
            'id_karyawan'=> 'required',
            'gaji_pokok'=> 'required',
            'potongan_gaji'=> 'required',
            'lembur'=> 'required',
            'jumlah'=> 'required',
            'tanggal'=> 'required|date'
        ]);

        $array = $request->only([
            'id_gaji', 'id_karyawan','gaji_pokok','potongan_gaji','lembur','jumlah','tanggal'
        ]);
        $gaji = Gaji::create($array);
        return redirect()->route('gaji.index')
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
        $gaji = Gaji::find($id);
        if (!$gaji) return redirect()->route('gaji.index')
            ->with('error_message', 'Gaji dengan id'.$id.' tidak ditemukan!');

            $pegawai = Pegawai::all();
        return view('gaji.edit', [
            'gaji' => $gaji,
            'pegawai'=> $pegawai
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gaji'=> 'required',
            'id_karyawan'=> 'required',
            'gaji_pokok'=> 'required',
            'potongan_gaji'=> 'required',
            'lembur'=> 'required',
            'jumlah'=> 'required',
            'tanggal'=> 'required|date'

        ]);

        $gaji = Gaji::find($id);
        $gaji->id_karyawan = $request->id_karyawan;
        $gaji->gaji_pokok = $request->gaji_pokok;
        $gaji->potongan_gaji = $request->potongan_gaji;
        $gaji->lembur = $request->lembur;
        $gaji->jumlah=$request->jumlah;
        $gaji->tanggal = $request->tanggal;

        $gaji->save();

        return redirect()->route('gaji.index')
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
        $gaji = Gaji::find($id);
        if ($id == $request->user()->id) return redirect()->route('gaji.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($gaji) $gaji->delete();
        return redirect()->route('gaji.index')
            ->with('success_message', 'Berhasil Menghapus Data!');
    }

    public function cetak()
    {
        $gaji = Gaji::get();
        $pdf = Pdf::loadview('gaji\cetak', ['gaji' => $gaji])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-gaji.pdf');
    }
}
