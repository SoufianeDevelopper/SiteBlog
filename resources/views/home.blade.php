@extends('layouts.app')

@section('content')

</div>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">blog</h1>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            @foreach ($posts as $post)   
            @if ($post->published == 0)
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{asset('/images/'.$post->image)}}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$post->created_at}}</div>
                    <h2 class="card-title">{{$post->Title}}</h2>
                    <h2 class="card-title">{{$post->category->name}}</h2>
                    <p class="card-text">{{$post->Body}}</p>
                </div>
            </div>
            @endif
            @endforeach






            <!-- Pagination-->
            <nav aria-label="Pagination">
                {{ $posts->links() }}
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Filter</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-link"><a href="{{route('home')}}">All</a></button>
                                    <button type="button" class="btn btn-link"><a href="{{route('listpostnow')}}">New Posts</a></button>
                                    <button type="button" class="btn btn-link"><a href="{{route('listpostold')}}">Old Posts</a></button>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>


@endsection
