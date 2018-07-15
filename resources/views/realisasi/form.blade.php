@extends('layouts.master')
@section('title')
    Best OTT
@endsection
@section('content')

<div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Edit Data</strong> <small> Small Text Mask</small>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Date input</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Witel</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. (999) 999-9999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktifasi Catchplay</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 99-9999999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktifasi Iflix</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 999-99-9999</small>-->
                                </div>
                                
                            </div>
                        </div>
                    </div>
        <div class="col-xs-6 col-sm-6">
            <div class="card">
                    <!--<div class="card-header">-->
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Aktifasi HOOQ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. ~9.99 ~9.99 999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jumlah Sales DIY</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <!--<small class="form-text text-muted">ex. 9999 9999 9999 9999</small>-->
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Threshold</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control">
                                    </div>
                                   <!-- <small class="form-text text-muted">ex. 99/99/9999</small>-->
                                </div>  
                            </div>
                    </div>  
                    <input class="btn btn-success" type="submit" value="Submit">  
            </div> 
        </div>                         



                </div>
                </div>

            </div><!-- .animated -->

        </div><!-- .content -->

    
    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

</body>
</html>
@endsection
