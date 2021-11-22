@extends('/template/main')

@section('title','Items List')


@section('container')
<div class="container mt-3">
 <div class="row">
  <div class="col-10">
    
    
      <div class="card mx-auto">
          <img class="card-img-top">
          <div class="card-body">
              <h3 class="card-title">{{ $item->name }}</h3>
              <small>Created at: {{ $item->created_at }}</small>
              
              <div class="mt-3">
                  <p class="card-subtitle mb-2 text-muted">Place: {{ $item->place}}</p>
                  <p class="card-subtitle mb-2 text-muted">Description: {{ $item->description }}</p>
                  </form>
                  <a href="{{ url('/items')}}" class="btn btn-default">back</a>
                  
                  
                </div>
            </div>
        </div>
        
        
@endif

  </div>
 </div>
</div>

@endsection
