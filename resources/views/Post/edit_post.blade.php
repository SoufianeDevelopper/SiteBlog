@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit post</div>


                <div class="card-body">
                    <form method="POST" action="{{route('updatepost')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-outline mb-4">
                          <label class="form-label" for="form1Example1">Titre</label>
                          <input type="text" id="titre" name="titre" class="form-control" value="{{$post->Title}}" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Categorys</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option value="{{$post->category_id}}" selected>{{$post->category->name}}</option>
                                @foreach ($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Post content</label>
                            <textarea name="body" id="" cols="40" rows="10" class="form-control" value="{{$post->Body}}">{{$post->Body}}</textarea>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example1">Published</label>
                            <select class="form-select" aria-label="Default select example" name="published">
                                <option selected value="0">Published</option>
                                <option selected value="1">Unpublished</option>                   
                              </select>
                        </div>

                        <label class="form-label" for="customFile">Update images</label>
                        <input type="file" class="form-control" id="customFile" name="image" value="{{$post->image}}"/>

                </div>
                      <input type="hidden" name="id" value="{{$post->id}}">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block">Edit</button>
                      </form>

                    
                </div>
            </div>
        </div>
    </div>
</div



@endsection