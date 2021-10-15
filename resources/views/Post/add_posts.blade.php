@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a new post</div>


                <div class="card-body">
                    <form method="POST" action="{{route('storedpost')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-outline mb-4">
                          <label class="form-label" for="form1Example1">Titre</label>
                          <input type="text" id="titre" name="titre" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Categorys</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option selected>select your category</option>
                                @foreach ($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Post content</label>
                            <textarea name="body" id="" cols="40" rows="10" class="form-control"></textarea>
                        </div>
                        

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Published</label>
                            <select class="form-select" aria-label="Default select example" name="published">
                                <option selected value="0">Published</option>
                                <option selected value="1">Unpublished</option>                   
                              </select>
                        </div>
                        

                        <label class="form-label" for="customFile">Update images</label>
                        <input type="file" class="form-control" id="customFile" name="image"/>

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