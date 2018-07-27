@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ URL('assets/css/divider.css') }}">
@endsection
@section('title')
	Dashboard AddOn
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
	                    <form class="search-form" method="post" action="{{url('/searchbestaddon')}}">
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
					      <li><a href="{{ URL('/best-addon') }}">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard Addon</a></li>
					      <li><a href="{{ URL('/best-addon/minipack/input') }}">&nbsp;&nbsp;&nbsp;&nbsp;Minipack</a></li>  
					      <li><a href="{{ URL('/best-addon/stb/input') }}">&nbsp;&nbsp;&nbsp;&nbsp;STB Tambahan</a></li>  
					      <li><a href="{{ URL('/best-addon/telepon/input') }}">&nbsp;&nbsp;&nbsp;&nbsp;Telepon Mania</a></li>  
					      <li><a href="{{ URL('/best-addon/upspeed/input') }}">&nbsp;&nbsp;&nbsp;&nbsp;Upgrade Speed</a></li> 
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
	            				<th rowspan="2">Witel</th>
	            				<td colspan="4" align="center" valign="middle"><b>Minipack</b> (25%)</td>
	            				<td colspan="4" align="center" valign="middle"><b>STB Tambahan</b> (35%)</td>
	            				<td colspan="4" align="center" valign="middle"><b>Telepon Mania</b> (15%)</td>
	            				<td colspan="4" align="center" valign="middle"><b>Upgrade Speed</b> (25%)</td>
	            				<th rowspan="2" align="center" valign="middle">Total Achievement</th>
	            				</tr>
	            				<tr>
	            				<td align="center" valign="middle"><b>Jumlah Input</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Realisasi</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Target</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Achievement</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Input</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Realisasi</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Target</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Achievement</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Input</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Realisasi</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Target</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Achievement</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Input</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Realisasi</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Target</b></td>
	            				<td align="center" valign="middle"><b>Jumlah Achievement</b></td>
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

	            							@if($x->total_targetminipack==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format($x->total_reminipack/$x->total_targetminipack*25/100,2)}} % </td>
	            							@endif

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

	            							@if($x->total_targetstb==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format($x->total_restb/$x->total_targetstb*35/100,2)}} % </td>
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

	            							@if($x->total_targettelepon==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format($x->total_retelepon/$x->total_targettelepon*15/100,2)}} % </td>
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

	            							@if($x->total_targetupspeed==0)
	            								<td>0 % </td>
	            							@else
	            								<td>{{number_format($x->total_reupspeed/$x->total_targetupspeed*25/100,2)}} % </td>
	            							@endif

	            							@if($x->total_targetminipack==0 && $x->total_targetstb==0 && $x->total_targettelepon==0 && $x->total_targetupspeed==0)
	            								<td>0 % </td>
	            							@elseif($x->total_targetminipack==0 && $x->total_targetstb==0 && $x->total_targettelepon==0)
	            								<td>{{number_format($x->total_reupspeed/$x->total_targetupspeed*25/100,2)}} % </td>
	            							@elseif($x->total_targetminipack==0 && $x->total_targetstb==0 && $x->total_targetupspeed==0)
	            								<td>{{number_format($x->total_retelepon/$x->total_targettelepon*15/100,2)}} % </td>
	            							@elseif($x->total_targetupspeed==0 && $x->total_targetstb==0 && $x->total_targettelepon==0)
	            								<td>{{number_format($x->total_reminipack/$x->total_targetminipack*25/100,2)}} % </td>
	            							@elseif($x->total_targetminipack==0 && $x->total_targetstb==0)
	            								<td>{{number_format(($x->total_retelepon/$x->total_targettelepon*15/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targetminipack==0 && $x->total_targettelepon==0)
	            								<td>{{number_format(($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targetminipack==0 && $x->total_targetupspeed==0)
	            								<td>{{number_format(($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_retelepon/$x->total_targettelepon*15/100),2)}} % </td>
	            							@elseif($x->total_targetstb==0 && $x->total_targettelepon==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targetstb==0 && $x->total_targetupspeed==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100) +($x->total_retelepon/$x->total_targettelepon*15/100),2)}} % </td>
	            							@elseif($x->total_targetupspeed==0 && $x->total_targettelepon==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100) + ($x->total_restb/$x->total_targetstb*35/100),2)}} % </td>

	            							@elseif($x->total_targetminipack==0)
	            								<td>{{number_format(($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_retelepon/$x->total_targettelepon*15/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targetstb==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100)+ ($x->total_retelepon/$x->total_targettelepon*15/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targettelepon==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100) + ($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
	            							@elseif($x->total_targetupspeed==0)
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100) + ($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_retelepon/$x->total_targettelepon*15/100),2)}} % </td>
	            							@else
	            								<td>{{number_format(($x->total_reminipack/$x->total_targetminipack*25/100) + ($x->total_restb/$x->total_targetstb*35/100)+ ($x->total_retelepon/$x->total_targettelepon*15/100)+($x->total_reupspeed/$x->total_targetupspeed*25/100),2)}} % </td>
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