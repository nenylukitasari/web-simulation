@extends('layouts.master')

@section('title')
    Best OTT
@endsection
@section('right_title')
    Realisasi / Best OTT
@endsection

@section('content')

<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Edit Data</strong> <small> Small Text Mask</small>
                            </div>
                            <form method="post" action="{{url('input')}}">{{-- input ndes --}}
                                            {{csrf_field()}}
                            <div class="card-body card-block">
                                <div class="form-group">
                                    
                                    <label class=" form-control-label">Date input</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Witel</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input type="text" name="witel" class="form-control">
                                    </div>

                                    <!--<small class="form-text text-muted">ex. (999) 999-9999</small>-->
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktivasi Catchplay</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input type="text" name="catchplay" class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 99-9999999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktivasi Iflix</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text" name="iflix" class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 999-99-9999</small>-->
                                </div>
                                
                            </div>
                        </div>
                    </div>
        <div class="col-xs-6 col-sm-6">
            <div class="card">
                    <div class="card-header">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktivasi HOOQ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="text" name="hooq" class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. ~9.99 ~9.99 999</small>-->
                                </div>
                                  <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktivasi Movin</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="text" name="movin" class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. ~9.99 ~9.99 999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Sales DIY</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" name="salesDIY" class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 9999 9999 9999 9999</small>-->                                
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Threshold</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="treshold" class="form-control">
                                    </div>
                                  <!-- <small class="form-text text-muted">ex. 99/99/9999</small>-->
                               </div>  

                            </div>
                    </div>  
                    <input class="btn btn-success" type="submit" value="Submit">  
            </div> 
       </div>  
     </div>
   </div>
   <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection