<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Tunjangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Data Tunjangan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    ID Tunjangan
                </th>
                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    BPJS
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    THR
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tunjangan Hari Tua
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Jumlah
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($tunjangan as $tunj)
            <?php $no++ ?>
            <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->id_tunjangan}}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->bpjs}}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->thr }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->tunjangan_haritua }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->jumlah }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $tunj->tanggal }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>