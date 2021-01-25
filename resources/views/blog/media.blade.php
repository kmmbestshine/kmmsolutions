@extends('layouts.main')

@section('content')
<div class="container" style="width:800px; margin:0 auto;">
    <div class="row">
        <div class="col-md-10">

             <div class="text-typ-wr">
         <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
                <h1 style="background-color:#0000A0; color:orange;"> <marquee direction="left" > We build Custom Software Development, Web App Development, Mobile App Development and Website Development that users love.</marquee></h1>
            </div>

            

            @include('blog.alert')
           
                <!-- Video Start-->
                <p ><h4 style="background-color:orange; color:white;" align = "center">TV NEWS</h4></p>
            @forelse($tv as $tvadd)

            <article class="post-item">
              <p ><h4 style="background-color:green; color:white;">{{$tvadd->title}}</h4></p>
               
                    <div>
                      
                    <?php
                    //$locatvideo=array();
                    if($tvadd){
                        $titlecount[]=$tvadd->title;
                    $locatvideo[]=$tvadd->location;
                    }
                    
                    ?>
                    <div>
                   <button  onclick="enableAutoplay()" type="button" ><strong style="background-color:blue; color:yellow;"></strong></button>
                    <video id="myVideo" width="430" height="240"  controls >
                      <source src="{{$tvadd->location}}" type="video/mp4">
                      <source src="{{$tvadd->location}}" type="video/ogg">
                   
                    </video>
                    </div>
                  
                             
                     
                    </div>
                
            </article>
            @empty
            <div class="alert alert-warning">
                <p>Nothing Found</p>
            </div>
            @endforelse
            <!-- Video End--> 
            <!-- news pAPER Start-->
            <p ><h4 style="background-color:orange; color:white;" align = "center">NEWS PAPER</h4></p>
            @forelse($newspaper as $newpap)

            <article class="post-item">

              <p ><h4 style="background-color:red; color:white;">{{$newpap->title}}</h4></p>
               
                    
                       @if($newpap->image)
                <div class="post-item-image">
                    <img  src="{{ url('/media') . '/' . $newpap->image }}" alt="">
                </div>
                @endif
          
                
            </article>
            @empty
            <div class="alert alert-warning">
                <p>Nothing Found</p>
            </div>
            @endforelse

           <!-- NEWS PAPER End--> 
        </div>
      <!--  @include('layouts.sidebar')-->
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