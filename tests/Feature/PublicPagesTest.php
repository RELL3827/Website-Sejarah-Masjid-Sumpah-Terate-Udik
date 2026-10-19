<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_renders(): void
    {
        $this->get(route('home'))->assertOk()->assertSee('Masjid Sumpah Masigit');
    }

    public function test_history_page_renders(): void
    {
        $this->get(route('history'))->assertOk()->assertSee('Sejarah');
    }

    public function test_timeline_page_renders(): void
    {
        $this->get(route('timeline'))->assertOk()->assertSee('Timeline');
    }

    public function test_articles_index_page_renders(): void
    {
        $this->get(route('articles.index'))->assertOk()->assertSee('Artikel');
    }

    public function test_articles_page_can_be_filtered_by_category(): void
    {
        $category = \App\Models\Category::first();

        $this->get(route('articles.index', ['category' => $category->id]))
            ->assertOk();
    }

    public function test_gallery_page_renders(): void
    {
        $this->get(route('gallery'))->assertOk()->assertSee('Galeri');
    }

    public function test_about_page_renders(): void
    {
        $this->get(route('about'))->assertOk()->assertSee('Tentang');
    }

    public function test_location_page_renders(): void
    {
        $this->get(route('location'))->assertOk()->assertSee('Lokasi');
    }

    public function test_contact_page_renders(): void
    {
        $this->get(route('contact'))->assertOk()->assertSee('Kontak');
    }

    public function test_search_returns_results_for_valid_query(): void
    {
        $this->get(route('search', ['q' => 'masjid']))
            ->assertOk()
            ->assertSee('hasil untuk kata kunci');
    }

    public function test_sitemap_renders_as_xml(): void
    {
        $this->get(route('sitemap'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml');
    }
}