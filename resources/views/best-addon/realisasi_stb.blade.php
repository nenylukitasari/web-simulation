@extends('layouts.master')
@section('add-css')
	<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('title')
	STB Tambahan
@endsection
@section('right_title')
	Best Add-On / STB Tambahan / Realisasi
@endsection
@section('content')
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-11">
	            <div class="header-left"><b>Search</b>
	              
	            @php
	            	$tahun=['2018','2019','2020'];
	            @endphp
				<div class="form-inline">
	                    <form class="search-form" method="post" nama="blnn" action="{{url('/searchrealisasistb')}}">
	                        {{csrf_field()}}
						<select name="bln">
							@foreach($tahun as $thnx)
								<option value="{{$thnx}}-01">Januari {{$thnx}}</option>
								<option value="{{$thnx}}-02">Februari {{$thnx}}</option>
								<option value="{{$thnx}}-03">Maret {{$thnx}}</option>
								<option value="{{$thnx}}-04">April {{$thnx}}</option>
								<option value="{{$thnx}}-05">Mei {{$thnx}}</option>
								<option value="{{$thnx}}-06">Juni {{$thnx}}</option>
								<option value="{{$thnx}}-07">Juli {{$thnx}}</option>
								<option value="{{$thnx}}-08">Agustus {{$thnx}}</option>
								<option value="{{$thnx}}-09">September {{$thnx}}</option>
								<option value="{{$thnx}}-10">Oktober {{$thnx}}</option>
								<option value="{{$thnx}}-11">November {{$thnx}}</option>
								<option value="{{$thnx}}-12">Desember {{$thnx}}</option>
							@endforeach
						</select>
	                        <!--<input class="form-control mr-sm-2" type="text" name="bln" required>-->
	                        <button class="btn btn-danger btn-sm" type="submit" value="submit" nama="Pencarian"><i class="fa fa-search"></i></button>
	                    </form>
	                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    <div class="dropdown">
					    <button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown"><b>STB Tambahan</b>
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					      <li><a href="{{ URL('/best-addon') }}">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard AddOn</a></li>
					      <li><a href="{{ URL('/best-addon/stb/input') }}">&nbsp;&nbsp;&nbsp;&nbsp;Input</a></li>
					      <li><a href="{{ URL('/best-addon/stb/realisasi') }}">&nbsp;&nbsp;&nbsp;&nbsp;Realisasi</a></li>  
					  	<li><a href="{{ URL('/best-addon/stb/target') }}">&nbsp;&nbsp;&nbsp;&nbsp;Target</a></li>  
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
	                   <strong class="card-title">Data STB Tambahan bulan ke - {{$bln}}</strong>
	                </div>
	                <div class="card-body">
	          			<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	            			<thead>
	            				<th align="center" valign="middle">Witel</th>
	            				@for($x=1;$x<=$jmlhari;$x++)
	            					<td align="center" valign="middle"><b>{{$x}}</b></td>
	            				@endfor
	            				<th align="center" valign="middle">Total</th>
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
	            								$jml=App\addon::select(DB::raw('SUM(realisasi_stb) as total_restb'))->where('witel',$wit->witel)->groupby('witel')->where('tanggal',$thn."-".$bln."-".$tgl)->first();
	            							?>
	            							@if($jml == null)
	            								<td>0</td>
	            							@else
												<td>{{$jml->total_restb}}</td>
											@endif
			            				@endfor

			            				@if($wit->total_restb==null)
                        						<td align="center" valign="middle">0</td>
                        				@else
                        						<td align="center" valign="middle">{{$wit->total_restb}}</td>
                        				@endif
	            					</tr>
	            				@endforeach      
	            			</tbody>
	            		</table>
	            		@if(Auth::check())
						<div class="content mt-3">
				            <div class="animated fadeIn">

				                <div class="row">

				                    <div class="col-xs-6 col-sm-6">
				                        <div class="card">
				                            <div class="card-header">
				                                <strong>Form Edit Data</strong> 
				                            </div>
				                            <form method="post" action="{{url('/realisasi_stb')}}">
				                                {{csrf_field()}}
				                            	<div class="card-body card-block">
				                                	<div class="form-group">
				                                    
				                                    	<label class=" form-control-label">Date input</label>
				                                    	<div class="input-group">
				                                        	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
				                                        	<input type="date" name="tanggal" class="form-control">
				                                    	</div>
				                                    <!--	<small class="form-text text-muted">ex. 99/99/9999</small>-->
				                                	</div>
					                                <div class="form-group">
					                                    <label class=" form-control-label">Nama Witel</label>
					                                    <div class="input-group">
					                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
					                                        <input type="text" name="witel" class="form-control" onkeyup="this.value = this.value.toUpperCase()">
					                                    </div>

					                                    <!--<small class="form-text text-muted">ex. (999) 999-9999</small>-->
					                                </div>

					                                <div class="form-group">
					                                    <label class=" form-control-label">Jumlah Realisasi STB Tambahan</label>
					                                    <div class="input-group">
					                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
					                                        <input type="text" name="realisasi_stb" class="form-control">
					                                    </div>
					                                    <!--<small class="form-text text-muted">ex. 99-9999999</small>-->
					                                </div>
					                                <input class="btn btn-success" type="submit" value="Submit">	
					                            </div>
					                        </form>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    @endif
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