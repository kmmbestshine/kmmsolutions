@extends('layouts.backend.main')

@section('title', 'MyBlog | ' . (($form->getModel() ? 'Edit tag' : 'Add new tag')))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tag
                <small>@if($form->getModel()) Edit tag @else Add new tag @endif</small>
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('backend.category.index') }}">Tags</a></li>
                @if($form->getModel())
                <li class="active">Edit</li>
                @else
                <li class="active">Add new</li>
                @endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            {!! form($form) !!}
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
<script>
    $('#name').on('blur', function(){
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                                .replace(/[^a-z0-9-]+/g, '-')
                                .replace(/\-\-+/g, '')
                                .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });
</script>
@endsection