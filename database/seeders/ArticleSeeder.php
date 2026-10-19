<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first() ?? User::first();
        $sejarah = Category::where('slug', 'sejarah')->first();
        $budaya = Category::where('slug', 'budaya')->first();
        $arsitektur = Category::where('slug', 'arsitektur')->first();
        $tradisi = Category::where('slug', 'tradisi')->first();

        $now = now();

        $articles = [
            [
                'category_id' => $sejarah?->id,
                'title' => 'Mengenal Masjid Sumpah: Jejak Perjuangan dan Pengungkapan Kebenaran di Cilegon',
                'excerpt' => 'Salah satu masjid di Kota Cilegon dengan nama unik “Masjid Sumpah”. Dikenal sebagai Masjid Perjuangan Banten dan sarana mengungkap kebenaran bagi pihak yang tidak jujur.',
                'content' => $this->intro(),
                'status' => 'published',
                'is_featured' => true,
                'published_at' => $now->copy()->subDays(30),
            ],
            [
                'category_id' => $sejarah?->id,
                'title' => 'Latar Sejarah Cilegon: Kota Baja dan Catatan 1888',
                'excerpt' => 'Cilegon hari ini kota pabrik dan pelabuhan. Di baliknya ada catatan panjang, termasuk kerusuhan 1888 yang masih hidup di mulut ke mulut.',
                'content' => $this->contextCilegon(),
                'status' => 'published',
                'is_featured' => false,
                'published_at' => $now->copy()->subDays(21),
            ],
            [
                'category_id' => $budaya?->id,
                'title' => 'Arsip yang Kami Cari',
                'excerpt' => 'Foto lama, catatan wakaf, peta, dan cerita para sepuh—bahan yang bisa memulai penelusuran.',
                'content' => $this->archiveWanted(),
                'status' => 'published',
                'is_featured' => false,
                'published_at' => $now->copy()->subDays(14),
            ],
            [
                'category_id' => $arsitektur?->id,
                'title' => 'Catatan Awal Arsitektur Masjid',
                'excerpt' => 'Kerangka pendokumentasian bangunan: denah, atap, bahan, dan perbandingannya dengan masjid Banten lain.',
                'content' => $this->architectureDraft(),
                'status' => 'draft',
                'is_featured' => false,
                'published_at' => null,
            ],
            [
                'category_id' => $tradisi?->id,
                'title' => 'Tradisi dan Nilai Budaya di Sekitar Masjid',
                'excerpt' => 'Kerangka penelusuran peran masjid di tengah warga: dari pengajian sampai musyawarah.',
                'content' => $this->traditionDraft(),
                'status' => 'draft',
                'is_featured' => false,
                'published_at' => null,
            ],
        ];

        foreach ($articles as $article) {
            $slug = Str::slug($article['title']);
            Article::updateOrCreate(
                ['slug' => $slug],
                $article + ['user_id' => $admin?->id, 'slug' => $slug]
            );
        }
    }

    protected function intro(): string
    {
        return <<<HTML
<p class="lead">Salah satu masjid di Kota Cilegon, Provinsi Banten memiliki nama yang unik yakni <strong>“Masjid Sumpah”</strong>. Sesuai artinya, rumah ibadah yang terletak di Kampung Terate Udik, Kelurahan Masigit, Kecamatan Jombang itu kerap dijadikan tempat untuk mengungkap kebenaran dari pihak yang dianggap tidak jujur.</p>

<p>Masjid Sumpah dari zaman dahulu diyakini oleh masyarakat sekitar bahwa masjid tersebut muncul sendiri atau berdiri tanpa ada yang mengetahui siapa yang membuatnya. Bahkan sebagian kesepuhan Kampung Terate Udik menyebut Masjid Sumpah sebagai <em>Masjid Perjuangan Banten</em> yang pada waktu dahulu digunakan untuk pertemuan-pertemuan para ulama dan kiai guna membahas tentang perjuangan, baik memperjuangkan tanah air maupun agama.</p>

<h3>Kemunculan Langgar Keramat Era Kesultanan Banten</h3>
<p>Diceritakan bahwa Masjid Sumpah tersebut muncul dengan sendirinya pada masa Kesultanan Banten, sekitar abad ke-15 hingga ke-16 (kisaran tahun 1401 M – 1600 M). Bangunan awalnya menyerupai gubuk atau langgar kecil. Namun uniknya, walaupun ukurannya kecil, langgar tersebut bila dipakai untuk ibadah shalat tetap muat walau jamaah yang shalat semakin bertambah banyak, seolah-olah bangunannya melebar dengan sendirinya.</p>
<p>Setelah berjalannya waktu dari tahun ke tahun dan zaman ke zaman, pada masa itu di suatu malam di dalam langgar muncul pancaran sinar putih yang menembus atap hingga ke luar atap. Setelah diselidiki, ternyata sumber cahaya tersebut keluar dari lubang yang letaknya persis di tengah-tengah bangunan langgar. Menurut penuturan sesepuh zaman dahulu, lubang tersebut diyakini memiliki lorong yang bisa menembus ke Banten Lama, Masjid Agung Demak, dan Cirebon, serta diyakini sebagai tempat berkumpulnya para wali pada malam-malam tertentu.</p>

<h3>Pembangunan Menjadi "Masjid Perjuangan Banten"</h3>
<p>Setelah sekian lama digunakan untuk shalat berjamaah, langgar tersebut juga sering digunakan warga Terate Udik untuk melakukan tirakat atau mengamalkan amalan-amalan dzikir di dalamnya. Seiring bertambahnya jamaah, para kesepuhan dan pemuka agama serta masyarakat bersepakat untuk merehab langgar menjadi masjid.</p>
<p>Dengan semangat serta kerja keras masyarakat Terate Udik yang berjuang bersama-sama—tua, muda, besar, dan kecil bahu-membahu bergotong-royong dalam pembangunan—terwujudlah masjid yang kemudian dikenal sebagai <strong>“Masjid Perjuangan Banten”</strong>.</p>

<h3>Arsitektur Kuno Khas Banten</h3>
<p>Masjid dibangun dengan arsitektur kuno khas Banten berdenah persegi, memiliki dua pintu di sisi kanan, dua pintu di sisi kiri, dan satu pintu menghadap pengimaman. Tinggi masing-masing pintu kurang lebih hanya satu setengah meter (1,5 m). Hal ini memiliki filosofi luhur: setiap orang yang memasuki masjid harus menundukkan kepala sebagai simbol merendahkan diri dan bersujud di hadapan Allah Yang Maha Kuasa.</p>
<p>Di sisi belakang terdapat tiga pintu berukuran serupa (±1,5 meter). Di sisi kiri luar sebelah barat berdiri satu menara bergaya Menara Banten. Atapnya berbentuk limas dengan empat undak, berhiaskan satu mongolo besar di puncak dan empat mongolo kecil di ujung undak genteng teratas.</p>

<h3>Silsilah Juru Kunci & Struktur DKM Modern</h3>
<ul>
    <li><strong>Ki Akhmad (Pasca Geger Cilegon ±1928):</strong> Juru kunci pertama yang dipercaya masyarakat, putra pahlawan pejuang Geger Cilegon 1888 KH. Mahmmud bin Ki Hamzah (Buyut Mahmmud Pegantungan). Beliau memediasi sengketa warga di Masjid Sumpah.</li>
    <li><strong>KH. Mahmmud bin H. Abdurrohman:</strong> Pembangun pendopo belakang berlantai tehel untuk musyawarah, dzikir Maulid, Marhaban, dan ngeriung. Beliau juga merawat pusaka bersejarah dan makam para waliyullah di Terate Udik.</li>
    <li><strong>Ust. Abdul Hayi & Ust. Akhyar bin Abdullatif (±1986):</strong> Ust. Abdul Hayi mengurus masjid dan merenovasi fasilitas fisik; Ust. Akhyar mengemban amanah juru kunci persumpahan, pembimbing spiritual, dan perawat pusaka kuno.</li>
    <li><strong>DKM Masjid Sumpah Modern:</strong> Dipimpin oleh KH. A. Marzuqi bin KH. Mastur (Ketua DKM), didampingi A. Faridi (Wakil DKM), dan Habibi (Bendahara DKM).</li>
</ul>

<h3>Tata Cara Tradisi Persumpahan Syariat Islam</h3>
<p>Tradisi persumpahan diatur dengan syariat dan kesepakatan tertulis:</p>
<ol>
    <li>Kedua belah pihak menyetujui syarat-syarat persumpahan.</li>
    <li>Wajib berkoordinasi dan diketahui aparatur pemerintah desa serta pihak aparat berwajib agar terbebas dari tuntutan hukum.</li>
    <li>Kedua belah pihak didudukkan di antara lubang bertutup keramik putih di shaf kedua belakang pengimaman.</li>
    <li>Kepala ditutupi kain putih, dan pengurus memegang mushaf Al-Qur'an di atas kepala mereka seraya memandu ikrar sumpah.</li>
    <li>Ditegaskan bahwa segala akibat gaib dan dampak batiniah adalah kuasa Allah SWT dan tidak ada tuntutan kepada kuncen maupun pengurus masjid.</li>
</ol>
HTML;
    }

    protected function contextCilegon(): string
    {
        return <<<HTML
<p>Sebelum cerita masjid ini dibuka, kenali dulu panggungnya: Cilegon.</p>

<p>Hari ini Cilegon lebih dulu menyebut dirinya kota pabrik dan pelabuhan; julukan <em>Kota Baja</em> menempel sejak industri baja berdiri. Tapi kota ini tidak lahir dari baja. Dulunya ia kawasan pertanian dan pelayaran yang ramai, satu langkah dari Banten Lama—pusat Kesultanan Banten yang hidup pada abad XVI–XVII.</p>

<p>Cilegon juga tercatat dengan cara lain: lewat Geger Cilegon 1888. Kerusuhan singkat yang menolak pajak dan kebijakan kolonial, dan di dalamnya kalangan ulama memegang peran besar. Pemerintah kolonial menjawab dengan hukuman berat bagi yang dituduh menjadi pemicu. Sampai sekarang nama-nama mereka bertahan lewat tutur lisan.</p>

<p>Satu hal perlu ditegaskan sejak awal: kami belum punya bukti bahwa Geger Cilegon terjadi di masjid ini. Justru karena nama masjid sering dikait-kaitkan dengan peristiwa itu, kami tulis batasnya di sini—sampai ada dokumen atau kesaksian yang menautkan keduanya, kami menyebutnya dugaan, bukan kenyataan.</p>

<p>Bagi yang ingin menelusuri sendiri, titik berangkat yang biasa dipakai orang: arsip Arsip Nasional, surat kabar dari masa itu, dan naskah lokal Banten. Kami tunjukkan arahnya. Kesimpulan biar bukti yang punya.</p>
HTML;
    }

    protected function archiveWanted(): string
    {
        return <<<HTML
<p>Sejarah masjid ini biasanya bersembunyi di barang yang dulu jarang dianggap penting. Ini yang sedang kami kumpulkan:</p>

<h3>Dokumen</h3>
<ul>
    <li>Catatan wakaf tanah dan bangunan, dari yang resmi sampai catatan tangan.</li>
    <li>Daftar imam, khatib, marbot, dan pengurus dari masa ke masa.</li>
    <li>Risalah atau notulen rapat pengurus zaman dulu.</li>
    <li>Surat-menyurat yang menyinggung masjid.</li>
</ul>

<h3>Gambar dan peta</h3>
<ul>
    <li>Foto masjid dari masa lampau: slide, klise, atau cetakan yang sudah lusuh.</li>
    <li>Peta lama Cilegon yang masih memuat lokasi masjid.</li>
    <li>Sketsa, denah, dan gambar renovasi.</li>
</ul>

<h3>Penuturan</h3>
<ul>
    <li>Cerita para sepuh: bentuk awal bangunan, imam pertama, asal-usul nama.</li>
    <li>Kisah keluarga yang menyinggung masjid di momen penting.</li>
</ul>

<p>Tiap bahan yang masuk kami catat asal-usulnya, pindai, beri keterangan, lalu aslinya kami kembalikan. Yang menyumbang kami tulis namanya sebagai sumber, kecuali meminta untuk disamarkan.</p>

<p>Punya salah satunya? Halaman Kontak menunggu.</p>
HTML;
    }

    protected function architectureDraft(): string
    {
        return <<<HTML
<p><em>Kerangka kerja—belum jadi artikel utuh.</em> Yang ingin kami rekam dari bangunan ini:</p>

<h3>Yang akan direkam</h3>
<ul>
    <li>Denah dan arah hadap bangunan terhadap kiblat.</li>
    <li>Konstruksi dan bentuk atap, untuk dibandingkan dengan masjid Banten lain.</li>
    <li>Bahan dinding dan lantai; mana yang dari masa awal, mana yang sudah diganti.</li>
    <li>Serambi, tempat wudu, dan ada tidaknya menara.</li>
</ul>

<h3>Rencana perbandingan</h3>
<p>Hasilnya nanti kami cocokkan dengan masjid-masjid tua Banten yang sudah terdokumentasi untuk mencari "rumpun" yang sama. Pekerjaan ini sebaiknya ditemani arsitek dan orang yang paham cagar budaya—tanpa mereka, catatan kami hanya sampai dugaan.</p>
HTML;
    }

    protected function traditionDraft(): string
    {
        return <<<HTML
<p><em>Kerangka kerja—belum jadi artikel utuh.</em></p>

<h3>Soal yang akan dijajaki</h3>
<ul>
    <li>Kegiatan rutin: pengajian, kerja bakti, peringatan hari besar—mana yang masih jalan, mana yang mulai mereda.</li>
    <li>Bagaimana masjid dipakai untuk musyawarah warga.</li>
    <li>Peran masjid di momen keluarga: kelahiran, pernikahan, duka.</li>
    <li>Khazanah lokal yang meredup, kalau masih ada yang mengingatnya.</li>
</ul>

<p>Jawabannya kami cari dari penuturan warga dan catatan kegiatan, bukan dari asumsi. Draf ini terbuka untuk dikerjakan siapa saja yang mau ikut.</p>
HTML;
    }
}