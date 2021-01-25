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
            
                <!-- Video Start-->
               
            

            <article class="post-item">
               <p ><h4 style="background-color:orange; color:white;" align = "center">About Us</h4></p>
               
                    <div>
                      <p>Bestshine Software Solutions is an Unit Of Bestshine Education Campus Pvt. Ltd. It was founded in 2013 with the aim of revolutionizing today's and tomorrow's Business using advanced Software Technology. We undertake technically challenging projects, capture the core of Business Logic and transform it into Software Applications.</p>
                        <p>Bestshine Software Solutions is one of the leading IT Outsourcing Service Provider based in India,, serving its clients worldwide. We are committed towards providing the reliable and affordable Software Development Outsourcing Services, satisfying our clients. Bestshine Software Solutions is a software Development Company which develops products and provides services which make the task of managing easy for the clients and end users.</p>
                        <p>Support for all the queries that the end users have is provided by Bestshine Software Solutions. The basic needs of all our end users like fast loading, browser compatibility and interactivity are provided by this Software development company. Incorporated in the year 2013, we provide Software Development Outsourcing services like Web Development, Website Design and Development, Product Development, Application Development and Maintenance, Development, Share-point. Our other services are Cloud Technology Services, .NET Outsourcing Service Provider, Microsoft Share-point Service, Open Source Software and many more. Bestshine Software Solutions Software is specialized in providing PHP, LARAVEL Framework Service at the domestic as well as international level and is now expanding in other services too.</p>
                    </div>
                
            </article>
           
            <!-- Video End--> 
            <!-- news pAPER Start-->
            
            
            <article class="post-item">
              <p ><h4 style="background-color:orange; color:white;" align = "center">Vision</h4></p>
                  <div>
                    <p>We provide what we commit is the basic principle that we follow to win the trust of our clients and want to see our customer’s success.</p>
                   
                    </div> 
            </article>
            <article class="post-item">
              <p ><h4 style="background-color:orange; color:white;" align = "center">Mission</h4></p>
                  <div>
                    <p>To Deliver Outstanding IT Services to our customers & support them to provide them correct solution & guidance.</p>
                   
                    </div> 
            </article>
            <article class="post-item">
              <p ><h4 style="background-color:orange; color:white;" align = "center">Objectives</h4></p>
                  <div>
                    <p>Provide IT Outsourcing Services with the flavor of trust and worthiness, helping us to grow more and more and set ourselves a benchmark in the market.</p>
                   
                    </div> 
            </article>

           <!-- NEWS PAPER End--> 
        </div>
        @include('layouts.sidebarabout')
    </div>
</div>

@endsection