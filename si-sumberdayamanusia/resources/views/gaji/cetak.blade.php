<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Gaji</title>
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
        <h5 class="mb-2">Laporan Data Gaji</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    ID Gaji
                </th>
                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    ID Karyawan
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Gaji Pokok
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Jumlah
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Potongan Gaji
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Lembur
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($gaji as $gj)
            <?php $no++ ?>
            <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->id_gaji}}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->id_karyawan }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->gaji_pokok }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->potongan_gaji }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->lembur }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->jumlah }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $gj->tanggal }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>