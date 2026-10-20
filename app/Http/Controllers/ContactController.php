<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $phone = Setting::get('contact_phone') ?: '081803651184';
        $contact = [
            'phone' => $phone,
            'whatsapp' => Setting::get('contact_whatsapp') ?: $phone,
            'address' => Setting::get('contact_address') ?: 'Kampung Terate Udik RT 02/RW 02, Kel. Masigit, Kec. Jombang, Kota Cilegon, Provinsi Banten',
            'facebook' => Setting::get('facebook_url'),
            'instagram' => Setting::get('instagram_url'),
            'twitter' => Setting::get('twitter_url'),
            'youtube' => Setting::get('youtube_url'),
        ];

        return view('contact', compact('contact'));
    }
}