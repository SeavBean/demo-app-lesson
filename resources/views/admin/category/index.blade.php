@extends('layout.app')
@section('title', 'category list')
@section('content')
<div class="row">
    <div class="d-flex justify-content-between mb-2">
      <h3>Category List</h3>
      <a class="btn btn-success" href="{{ route('admin.category.create') }}" role="button">
        Create
      </a>
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
              <th>Category</th>
              <th style="width: 100px">Phone</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach($categories as $category) --}}
            @foreach ($categories as $category)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->phone }}</td>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                {{-- <td>{{ $category->name }}</td> --}}
                <td>
                  <a
                    class="btn btn-primary btn-sm"
                    href="{{ route('admin.category.edit' ,['id'=>1]) }}"
                    role="button"
                    >Edit</a
                  >
                  <form action="{{ route('admin.category.delete',   $category->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button
                      class="btn btn-danger btn-sm"
                      href=""
                      role="button"
                      >Delete
                    </button>
                  </form>
                  
                  {{-- <form >
                    @method('DELETE')
                    @csrf
                    <button
                      class="btn btn-danger btn-sm"
                      role="button"
                      type="submit"
                      >Delete</button
                    >
                  </form> --}}
                  
                </td>
                
              </tr>
            @endforeach
              
            {{-- @endforeach --}}




             {{-- @foreach($categories as $category) --}}
             

          </tbody>
          {{-- <tfoot>
            <tr>
              <th>No</th>
              <th>Tag</th>
              <th>Phone Number</th>
            </tr>
          </tfoot> --}}
        </table>
      </div>
    </div>
  </div>
@endsection