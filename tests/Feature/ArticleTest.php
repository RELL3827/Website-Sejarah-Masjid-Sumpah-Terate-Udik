<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_published_article_can_be_viewed(): void
    {
        $article = Article::published()->first();

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee($article->title);
    }

    public function test_draft_article_is_not_publicly_visible(): void
    {
        $draft = Article::where('status', 'draft')->first();

        $this->get(route('articles.show', $draft->slug))
            ->assertNotFound();
    }

    public function test_missing_slug_returns_404(): void
    {
        $this->get(route('articles.show', 'slug-tidak-ada'))
            ->assertNotFound();
    }

    public function test_draft_article_is_not_in_index(): void
    {
        $response = $this->get(route('articles.index'));

        $response->assertOk();

        Article::where('status', 'draft')->each(function ($draft) use ($response) {
            $response->assertDontSee($draft->title);
        });
    }

    public function test_admin_can_see_draft_articles_in_admin_panel(): void
    {
        $admin = User::where('is_admin', true)->firstOrFail();

        $this->actingAs($admin)
            ->get(route('admin.articles.index'))
            ->assertOk();
    }
}