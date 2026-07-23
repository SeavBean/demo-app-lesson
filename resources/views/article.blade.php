
@extends('layout.app')

@section('title', 'Blog Page Title')

@push('page-styles')
<style>
.post-row{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
    justify-content: center
}
.post-title {
  color: red;
}
.post-img {
  width: 20rem;
  height: 24rem;
    object-fit: cover;
}
</style>
@endpush

@section('content')
<div class=".post-row">
  <div class="col-lg-8">
    <!-- Post content-->
    <article>
      <!-- Post header-->
      <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1 post-title">{{ $post->title }}</h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">
          {{ $post->created_at->format('F d, Y') }}
        </div>
        <!-- Post categories-->

        @foreach($post->tags as $tag)
          <a
            class="badge bg-secondary text-decoration-none link-light"
            href="#!"
            > {{ $tag->name }}  </a
          >

        @endforeach
        
      </header>
      <!-- Preview image figure-->
      <figure class="mb-4">
        <img
          class="img-fluid rounded post-img"
          src=" {{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : 'https://via.placeholder.com/900x300?text=No+Image' }} "
          alt="..."
        />
      </figure>
      <!-- Post content-->
      <section class="mb-5">
        {{ $post->content }}
      </section>
    </article>
  </div>
  <!-- Side widgets-->
  <div class="col-lg-4">
    <!-- Search widget-->
    {{-- @include('components.search-form') --}}
    <!-- Tags widget-->
    {{-- @include('components.tag') --}}
  </div>
</div>
@endsection
