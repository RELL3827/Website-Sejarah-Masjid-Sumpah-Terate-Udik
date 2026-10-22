<?php

namespace Database\Seeders;

use App\Models\MosqueInformation;
use Illuminate\Database\Seeder;

class MosqueInformationSeeder extends Seeder
{
    public function run(): void
    {
        MosqueInformation::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Masjid Sumpah',
                'address' => 'Kampung Terate Udik RT 02/RW 02, Kelurahan Masigit, Kecamatan Jombang, Kota Cilegon, Provinsi Banten, Indonesia',
                'description' => 'Zaman dahulu dikenal sebagai masjid sumpah perjuangan Banten dan sarana mengungkap kebenaran bagi pihak yang berselisih melalui proses sumpah sesuai syariat islam.',
                'history' => '<p class="lead">Salah satu masjid di Kota Cilegon, Provinsi Banten memiliki nama yang unik yakni <strong>“Masjid Sumpah”</strong>. Sesuai artinya, rumah ibadah yang terletak di Kampung Terate Udik, Kelurahan Masigit, Kecamatan Jombang itu kerap dijadikan tempat untuk mengungkap kebenaran dari pihak yang dianggap tidak jujur.</p>

<p>Masjid Sumpah dari zaman dahulu diyakini oleh masyarakat sekitar bahwa masjid tersebut muncul sendiri atau berdiri tanpa ada yang mengetahui siapa yang membuatnya. Bahkan sebagian kesepuhan Kampung Terate Udik menyebut Masjid Sumpah sebagai <em>Masjid Perjuangan Banten</em> yang pada waktu dahulu digunakan untuk pertemuan-pertemuan para ulama dan kiai guna membahas tentang perjuangan, baik memperjuangkan tanah air maupun agama.</p>

<h3>Kemunculan Langgar Keramat Masa Kesultanan Banten</h3>
<p>Diceritakan bahwa Masjid Sumpah tersebut muncul dengan sendirinya pada masa Kesultanan Banten, sekitar abad ke-15 hingga ke-16 (kisaran tahun 1401 M – 1600 M). Bangunan awalnya menyerupai gubuk atau langgar kecil. Namun uniknya, walaupun ukurannya kecil, langgar tersebut bila dipakai untuk ibadah shalat tetap muat walau jamaah yang shalat semakin bertambah banyak, seolah-olah bangunannya melebar dengan sendirinya.</p>
<p>Setelah berjalannya waktu dari tahun ke tahun dan zaman ke zaman, pada masa itu di suatu malam di dalam langgar muncul pancaran sinar putih yang menembus atap hingga ke luar atap. Setelah diselidiki, ternyata sumber cahaya tersebut keluar dari lubang yang letaknya persis di tengah-tengah bangunan langgar. Menurut cerita orang zaman dahulu, lubang tersebut diyakini memiliki lorong yang bisa menembus ke Banten, Masjid Agung Demak, dan Cirebon. Langgar tersebut juga diyakini para tetua sebagai tempat berkumpulnya para wali pada malam-malam tertentu.</p>

<h3>Gotong Royong Merehab Menjadi "Masjid Perjuangan Banten"</h3>
<p>Setelah sekian lama digunakan untuk shalat berjamaah, langgar tersebut juga sering digunakan warga Terate Udik untuk melakukan tirakat atau mengamalkan amalan-amalan dzikir di dalamnya. Seiring berjalannya waktu, semakin bertambah banyak orang yang datang melakukan hal tersebut. Maka dari itu, para kesepuhan dan pemuka agama serta masyarakat bersepakat untuk merehab langgar tersebut menjadi mushola atau masjid.</p>
<p>Setelah sekian lama melakukan musyawarah, pada akhirnya niat mulia itu terwujud berkat semangat serta kerja keras masyarakat Terate Udik yang berjuang bersama-sama. Tua, muda, besar, dan kecil bahu-membahu bergotong-royong dalam pembangunan. Dari sinilah lahir sebutan <strong>“Masjid Perjuangan Banten”</strong>.</p>

<h3>Arsitektur Kuno Khas Banten</h3>
<p>Pembangunan masjid terlaksana dengan arsitektur kuno khas Banten berdenah bangunan persegi. Masjid memiliki dua pintu di sisi kanan, dua pintu di sisi kiri, dan satu pintu menghadap pengimaman. Tinggi masing-masing pintu kurang lebih hanya satu setengah meter (1,5 m), sehingga orang yang memasuki Masjid Terate Udik ini harus menundukkan kepalanya. Makna filosofisnya adalah ketika hendak beribadah, kita wajib merendahkan diri dengan penuh ketawadhuan di hadapan Sang Maha Kuasa.</p>
<p>Dari sisi belakang juga terdapat tiga pintu sebelum memasuki wilayah dalam yang tiap pintu berukuran sama (kurang lebih 1,5 meter). Di sisi kiri luar sebelah barat terdapat satu menara yang modelnya menyerupai Menara Banten. Dari sisi atas, atapnya berbentuk limas dengan empat undak; di puncak atap terpasang satu mongolo (memolo) besar serta empat mongolo kecil di ujung undak genteng paling atas.</p>

<h3>Silsilah Kepengurusan dan Juru Kunci dari Masa ke Masa</h3>
<div class="keeper-timeline mb-4">
    <div class="mb-3">
        <h4>1. Era Pasca Tragedi Geger Cilegon (±1928) – Ki Akhmad</h4>
        <p>Setelah sekian lama digunakan untuk kegiatan amaliah, akhirnya dibentuk kepengurusan atau juru kunci Masjid Sumpah pada masa setelah Tragedi Geger Cilegon (kisaran tahun 1928) yang dipegang oleh <strong>Ki Akhmad</strong>. Beliau adalah tokoh dan kiai kharismatik yang dipercaya masyarakat Terate Udik, sekaligus anak dari salah satu pahlawan pejuang utama peristiwa Geger Cilegon 1888, yaitu <strong>KH. Mahmmud bin Ki Hamzah</strong> (kini dikenal dengan sebutan <em>Buyut Mahmmud</em> yang makamnya terletak di Lingkungan Pegantungan).</p>
        <p>Selain sebagai pengurus, Ki Akhmad kerap terjun langsung apabila di kampung terjadi percekcokan antarwarga. Jika perselisihan tidak kunjung damai, jalan satu-satunya adalah dibawa ke Masjid Sumpah untuk dinasihati agar bisa berdamai secara kekeluargaan.</p>
    </div>

    <div class="mb-3">
        <h4>2. Era KH. Mahmmud bin H. Abdurrohman</h4>
        <p>Setelah waktu yang panjang dan Ki Akhmad telah berusia sangat lanjut, tahta juru kunci diserahkan kepada <strong>KH. Mahmmud bin H. Abdurrohman</strong> yang masih memiliki hubungan keluarga dengan Ki Akhmad. Di masa KH. Mahmmud, Masjid Sumpah mengalami penambahan: di sisi belakang dibangun pendopo berlantai tehel untuk tempat rapat masyarakat, musyawarah, serta kegiatan ibadah seperti dzikir Maulid, Marhaban, ngeriung, dan tempat mediasi/nasihat sebelum ritual sumpah. Bentuk bangunan kuno asli tetap dipertahankan seperti sediakala.</p>
        <p>KH. Mahmmud bukan sekadar pengurus dan pemegang kunci masjid, melainkan juga juru kunci makam para waliyullah serta perawat benda pusaka bersejarah peninggalan masa lalu di Terate Udik, sehingga banyak tamu dari berbagai daerah berkunjung ke kediaman beliau.</p>
    </div>

    <div class="mb-3">
        <h4>3. Era Tahun 1986 – Ust. Abdul Hayi & Ust. Akhyar bin Abdullatif</h4>
        <p>Setelah berpuluh-puluh tahun dan KH. Mahmmud lanjut usia, kepengurusan diserahkan kepada dua tokoh penerus (sekitar tahun 1986):</p>
        <ul>
            <li><strong>Ust. Abdul Hayi:</strong> Sebagai pengurus Masjid Sumpah sekaligus Dewan Guru Pedzikir Terate Udik Tengah. Beliau merenovasi pendopo masjid (tembok samping yang awalnya lubang angin diganti jendela kaca, lantai tehel diganti keramik 30x30 cm, serta tempat wudhu satu kolam besar diganti kran air dan kolam kecil).</li>
            <li><strong>Ust. Akhyar bin Abdullatif:</strong> Sebagai pemegang kunci persumpahan dan perawat benda pusaka kuno. Beliau juga guru spiritual dan kebatinan tempat orang-orang belajar sejarah wali di Terate Udik serta memandu pihak-pihak yang hendak melaksanakan ritual sumpah.</li>
        </ul>
    </div>

    <div class="mb-3">
        <h4>4. Era DKM Modern – KH. A. Marzuqi bin KH. Mastur</h4>
        <p>Seiring berjalannya waktu dan usia Ust. Abdul Hayi yang sudah sepuh, kepengurusan diserahkan kepada <strong>KH. A. Marzuqi bin KH. Mastur</strong>, salah satu murid KH. Mahmmud. Untuk menyesuaikan tuntutan zaman yang modern, kepengurusan dibentuk secara struktural dalam wadah <strong>DKM (Dewan Kemakmuran Masjid)</strong> dengan susunan:</p>
        <ul>
            <li><strong>Ketua DKM:</strong> KH. A. Marzuqi</li>
            <li><strong>Wakil Ketua DKM:</strong> A. Faridi</li>
            <li><strong>Bendahara DKM:</strong> Habibi</li>
        </ul>
    </div>
</div>

<h3>Tradisi dan Tata Cara Ritual Persumpahan Terate Udik</h3>
<p>Dari dahulu hingga sekarang, nama <strong>Sumpah Terate Udik</strong> sangatlah masyhur di kalangan masyarakat Kampung Terate Udik hingga berbagai daerah di sekitar Banten, untuk melaksanakan ritual sumpah bagi orang-orang yang memiliki masalah atau perselisihan yang tak kunjung damai.</p>
<p>Sumpah tersebut dilaksanakan apabila kedua belah pihak (baik penuduh maupun yang dituduh) menyetujui syarat-syarat yang disiapkan. Salah satu syarat mutlak adalah wajib memberitahukan dan melibatkan aparatur pemerintah / pihak desa serta aparat kepolisian berwajib, agar tidak ada tuntutan hukum dari pihak mana pun kepada kiai dan pengurus masjid yang memandu prosesi.</p>
<p><strong>Tata Cara Pelaksanaan:</strong></p>
<ol>
    <li>Prosesi sumpah dipandu sesuai tatacara hukum Islam.</li>
    <li>Kedua belah pihak didudukkan di antara lubang yang ditutup keramik putih di barisan shaf kedua bagian tengah, persis di belakang pengimaman.</li>
    <li>Kepala kedua pihak ditutupi dengan kain putih.</li>
    <li>Pengurus masjid memegang mushaf Al-Qur\'an di atas kepala mereka satu per satu, seraya membimbing ikrar sumpah yang dipandu langsung oleh juru kunci.</li>
    <li>Setelah sumpah selesai, juru kunci menyatakan penegasan kepada kedua belah pihak dan keluarga bahwa apabila timbul kejadian, dampak batiniah, atau penyakit aneh di kemudian hari pada salah satu pihak, maka hal tersebut merupakan kuasa Allah SWT dan tidak boleh ada tuntutan kepada siapa pun, terutama kepada pihak kuncen maupun pengurus Masjid Sumpah.</li>
</ol>

<h3>Narasumber & Sumber Penuturan Sejarah</h3>
<p>Catatan dan dokumentasi sejarah Masjid Sumpah ini dihimpun berdasarkan penuturan lisan para kesepuhan, juru kunci, dan sesepuh Kampung Terate Udik, antara lain:</p>
<ul>
    <li><strong>KH. Mahmud</strong></li>
    <li><strong>Ust. Ahyar</strong></li>
    <li><strong>Mameu Fahrudim</strong></li>
    <li><strong>Ust. Afifi</strong></li>
    <li><strong>Alm. Ust. Arifin</strong></li>
    <li><strong>Mameu Mas\'udi</strong></li>
    <li><strong>H. Aliyumi</strong></li>
    <li><strong>Yai Basit</strong></li>
    <li><strong>Mameu Ustuhri</strong></li>
    <li><strong>Ki Arsyad</strong></li>
</ul>',
                'architecture' => 'Bangunan berarsitektur kuno khas Banten berdenah persegi dengan lima pintu utama (dua pintu sisi kanan, dua pintu sisi kiri, dan satu pintu menghadap pengimaman) dengan tinggi ±1,5 meter yang bermakna setiap insan harus menundukkan kepala dan merendahkan diri di hadapan Sang Maha Kuasa saat beribadah. Di sisi belakang terdapat tiga pintu berukuran serupa. Di sisi luar sebelah barat berdiri menara khas Banten. Atapnya berbentuk limas empat undak berhiaskan satu mongolo besar di puncak dan empat mongolo kecil di tiap ujung undak teratas. Terdapat pendopo di bagian belakang untuk sarana musyawarah, dzikir Maulid/Marhaban, dan mediasi.',
                'cultural_value' => 'Dikenal sebagai Masjid Perjuangan Banten yang sarat nilai spiritual dan historis: tempat musyawarah ulama pejuang kemerdekaan dan agama, tradisi tirakat dan dzikir masyarakat Terate Udik, pelestarian benda pusaka kuno dan makam para waliyullah, serta tradisi ikrar persumpahan berbasis syariat Islam di hadapan Al-Qur\'an sebagai ikhtiar luhur menyingkap kebenaran.',
                'latitude' => -6.0093879,
                'longitude' => 106.0520684,
            ]
        );
    }
}