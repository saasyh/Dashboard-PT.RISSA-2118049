@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | GAJI')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Form Data Gaji<b></h1>
@stop

@section('content')
    <form action="{{route('gaji.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_gaji">ID Gaji</label>
                        <input type="text" class="form-control @error('id_gaji') is-invalid @enderror" id="id_gaji" placeholder="ID Gaji" name="id_gaji" value="{{old('id_gaji')}}">
                        @error('id_gaji') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="item form-group">                                
                        <label for="id_karyawan">Nama Karyawan</label>
                            <select name="id_karyawan" id="id_karyawan" required class="form-control">
                                @foreach ($pegawai as $pg)
                                    <option value="{{$pg->id_karyawan}}">{{$pg->nama}}</option>
                                @endforeach
                           </select>
                        </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok</label>
                        <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" placeholder="Gaji Pokok" name="gaji_pokok" value="{{old('gaji_pokok')}}">
                        @error('gaji_pokok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="potongan_gaji">Potongan Gaji</label>
                        <input type="text" class="form-control @error('potongan_gaji') is-invalid @enderror" id="potongan_gaji" placeholder="Potongan Gaji" name="potongan_gaji" value="{{old('potongan_gaji')}}">
                        @error('potongan_gaji') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="lembur">Lembur</label>
                        <input type="text" class="form-control @error('lembur') is-invalid @enderror" id="lembur" placeholder="Lembur" name="lembur" value="{{old('lembur')}}">
                        @error('lembur') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{old('jumlah')}}">
                        @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Tanggal" name="tanggal" value="{{old('tanggal')}}">
                        @error('tanggal') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('gaji.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop