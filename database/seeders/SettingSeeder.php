<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Masjid Sumpah',
            'site_tagline' => 'Masjid Perjuangan Banten & Penyingkap Kebenaran',
            'site_description' => 'Arsip digital sejarah dan budaya Masjid Sumpah di Kampung Terate Udik, Kota Cilegon — jejak perjuangan ulama Banten, arsitektur kuno, dan tradisi persumpahan.',
            'site_logo' => null,
            'hero_title' => 'Masjid Sumpah',
            'hero_subtitle' => 'Rumah ibadah bersejarah di Kampung Terate Udik, Cilegon — simbol perjuangan ulama Banten dan sarana pengungkapan kebenaran berlandaskan syariat Islam.',
            'hero_image' => 'images/dokumentasi/gerbang-masjid-sumpah.jpg',
            'contact_email' => null,
            'contact_phone' => null,
            'contact_address' => 'Kampung Terate Udik RT 02/RW 02, Kel. Masigit, Kec. Jombang, Kota Cilegon, Provinsi Banten, Indonesia',
            'facebook_url' => null,
            'instagram_url' => null,
            'twitter_url' => null,
            'youtube_url' => null,
            'copyright_text' => '© 2026 DKM Masjid Sumpah Cilegon. All Rights Reserved.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}