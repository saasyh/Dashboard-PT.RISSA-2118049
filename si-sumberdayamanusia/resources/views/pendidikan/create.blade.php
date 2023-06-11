@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | PENDIDIKAN')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Form Data Pendidikan<b></h1>
@stop

@section('content')
    <form action="{{route('pendidikan.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pendidikan">ID Pendidikan</label>
                        <input type="text" class="form-control @error('id_pendidikan') is-invalid @enderror" id="id_pendidikan" placeholder="ID Pendidikan" name="id_pendidikan" value="{{old('id_pendidikan')}}">
                        @error('id_pendidikan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="item form-group">                                
                        <label for="tingkat_pendidikan">Tingkat Pendidikan</label>
                        <select class="input" name="tingkat_pendidikan" id="tingkat_pendidikan">
                            <option value="">Tingkat Pendidikan</option>
                            <option value="SMA" name="sma" id="sma">SMA</option>
                            <option value="D3/S1" name="d3/s1" id="d3/s1">D3/S1</option>
                            <option value="S2" name="s2" id="s2">S2</option>
                            <option value="S3" name="s3" id="s3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" placeholder="Jurusan" name="jurusan" value="{{old('jurusan')}}">
                        @error('jurusan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pendidikan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop