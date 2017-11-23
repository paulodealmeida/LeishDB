@extends('layouts.base')

@section('style')
<style>
    /* Layout */
    .wrapper {
        position: relative;
        overflow-x: hidden;
        overflow-y: auto;
        margin: 0 auto;
        min-height: 100%;
        position: relative;
    }
    /*
     * Content Wrapper - contains the main content
     */
    .content-wrapper {
        -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
        margin: 91px 4% 4%;
        min-height: 100%;
    }
    #menu.navbar-default {
        background-color: #17baef !important;
        border-bottom: 1px solid #17baef !important;
    }
</style>
@endsection

@section('content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Blast</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <iframe src="http://regadb.bahia.fiocruz.br:4567/" style="width: 100%; height: 650px" ></iframe>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthChange": false
        });
    });
</script>
@endsection