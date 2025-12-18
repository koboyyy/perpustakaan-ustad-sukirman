<?php

namespace App\Models;


class Buku
{
    private static $data_buku = [
        [
            'judul' => 'Laskar Pelangi',
            'pengarang' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2005',
            'rak' => 'R001',
            'eksemplar' => '3',
            'sumber' => 'Tinaz',
            'tanggalTerima' => '19-1-2006',
        ],
        [
            'judul' => 'Bumi',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'tahunTerbit' => '2014',
            'rak' => 'R002',
            'eksemplar' => '5',
            'sumber' => 'Donasi',
            'tanggalTerima' => '10-3-2015',
        ],
        [
            'judul' => 'Negeri 5 Menara',
            'pengarang' => 'Ahmad Fuadi',
            'penerbit' => 'Gramedia Pustaka Utama',
            'tahunTerbit' => '2009',
            'rak' => 'R003',
            'eksemplar' => '4',
            'sumber' => 'Dinas',
            'tanggalTerima' => '14-6-2011',
        ],
        [
            'judul' => 'Ayat-Ayat Cinta',
            'pengarang' => 'Habiburrahman El Shirazy',
            'penerbit' => 'Republika',
            'tahunTerbit' => '2004',
            'rak' => 'R002',
            'eksemplar' => '2',
            'sumber' => 'Sumbangan',
            'tanggalTerima' => '20-8-2006',
        ],
        [
            'judul' => 'Supernova',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Truedee Books',
            'tahunTerbit' => '2001',
            'rak' => 'R004',
            'eksemplar' => '6',
            'sumber' => 'Tinaz',
            'tanggalTerima' => '11-1-2007',
        ],
        [
            'judul' => 'Rectoverso',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2008',
            'rak' => 'R005',
            'eksemplar' => '3',
            'sumber' => 'Pembelian',
            'tanggalTerima' => '05-10-2009',
        ],
        [
            'judul' => 'Dilan: Dia Adalah Dilanku Tahun 1990',
            'pengarang' => 'Pidi Baiq',
            'penerbit' => 'Pastel Books',
            'tahunTerbit' => '2014',
            'rak' => 'R006',
            'eksemplar' => '7',
            'sumber' => 'Donasi',
            'tanggalTerima' => '19-5-2017',
        ],
        [
            'judul' => 'Perahu Kertas',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2009',
            'rak' => 'R007',
            'eksemplar' => '5',
            'sumber' => 'Sumbangan',
            'tanggalTerima' => '13-12-2013',
        ],
        [
            'judul' => 'Cinta Brontosaurus',
            'pengarang' => 'Raditya Dika',
            'penerbit' => 'Gagasmedia',
            'tahunTerbit' => '2006',
            'rak' => 'R008',
            'eksemplar' => '4',
            'sumber' => 'Dinas',
            'tanggalTerima' => '23-03-2007',
        ],
        [
            'judul' => 'Koala Kumal',
            'pengarang' => 'Raditya Dika',
            'penerbit' => 'Gagasmedia',
            'tahunTerbit' => '2015',
            'rak' => 'R008',
            'eksemplar' => '2',
            'sumber' => 'Pembelian',
            'tanggalTerima' => '18-9-2016',
        ],
    ];

    public static function all()
    {
        return collect(self::$data_buku);
    }

    public static function find($judul)
    {
        $data_buku = static::all();
        return $data_buku->firstWhere('judul', $judul);
    }
}
