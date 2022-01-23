@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" >Жанры</h1>
        <section class="featured-posts-section">
            <div class="widget widget-post-list">
                <ul class="post-list">
                    @foreach($categories as $category)
                    <li class="post font-weight-bold text-lg mb-3"><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>

        </section>
    </div>

</main>
@endsection
