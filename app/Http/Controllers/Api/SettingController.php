<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'site_name' => Setting::get('site_name'),
                'tagline' => Setting::get('site_tagline'),
                'description' => Setting::get('site_description'),
                'hero' => [
                    'title' => Setting::get('hero_title'),
                    'subtitle' => Setting::get('hero_subtitle'),
                    'image' => image_url(Setting::get('hero_image'), 'images/masjid/hero.jpg'),
                ],
                'contact' => [
                    'email' => Setting::get('contact_email'),
                    'phone' => Setting::get('contact_phone'),
                    'address' => Setting::get('contact_address'),
                ],
                'socials' => [
                    'facebook' => Setting::get('facebook_url'),
                    'instagram' => Setting::get('instagram_url'),
                    'twitter' => Setting::get('twitter_url'),
                    'youtube' => Setting::get('youtube_url'),
                ],
            ],
        ]);
    }
}