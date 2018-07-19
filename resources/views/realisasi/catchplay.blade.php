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
	                <!--<div class="form-inline">
	                    <form class="search-form" method="post" action="{{url('search')}}">{{-- input ndes --}}
	                        {{csrf_field()}}
	                        <input class="form-control mr-sm-2" type="date" name="cari_tanggal" required>
	                        <button class="btn btn-success" type="submit" value="submit" nama="Pencarian"><i class="fa fa-search"></i></button>
	                    </form>
	                </div>-->
				<div class="form-inline">
	                    <form class="search-form" method="post" nama="cari_bulan" action="{{url('search')}}">{{-- input ndes --}}
	                        {{csrf_field()}}
						<select name="bln">
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option>
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option>
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="12">November</option>
						<option value="12">Desember</option>
						</select>
						
						
						
	                        <!--<input class="form-control mr-sm-2" type="text" name="bln" required>-->
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
	            								$jml=App\ott::select(DB::raw('SUM(catchplay) as total_cp'))->where('witel',$wit->witel)->where('tanggal',$thn."-".$bln."-".$tgl)->groupby('tanggal')->first();
	            							?>
	            							@if($jml == null)
	            								<td>0</td>
	            							@else
												<td>{{$jml->total_cp}}</td>
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