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
            [
                'title' => 'Landmark Menara Baja Kota Cilegon',
                'description' => 'Ikon arsitektur modern Kota Cilegon sebagai Kota Baja, berpadu dengan jejak sejarah perjuangan rakyat Banten dan keterikatannya dengan Masjid Sumpah Terate Udik.',
                'image' => 'images/dokumentasi/landmark-kota-baja-cilegon.jpg',
                'category' => 'Eksterior',
                'year' => 'Kontemporer',
                'is_active' => true,
            ],
            [
                'title' => 'Pusaka Tombak Luk 3 Terate Udik',
                'description' => 'Pusaka peninggalan masa awal syiar Islam di Banten dengan pamor Pengawak Waja / Keleng. Estimasi tarikh abad ke-15 (1400 Masehi), dirawat sebagai khazanah pusaka dan pustaka leluhur Terate Udik.',
                'image' => 'images/pusaka/tombak-luk-3.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 15 (1400 M)',
                'is_active' => true,
            ],
            [
                'title' => 'Pusaka Tombak Megantoro',
                'description' => 'Pusaka Tombak Megantoro era Kesultanan Banten dengan motif pamor Wis Utah. Estimasi tarikh abad ke-17 (1600 Masehi), melambangkan kewibawaan dan keteguhan perjuangan para sesepuh pejuang Banten.',
                'image' => 'images/pusaka/tombak-megantoro.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 17 (1600 M)',
                'is_active' => true,
            ],
            [
                'title' => 'Pedang Sunduk Alit (Ekek Keling)',
                'description' => 'Pedang Sunduk Alit jenis Ekek Keling berpamor Wasutah dengan gagang berukir berbahan tanduk alami. Estimasi abad ke-18 (1700 Masehi), dirawat turun-temurun oleh para juru kunci peninggalan sejarah.',
                'image' => 'images/pusaka/pedang-sunduk-alit.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 18 (1700 M)',
                'is_active' => true,
            ],
            [
                'title' => 'Pedang Lameng Pamengkang Jagat',
                'description' => 'Pedang Lameng Pamengkang Jagat dengan motif pamor Adeg dan Batu Lapak / Puser Bumi. Gagang bentuk golok berbahan tanduk asli dengan warangka kayu kuno. Estimasi abad ke-18 (1700 Masehi).',
                'image' => 'images/pusaka/pedang-lameng.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 18 (1700 M)',
                'is_active' => true,
            ],
            [
                'title' => 'Kendi Pusaka & Artefak Bersejarah Terate Udik',
                'description' => 'Koleksi artefak peninggalan sepuh berupa kendi logam berbalut kain mori putih, mangkuk keramik porselen kuno bermotif, gulungan rotan pusaka, serta bilah-bilah golok dan pusaka bersejarah Terate Udik.',
                'image' => 'images/pusaka/kendi-dan-pusaka-kuno.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Masa Tradisi Sepuh',
                'is_active' => true,
            ],
            [
                'title' => 'Keramik Dinasti Ming',
                'description' => 'Mangkuk dan piring keramik porselen biru-putih kuno peninggalan era Dinasti Ming dengan motif ikan dan bunga teratai air. Estimasi tarikh abad ke-17 (1600-an Masehi), bukti jejak perdagangan dan kebudayaan masa Kesultanan Banten.',
                'image' => 'images/pusaka/keramik-dinasti-ming.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 17 (1600an)',
                'is_active' => true,
            ],
            [
                'title' => 'Kendi Banyu Adem',
                'description' => 'Kendi Banyu Adem tradisional berleher panjang dengan cerat khusus dan tutup kuno berukir motif tradisional. Estimasi abad ke-17 (1600-an Masehi), wadah air barakah dan penyejuk peninggalan para sesepuh Terate Udik.',
                'image' => 'images/pusaka/kendi-banyu-adem.jpg',
                'category' => 'Jejak Benda',
                'year' => 'Abad 17 (1600an)',
                'is_active' => true,
            ],
        ];

        Gallery::query()->delete();

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}