@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Categorys</div>
                <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">name</th>
                        <th scope="col">action</th>
                        
                      </tr>
                      
                    </thead>
                    <tbody>
                    @foreach($categorys as $category)
                      <tr>
                        <td>{{$category->name}}</td>
                        <td>
                          <button type="button" class="btn btn-link btn-sm px-3">
                            <a class="fas fa-times" href="{{route('editCategory',$category->id)}}">Edit</a>
                          </button>
                          <button type="button" class="btn btn-link btn-sm px-3">
                            <a class="fas fa-times" href="{{route('deleteCategory',$category->id)}}">delete</a>
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                    
                </div>
            </div>
        </div>
    </div>
</div



@endsection