<?php

namespace App\Exports;

use App\Models\DataLaporan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataLaporanExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            "No",
            "Nama Peminjam",
            "Nama Alat/Bahan",
            "Jumlah",
            "Keperluan",
            "Tgl Pinjam",
            "Tgl Kembali",
            "Kondisi Sebelum",
            "Kondisi Sesudah",
            "Keterangan",
            "Status",
        ];
    }

    public function array(): array
    {
        $export = [];
        $no = 1;

        foreach ($this->data as $item) {
            foreach ($item->alat_bahan as $ab) {
                $export[] = [
                    $no,
                    $item->nama_lengkap,
                    $ab['nama_alat'] ?? $ab['nama_bahan'],
                    $ab['jumlah'],
                    $item->keperluan_praktikum,
                    $item->tgl_pinjam,
                    $item->tgl_kembali,
                    $item->kondisi_sebelum,
                    $item->kondisi_sesudah ?? "-",
                    $item->keterangan ?? "-",
                    "Selesai"
                ];
            }
            $no++;
        }

        return $export;
    }
}
