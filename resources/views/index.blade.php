@extends('layout.app')

@section('title', 'Homepage Title')

@push('page-styles')
    <style>
        .post-item-image {
            height: 230px;
            object-fit: cover;
        }
        .post-item-content {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
                    line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <h1>Welcome to the Homepage</h1>
        <p>This is the content of the homepage.</p>

        <div class="row">
            <!-- Blog entries -->
            <div class="col" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                @forelse ($posts as $post)
                    <div class="col">
                        <div class="card mb-4">
                            <a href="{{ route('article', ['id' => $post->id]) }}">
                                <img
                                    class="card-img-top post-item-image"
                                    src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                                    alt="{{ $post->title }}" />
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">{{ $post->created_at->format('F d, Y') }}</div>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text post-item-content">{{ $post->excerpt ?? '' }}</p>
                                <a class="btn btn-primary" href="{{ route('article', ['id' => $post->id]) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No posts found.</p>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{ $posts->links() }}
            </ul>
        </nav>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        @include('components.search')
        @include('components.tag')
    </div>

@endsection