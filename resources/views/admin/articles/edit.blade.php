@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-1">
        <h1 class="admin-h1 mb-0">Edit Artikel</h1>
    </div>
    <p class="text-muted mb-4">
        Slug: <code>{{ $article->slug }}</code> —
        @if ($article->status === 'published')
            <span class="badge bg-success">Published</span>
        @else
            <span class="badge bg-secondary">Draft</span>
        @endif
    </p>

    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.articles._form', ['article' => $article])
    </form>

@endsection