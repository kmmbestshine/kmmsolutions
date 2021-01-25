@extends('layouts.backend.main')

@section('title', 'MyBlog | ' )

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Activities
               
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
                           <form action="{{ route('backend.client.store') }}" method="post">
                                {{ csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="client_no">Client Name*</label>
                                    <select id="client_no" name="client_no" class="form-control" required>
                                                    <option value="">Select Client Name</option>
                                                    @foreach($clients as $client)
                                                    <option value="{{$client->lead_no}}">{{$client->name}}</option>
                                                    @foreach
                                            </select>
                                            
                                </div>
                                
                                <div class="form-group">
                                            <label for="activity_type">Select Activities*</label>
                                            <select name="activity" class="activities form-control" placeholder="Activity Type..." id="activitytype">
                                    <option hidden="true">Select Activity....</option>
                                    <option value="Email">Email</option>
                                    <option value="Call">Call</option>
                                    <option value="Meet">Meet</option>
                                </select>
                                        </div>
                                
                                <div class="form-group">
                                    <label for="status">Status*</label>
                                   <select id="status" name="status" class="form-control" required>
                                        <option value="scheduled">scheduled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sec_mobile">Date*</label>
                                    <input type="date" class="form-control" id="address" name="date" placeholder="Enter Address">
                                    
                                </div>
                                 
                                <div class="form-group" id="clock">
                            <label for="primary_number" class="time" >Time:</label>
                            <div class="">
                  <span>
                     
                  </span></div></div>
                    
                                <div class="form-group">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="landmark">Land Mark</label>
                                    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Land Mark">
                                    
                                </div>
                                
                                
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Customer</button>
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
    <script>
    $('#activitytype').on('change',function(){
           var selection = $(this).val();
           switch(selection){
               case "Call":
                   $("#clock").show()
                   break;
               case "Meet":
                   $("#clock").show()
                   break;
           default:
               $("#clock").hide()
   }
});
    </script>
@endsection

