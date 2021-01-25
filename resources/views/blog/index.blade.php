@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

             <div class="text-typ-wr">
         <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
                <h1 style="background-color:#0000A0; color:orange;"> <marquee direction="left" > We build Custom Software Development, Web App Development, Mobile App Development and Website Development that users love.</marquee></h1>
            </div>

            @include('blog.alert')

            @forelse($posts as $post)

            <article class="post-item">
                @if($post->image_url)
                <div class="post-item-image">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ $post->image_url }}" alt="">
                    </a>
                </div>
                @endif
     <!-- Video Start-->



              <p ><h4 style="background-color:red; color:white;">VIDEO OVERVIEW</h4></p>
                @foreach ($post->videos as $key => $product1)
                    <div>
                      
                    <?php
                    //$locatvideo=array();
                    if($product1){
                        $titlecount[]=$product1->title;
                    $locatvideo[]=$product1->location;
                    }
                    
                    ?>
                    <div>
                   <button  onclick="enableAutoplay()" type="button" ><strong style="background-color:blue; color:yellow;">{{$product1->title}}</strong></button>
                    <video id="myVideo" width="430" height="240"  controls >
                      <source src="{{$product1->location}}" type="video/mp4">
                      <source src="{{$product1->location}}" type="video/ogg">
                   
                    </video>
                    </div>
                  
                             
                     
                    </div>
                      @endforeach
    <!-- Video End-->       
                <div class="post-item-body">
                    <div class="padding-10">
                        <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                        {!! $post->excerpt_html !!}
                    </div>

                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name }}</a></li>
                                <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a></li>
                                <li><i class="fa fa-tag"></i>{!! $post->tags_html !!}</li>
                                <li><i class="fa fa-comments"></i>
                                    <a href="{{ route('blog.show', $post->slug) }}#comments">{{ $post->comment_count }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('blog.show', $post->slug) }}">Continue Reading &raquo;</a>
                        </div>
                    </div>
                </div>
            </article>
            @empty
            <div class="alert alert-warning">
                <p>Nothing Found</p>
            </div>
            @endforelse

            <nav>
                {{ $posts->appends(request()->only(['term', 'year', 'month']))->links() }}
            </nav>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
<script>
      <!--  var passedArray = $titlecount ; 
        var locatvideo = $locatvideo ; -->
    
        var vid = document.getElementById("myVideo");
        for(var i = 0; i < passedArray.length; i++){ 
            
        function enableAutoplay() { 
          
          document.getElementById('player').setAttribute('src',locatvideo[i]);
          vid.autoplay = true;
          vid.load();

        } 
        } 
        

        function disableAutoplay() { 
          vid.autoplay = false;
          vid.load();
        } 

        function checkAutoplay() { 
          alert(vid.autoplay);
        } 
        </script> 

        <style type="text/css">
    .carousel-inner {
    margin-bottom: 0;
   
    background-position: 0% 25%;
    background-size: cover;
    background-repeat: no-repeat;
    color: white;
    text-shadow: black 0.3em 0.3em .5em;
}
    </style>
@endsection