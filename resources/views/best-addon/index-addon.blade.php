@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('title')
	Dashboard
@endsection
@section('right_title')
	Best Add-On / Dashboard 
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
	            				
								<tr>
	            				<th rowspan="2">Witel</th>
	            				<td colspan="4" align="center" valign="middle"><b>Minipack</b></td>
	            				<td colspan="4" align="center" valign="middle"><b>STB Tambahan</b></td>
	            				<td colspan="4" align="center" valign="middle"><b>Telepon Mania</b></td>
	            				<td colspan="4" align="center" valign="middle"><b>Upgrade Speed</b></td>
	            				<th rowspan="2">Total</th>
	            				</tr>
	            				<tr>
	            				<th align="center" valign="middle">Jumlah Input</th>
	            				<th align="center" valign="middle">Jumlah Realisasi</th>
	            				<th align="center" valign="middle">Jumlah Target</th>
	            				<th align="center" valign="middle">Jumlah Achievement</th>
	            				<th align="center" valign="middle">Jumlah Input</th>
	            				<th align="center" valign="middle">Jumlah Realisasi</th>
	            				<th align="center" valign="middle">Jumlah Target</th>
	            				<th align="center" valign="middle">Jumlah Achievement</th>
	            				<th align="center" valign="middle">Jumlah Input</th>
	            				<th align="center" valign="middle">Jumlah Realisasi</th>
	            				<th align="center" valign="middle">Jumlah Target</th>
	            				<th align="center" valign="middle">Jumlah Achievement</th>
	            				<th align="center" valign="middle">Jumlah Input</th>
	            				<th align="center" valign="middle">Jumlah Realisasi</th>
	            				<th align="center" valign="middle">Jumlah Target</th>
	            				<th align="center" valign="middle">Jumlah Achievement</th>
	            				</tr>
	            			
	            			</thead>
	            			<tbody>
	            				@if($addon!=null)
	            					@foreach($addon as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							@if($x->witel==null)
	            								<td>0</td>
	            							@else
                        						<td>{{$x->witel}}</td>
                        					@endif

                        					@if($x->total_inpminipack==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_inpminipack}}</td>
                        					@endif
                        					@if($x->total_reminipack==null)
                        						<td>0</td>
                        					@else
	            								<td>{{$x->total_reminipack}}</td>
	            							@endif
	            							@if($x->total_targetminipack==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_targetminipack}}</td>
	            							@endif
	            							 ------
	            							
	            							
	            							@if($x->total_achminipack==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format($x->total_reminipack/$x->total_targetminipack*25/100,2)}} % </td>
	            							@endif
	            							@if($x->total_achminipack==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_achminipack}}</td>
                        					@endif
-----

	            							@if($x->total_inpstb==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_inpstb}}</td>
                        					@endif
                        					@if($x->total_restb==null)
                        						<td>0</td>
                        					@else
	            								<td>{{$x->total_restb}}</td>
	            							@endif
	            							@if($x->total_targetstb==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_targetstb}}</td>
	            							@endif

	            							@if($x->total_achstb==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_achstb}}</td>
	            							@endif
	            							
	            							@if($x->total_inptelepon==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_inptelepon}}</td>
                        					@endif
                        					@if($x->total_retelepon==null)
                        						<td>0</td>
                        					@else
	            								<td>{{$x->total_retelepon}}</td>
	            							@endif
	            							@if($x->total_targettelepon==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_targettelepon}}</td>
	            							@endif
	            							@if($x->total_achtelepon==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_achtelepon}}</td>
	            							@endif
	            							
	            							@if($x->total_inpupspeed==null)
                        						<td>0</td>
                        					@else
                        						<td>{{$x->total_inpupspeed}}</td>
                        					@endif
                        					@if($x->total_reupspeed==null)
                        						<td>0</td>
                        					@else
	            								<td>{{$x->total_reupspeed}}</td>
	            							@endif
	            							@if($x->total_targetupspeed==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_targetupspeed}}</td>
	            							@endif
	            							@if($x->total_achupspeed==null)
	            								<td>0</td>
	            							@else
	            								<td>{{$x->total_achupspeed}}</td>
	            							@endif

	            							@php
	            								$total_achaddon=$x->total_achminipack+$x->total_achstb+$x->total_achtelepon+$x->total_achupspeed;
	            							@endphp
	            							<td>{{$total_achaddon}}</td>
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