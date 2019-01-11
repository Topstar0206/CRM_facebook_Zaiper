@extends('backEnd.layout')

@section('content')
    

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Leads</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a>
                </small>
            </div>

            @if($Leads->total() >0)
                @if(@Auth::user()->permissionsGroup->webmaster_status)
                    <div class="row p-a pull-right" style="margin-top: -70px;">
                        <div class="col-sm-12">
                            <a class="btn btn-fw primary" href="{{route("leadsCreate")}}">
                                <i class="fa fa-plus" style="font-size:70%"></i> <i class="fa fa-users"></i>
                                &nbsp; New Lead
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if($Leads->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            @if(@Auth::user()->permissionsGroup->webmaster_status)
                                <br>
                                <a class="btn btn-fw primary" href="{{route("leadsCreate")}}">
                                    <i class="fa fa-users"></i> 
                                    &nbsp; New Lead
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if($Leads->total() > 0)
                {{Form::open(['route'=>'leadsUpdateAll','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th></th>
                             <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Doctor Name</th>
                           
                            <!-- <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th> -->
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Leads as $Lead)
                            <tr>
                                <td></td>
                                <td>{!! $Lead->name !!}</td>
                                <td><small>{!! $Lead->email !!}</small></td>
                                <td><small>{!! $Lead->phone !!}</small></td>
                                <td>
                                    <small>  
                                         <?php 
                                        $user = DB::table('users')->where('id', $Lead->user_id)->get();
                                         echo  $user[0]->name;
                                        ?>
                                    </small>
                                </td>
                            </tr>
                       
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <footer class="dker p-a">
                    <div class="row">
                  

                        <div class="col-sm-3 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Leads->firstItem() }}
                                -{{ $Leads->lastItem() }} {{ trans('backLang.of') }}
                                <strong>{{ $Leads->total()  }}</strong> {{ trans('backLang.records') }}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Leads->links() !!}
                        </div>
                    </div>
                </footer>
                {{Form::close()}}

                <script type="text/javascript">
                    $("#checkAll").click(function () {
                        $('input:checkbox').not(this).prop('checked', this.checked);
                    });
                    $("#action").change(function () {
                        if (this.value == "delete") {
                            $("#submit_all").css("display", "none");
                            $("#submit_show_msg").css("display", "inline-block");
                        } else {
                            $("#submit_all").css("display", "inline-block");
                            $("#submit_show_msg").css("display", "none");
                        }
                    });
                </script>
            @endif
        </div>
    </div>
 
@endsection
@section('footerInclude')
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endsection
