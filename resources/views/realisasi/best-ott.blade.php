@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('title')
	Best OTT
@endsection
@section('right_title')
	Realisasi / Best OTT
@endsection
@section('content')
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-7">
	            <div class="header-left"><b>Search</b>
	                <div class="form-inline">
	                    <form class="search-form" method="post" action="{{url('searchbestott')}}">
	                        {{csrf_field()}}
	                        <input class="form-control mr-sm-2" type="date" name="cari_tanggal" required>-
	                        <input class="form-control mr-sm-2" type="date" name="cari_akhir" required>
	                        <button class="btn btn-success" type="submit" value="submit" nama="Pencarian"><i class="fa fa-search"></i></button>
	                    </form>
	                </div>
	            </div>
	    <!--        <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Standard Select</strong>
                            </div>
                            <div class="card-body">
                                  <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1">
                                    <option value=""></option>Catchplay
                                    <option value="coba_catch"> <form class="search-form" method="post" action="{{url('/catchplay')}}">
								                        {{csrf_field()}}</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                -->

            <!--        <div class="row form-group">
                            <div class="col col-md-10"><label for="selectSm" class=" form-control-label">Select Small</label></div>
                            <form class="search-form" method="get" nama="blnn" action="{{url('search_hal')}}">
	                        {{csrf_field()}}
                            <div class="col-18 col-md-12">
                              <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                              	 
                                <option value="0">Please select</option>
                                <option value="1">Test</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                                <option value="4">Option #4</option>
                                <option value="5">Option #5</option>
                              </select>
                              <button class="btn btn-success" type="submit" nama="halaman"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                         </div>-->

	        </div>
		</div>
		<br>
        <div class="row">
			<div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <strong class="card-title">Data OTT ({{$tgl}} hingga {{$tgl_akhir}})</strong>
	                </div>
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<!--<th align="center" valign="middle">Id</th>-->
	            				<th align="center" valign="middle">Witel</th>
	            				<td align="center" valign="middle"><b>Jumlah Catchplay</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Iflix</b></td>
	            				<td align="center" valign="middle"><b>Jumlah HOOQ</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Movin</b></td>
	            				<td align="center" valign="middle"><b>Jumlah OTT</b></td>
	            				<th align="center" valign="middle">Persentase</td>
	            				<td align="center" valign="middle"><b>Jumlah Sales IndiHome DIY</b></td>	
	            				<th align="center" valign="middle">Treshold</th>
	            			</thead>
	            			<tbody>
	            				@if($ott!=null)
	            					@foreach($ott as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							@if($x->witel==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
                        						<td align="center" valign="middle">{{$x->witel}}</td>
                        					@endif
                        					@if($x->total_cp==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
                        						<td align="center" valign="middle">{{$x->total_cp}}</td>
                        					@endif
                        					@if($x->total_iflix==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
	            								<td align="center" valign="middle">{{$x->total_iflix}}</td>
	            							@endif
	            							@if($x->total_hooq==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_hooq}}</td>
	            							@endif
	            							@if($x->total_movin==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_movin}}</td>
	            							@endif

	            							@php
	            								$total_ott=$x->total_cp+$x->total_iflix+$x->total_hooq+$x->total_movin;
	            							@endphp
	            							<td align="center" valign="middle">{{$total_ott}}</td>
	            							@if($x->total_diy==0)
	            								<td align="center" valign="middle">0 % </td>
	            							@else
	            								<tdalign="center" valign="middle">{{number_format(($total_ott/$x->total_diy),2)}} % </td>
	            							@endif
	            							@if($x->total_diy==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_diy}}</td>
	            							@endif
	            							<td align="center" valign="middle">70%</td>
	            						</tr>
	            					@endforeach
	            				@endif
	            			</tbody>
	            		</table>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('additional-script')		

    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>                                             
    <script src="{{asset('assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          	$('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection