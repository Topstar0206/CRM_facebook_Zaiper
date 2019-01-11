@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> New Lead</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                     <a href="">Lead</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("leads")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['leadsStore'],'method'=>'POST', 'files' => true ])}}

                <div class="form-group row">
                    <label for="vin"
                           class="col-sm-1 form-control-label">Name :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('name','', array('placeholder' => '','class' => 'form-control','id'=>'name','required'=>'')) !!}
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-1 form-control-label">Email :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('email','', array('placeholder' => '','class' => 'form-control','id'=>'email','required'=>'')) !!}
                    </div>
                </div>
         
                <div class="form-group row">
                    <label for="destination"
                           class="col-sm-1 form-control-label">Phone Number :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('phone','', array('placeholder' => '','class' => 'form-control','id'=>'phone','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_name"
                           class="col-sm-1 form-control-label">Doctor Name : </label>
                    <div class="col-sm-11">
                        <select name="user_id" id="user_id" required class="form-control c-select">
                            <option value="">- - Doctor Name - -</option>
                            @foreach ($Users as $User)
                                <option value="{{ $User->id  }}">{{ $User->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>           
   
                
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-1 col-sm-11">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.add') !!}</button>
                        <a href="{{route("leads")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>
                
  
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
