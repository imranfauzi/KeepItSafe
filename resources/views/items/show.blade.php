@extends('/template/main')

@section('title','Items List')


@section('container')
<div class="container mt-3">
 <div class="row">
  <div class="col-10">
    
   <!-- @if(Auth::user()->id == $item->user_id)  -->
      <div class="card mx-auto">
        
          <div class="card-body">
            
            <img class="card-img-top img-fluid" src="{{ url('/images', $item->photo) }}" alt="image">
        
              <h3 class="card-title">{{ $item->name }}</h3>
              <small>Created at: {{ $item->created_at }}</small>
              
              <div class="mt-3">
                  <p class="card-subtitle mb-2 text-muted">Place: {{ $item->place}}</p>
                  <p class="card-subtitle mb-2 text-muted">Description: {{ $item->description }}</p>
                  
                  <a href="{{ $item->id }}/edit" class="btn btn-success btn-small">Edit</a>
                  <form action="{{ url('/items' , $item->id )}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  <a href="{{ url('/items')}}" class="btn btn-default">back</a>
                  
                  
                </div>
            </div>
        </div>
        
        
<!-- @endif -->

  </div>
 </div>
</div>

@endsection
