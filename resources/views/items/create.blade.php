@extends('/template/main')

@section('title','Items List')


@section('container')
<div class="container mt-3">
 <div class="row">
  <div class="col-10">
      <h1>Create Item</h1>
       
      <form method="POST" action="{{ url('/items') }}"  enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="photo">Photo</label>
          <input value="{{ old('photo') }}" type="file" class="form-control" id="photo" aria-describedby="emailHelp" placeholder="Take photo" name="photo">
        </div>


        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter item name" name="name">
        </div>

        <div class="form-group">
            <label for="place">Place</label>
            <input type="text" class="form-control" id="place" aria-describedby="emailHelp" placeholder="Enter item place" name="place">
          </div>
          
        
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" aria-describedby="emailHelp" placeholder="Enter item description" name="description">
          </div>

        <div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



  </div>
 </div>
</div>

@endsection
