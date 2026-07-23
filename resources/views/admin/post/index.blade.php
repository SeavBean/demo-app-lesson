@extends('layout.app')

@section('title', 'Post List')

@section('content')
<div class="row">
    <div class="d-flex justify-content-between mb-3">
        <h3>Post List</h3>
        <a class="btn btn-success" href="{{ route('admin.post.create') }}" role="button">Create</a>
    </div>

    <div class="col-lg-12">
        <div class="card p-3 shadow-sm">
            <table id="datatable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th style="width: 120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user_id }}</td>
                            <td>{{ Str::limit($post->content, 50) }}</td>
                            <td>
                                @if ($post->thumbnail)
                                    <a href="{{ asset('storage/' . $post->thumbnail) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" width="60px" class="rounded shadow-sm" alt="thumbnail">
                                    </a>
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                {{ $post->category ? $post->category->name : 'No category' }}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm mb-1" href="{{ route('admin.post.edit', $post->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this post?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No posts found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
