@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | PEGAWAI')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Form Data Pegawai<b></h1>
@stop

@section('content')
    <form action="{{route('pegawai.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_karyawan">ID Karyawan</label>
                        <input type="text" class="form-control @error('id_karyawan') is-invalid @enderror" id="id_karyawan" placeholder="ID Karyawan" name="id_karyawan" value="{{old('id_karyawan')}}">
                        @error('id_karyawan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Jenis Kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Agama" name="agama" value="{{old('agama')}}">
                        @error('agama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Status" name="status" value="{{old('status')}}">
                        @error('status') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_rekening">No Rekening</label>
                        <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" placeholder="No Rekening" name="no_rekening" value="{{old('no_rekening')}}">
                        @error('no_rekening') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pemilik_rekening">Pemilik Rekening</label>
                        <input type="text" class="form-control @error('pemilik_rekening') is-invalid @enderror" id="pemilik_rekening" placeholder="Pemilik Rekening" name="pemilik_rekening" value="{{old('pemilik_rekening')}}">
                        @error('pemilik_rekening') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP" name="npwp" value="{{old('npwp')}}">
                        @error('npwp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" name="jabatan" value="{{old('jabatan')}}">
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="item form-group">                                
                        <label for="id_pendidikan">Pendidikan</label>
                            <select name="id_pendidikan" id="id_pendidikan" required class="form-control">
                                @foreach ($pendidikan as $pend)
                                    <option value="{{$pend->id_pendidikan}}">{{$pend->jurusan}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="item form-group">                                
                        <label for="id_pengembangan">Pengembangan Diri</label>
                            <select name="id_pengembangan" id="id_pengembangan" required class="form-control">
                                @foreach ($pengembangan as $pd)
                                    <option value="{{$pd->id_pengembangan}}">{{$pd->jenis_pelatihan}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="item form-group">                                
                        <label for="id_tunjangan">Tunjangan</label>
                            <select name="id_tunjangan" id="id_tunjangan" required class="form-control">
                                @foreach ($tunjangan as $pd)
                                    <option value="{{$pd->id_tunjangan}}">{{$pd->jumlah}}</option>
                                @endforeach
                           </select>
                    </div>
                    <div class="item form-group">                                
                        <label for="id">Username Pengguna</label>
                            <select name="id" id="id" required class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                           </select>
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pegawai.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop