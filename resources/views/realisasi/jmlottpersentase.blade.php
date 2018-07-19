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
			<div class="col-sm-11">
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
	           <div class="col-lg-14">
	                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">EDIT</button></div>
	                </div>  
		</div>
		<br>
        <div class="row">
			<div class="col-md-12">
	            <div class="card">
	               <!-- <div class="card-header">
	                   <strong class="card-title">Data Table</strong>
	                </div>-->
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<th align="center" valign="middle">Witel</th>
	            				@for($x=1;$x<=$jmlhari;$x++)
	            					<th align="center" valign="middle">{{$x}}</th>
	            				@endfor
	            			</thead>
	            			<tbody>
	            				@foreach($witel as $wit)
	            					<tr>
	            						<td>{{$wit->witel}}</td>
	            						
	            						@for($x=1;$x<=$jmlhari;$x++)
	            							<?php
	            								if($x<10)
	            								{
	            									$tgl="0".$x;
	            								}
	            								else
	            								{
	            									$tgl=$x;
	            								}
	            								$jml=App\ott::select(DB::raw('SUM(catchplay) as total_cp'),DB::raw('SUM(iflix) as total_iflix'),DB::raw('SUM(hooq) as total_hooq'),DB::raw('SUM(movin) as total_movin'),DB::raw('SUM(salesDIY) as total_diy'))->where('witel',$wit->witel)->where('tanggal',$thn."-".$bln."-".$tgl)->groupby('tanggal')->first();
	            							?>
	            							@if($jml == null)
	            								<td>0</td>
	            							@else
												<td>{{number_format(($jml->total_cp+$jml->total_iflix+$jml->total_hooq+$jml->total_movin)/$jml->total_diy,2)}}</td>
											@endif
			            				@endfor
	            					</tr>
	            				@endforeach
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