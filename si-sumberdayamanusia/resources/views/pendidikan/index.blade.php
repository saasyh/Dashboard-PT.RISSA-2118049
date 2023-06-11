@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | PENDIDIKAN')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Data Pendidikan<b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('pendidikan.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="{{route('pendidikan.cetak')}}" class="btn btn-primary mb-2">
                        Cetak
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                          <th>ID Pendidikan</th>
                          <th>Tingkat Pendidikan</th>
                          <th>Jurusan</th>
                          <th>Action</th>
                      </tr>
                        </thead>
                        <tbody>
                        @foreach($pendidikan as $key => $pend)
                            <tr>
                                <td>{{$pend->id_pendidikan}}</td>
                                <td>{{$pend->tingkat_pendidikan}}</td>
                                <td>{{$pend->jurusan}}</td>
                                
                                <td>
                                    <a href="{{route('pendidikan.edit', $pend)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('pendidikan.destroy', $pend)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah Anda Yakin Akan Menghapus Data? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush