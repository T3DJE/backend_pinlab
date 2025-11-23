<h2>Catatan Alat Rusak</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Alat Rusak</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nama_alat_rusak }}</td>
                <td>{{ $item->jumlah_alat_rusak }}</td>
                <td>{{ $item->keterangan_rusak }}</td>
            </tr>
        @endforeach
    </tbody>
</table>