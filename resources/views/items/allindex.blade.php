@extends('template.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">

            <form class="form-inline  my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

               <div class="col-6 mt-3">
                <a href="{{ url('/items/create') }}" class="btn btn-success btn-small">New Item</a>
            </div>
            
               
            <div class="card mt-3 ">
                <div class="card-header bg-secondary text-light">Dashboard</div>                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($items)>0)
                    <ul class="list-group">
                
                        @foreach($items as $item)

                        <div class="mt-3">
                        <li class="list-group-item justify-content-between align-items-center list-group-item-action">
                            {{$item->name}}
                            
                            <a  href="{{ url('items', $item->id) }}" class="float-right">
                                <span class="badge badge-pill badge-info">Details</span>
                            </a>
                        
                        </li>
                        </div>
                        
                        @endforeach
                        
                    </ul>
                
                    @else
                        <p>No items found</p>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
