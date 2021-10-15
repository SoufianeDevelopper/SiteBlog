@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category</div>

                <div class="card-body">
                    <form method="POST" action="{{route('storeCategory')}}">
                        @csrf
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form1Example1">Category name</label>
                          <input type="text" id="name" name="name" class="form-control" />
                          
                        </div>
                </div>
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                      </form>

                    
                </div>
            </div>
        </div>
    </div>
</div



@endsection