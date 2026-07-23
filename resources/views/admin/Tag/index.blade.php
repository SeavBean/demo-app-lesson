@extends('layout.app')
@section('title', 'tag list')
@section('content')
<div class="row">
    <div class="d-flex justify-content-between mb-2">
      <h3>Tag List</h3>
      <a class="btn btn-success" href="{{ route('admin.tag.create') }}" role="button"
        >Create</a
      >
    </div>
    <!-- Blog entries-->
    <div class="col-lg-12">
      <div class="card p-3">
        <table
          id="datatable"
          class="table table-striped"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>No</th>
              <th>tag</th>
              <th style="width: 100px">Phone</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach($categories as $tag) --}}
            @foreach ($tags as $tag)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->phone }}</td>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                {{-- <td>{{ $tag->name }}</td> --}}
                <td>
                  <a
                    class="btn btn-primary btn-sm"
                    href="{{ route('admin.tag.edit' ,['id'=>1]) }}"
                    role="button"
                    >Edit</a
                  >
                  <form action="{{ route('admin.tag.delete',   $tag->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button
                      class="btn btn-danger btn-sm"
                      href=""
                      role="button"
                      >Delete
                    </button>
                  </form>
                  
                  
                </td>
                
              </tr>
            @endforeach
              
           
             

          </tbody>
         
        </table>
      </div>
    </div>
  </div>
@endsection