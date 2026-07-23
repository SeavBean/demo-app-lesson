@extends('layout.app')
@section('title', 'tag create')
@section('content')
    <div class="row">
<div class="d-flex justify-content-between mb-2">
    <h3>Edit tag</h3>
    <a class="btn btn-success" href="{{ route('admin.tag.index') }}" role="button">Back</a>
</div>
<!-- Blog entries-->
<div class="col-lg-12">
    <div class="card p-3">
    <form method="POST" action="{{ route('admin.tag.update', $tag->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">tag</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $tag->name }}"/>
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $tag->phone }}"/>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
</div>
</div>
@endsection