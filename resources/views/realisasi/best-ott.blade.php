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
	        </div>
		</div>
		<br>
        <div class="row">
			<div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <strong class="card-title">Data Table {{$tgl}} sampai {{$tgl_akhir}}</strong>
	                </div>
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<!--<th align="center" valign="middle">Id</th>-->
	            				<td align="center" valign="middle"><b>Witel</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Aktivasi Catchplay</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Aktivasi Iflix</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Aktivasi HOOQ</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Aktivasi Movin</b></td>
	            				<td align="center" valign="middle"><b>Jumlah OTT</b></td>
	            				<td align="center" valign="middle"><b>Persentase</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Sales IndiHome DIY</b></td>	
	            				<td align="center" valign="middle"><b>Treshold</b></td>
	            			</thead>
	            			<tbody>
	            				@if($ott!=null)
	            					@foreach($ott as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							@if($x->witel==null)
	            								<td>0</td>
	            							@else
                        						<td>{{$x->witel}}</td>
                        					@endif
                        					@if($x->total_cp==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_cp}}</td>
                        					@endif
                        					@if($x->total_iflix==null)
                        						<td>0</td>
                        					@else
	            								<td>{{$x->total_iflix}}</td>
	            							@endif
	            							@if($x->total_hooq==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_hooq}}</td>
	            							@endif
	            							@if($x->total_movin==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_movin}}</td>
	            							@endif

	            							@php
	            								$total_ott=$x->total_cp+$x->total_iflix+$x->total_hooq+$x->total_movin;
	            							@endphp
	            							<td>{{$total_ott}}</td>
	            							@if($x->total_diy==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format(($total_ott/$x->total_diy),2)}} % </td>
	            							@endif
	            							@if($x->total_diy==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_diy}}</td>
	            							@endif
	            							<td>70%</td>
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