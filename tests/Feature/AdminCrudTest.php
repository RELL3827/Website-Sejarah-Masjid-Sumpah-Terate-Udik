<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        Storage::fake('public');
    }

    protected function fakePng(string $name): UploadedFile
    {
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==');

        $path = tempnam(sys_get_temp_dir(), 'png') . '.png';
        file_put_contents($path, $png);

        $file = new UploadedFile($path, $name, 'image/png', null, true);

        register_shutdown_function(static function () use ($path) {
            if (file_exists($path)) {
                @unlink($path);
            }
        });

        return $file;
    }

    protected function admin(): User
    {
        return User::where('is_admin', true)->firstOrFail();
    }

    public function test_admin_can_view_all_management_pages(): void
    {
        $admin = $this->admin();

        foreach ([
            route('admin.articles.index'),
            route('admin.articles.create'),
            route('admin.categories.index'),
            route('admin.categories.create'),
            route('admin.timelines.index'),
            route('admin.timelines.create'),
            route('admin.galleries.index'),
            route('admin.galleries.create'),
            route('admin.mosque-information.edit'),
            route('admin.settings.edit'),
        ] as $url) {
            $this->actingAs($admin)->get($url)->assertOk();
        }
    }

    public function test_admin_can_create_article_with_upload(): void
    {
        $admin = $this->admin();
        $category = Category::first();

        $response = $this->actingAs($admin)->post(route('admin.articles.store'), [
            'title' => 'Artikel Baru Untuk Tes',
            'category_id' => $category->id,
            'excerpt' => 'Ringkasan tes.',
            'content' => '<p>Isi artikel tes.</p>',
            'status' => 'published',
            'is_featured' => 0,
            'seo_title' => 'Seo Tes',
            'meta_description' => 'Meta tes.',
            'thumbnail' => $this->fakePng('thumb.png'),
        ]);

        $response->assertRedirect();

        $article = Article::where('slug', 'artikel-baru-untuk-tes')->first();
        $this->assertNotNull($article);
        $this->assertEquals('published', $article->status);
        $this->assertNotNull($article->thumbnail);
        Storage::disk('public')->assertExists($article->thumbnail);
    }

    public function test_article_title_is_required(): void
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)
            ->from(route('admin.articles.create'))
            ->post(route('admin.articles.store'), [
                'title' => '',
                'content' => '<p>x</p>',
                'status' => 'draft',
            ]);

        $response->assertRedirect(route('admin.articles.create'));
        $response->assertSessionHasErrors('title');
    }

    public function test_article_invalid_image_is_rejected(): void
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)
            ->post(route('admin.articles.store'), [
                'title' => 'Artikel Dengan File Salah',
                'content' => '<p>x</p>',
                'status' => 'draft',
                'thumbnail' => UploadedFile::fake()->create('bukan-gambar.txt', 100),
            ]);

        $response->assertSessionHasErrors('thumbnail');
    }

    public function test_admin_can_update_article(): void
    {
        $admin = $this->admin();
        $article = Article::first();

        $response = $this->actingAs($admin)
            ->put(route('admin.articles.update', $article), [
                'title' => 'Judul Diperbarui',
                'excerpt' => 'Ringkasan baru.',
                'content' => '<p>Konten baru.</p>',
                'status' => 'draft',
                'category_id' => $article->category_id,
                'is_featured' => 0,
            ]);

        $response->assertRedirect();

        $this->assertEquals('Judul Diperbarui', $article->fresh()->title);
        $this->assertEquals('draft', $article->fresh()->status);
    }

    public function test_admin_can_delete_article(): void
    {
        $admin = $this->admin();
        $article = Article::factory()->create();

        $this->actingAs($admin)
            ->delete(route('admin.articles.destroy', $article))
            ->assertRedirect();

        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_admin_can_create_timeline(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->post(route('admin.timelines.store'), [
                'year' => '1950',
                'title' => 'Peristiwa Tes',
                'description' => 'Deskripsi tes.',
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('timelines', ['title' => 'Peristiwa Tes', 'year' => '1950']);
    }

    public function test_admin_can_create_gallery_with_upload(): void
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)->post(route('admin.galleries.store'), [
            'title' => 'Foto Tes Galeri',
            'category' => 'Interior',
            'year' => '1990',
            'description' => 'Deskripsi.',
            'is_active' => 1,
'image' => $this->fakePng('foto.png'),
            ]);

        $response->assertRedirect();

        $gallery = Gallery::where('title', 'Foto Tes Galeri')->first();
        $this->assertNotNull($gallery);
        Storage::disk('public')->assertExists($gallery->image);
    }

    public function test_admin_can_update_mosque_information(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.mosque-information.update'), [
                'name' => 'Masjid Sumpah Masigit Cilegon',
                'address' => 'Kota Cilegon, Banten',
                'description' => 'Deskripsi baru.',
                'history' => 'Sejarah baru.',
                'architecture' => 'Arsitektur baru.',
                'cultural_value' => 'Nilai budaya baru.',
                'latitude' => '-6.0029',
                'longitude' => '106.0114',
            ])
            ->assertRedirect(route('admin.mosque-information.edit'));

        $this->assertDatabaseHas('mosque_information', ['address' => 'Kota Cilegon, Banten']);
    }

    public function test_admin_can_update_settings(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.settings.update'), [
                'site_name' => 'Nama Baru Website',
                'site_tagline' => 'Tagline Baru',
                'site_description' => 'Deskripsi baru.',
                'hero_title' => 'Hero Baru',
                'hero_subtitle' => 'Subtitle baru.',
                'contact_email' => 'baru@example.com',
                'contact_phone' => '081234567890',
                'contact_address' => 'Alamat baru.',
                'facebook_url' => 'https://facebook.com/masjid',
                'instagram_url' => null,
                'twitter_url' => null,
                'youtube_url' => null,
                'copyright_text' => 'Copyright baru.',
            ])
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertDatabaseHas('settings', ['key' => 'site_name', 'value' => 'Nama Baru Website']);
    }
}