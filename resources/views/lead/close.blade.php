@extends('layouts.app')

@section('content')
    <div class="content-wrapper pb-0">
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Leads</h4>
                    
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>Lead #</th>
                              <th>Customer Detail</th>
                              <th>Products Detail</th>
                              <th>Doctor Detail</th>
                              <th>Status</th>
                              <th>close Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($leads as $lead)
                            <tr>
                             <td><a href="javascript" data-toggle="modal" data-target="#detailModal" data-whatever="{{$lead->id}}" data-lead="{{ $lead }}" data-doctor="{{ $lead->doctor }}" data-remarks="{{$lead->remarks}}" data-products="{{$lead->products}}">{{ $lead->id }}</a></td>
                              <td>{{ $lead->customer_name }}<br><br>{{ $lead->customer_number }}</td>
                              <td style="white-space: normal;line-height: normal;">@foreach($lead->products as $product) <b>Medi:</b> {{$product->medicine_name}} <b>/ Qty:</b>  {{$product->quantity}}<br>@endforeach</td>
                              <td>{{ $lead->doctor->doctor_name }}<br><br>{{ $lead->doctor->doctor_number }}</td>
                              <td>
                                <label class="badge badge-primary">{{$lead->status->status}}</label>
                              </td>
                              <td>{{$lead->updated_at}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
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
@parent
<script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{ asset('assets') }}/js/data-table.js"></script>
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