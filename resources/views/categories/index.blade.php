@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="edica-landing-section edica-landing-about">
                <ul class="landing-about-list">
                    @foreach($categories as $category)
                        <li><a href="{{ route('category.post.index', $category) }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </section>
            <div class="row">
                <div class="mx-auto" style="margin-top: -100px;">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
