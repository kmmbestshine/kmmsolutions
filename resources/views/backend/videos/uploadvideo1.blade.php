@extends('backend.layouts.master')
@section('title')
    Product create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Site Product Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                            <div class="input-group">
                                <a href="{{route('site.product.list')}}" class="btn btn-success">View Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Product</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                    <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('images/logo.jpg') }}" /> Video Upload
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                      <img src="{{ asset('images/stunner.gif') }}" />
                      {{session('success')}}
                    </div>

                    
                @endif

                @if (count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <br /><br />
                <div class="form">
                  
                  <form action="{{route('site.product.postvideo' ,$product->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class="form-group">
                      <label for="title"> Video title </label><br />
                      <input type="text" name="title" id="title" class="form-control" placeholder='Enter title'><br /><br />
                    </div>
                    <div class="form-group">
                      <label for="video"> Video (MP4) </label><br />
                      <input type="file" name="video" id="video" class="form-control" $attributes = array())><br /><br />
                    </div>
                     <div class="form-group">
                               
                                <button type="submit" name="btnCreate" class="btn btn-primary" >Save Product</button>
                            </div>
                    </form>
                </div>

                <br /><br />
                
              {{--  @if (count($videos) > 0)
                  <div class="slider">
                    @foreach ($videos as $video)
                      <div>
                        <a href="" class="video-modal" data-location="{{$video->location}}" data-title="{{$video->title}}" data-toggle="modal" data-target="#videoModal">
                          <img src="{{$video->thumbnail}}" width="150" />
                          <p>{{$video->title}}</p>
                        </a>
                        <p>
                          Duration: {{$video->duration}}<br />
                          Filesize: {{$video->filesize}}<br />
                          Bitrate: {{$video->bitrate}}bps
                        </p>
                      </div>
                    @endforeach
                  </div>

                  <div class="arrows">
                    <span><a class="prev">&lt;&lt; PREVIOUS</a></span>
                    <span class="align-right"><a class="next">NEXT &gt;&gt;</a></span>
                  </div>
                @endif--}}

            </div>
        </div>

        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Scripts -->
      {{--  <script src="{{ mix('js/app.js') }}"></script>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            var $foo = $('#name');
            var $bar = $('#slug');
            function onChange() {
                $bar.val($foo.val().replace(/\s+/g, '-').toLowerCase());
            };
            $('#name')
                .change(onChange)
                .keyup(onChange);
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        // General options
        selector: '#summernote',
        plugins: ['lists advlist',' textcolor'],
       // plugins: ['lists advlist',' textcolor','link image code fullscreen imageupload','uploadimage'],
        //toolbar: "forecolor backcolor",
        //toolbar: 'undo redo | insert | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | imageupload | code | fullscreen | print preview media | forecolor backcolor emoticons | codesample | mybutton',
        toolbar: 'undo redo | insert | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media | forecolor backcolor emoticons | codesample | mybutton',
       // toolbar2: 'print preview media | forecolor backcolor emoticons | codesample | mybutton',
        height : "250"
    });

</script>
<script>
    tinymce.init({
        // General options
        selector: '#summernoteone',
        plugins: ['lists advlist',' textcolor'],
       // plugins: ['lists advlist',' textcolor','link image code fullscreen imageupload','uploadimage'],
        //toolbar: "forecolor backcolor",
        //toolbar: 'undo redo | insert | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | imageupload | code | fullscreen | print preview media | forecolor backcolor emoticons | codesample | mybutton',
        toolbar: 'undo redo | insert | styleselect | fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media | forecolor backcolor emoticons | codesample | mybutton',
       // toolbar2: 'print preview media | forecolor backcolor emoticons | codesample | mybutton',
        height : "250"
    });

</script>
@endsection