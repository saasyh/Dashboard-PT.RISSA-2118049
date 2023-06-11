@extends('adminlte::page')

<link rel="icon" href="vendor/adminlte/dist/img/Logo PT.Rissa.jpg" type="image/icon"> 

@section('title', 'PT.RISSA | JENIS IZIN')

@section('content_header') 
    <h1 class="m-0 text-dark"><b>Data Jenis Izin<b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('jenisijin.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                          <th>Kode Izin</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                      </tr>
                        </thead>
                        <tbody>
                        @foreach($jenisijin as $key => $abs)
                            <tr>
                                <td>{{$abs->kode_izin}}</td>
                                <td>{{$abs->keterangan}}</td>
                                <td>
                                    <a href="{{route('jenisijin.edit', $abs)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('jenisijin.destroy', $abs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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