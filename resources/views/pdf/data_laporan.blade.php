<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">DATA LAPORAN PEMINJAMAN</h2>

<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Peminjam</th>
            <th rowspan="2">Alat-alat</th>
            <th rowspan="2">Jumlah</th>
            <th rowspan="2">Keperluan</th>
            <th rowspan="2">Tgl Pinjam</th>
            <th rowspan="2">Tgl Kembali</th>
            <th colspan="2">Kondisi Barang</th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2">Status</th>
        </tr>
        <tr>
            <th>Sebelum</th>
            <th>Sesudah</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $item)
            @foreach ($item->alat_bahan as $index => $ab)
                <tr>
                    @if ($index == 0)
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $loop->iteration }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->nama_lengkap }}</td>
                    @endif

                    <td>{{ $ab['nama_alat'] ?? $ab['nama_bahan'] }}</td>
                    <td>{{ $ab['jumlah'] }}</td>

                    @if ($index == 0)
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->keperluan_praktikum }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->tgl_pinjam }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->tgl_kembali }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->kondisi_sebelum }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->kondisi_sesudah ?? "-" }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">{{ $item->keterangan ?? "-" }}</td>
                        <td rowspan="{{ count($item->alat_bahan) }}">Selesai</td>
                    @endif
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

</body>
</html>
