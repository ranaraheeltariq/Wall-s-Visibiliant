@extends('layouts.app')
@section('css')
@parent
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
@endsection
@section('content')
<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Market Visit Report</h4>
                    <form id="example-form" method="POST" action="{{route('store report')}}" enctype="multipart/form-data">
                      @csrf
                      <div>
                        <h3>Employee Information</h3>
                        <section>
                          <h3 class="mb-4">Employee Information</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">DMR ID</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="employeeid" value="{{$user->employeeid}}" disabled="disabled">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">DMR Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" value="{{$user->name}}" disabled="disabled">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Region</label>
                                <div class="col-sm-9">
                                   <select class="js-example-basic-single form-control{{ $errors->has('region') ? ' form-control-danger' : '' }}" name="region" id="region">
                                    <option value="">Select Region..</option>
                                    @foreach($data['regions'] as $region)
                                    @php $select = $user->region_id == $region->id ? 'selected=selected' : '' @endphp
                                    <option {{$select}} value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                  </select>
                                   @if ($errors->has('region'))
                                   <label class="error mt-2 text-danger" for="$errors->has('region')">{{ $errors->first('region') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 conc">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Conc</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-single form-control{{ $errors->has('conc') ? ' form-control-danger' : '' }}" name="conc" id="conc">
                                    <option value="">Select Conc..</option>
                                    @foreach($data['concs'] as $conc)
                                    @php $select = $user->conc_id == $conc->id ? 'selected=selected' : '' @endphp
                                    <option {{$select}} value="{{$conc->id}}">{{$conc->name}}</option>
                                    @endforeach
                                  </select>
                                   @if ($errors->has('conc'))
                                   <label class="error mt-2 text-danger" for="$errors->has('conc')">{{ $errors->first('conc') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 territory">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Territory</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-single form-control{{ $errors->has('territory_id') ? ' form-control-danger' : '' }}" name="territory_id" id="territory">
                                    <option value="">Select Territory..</option>
                                    @foreach($data['territories'] as $territory)
                                    @php $select = $user->territory_id == $territory->id ? 'selected=selected' : '' @endphp
                                    <option {{$select}} value="{{$territory->id}}">{{$territory->name}}</option>
                                    @endforeach
                                  </select>
                                   @if ($errors->has('territory_id'))
                                   <label class="error mt-2 text-danger" for="$errors->has('territory_id')">{{ $errors->first('territory_id') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Visiting Area</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('visiting_area') ? ' form-control-danger' : '' }}" name="visiting_area" value="{{ old('visiting_area') }}" required="required">
                                  @if ($errors->has('visiting_area'))
                                  <label class="error mt-2 text-danger" for="$errors->has('visiting_area')">{{ $errors->first('visiting_area') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Visiting Route</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('visiting_route') ? ' form-control-danger' : '' }}" name="visiting_route" value="{{old('visiting_route')}}" required="required">
                                  @if ($errors->has('visiting_route'))
                                  <label class="error mt-2 text-danger" for="$errors->has('visiting_route')">{{ $errors->first('visiting_route') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">TM Market Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('tm_market_name') ? ' form-control-danger' : '' }}" name="tm_market_name" value="{{old('tm_market_name')}}" required="required">
                                  @if ($errors->has('tm_market_name'))
                                  <label class="error mt-2 text-danger" for="$errors->has('tm_market_name')">{{ $errors->first('tm_market_name') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Retailer Information</h3>
                        <section>
                          <h3 class="mb-4">Retailer Information</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Channel</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-single form-control{{ $errors->has('channel') ? ' form-control-danger' : '' }}" name="channel">
                                    <option value="">Select Channel..</option>
                                    <option value="TRADE">TRADE</option>
                                    <option value="LMT">LMT</option>
                                    <option value="MOBILE">MOBILE</option>
                                    <option value="OUT OF HOME">OUT OF HOME</option>
                                  </select>
                                  @if ($errors->has('channel'))
                                  <label class="error mt-2 text-danger" for="$errors->has('channel')">{{ $errors->first('channel') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Retailer</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('retailer') ? ' form-control-danger' : '' }}" name="retailer" value="{{old('retailer')}}" required="required">
                                  @if ($errors->has('retailer'))
                                  <label class="error mt-2 text-danger" for="$errors->has('retailer')">{{ $errors->first('retailer') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Retailer Code</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('retailer_code') ? ' form-control-danger' : '' }}" name="retailer_code" value="{{old('retailer_code')}}" required="required">
                                  @if ($errors->has('retailer_code'))
                                  <label class="error mt-2 text-danger" for="$errors->has('retailer_code')">{{ $errors->first('retailer_code') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Stock Level</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-single form-control{{ $errors->has('stock_level') ? ' form-control-danger' : '' }}" name="stock_level">
                                    <option value="">Select stock level..</option>
                                    <option value="0%">0%</option>
                                    <option value="10% TO 30%">10% TO 30%</option>
                                    <option value="30% TO 50%">30% TO 50%</option>
                                    <option value="50% TO 80%">50% TO 80%</option>
                                  </select>
                                  @if ($errors->has('stock_level'))
                                  <label class="error mt-2 text-danger" for="$errors->has('stock_level')">{{ $errors->first('stock_level') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Cabinet Type</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('stock_level') ? ' form-control-danger' : '' }}" multiple="multiple" name="cabinet_type[]">
                                    <option value="12CFT HT">12CFT HT</option>
                                    <option value="12CFT VT">12CFT VT</option>
                                    <option value="15CFT">15CFT</option>
                                    <option value="18CFT">18CFT</option>
                                    <option value="SCOOPING">SCOOPING</option>
                                    <option value="VERTICAL">VERTICAL</option>
                                  </select>
                                   @if ($errors->has('cabinet_type'))
                                   <label class="error mt-2 text-danger" for="$errors->has('cabinet_type')">{{ $errors->first('cabinet_type') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">CABINET CONDITION</label>
                                <div class="col-sm-3">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios1" value="good" > Good <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios1" value="bad" > Bad <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios2" value="Average"> Average <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">cotc availability</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('stock_level') ? ' form-control-danger' : '' }}" multiple="multiple" name="cotc_availability[]">
                                    <option value="JET SPOT">JET SPOT</option>
                                    <option value="12CFT VT">CHOC BAR</option>
                                    <option value="CONE DOUBLE">CONE DOUBLE</option>
                                    <option value="FEAST">FEAST</option>
                                    <option value="ONE MANGO">ONE MANGO</option>
                                    <option value="0NE KK">0NE KK</option>
                                    <option value="POP CONE">POP CONE</option>
                                    <option value="DONUT">DONUT</option>
                                  </select>
                                   @if ($errors->has('cotc_availability'))
                                   <label class="error mt-2 text-danger" for="$errors->has('cotc_availability')">{{ $errors->first('cotc_availability') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">New Innovation Status</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('new_innovation_status') ? ' form-control-danger' : '' }}" multiple="multiple" name="new_innovation_status[]">
                                    <option value="CONE BROWNIE">CONE BROWNIE</option>
                                    <option value="DOUBLE TROUBLE">DOUBLE TROUBLE</option>
                                    <option value="JASHAN KULFI">JASHAN KULFI</option>
                                    <option value="MINIONS CONE">MINIONS CONE</option>
                                    <option value="ONE MANGO">MINIONS CUP</option>
                                    <option value="ONE CARAMEL">ONE CARAMEL</option>
                                    <option value="ONE COOKIES & CAREEM">ONE COOKIES & CAREEM</option>
                                  </select>
                                   @if ($errors->has('new_innovation_status'))
                                   <label class="error mt-2 text-danger" for="$errors->has('new_innovation_status')">{{ $errors->first('new_innovation_status') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Retailer Information</h3>
                        <section>
                          <h3>Retailer Information</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">New Innovation POSM</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('new_innovation_posm') ? ' form-control-danger' : '' }}" multiple="multiple" name="new_innovation_posm[]">
                                    <option value="CONE BROWNIE">CONE BROWNIE</option>
                                    <option value="DOUBLE TROUBLE">DOUBLE TROUBLE</option>
                                    <option value="JASHAN KULFI">JASHAN KULFI</option>
                                    <option value="MINIONS CONE">MINIONS CONE</option>
                                    <option value="ONE MANGO">MINIONS CUP</option>
                                    <option value="ONE CARAMEL">ONE CARAMEL</option>
                                    <option value="ONE COOKIES & CAREEM">ONE COOKIES & CAREEM</option>
                                  </select>
                                   @if ($errors->has('new_innovation_posm'))
                                   <label class="error mt-2 text-danger" for="$errors->has('new_innovation_posm')">{{ $errors->first('new_innovation_posm') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">WALLS VISIBILITY</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('walls_visibility') ? ' form-control-danger' : '' }}" multiple="multiple" name="walls_visibility[]">
                                    <option value="PRICE CARD">PRICE CARD</option>
                                    <option value="DEICING">DEICING</option>
                                    <option value="PLANNOGRAM IMPLEMENTATION">PLANNOGRAM IMPLEMENTATION</option>
                                    <option value="FACIA BACK LIT">FACIA BACK LIT</option>
                                    <option value="FACIA FRONT LIT">FACIA FRONT LIT</option>
                                    <option value="COUNTER BRANDING">COUNTER BRANDING</option>
                                    <option value="COUNTER BRANDING">COUNTER BRANDING</option>
                                    <option value="WINDOW GRAPHY">WINDOW GRAPHY</option>
                                    <option value="AV SIGN">AV SIGN</option>
                                    <option value="ANY POSM">ANY POSM</option>
                                  </select>
                                   @if ($errors->has('walls_visibility'))
                                   <label class="error mt-2 text-danger" for="$errors->has('walls_visibility')">{{ $errors->first('walls_visibility') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">CABINET PLACEMENT</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('cabinet_placement') ? ' form-control-danger' : '' }}" multiple="multiple" name="cabinet_placement[]">
                                    <option value="BOH">BOH</option>
                                    <option value="OUTSIDE SHOPS">OUTSIDE SHOPS</option>
                                    <option value="CHECKOUT">CHECKOUT</option>
                                    <option value="IMPULSE TRIANGLE">IMPULSE TRIANGLE</option>
                                    <option value="FROZEN CATEGORY">FROZEN CATEGORY</option>
                                    <option value="RANDOM">RANDOM</option>
                                  </select>
                                   @if ($errors->has('cabinet_placement'))
                                   <label class="error mt-2 text-danger" for="$errors->has('cabinet_placement')">{{ $errors->first('cabinet_placement') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">COMPETITION</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('competition_visibility') ? ' form-control-danger' : '' }}" multiple="multiple" name="competition_visibility[]">
                                    <option value="OMORE">OMORE</option>
                                    <option value="HICO">HICO</option>
                                    <option value="IGLOO">IGLOO</option>
                                    <option value="YUMMY">YUMMY</option>
                                    <option value="OTHER">OTHER</option>
                                  </select>
                                   @if ($errors->has('competition_visibility'))
                                   <label class="error mt-2 text-danger" for="$errors->has('competition_visibility')">{{ $errors->first('competition_visibility') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">COMPETITION VISIBILITY</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-multiple form-control{{ $errors->has('competition_visibility_type') ? ' form-control-danger' : '' }}" multiple="multiple" name="competition_visibility_type[]">
                                    <option value="FACIA FRONT LIT">FACIA FRONT LIT</option>
                                    <option value="COUNTER BRANDING">COUNTER BRANDING</option>
                                    <option value="PILLAR BRANDING">PILLAR BRANDING</option>
                                    <option value="AV SIGN">AV SIGN</option>
                                    <option value="POSM">POSM</option>
                                    <option value="WINDOW GRAPHY">WINDOW GRAPHY</option>
                                  </select>
                                   @if ($errors->has('competition_visibility_type'))
                                   <label class="error mt-2 text-danger" for="$errors->has('competition_visibility_type')">{{ $errors->first('competition_visibility_type') }}</label>
                                   @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <input type="file" name="images" id="image" class="file-upload-default" accept="image/*" capture="camera">
                                <div class="input-group col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('image') ? ' form-control-danger' : '' }} file-upload-info" disabled placeholder="Images Upload">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                  </span>
                                </div>
                                 @if($errors->has('images'))
                                 <label class="error mt-2 text-danger" for="$errors->has('images')">{{ $errors->first('images') }}</label>
                               @endif
                             </div>
                           </div>
                          </div>
                        </section>
                        <h3>Finish</h3>
                        <section>
                          <h3>Finish</h3>
                          <div class="form-group">
                            <label class="text-uppercase">Remarks</label>
                            <textarea class="form-control{{ $errors->has('remarks') ? ' form-control-danger' : '' }}" rows="3" name="remarks">{{old('visiting_route')}}</textarea>
                            @if($errors->has('remarks'))
                            <label class="error mt-2 text-danger" for="$errors->has('remarks')">{{ $errors->first('remarks') }}</label>
                            @endif
                          </div>
                        </section>
                      </div>
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
<script src="{{ asset('assets') }}/vendors/jquery-steps/jquery.steps.min.js"></script>
<script src="{{ asset('assets') }}/vendors/select2/select2.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-validation/jquery.validate.min.js"></script>
@parent
<!-- Custom js for this page -->
<script src="{{ asset('assets') }}/js/wizard.js"></script>
<script src="{{ asset('assets') }}/js/select2.js"></script>
<script src="{{ asset('assets') }}/js/form-validation.js"></script>
<!-- End custom js for this page -->
<script type="text/javascript">
  $(document).ready(function() {
    if($('#conc').val() == '')
    {
      $("#conc").empty();
      $("#conc").append('<option value="">Select Conc..</option>');
    }
    if($('#conc').val() == '' && $('#territory').val() == ''){
      $("#territory").empty();
      $("#territory").append('<option value="">Select Territory..</option>');
      $('#conc').change(function(){
        var conc_val = $(this).val();
        if(conc_val){
          $.ajax({
            type:"GET",
            url:"{{url('getterritory')}}?conc_id="+conc_val,
            dataType: 'json',
            success:function(res){
              if(res){
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
          $("#territory").empty();
          $("#territory").append('<option value="">Select Territory..</option>');
        }
      });
    }
    if($('#region').val() == ''){
      $('#region').change(function(){
        var reg_val = $(this).val();
        if(reg_val){
          $.ajax({
            type:"GET",
            url:"{{url('getconc')}}?region_id="+reg_val,
            dataType: 'json',
            success:function(res){
              if(res){
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
          $("#conc").empty();
          $("#conc").append('<option value="">Select Conc..</option>');
        }
      });
    }
    else if($('#region').val() != '' && $('#conc').val() == ''){
      var reg_val = $('#region').val();
          $.ajax({
            type:"GET",
            url:"{{url('getconc')}}?region_id="+reg_val,
            dataType: 'json',
            success:function(res){
              if(res){
                $("#conc").empty();
                $("#conc").append('<option value="">Select Conc..</option>');
                $.each(res,function(key,value){
                  $("#conc").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
              }
            }
          });
    }
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