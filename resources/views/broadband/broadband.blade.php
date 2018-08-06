@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('title')
	Dashboard Broadband
@endsection
@section('right_title')
	Realisasi / Best Broadband
@endsection
@section('content')
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-7">
	            <div class="header-left"><b>Search</b>
	                <div class="form-inline">
	                    <form class="search-form" method="post" action="{{url('searchbroadband')}}">
	                        {{csrf_field()}}
	                        <input class="form-control mr-sm-2" type="date" name="cari_tanggal" required>-
	                        <input class="form-control mr-sm-2" type="date" name="cari_akhir" required>
	                        <button class="btn btn-danger btn-sm" type="submit" value="submit" nama="Pencarian"><i class="fa fa-search"></i></button>
	                    </form>
	                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    <div class="dropdown">
					    <button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown"><b>MENU
					    <span class="caret"></span></b></button>
					    <ul class="dropdown-menu">

					      <li><a href="{{ URL('/best-broadband') }}">&nbsp;&nbsp;&nbsp;&nbsp;Broadband</a></li>
					      <li class="divider"></li>
					      <li><a href="{{ URL('/best-broadband/duapuluh') }}">&nbsp;&nbsp;&nbsp;&nbsp;IH 20M</a></li>  
					      <li><a href="{{ URL('/best-broadband/tigapuluh') }}">&nbsp;&nbsp;&nbsp;&nbsp;IH 30M</a></li> 
					      <li><a href="{{ URL('/best-broadband/empatpuluh') }}">&nbsp;&nbsp;&nbsp;&nbsp;IH 40M</a></li> 
					      <li><a href="{{ URL('/best-broadband/limapuluh') }}">&nbsp;&nbsp;&nbsp;&nbsp;IH 50M</a></li> 
					      <li><a href="{{ URL('/best-broadband/seratus') }}">&nbsp;&nbsp;&nbsp;&nbsp;IH 100M</a></li>
					      <li><a href="{{ URL('/best-broadband/totalPS') }}">&nbsp;&nbsp;&nbsp;&nbsp;PS</a></li>
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
	                    <strong class="card-title">Data Broadbband ({{$tgl}} hingga {{$tgl_akhir}})</strong>
	                </div>
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<!--<th align="center" valign="middle">Id</th>-->
	            				<th align="center" valign="middle">Witel</th>
	            				<td align="center" valign="middle"><b>PS IH 20M</b></td>
	            				<td align="center" valign="middle"><b>PS IH 30M</b></td>
	            				<td align="center" valign="middle"><b>PS IH 40M</b></td>
	            				<td align="center" valign="middle"><b>PS IH 50M</b></td>
	            				<td align="center" valign="middle"><b>PS IH 100M</b></td>
	            				<td align="center" valign="middle"><b>Total >=20M</b></td>
	            				<td align="center" valign="middle"><b>Total PS</b></td>
	            				<td align="center" valign="middle"><b>Persentase</b></td>
	            				<td align="center" valign="middle"><b>Treshold</b></td>
	            				
	            			</thead>
	            			<tbody>
	            				@if($broadband!=null)
	            					@foreach($broadband as $x)
	            						<tr>
	            							<!--<td>{{$x->id}}</td>-->
	            							@if($x->witel==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
                        						<td align="center" valign="middle">{{$x->witel}}</td>
                        					@endif
                        					@if($x->total_duapuluh==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
                        						<td align="center" valign="middle">{{$x->total_duapuluh}}</td>
                        					@endif
                        					@if($x->total_tigapuluh==null)
                        						<td align="center" valign="middle">0</td>
                        					@else
	            								<td align="center" valign="middle">{{$x->total_tigapuluh}}</td>
	            							@endif
	            							@if($x->total_empatpuluh==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_empatpuluh}}</td>
	            							@endif
	            							@if($x->total_limapuluh==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_limapuluh}}</td>
	            							@endif
	            							@if($x->total_seratus==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->total_seratus}}</td>
	            							@endif

	            							@php
	            								$total_broadband=$x->total_duapuluh+$x->total_tigapuluh+$x->total_empatpuluh+$x->total_limapuluh+$x->total_seratus;
	            							@endphp
	            							<td align="center" valign="middle">{{$total_broadband}}</td>

	            							@if($x->totalps==null)
	            								<td align="center" valign="middle">0</td>
	            							@else
	            								<td align="center" valign="middle">{{$x->totalps}}</td>
	            							@endif

	            							@if($x->totalps==0)
	            								<td align="center" valign="middle">0 % </td>
	            							@else
	            								<td align="center" valign="middle">{{number_format(($total_broadband/$x->totalps),2)}} % </td>
	            							@endif
	            							<td align="center" valign="middle">30 %</td>
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