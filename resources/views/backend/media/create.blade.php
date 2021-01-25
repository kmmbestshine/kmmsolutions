@extends('layouts.backend.main')

@section('title', 'MyBlog | ' )

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
               
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('backend.client.index') }}">All Cients</a></li>
               
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                           <form action="{{ route('backend.media.store') }}" method="post" enctype="multipart/form-data">
                                
                    {{ csrf_field()}}
                    <div class="form-group">
                      <label for="type"> Type </label><br />
                      <select name="type" id="media">
                              <option value="video">Video</option>
                              <option value="image">Image</option>
                              <option value="meeting">Meeting</option>
                              <option value="others">Others</option>
                            </select>
                      <br /><br />
                    </div>
                    <div class="form-group">
                      <label for="title"> Video title </label><br />
                      <input type="text" name="title" id="title" class="form-control" placeholder='Enter title'><br /><br />
                    </div>
                    <div class="form-group">
                      <label for="video"> Video (MP4) </label><br />
                      <input type="file" name="video" id="video" class="form-control" $attributes = array())><br /><br />
                    </div>
                    <div class="form-group">
                                <label for="image">Media Image</label>
                                <input type="file" name="image" id="image" class="form-control"><br /><br />
                            </div>
                     <div class="form-group">
                               
                                <button type="submit" name="btnCreate" class="btn btn-primary" >Save media</button>
                            </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')

@endsection