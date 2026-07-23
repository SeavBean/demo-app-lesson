<div class="card mb-4">
    <div class="card-header">Tags</div>
    <div class="card-body">
      <div class="row">
        @foreach ($slidebar_tags as $slidebar_tag)
          <div class="col-sm-6">
            <a href="{{ route('home', ['tag_id'=>$slidebar_tag->id]) }}">{{ $slidebar_tag->name }}</a>
          </div>
        @endforeach
        
      </div>
    </div>
</div>