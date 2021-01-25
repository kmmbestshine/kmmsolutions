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
                           <form action="{{ route('backend.lead.store') }}" method="post">
                                {{ csrf_field()}}
                                
                                <div class="form-group">
                                <label for="name" class="">Lead Name:</label>
                                {{--<select class="form-control selectpicker activities" placeholder="" data-live-search="true" name="lead_id">--}}
                                <select name="client_id" class="activities form-control" placeholder="Lead Name..." id="leadname1">
                                    <option>Select Lead....</option>
                                    @foreach($clients as $c)
                                    
                                        <option value="{{$c->id}}">{{$c->name}}&nbsp;({{$c->lead_no}})</option>
                                        <input type="hidden" name="name" value="{{$c->name}}">
                                    <input type="hidden" name="lead_no" value="{{$c->lead_no}}">
                                    <input type="hidden" name="company_name" value="{{$c->company_name}}">
                                    @endforeach
                                </select>

                            </div>
                                
                                <div class="form-group">
                            <label for="name" class="">Activity Type:</label>
                            <div class="">

                                <span>
                                    <select name="activity" class="activities form-control" placeholder="Activity Type..." id="activitytype">
                                                    <option hidden="true">Select Activity....</option>
                                                    <option value="Email">Email</option>
                                                    <option value="Call">Call</option>
                                                    <option value="Meet">Meet</option>
                                                </select>
                                </span>
                                            </div>
                                        </div>
                                
                                 <div class="">
                        <?php $status= array('Scheduled'=>'Scheduled');?>

                        <div class="form-group">

                            <label for="name" class="">Status:</label>
                            <div class="">
                                <span>
                            {!! Form::select('status', $status, null, ['class' => 'form-control  status']) !!}
                                </span></div></div>
                                    </div>
                                <div class="">
                        <?php $clock = array('00:00'=>'00:00','00:30'=>'00:30','01:00'=>'01:00','01:30'=>'01:30','02:00'=>'02:00','02:30'=>'02:30','03:00'=>'03:00','03:30'=>'03:30','04:00'=>'04:00','04:30'=>'04:30','05:00'=>'05:00','05:30'=>'05:30','06:00'=>'06:00','06:30'=>'06:30','07:00'=>'07:00','07:30'=>'07:30','08:00'=>'08:00','08:30'=>'08:30','09:00'=>'09:00','09:30'=>'09:30','10:00'=>'10:00','10:30'=>'10:30','11:00'=>'11:00','11:30'=>'11:30','12:00'=>'12:00','12:30'=>'12:30','13:00'=>'13:00','13:30'=>'13:30','14:00'=>'14:00','14:30'=>'14:30','15:00'=>'15:00','15:30'=>'15:30','16:00'=>'16:00','16:30'=>'16:30','17:00'=>'17:00','17:30'=>'17:30','18:00'=>'18:00','18:30'=>'18:30','19:00'=>'19:00','19:30'=>'19:30','20:00'=>'20:00','20:30'=>'20:30','21:00'=>'21:00','21:30'=>'21:30','22:00'=>'22:00','22:30'=>'22:30','23:00'=>'23:00','23:30'=>'23:30','24:00'=>'24:00');?>
                        <div class="form-group">
                            <label for="primary_number" class="">Date:</label>
                            <div class="">
                  <span>
            {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                      </span></div></div>
                        <div class="form-group" id="clock">
                            <label for="primary_number" class="time" >Time:</label>
                            <div class="">
                  <span>
                      {!! Form::select('time', $clock, null, ['class' => 'form-control ui search selection search-select  time']) !!}
                  </span></div></div>
                    </div>
                    
                                <div class="form-group " >
                        <label for="secondary_number" class="">Details:<font color="red">*</font></label>

                        <input type="input" name="details" rows='3' class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" style="width:100%">

                        {{--<input type="textarea" name="details" class="form-control " rows='3'  style="width:100%" />--}}

                        {{--{!! Form::textarea('details', null, ['class' => 'form-control' , 'rows' => '3','id'=>'tags']) !!}--}}
                    </div>
                                
                                
                                
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Activity</button>
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

