@extends('layouts.base')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<!--<link rel="stylesheet" type="text/css" href="plugins/DataTables/datatables.min.css"/>-->
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
                            <h3 class="box-title">Results</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="result" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>LeishDB ID</th>
                                        <th>Type</th>
                                        <th>Protein / ncRNA name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($genes as $gene)
                                    <tr>
                                        <td>{!! $gene->id !!}</td>
                                        <td>Coding Gene</td>
                                        <td>
                                            {!! $gene->protein->protein_name !!}
                                            <br>
                                            Genomic location: chr{!! $gene->chromosome_id !!}:{!! $gene->start !!}-{!! $gene->end !!}
                                        </td>

                                        <td>
                                            <a class="btn btn-primary" href="#" title="Download DNA Sequence" target="_blank" role="button">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-primary" href="{!! route('search.show', $gene->id) !!}" title="See more" role="button">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Nada foi encontrado!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
        $('#result').DataTable({
            "lengthChange": false
        });
    });
</script>
@endsection