@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')

    <h1 class="admin-h1 mb-1">Tambah Artikel</h1>
    <p class="text-muted mb-4">Tulis artikel sejarah baru. Slug dibuat otomatis berdasarkan judul.</p>

    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.articles._form', ['article' => null])
    </form>

@endsection