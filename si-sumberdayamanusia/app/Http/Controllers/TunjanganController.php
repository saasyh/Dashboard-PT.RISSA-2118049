<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;

use PDF;

class TunjanganController extends Controller 
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = Tunjangan::all();
        return view('tunjangan.index', [
            'tunjangan' => $tunjangan
        ]);
    }

    public function create()
    {
        return view('tunjangan.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'id_tunjangan'=> 'required',
            'bpjs'=> 'required',
            'thr'=> 'required',
            'tunjangan_haritua'=> 'required',
            'jumlah'=> 'required',
            'tanggal'=> 'required|date',
        ]);

        $array = $request->only([
            'id_tunjangan','bpjs','thr','tunjangan_haritua','jumlah','tanggal'
        ]);
        $tunjangan = Tunjangan::create($array);
        return redirect()->route('tunjangan.index')
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
        $tunjangan = Tunjangan::find($id);
        if (!$tunjangan) return redirect()->route('tunjangan.index')
            ->with('error_message', 'Tunjangan dengan id'.$id.' tidak ditemukan');

        return view('tunjangan.edit', [
            'tunjangan' => $tunjangan
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tunjangan'=> 'required',
            'bpjs'=> 'required',
            'thr'=> 'required',
            'tunjangan_haritua'=> 'required',
            'jumlah'=> 'required',
            'tanggal'=> 'required|date'
        ]);

        $tunjangan = Tunjangan::find($id);
        $tunjangan->id_tunjangan = $request->id_tunjangan;
        $tunjangan->bpjs = $request->bpjs;
        $tunjangan->thr = $request->thr;
        $tunjangan->tunjangan_haritua = $request->tunjangan_haritua;
        $tunjangan->jumlah = $request->jumlah;
        $tunjangan->tanggal = $request->tanggal;
        $tunjangan->save();

        return redirect()->route('tunjangan.index')
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
        $tunjangan = Tunjangan::find($id);
        // if ($tunjangan == $request->user()->id) return redirect()->route('tunjangan.index')
        //     ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($tunjangan) $tunjangan->delete();
        return redirect()->route('tunjangan.index')
            ->with('success_message', 'Berhasil Menghapus Data!');
    }

public function cetak()
    {
        $tunjangan = Tunjangan::get();
        $pdf = Pdf::loadview('tunjangan\cetak', ['tunjangan' => $tunjangan])->setPaper('a4', 'landscape');
        return $pdf->download('laporan-tunjangan.pdf');
    }

}
