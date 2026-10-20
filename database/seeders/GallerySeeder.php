<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Gerbang Utama & Kanopi Masjid Sumpah Terate Udik',
                'description' => 'Tampak depan gerbang masuk utama Masjid Sumpah di Kampung Terate Udik, dilengkapi plang nama hijau resmi berhiaskan kaligrafi tauhid dan hamdalah serta pelataran luas.',
                'image' => 'images/dokumentasi/gerbang-masjid-sumpah.jpg',
                'category' => 'Eksterior',
                'year' => '2026',
                'is_active' => true,
            ],
            [
                'title' => 'Arsitektur Jendela Kuno & Puncak Atap Mongolo',
                'description' => 'Sisi bangunan luar masjid yang mempertahankan arsitektur kuno khas Banten dengan jendela lengkung bermotif kipas/matahari, lisplang kayu hijau, dan tampak atap tumpang dengan hiasan mongolo di puncaknya.',
                'image' => 'images/dokumentasi/arsitektur-jendela-atap.jpg',
                'category' => 'Bangunan Masjid',
                'year' => '2026',
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Pengimaman & Mihrab Kuno',
                'description' => 'Bagian dalam ruang shalat memperlihatkan mihrab dan pengimaman dengan lengkungan pilar kubah putih khas Banten, jam dinding antik, serta suasana para jamaah dan kesepuhan yang berhimpun.',
                'image' => 'images/dokumentasi/interior-mihrab.jpg',
                'category' => 'Interior',
                'year' => '2026',
                'is_active' => true,
            ],
            [
                'title' => 'Arsip Suasana Jalan Kampung Terate Udik Tempo Dulu',
                'description' => 'Arsip dokumentasi sejarah hitam-putih suasana perkampungan Terate Udik masa lalu dengan rumah-rumah tradisional bilik bambu dan atap rumbia, serta tampak atap bertingkat masjid di kejauhan.',
                'image' => 'images/dokumentasi/arsip-terate-udik-kuno.jpg',
                'category' => 'Dokumentasi Lama',
                'year' => 'Masa Kolonial',
                'is_active' => true,
            ],
            [
                'title' => 'Arsip Pemukiman Bersejarah Terate Udik',
                'description' => 'Dokumentasi arsip lingkungan kuno Terate Udik dengan pohon peneduh besar berakar kokoh, pagar bambu tradisional, dan deretan rumah adat masa perjuangan Banten tempo dulu.',
                'image' => 'images/dokumentasi/arsip-lingkungan-sejarah.jpg',
                'category' => 'Dokumentasi Lama',
                'year' => 'Masa Kolonial',
                'is_active' => true,
            ],
            [
                'title' => 'Cerita Tentang Masa Lalu dan Sejarah Terate Udik',
                'description' => 'Arsip foto dokumentasi kuno bangunan bersejarah dengan jeruji klasik dan selasar masa lampau Kampung Terate Udik, merekam jejak peradaban dan ingatan para sepuh pejuang.',
                'image' => 'images/dokumentasi/cerita-sejarah-terate-udik.jpg',
                'category' => 'Dokumentasi Lama',
                'year' => 'Masa Perjuangan',
                'is_active' => true,
            ],
        ];

        Gallery::query()->delete();

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}