@extends('layouts.app')
@section('css')
@parent
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
@endsection
@section('content')
    <div class="content-wrapper pb-0">
           <div class="card">
                  <div class="row">
              <div class="col-sm-12 stretch-card grid-margin">
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card border-0">
                        <div class="card-body">
                          <div class="card-title"> Download Market Visit Report </div>
                          <form method="POST" action="{{route('download report')}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                    <select class="js-example-basic-single form-control" name="region_id">
                                      <option value="">Select Region..</option>
                                      @foreach($data['regions'] as $teritory)
                                      @php $select = Auth::user()->region_id == $teritory->id ? 'selected=selected' : '' @endphp
                                      <option value="{{$teritory->id}}" {{ $select }}>{{$teritory->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <select class="js-example-basic-single form-control" name="conc_id">
                                      <option value="">Select Conc..</option>
                                      @foreach($data['concs'] as $teritory)
                                      @php $select = Auth::user()->conc_id == $teritory->id ? 'selected=selected' : '' @endphp
                                      <option value="{{$teritory->id}}" {{ $select }}>{{$teritory->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                    <select class="js-example-basic-single form-control" name="territory_id">
                                      <option value="">Select Territory..</option>
                                      @foreach($data['territories'] as $teritory)
                                      @php $select = Auth::user()->territory_id == $teritory->id ? 'selected=selected' : '' @endphp
                                      <option value="{{$teritory->id}}" {{ $select }}>{{$teritory->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="input-group input-daterange d-flex align-items-center">
                                  <input type="text" name="from" class="form-control{{ $errors->has('from') ? ' form-control-danger' : '' }}" data-date-format='yyyy-mm-dd' value="2012-04-05">
                                    @if ($errors->has('from'))
                                    <label class="error mt-2 text-danger" for="$errors->has('from')">{{ $errors->first('from') }}</label>
                                    @endif
                                  <div class="input-group-addon mx-4">to</div>
                                  <input type="text" name="to" class="form-control{{ $errors->has('to') ? ' form-control-danger' : '' }}" data-date-format='yyyy-mm-dd' value="2012-04-19">
                                    @if ($errors->has('to'))
                                    <label class="error mt-2 text-danger" for="$errors->has('to')">{{ $errors->first('to') }}</label>
                                    @endif
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
              </div>
            </div>
                </div>



          </div>
          <!-- content-wrapper ends -->
@endsection
@section('js')
<script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('assets') }}/vendors/select2/select2.min.js"></script>
@parent
    <script src="{{ asset('assets') }}/js/formpickers.js"></script>
    <script src="{{ asset('assets') }}/js/select2.js"></script>
@if(session('Message'))
<script>
    $(document).ready(function() {
      'use strict';
      resetToastPosition();
      $.toast({
        heading: 'Warning',
        text: "{{ session('Message') }}",
        showHideTransition: 'slide',
        icon: 'warning',
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