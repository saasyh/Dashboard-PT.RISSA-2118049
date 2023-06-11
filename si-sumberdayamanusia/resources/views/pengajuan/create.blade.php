@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | PENGAJUAN IZIN')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Form Data Pengajuan Izin<b></h1>
@stop

@section('content')

    <form action="{{route('pengajuan.store')}}" method="post">
        
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pengajuan">ID Pengajuan</label>
                        <input type="text" class="form-control @error('id_pengajuan') is-invalid @enderror" id="id_pengajuan" placeholder="ID Pengajuan" name="id_pengajuan" value="{{old('id_pengajuan')}}">
                        @error('id_pengajuan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_izin">Tanggal Izin</label>
                        <input type="date" class="form-control @error('tanggal_izin') is-invalid @enderror" id="tanggal_izin" placeholder="Tanggal Izin" name="tanggal_izin" value="{{old('tanggal_izin')}}">
                        @error('tanggal_izin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="akhir_izin">Akhir Izin</label>
                        <input type="date" class="form-control @error('akhir_izin') is-invalid @enderror" id="akhir_izin" placeholder="Akhir Izin" name="akhir_izin" value="{{old('akhir_izin')}}">
                        @error('akhir_izin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                   <div class="item form-group">                                
                        <label for="kode_izin">Keterangan</label>
                            <select name="kode_izin" id="kode_izin" required class="form-control">
                                @foreach ($jenisijin as $ijin)
                                    <option value="{{$ijin->kode_izin}}">{{$ijin->keterangan}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="item form-group">                                
                        <label for="status_pengajuan">Status Pengajuan</label>
                        <select class="input" name="status_pengajuan" id="status_pengajuan">
                            <option value="">Status Pengajuan</option>
                            <option value="ACC" name="acc" id="acc">ACC</option>
                            <option value="Ditolak" name="ditolak" id="ditolak">Ditolak</option>
                            <option value="Belum Diperiksa" name="blm" id="blm">Belum Diperiksa</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pengajuan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop