@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('title')
	Best OTT
@endsection
@section('right_title')
	Simulasi / Best OTT
@endsection
@section('content')
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-7">
	            <div class="header-left"><b>Search</b>
	                <div class="form-inline">
	                    <form class="search-form" method="post" action="{{url('search')}}">{{-- input ndes --}}
	                        {{csrf_field()}}
	                        <input class="form-control mr-sm-2" type="date" name="cari_tanggal" required>
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
	                    <strong class="card-title">Data Table</strong>
	                </div>
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<!--<th align="center" valign="middle">Id</th>-->
	            				<th align="center" valign="middle">Waktu</th>
	            				<th align="center" valign="middle">Witel</th>
	            				<th align="center" valign="middle">Jumlah Aktivasi Catchplay</th>
	            				<th align="center" valign="middle">Jumlah Aktivasi Iflix</th>
	            				<th align="center" valign="middle">Jumlah Aktivasi HOOQ</th>
	            				<th align="center" valign="middle">Jumlah Aktivasi Movin</th>
	            				<th align="center" valign="middle">Jumlah OTT</th>
	            				<th align="center" valign="middle">Persentase</th>
	            				<th align="center" valign="middle">Jumlah Sales IndiHome DIY</th>	
	            				<th align="center" valign="middle">Treshold</th>
	            			</thead>
	            			<tbody>
	            				@if($ott!=null)
	            					@foreach($ott as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							<td>{{$x->tanggal}}</td>
                        					<td>{{$x->witel}}</td>
                        					<td>{{$x->catchplay}}</td>
                       		 				<td>{{$x->iflix}}</td>
                       		 				<td>{{$x->hooq}}</td>
                       		 				<td>{{$x->movin}}</td>
                       		 				<td>{{$x->catchplay+$x->iflix+$x->hooq+$x->movin}}</td>
                       		 				<td>{{number_format(($x->catchplay+$x->iflix+$x->hooq+$x->movin)/$x->salesDIY,2)}} % </td>
	            							<td>{{$x->salesDIY}}</td>
	            							<td>{{$x->treshold}} % </td>
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
	<script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
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