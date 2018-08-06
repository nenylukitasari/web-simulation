@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ URL('assets/css/divider.css') }}">
@endsection
@section('title')
	Dashboard Pull Put
@endsection
@section('right_title')
	Best Pull Put / Dashboard 
@endsection
@section('content')
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-7">
	            <div class="header-left"><b>Search</b>
	                <div class="form-inline">
	                    <form class="search-form" method="post" action="{{url('/searchbestpullput')}}">
	                        {{csrf_field()}}
	                        <input class="form-control mr-sm-2" type="date" name="cari_tanggal" required>-
	                        <input class="form-control mr-sm-2" type="date" name="cari_akhir" required>
	                        <button class="btn btn-danger btn-sm" type="submit" value="submit" nama="Pencarian"><i class="fa fa-search"></i></button>
	                    </form>

	                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    <div class="dropdown">
					    <button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown">MENU
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					      <li><a href="{{ URL('/best-pullput') }}">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard Pull Put</a></li>
					      <li><a href="{{ URL('/best-pullput/salespush') }}">&nbsp;&nbsp;&nbsp;&nbsp;Sales Push</a></li>  
					      <li><a href="{{ URL('/best-pullput/salespull') }}">&nbsp;&nbsp;&nbsp;&nbsp;Sales Pull</a></li>  
					      <li><a href="{{ URL('/best-pullput/salesput') }}">&nbsp;&nbsp;&nbsp;&nbsp;Sales Put</a></li>  
					    </ul>
					  </div>

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
	            				<tr>
	            				<td align="center" valign="middle"><b>Witel</b></td>
	            				<td align="center" valign="middle"><b>Sales Push</b></td>
	            				<td align="center" valign="middle"><b>Sales Pull</b></td>
	            				<td align="center" valign="middle"><b>Sales Put</b></td>
	            				<td align="center" valign="middle"><b>Total Sales</b></td>
	            				<td align="center" valign="middle"><b>Persentase</b></td>
	            				</tr>
	            			
	            			</thead>
	            			<tbody>
	            				@if($pullput!=null)
	            					@foreach($pullput as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							@if($x->witel==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
                        						<td align="center" valign="middle">{{$x->witel}}</td>
                        					@endif

                        					@if($x->total_salespush==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
                        						<td align="center" valign="middle">{{$x->total_salespush}}</td>
                        					@endif
                        					@if($x->total_salespull==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
	            								<td align="center" valign="middle">{{$x->total_salespull}}</td>
	            							@endif
	            							@if($x->total_salesput==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_salesput}}</td>
	            							@endif

	            							@php
	            								$total_jmlsales=$x->total_salespush+$x->total_salespull+$x->total_salesput;
	            							@endphp
	            							<td align="center" valign="middle">{{$total_jmlsales}}</td>

	            							@if ($x->total_salesput==0 && $x->total_salespull==0)
	            								<td align="center" valign="middle">0 %</td>
	            							@else
	            								<td align="center" valign="middle">{{number_format(($x->total_salespull+$x->total_salesput)/($x->total_salespush+$x->total_salespull+$x->total_salesput),2)}} % </td>
	            							@endif

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          	$('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection