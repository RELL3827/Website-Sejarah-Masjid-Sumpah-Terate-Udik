<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        $timelines = [
            [
                'year' => 'Abad ke-15–16 M (±1401–1600 M)',
                'title' => 'Kemunculan Langgar Keramat Masa Kesultanan Banten',
                'description' => 'Diyakini muncul sendiri pada masa Kesultanan Banten berupa gubuk/langgar kecil di Terate Udik. Ruangannya senantiasa muat walau jamaah bertambah. Muncul pancaran sinar putih dari lubang tengah bangunan yang diyakini menembus Banten Lama, Demak, Cirebon, dan tempat berkumpulnya para wali.',
                'image' => 'images/dokumentasi/arsip-terate-udik-kuno.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'year' => 'Masa Kesultanan',
                'title' => 'Gotong Royong Menjadi "Masjid Perjuangan Banten"',
                'description' => 'Setelah sering digunakan warga untuk tirakat dan dzikir, para kesepuhan dan warga Terate Udik bersatu merehab langgar menjadi masjid berarsitektur khas Banten dengan pintu 1,5 meter sebagai simbol ketundukan kepada Sang Pencipta, serta tempat musyawarah ulama pejuang Banten.',
                'image' => 'images/dokumentasi/arsitektur-jendela-atap.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'year' => 'Kisaran 1928',
                'title' => 'Juru Kunci Pertama: Ki Akhmad (Pasca Geger Cilegon)',
                'description' => 'Pembentukan kepengurusan juru kunci Masjid Sumpah pertama yang dipegang Ki Akhmad, putra pejuang utama Geger Cilegon 1888 KH. Mahmmud bin Ki Hamzah (Buyut Mahmmud Pegantungan). Beliau kerap mendamaikan perselisihan warga secara kekeluargaan di Masjid Sumpah.',
                'image' => 'images/dokumentasi/arsip-lingkungan-sejarah.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'year' => 'Generasi Kedua',
                'title' => 'Kepengurusan KH. Mahmmud bin H. Abdurrohman',
                'description' => 'Pembangunan pendopo belakang berlantai tehel untuk musyawarah, dzikir Maulid, Marhaban, dan mediasi warga. Beliau juga juru kunci makam para waliyullah serta perawat benda-benda pusaka bersejarah di Terate Udik.',
                'image' => 'images/dokumentasi/interior-mihrab.jpg',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'year' => 'Tahun 1986',
                'title' => 'Era Ust. Abdul Hayi & Ust. Akhyar bin Abdullatif',
                'description' => 'Amanah diteruskan kepada Ust. Abdul Hayi (pengurus & perenovasi fasilitas pendopo/wudhu) dan Ust. Akhyar bin Abdullatif (juru kunci persumpahan, pembimbing spiritual, dan perawat pusaka kuno yang memandu ritual sumpah).',
                'image' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'year' => 'Era Modern',
                'title' => 'Pembentukan Struktur DKM Masjid Sumpah',
                'description' => 'Kepengurusan diserahkan kepada KH. A. Marzuqi bin KH. Mastur (murid KH. Mahmmud) dan dibentuk secara struktural modern: KH. A. Marzuqi (Ketua DKM), A. Faridi (Wakil DKM), dan Habibi (Bendahara DKM).',
                'image' => 'images/dokumentasi/gerbang-masjid-sumpah.jpg',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        Timeline::query()->delete();

        foreach ($timelines as $timeline) {
            Timeline::create($timeline);
        }
    }
}