@extends('layouts.app')

@section('content')
    <div class="content-wrapper pb-0">
      <div class="row">
        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <form class="form-sample" method="post" action="{{route('password',$user->id)}}">
                      <p class="card-description">Edit User Personal info </p>
                      <div class="row">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name" value="{{$user->name}}">
                              @if ($errors->has('name'))
                              <label class="error mt-2 text-danger" for="$errors->has('name')">{{ $errors->first('name') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee Id</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control{{ $errors->has('employeeid') ? ' form-control-danger' : '' }}" name="employeeid" value="{{$user->employeeid}}">
                              @if ($errors->has('employeeid'))
                              <label class="error mt-2 text-danger" for="$errors->has('employeeid')">{{ $errors->first('employeeid') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" disabled="disabled" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{$user->email}}">
                              @if ($errors->has('email'))
                              <label class="error mt-2 text-danger" for="$errors->has('email')">{{ $errors->first('email') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control{{ $errors->has('username') ? ' form-control-danger' : '' }}" name="username" value="{{$user->username}}">
                              @if ($errors->has('username'))
                              <label class="error mt-2 text-danger" for="$errors->has('username')">{{ $errors->first('username') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" name="password">
                              @if ($errors->has('password'))
                              <label class="error mt-2 text-danger" for="$errors->has('password')">{{ $errors->first('password') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Other Mobile No</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control{{ $errors->has('mobile') ? ' form-control-danger' : '' }}" name="mobile" value="{{$user->mobile}}">
                              @if ($errors->has('mobile'))
                              <label class="error mt-2 text-danger" for="$errors->has('mobile')">{{ $errors->first('mobile') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control{{ $errors->has('designation') ? ' form-control-danger' : '' }}" name="designation" value="{{$user->designation}}">
                              @if ($errors->has('designation'))
                              <label class="error mt-2 text-danger" for="$errors->has('mobile')">{{ $errors->first('designation') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Region</label>
                            <div class="col-sm-9">
                              <select class="form-control{{ $errors->has('region_id') ? ' form-control-danger' : '' }}" name="region_id" id="region">
                                <option value="">Select Region..</option>
                                @foreach(App\Models\Region::all() as $department)
                                @php $select = $user->region_id == $department->id ? 'selected=selected' : '' @endphp
                                <option {{$select}} value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('region_id'))
                              <label class="error mt-2 text-danger" for="$errors->has('region_id')">{{ $errors->first('region_id') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row conc">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Conc</label>
                            <div class="col-sm-9">
                              <select class="form-control{{ $errors->has('conc_id') ? ' form-control-danger' : '' }}" name="conc_id" id="conc">
                                <option value="">Select Conc..</option>
                                 @foreach(App\Models\Conc::all() as $department)
                                @php $select = $user->conc_id == $department->id ? 'selected=selected' : '' @endphp
                                <option {{$select}} value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('conc_id'))
                              <label class="error mt-2 text-danger" for="$errors->has('conc_id')">{{ $errors->first('conc_id') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 territory">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Territory</label>
                            <div class="col-sm-9">
                              <select class="form-control{{ $errors->has('territory_id') ? ' form-control-danger' : '' }}" name="territory_id" id="territory">
                                <option value="">Select Territory..</option>
                                 @foreach(App\Models\Territory::all() as $department)
                                @php $select = $user->territory_id == $department->id ? 'selected=selected' : '' @endphp
                                <option {{$select}} value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('territory_id'))
                              <label class="error mt-2 text-danger" for="$errors->has('territory_id')">{{ $errors->first('territory_id') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Rules</label>
                            <div class="col-sm-9">
                              <select class="form-control{{ $errors->has('department_id') ? ' form-control-danger' : '' }}" name="department_id">
                                <option value="">Select Rule..</option>
                                @foreach(App\Models\Department::all() as $department)
                                @php $select = $user->department_id == $department->id ? 'selected=selected' : '' @endphp
                                <option {{$select}} value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('department_id'))
                              <label class="error mt-2 text-danger" for="$errors->has('department_id')">{{ $errors->first('department_id') }}</label>
                              @endif
                            </div>
                          </div>
                        </div>
                        
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
        
      </div>
    </div>
 <!-- content-wrapper ends -->
@endsection
@section('js')
<script src="{{ asset('assets') }}/js/file-upload.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-validation/jquery.validate.min.js"></script>
@parent
<script src="{{ asset('assets') }}/js/form-validation.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#region').change(function(){
      var reg_val = $(this).val();
      if(reg_val){
        $.ajax({
          type:"GET",
          url:"{{url('getconc')}}?region_id="+reg_val,
          dataType: 'json',
          success:function(res){
            if(res){
              $('.conc').show();
              $('.territory').hide();
              $("#conc").empty();
              $("#conc").append('<option value="">Select Conc..</option>');
              $.each(res,function(key,value){
                $("#conc").append('<option value="'+value.id+'">'+value.name+'</option>');
              });
            }
          }
        });
      }
      else {
        $('.conc').hide();
        $("#conc").empty();
        $("#conc").append('<option value="">Select Conc..</option>');
      }
    });
    $('#conc').change(function(){
      var conc_val = $(this).val();
      if(conc_val){
        $.ajax({
          type:"GET",
          url:"{{url('getterritory')}}?conc_id="+conc_val,
          dataType: 'json',
          success:function(res){
            if(res){
              $('.territory').show();
              $("#territory").empty();
              $("#territory").append('<option value="">Select Territory..</option>');
              $.each(res,function(key,value){
                $("#territory").append('<option value="'+value.id+'">'+value.name+'</option>');
              });
            }
          }
        });
      }
      else {
        $('.territory').hide();
        $("#territory").empty();
        $("#territory").append('<option value="">Select Territory..</option>');
      }
    });
  });
</script>
  @if(session('status'))
<script>
    $(document).ready(function() {
      'use strict';
      resetToastPosition();
      $.toast({
        heading: 'Success',
        text: "{{ session('status') }}",
        showHideTransition: 'slide',
        icon: 'success',
        loaderBg: '#f96868',
        position: 'top-right'
    });

      function resetToastPosition() 
      {
      $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
      $(".jq-toast-wrap").css({
        "top": "",
        "left": "",
        "bottom": "",
        "right": ""
      }); //to remove previous position style
  }

        });
    </script>
@endif
@endsection