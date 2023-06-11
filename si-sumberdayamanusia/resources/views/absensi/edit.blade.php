@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | ABSENSI')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Edit Data Absensi<b></h1>
@stop

@section('content')
    <form action="{{route('absensi.update', $absensi)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_absensi">ID Absensi</label>
                        <input type="text" class="form-control @error('id_absensi') is-invalid @enderror" id="id_absensi" placeholder="ID Absensi" name="id_absensi" value="{{$absensi->id_absensi ?? old('id_absensi')}}">
                        @error('id_absensi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="item form-group">                                
                        <label for="id_karyawan">Nama Karyawan</label>
                            <select name="id_karyawan" id="id_karyawan" required class="form-control">
                                @foreach ($pegawai as $pgw)
                                    <option value="{{$pgw->id_karyawan}}"
                                    @if ($pgw->id_karyawan == old('nama', $absensi->nama))
                                        selected="selected"
                                    @endif
                                    >{{$pgw->nama}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="item form-group">                                
                        <label for="id_pengajuan">Kode Pengajuan</label>
                            <select name="id_pengajuan" id="id_pengajuan" required class="form-control">
                                @foreach ($pengajuan as $pgw)
                                    <option value="{{$pgw->id_pengajuan}}"
                                    @if ($pgw->id_pengajuan == old('kode_izin', $absensi->kode_izin))
                                        selected="selected"
                                    @endif
                                    >{{$pgw->kode_izin}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Tanggal" name="tanggal" value="{{$absensi->tanggal ?? old('tanggal')}}">
                        @error('tanggal') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="shift">Shift</label>
                        <select class="input" name="shift" id="shift" value="{{$absensi->shift ?? old('shift')}}">
                            <option value="">Pilih Shift</option>
                            <option value="1" name="1" id="1">1</option>
                            <option value="2" name="2" id="2">2</option>
                            <option value="3" name="3" id="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('absensi.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop