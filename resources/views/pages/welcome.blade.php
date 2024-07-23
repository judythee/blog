@extends('main')     

@section('title', '| Homepage')

@section('content')        
        <div class="row">
            <div class="col-md-12" >
                <div class="jumbotron" style="background-color: rgb(237, 234, 234); padding:50px">
                    <h1 class="display-4">Welcome to My Blog!!</h1>
                    <p class="lead">Thank you for visiting. This is my test website built with Laravel. Please read my popular post!!.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
                </div>
        </div>  
        {{-- end of header .row  --}} 

        <br>
        <div class="row">
                    <div class="col-md-8">
                        <div class="post">
                            <h1>Post Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta debitis, tempore est iusto veritatis illum, cupiditate repellendus eaque autem sit error qui natus doloribus, quod nemo placeat. Ab, labore non...</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                        <hr class="my-4">
                        <div class="post">
                            <h1>Post Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta debitis, tempore est iusto veritatis illum, cupiditate repellendus eaque autem sit error qui natus doloribus, quod nemo placeat. Ab, labore non...</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                        <hr class="my-4">
                        <div class="post">
                            <h1>Post Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta debitis, tempore est iusto veritatis illum, cupiditate repellendus eaque autem sit error qui natus doloribus, quod nemo placeat. Ab, labore non...</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                        <hr class="my-4">
                        <div class="post">
                            <h1>Post Title</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta debitis, tempore est iusto veritatis illum, cupiditate repellendus eaque autem sit error qui natus doloribus, quod nemo placeat. Ab, labore non...</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                        
                    </div>
                    <div class="col-md-3 offset-md-1" >
                        <h2>Sidebar</h2>
                    </div>
          </div>
@endsection