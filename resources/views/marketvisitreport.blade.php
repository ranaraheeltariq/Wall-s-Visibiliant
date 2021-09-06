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
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-uppercase">Visiting Route</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control{{ $errors->has('visiting_route') ? ' form-control-danger' : '' }}" name="visiting_route" value="{{old('visiting_route')}}" required="required">
                                  @if ($errors->has('visiting_route'))
                                  <label class="error mt-2 text-danger" for="$errors->has('visiting_route')">{{ $errors->first('visiting_route') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-uppercase">Visit With</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control{{ $errors->has('visit_with') ? ' form-control-danger' : '' }}" name="visit_with" value="{{old('visit_with')}}">
                                  @if ($errors->has('visit_with'))
                                  <label class="error mt-2 text-danger" for="$errors->has('visit_with')">{{ $errors->first('visit_with') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-uppercase">Designation</label>
                                <div class="col-sm-8">
                                  <select class="js-example-basic-single form-control{{ $errors->has('visit_with_designation') ? ' form-control-danger' : '' }}" name="visit_with_designation" id="visit_with_designation">
                                    <option value="">SELECT Designation..</option>
                                    <option value="AM">AM</option>
                                    <option value="TM">TM</option>
                                    <option value="VM">VM</option>
                                  </select>
                                  @if ($errors->has('visit_with_designation'))
                                  <label class="error mt-2 text-danger" for="$errors->has('visit_with_designation')">{{ $errors->first('visit_with_designation') }}</label>
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
                                <label class="col-sm-2 col-form-label text-uppercase">Channel</label>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="channel" value="TRADE" > TRADE <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="channel" value="LMT" > LMT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="channel" value="MOBILE"> MOBILE <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="channel" value="OUT OF HOME"> OUT OF HOME <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('channel'))
                                  <label class="error mt-2 text-danger" for="$errors->has('channel')">{{ $errors->first('channel') }}</label>
                                  @endif
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
                                <label class="col-sm-3 col-form-label text-uppercase">Bar Code Scane</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <input type="text" class="form-control{{ $errors->has('bar_code') ? ' form-control-danger' : '' }}" name="bar_code" value="{{old('bar_code')}}" required="required">
                                    <div class="input-group-append">
                                      <button class="btn btn-sm btn-primary" type="button">Scane</button>
                                    </div>
                                  </div>
                                  @if ($errors->has('bar_code'))
                                  <label class="error mt-2 text-danger" for="$errors->has('bar_code')">{{ $errors->first('bar_code') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase">Retailer Type</label>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="retailer_type" id="retailer_type1" value="Economy" > Economy <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="retailer_type" id="retailer_type2" value="Standard" > Standard <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="retailer_type" id="retailer_type3" value="Premium"> Premium <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase">Stock Level</label>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="stock_level" value="0%" > 0% <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="stock_level" value="10% TO 30%" > 10% TO 30% <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-2 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="stock_level" value="30% TO 50%"> 30% TO 50% <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="stock_level" value="50% TO 80%"> 50% TO 80% <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('stock_level'))
                                  <label class="error mt-2 text-danger" for="$errors->has('stock_level')">{{ $errors->first('stock_level') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Cabinet Type</label>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="12CFT HT" > 12CFT HT <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="12CFT VT" > 12CFT VT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="15CFT"> 15CFT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="18CFT"> 18CFT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="SCOOPING"> SCOOPING <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="VERTICAL"> VERTICAL <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_type[]" value="COUNTER TOP"> COUNTER TOP <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('cabinet_type'))
                                  <label class="error mt-2 text-danger" for="$errors->has('cabinet_type')">{{ $errors->first('cabinet_type') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">CABINET CONDITION</label>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios1" value="good" > Good <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios1" value="bad" > Bad <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cabinet_condition" id="membershipRadios2" value="Average" checked="checked"> Average <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Stock Information</h3>
                        <section>
                          <h3>Stock Information</h3>
                          <div class="row">
                            <label class="text-uppercase pl-3">cotc availability</label>
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">JET SPOT</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[JET SPOT]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[JET SPOT]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">CHOC BAR</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[CHOC BAR]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[CHOC BAR]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">CONE DOUBLE</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[CONE DOUBLE]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[CONE DOUBLE]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">FEAST</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[FEAST]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[FEAST]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">ONE MANGO</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[ONE MANGO]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[ONE MANGO]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">0NE KK</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[0NE KK]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[0NE KK]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">DONUT</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[DONUT]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="cotc_availability[DONUT]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                  @if ($errors->has('cotc_availability'))
                                  <label class="error mt-2 text-danger" for="$errors->has('cotc_availability')">{{ $errors->first('cotc_availability') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <label class="text-uppercase pl-3">New Innovation Status</label>
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">CONE BROWNIE</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[CONE BROWNIE]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[CONE BROWNIE]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">DOUBLE TROUBLE</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[DOUBLE TROUBLE]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[DOUBLE TROUBLE]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">JASHAN KULFI</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[JASHAN KULFI]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[JASHAN KULFI]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">MINIONS CONE</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[MINIONS CONE]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[MINIONS CONE]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">MINIONS CUP</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[MINIONS CUP]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[MINIONS CUP]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">ONE CARAMEL</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[ONE CARAMEL]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[ONE CARAMEL]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">ONE COOKIES & CAREEM</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[ONE COOKIES & CAREEM]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="new_innovation_status[ONE COOKIES & CAREEM]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                @if ($errors->has('new_innovation_status'))
                                <label class="error mt-2 text-danger" for="$errors->has('new_innovation_status')">{{ $errors->first('new_innovation_status') }}</label>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">House Keeping</label>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="house_keeping[]" id="pricecard" value="Price Card" > Price Card <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="house_keeping[]" id="membershipRadios1" value="Deicing" > Deicing <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="house_keeping[]" id="membershipRadios2" value="Plannogram"> Plannogram <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                @if ($errors->has('house_keeping'))
                                <label class="error mt-2 text-danger" for="$errors->has('house_keeping')">{{ $errors->first('house_keeping') }}</label>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" id="pricecard_condition">
                                <label class="col-sm-3 col-form-label text-uppercase">Price Card Condition</label>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="price_card_condition" id="membershipRadios1" value="good" > Good <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="price_card_condition" id="membershipRadios1" value="bad" > Bad <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-3 cw">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="price_card_condition" id="membershipRadios2" value="Average" checked="checked"> Average <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                @if ($errors->has('price_card_condition'))
                                <label class="error mt-2 text-danger" for="$errors->has('price_card_condition')">{{ $errors->first('price_card_condition') }}</label>
                                @endif
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Visibility Information</h3>
                        <section>
                          <h3>Visibility Information</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">POSM Deployment</label>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="CONE BROWNIE" > CONE BROWNIE <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="DOUBLE TROUBLE" > DOUBLE TROUBLE <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="JASHAN KULFI"> JASHAN KULFI <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="MINIONS CONE"> MINIONS CONE <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="MINIONS CUP"> MINIONS CUP <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="ONE CARAMEL"> ONE CARAMEL <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input new_innovation_posm" name="new_innovation_posm" value="ONE COOKIES & CAREEM"> ONE COOKIES & CAREEM <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('new_innovation_posm'))
                                  <label class="error mt-2 text-danger" for="$errors->has('new_innovation_posm')">{{ $errors->first('new_innovation_posm') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row" id="posminventory">
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">Bounting</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('bounting') ? ' form-control-danger' : '' }}" name="bounting" value="{{old('bounting')}}">
                                  @if ($errors->has('bounting'))
                                  <label class="error mt-2 text-danger" for="$errors->has('bounting')">{{ $errors->first('bounting') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">Posters</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('posters') ? ' form-control-danger' : '' }}" name="posters" value="{{old('posters')}}">
                                  @if ($errors->has('posters'))
                                  <label class="error mt-2 text-danger" for="$errors->has('posters')">{{ $errors->first('posters') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">Banners</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('banners') ? ' form-control-danger' : '' }}" name="banners" value="{{old('banners')}}">
                                  @if ($errors->has('banners'))
                                  <label class="error mt-2 text-danger" for="$errors->has('banners')">{{ $errors->first('banners') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">POP OUT</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('popout') ? ' form-control-danger' : '' }}" name="popout" value="{{old('popout')}}">
                                  @if ($errors->has('popout'))
                                  <label class="error mt-2 text-danger" for="$errors->has('popout')">{{ $errors->first('popout') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">Woblers</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('woblers') ? ' form-control-danger' : '' }}" name="woblers" value="{{old('woblers')}}">
                                  @if ($errors->has('woblers'))
                                  <label class="error mt-2 text-danger" for="$errors->has('woblers')">{{ $errors->first('woblers') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label pl-1 pr-1 text-uppercase">Price Card</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control p-2{{ $errors->has('pricecard') ? ' form-control-danger' : '' }}" name="pricecard" value="{{old('pricecard')}}">
                                  @if ($errors->has('pricecard'))
                                  <label class="error mt-2 text-danger" for="$errors->has('pricecard')">{{ $errors->first('pricecard') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-uppercase">WALLS VISIBILITY</label>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="FACIA BACK LIT" > FACIA BACK LIT <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="FACIA FRONT LIT" > FACIA FRONT LIT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="COUNTER BRANDING"> COUNTER BRANDING <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="WINDOW GRAPHY"> WINDOW GRAPHY <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="AV SIGN"> AV SIGN <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="walls_visibility[]" value="ANY POSM"> ANY POSM <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('walls_visibility'))
                                  <label class="error mt-2 text-danger" for="$errors->has('walls_visibility')">{{ $errors->first('walls_visibility') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">CABINET PLACEMENT</label>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="BOH" > BOH <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="CHECKOUT"> CHECKOUT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="OUTSIDE SHOPS" > OUTSIDE SHOPS <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="IMPULSE TRIANGLE"> IMPULSE TRIANGLE <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="FROZEN CATEGORY"> FROZEN CATEGORY <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_placement[]" value="RANDOM"> RANDOM <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('cabinet_placement'))
                                  <label class="error mt-2 text-danger" for="$errors->has('cabinet_placement')">{{ $errors->first('cabinet_placement') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-6 col-form-label text-uppercase">Cabinet Position Change</label>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_position_change[FROM]" value="BOH" > BOH <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_position_change[FROM]" value="RANDOM"> RANDOM <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase">TO</label>
                                  <div class="col-sm-5 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_position_change[TO]" value="IMPULSE TRIANGLE"> IMPULSE TRIANGLE <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-5 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="cabinet_position_change[TO]" value="OUTSIDE SHOPS"> OUTSIDE SHOPS <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('cabinet_position_change'))
                                  <label class="error mt-2 text-danger" for="$errors->has('cabinet_position_change')">{{ $errors->first('cabinet_position_change') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-uppercase">COMPETITION</label>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility[]" value="OMORE" > OMORE <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility[]" value="HICO"> HICO <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility[]" value="IGLOO" > IGLOO <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility[]" value="YUMMY"> YUMMY <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility[]" value="OTHER"> OTHER <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('competition_visibility'))
                                  <label class="error mt-2 text-danger" for="$errors->has('competition_visibility')">{{ $errors->first('competition_visibility') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-uppercase">COMPETITION VISIBILITY</label>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="FACIA BACK LIT" > FACIA BACK LIT <i class="input-helper"></i>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="FACIA FRONT LIT" > FACIA FRONT LIT <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="COUNTER BRANDING"> COUNTER BRANDING <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="WINDOW GRAPHY"> WINDOW GRAPHY <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="AV SIGN"> AV SIGN <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  <div class="col-sm-3 cw">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="competition_visibility_type[]" value="ANY POSM"> ANY POSM <i class="input-helper"></i></label>
                                    </div>
                                  </div>
                                  @if ($errors->has('competition_visibility_type'))
                                  <label class="error mt-2 text-danger" for="$errors->has('competition_visibility_type')">{{ $errors->first('competition_visibility_type') }}</label>
                                  @endif
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Verification Information</h3>
                        <section>
                          <h3>Verification Information</h3>
                          <div class="row">
                            <label class="text-uppercase pl-3">Verification</label>
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">TTS</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[TTS]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[TTS]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">Comp. Invoice</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[Comp. Invoice]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[Comp. Invoice]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">TPR Given</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[TPR Given]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[TPR Given]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <label class="col-sm-2 col-form-label text-uppercase cw-25">Demage Stock</label>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[Demage Stock]" value="Yes"> Yes <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-1 cw-25">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="verification[Demage Stock]" value="No" checked="checked"> No <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                @if ($errors->has('verification'))
                                <label class="error mt-2 text-danger" for="$errors->has('verification')">{{ $errors->first('verification') }}</label>
                                @endif
                              </div>
                            </div>
                          </div>
                        </section>
                        <h3>Feed Back Information</h3>
                        <section>
                          <h3>Feed Back Information</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-uppercase">Retailer Contact No</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control{{ $errors->has('retailer_contact') ? ' form-control-danger' : '' }}" name="retailer_contact" value="{{ old('retailer_contact') }}">
                                  @if ($errors->has('retailer_contact'))
                                  <label class="error mt-2 text-danger" for="$errors->has('retailer_contact')">{{ $errors->first('retailer_contact') }}</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <input type="file" name="images[]" id="image" multiple="multiple" class="file-upload-default" accept="image/*" capture="camera">
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
                          <div class="form-group">
                            <label class="text-uppercase">Retailer Feedback</label>
                            <textarea class="form-control{{ $errors->has('retailer_feedback') ? ' form-control-danger' : '' }}" rows="3" name="retailer_feedback">{{old('retailer_feedback')}}</textarea>
                            @if($errors->has('retailer_feedback'))
                            <label class="error mt-2 text-danger" for="$errors->has('retailer_feedback')">{{ $errors->first('retailer_feedback') }}</label>
                            @endif
                          </div>
                          <div class="form-group">
                            <label class="text-uppercase">Remarks</label>
                            <textarea class="form-control{{ $errors->has('remarks') ? ' form-control-danger' : '' }}" rows="3" name="remarks">{{old('remarks')}}</textarea>
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
    $('#pricecard_condition').hide();
    $("#pricecard").on("change", function() {
        if (this.checked) {
            $('#pricecard_condition').show();
        }
        else{
          $('#pricecard_condition').hide();
        }
    });
    $('#posminventory').hide();
    $(".new_innovation_posm").on("change", function() {
      $('#posminventory').show();
    });      

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