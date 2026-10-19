<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = [
            'email' => Setting::get('contact_email'),
            'phone' => Setting::get('contact_phone'),
            'address' => Setting::get('contact_address'),
            'facebook' => Setting::get('facebook_url'),
            'instagram' => Setting::get('instagram_url'),
            'twitter' => Setting::get('twitter_url'),
            'youtube' => Setting::get('youtube_url'),
        ];

        return view('contact', compact('contact'));
    }
}