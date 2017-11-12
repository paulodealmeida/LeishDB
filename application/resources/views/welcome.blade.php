@extends('layouts.base') @section('content')
<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="section-title text-center center">
            <h2>What is leishDB?</h2>
            <hr>
            <p>LeishDB is a database for leishmania genomic information.</p>
            <p>Currently, it stores data related to coding genes and non-coding RNAs from L. braziliensis.</p>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-university"></i> NCBI genome</h4>
            </div>
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-align-justify"></i> JBrowser</h4>
            </div>
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-clock-o"></i> Coding genes prediction</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-filter"></i> Characterization of predicted coding genes</h4>
            </div>
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-crosshairs"></i> Non coding RNA prediction</h4>
            </div>
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-database"></i> Relational Model Storage</h4>
            </div>
            <div class="col-xs-6 col-md-4">
                <h4>
                    <i class="fa fa-search"></i> Download and acess all data</h4>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div id="statistics" class="text-center">
    <div class="container">
        <div class="section-title text-center center">
            <h2>Statistics</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="statistics-text">
                    <p></p>
                    <p></p>
                    <div class="list-style">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <ul>
                                <li>1 annotated organism (L. braziliensis)</li>
                                <li>11491 predicted ORFs</li>
                                <li>5263 genes with defined function</li>
                                <li>10595 predicted and classified non-coding RNAs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="statistics-text">
                    <h3>Annotations in running</h3>
                    <div class="list-style">
                        <ul class="feature-list list-unstyled">
                            <div class="row">
                                <div class="col-sm-5">
                                    <li>
                                        L. braziliensis
                                        <div class="progress" style="width: 100%;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                100% - Completed.
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-sm-5">
                                    <li>
                                        L. major
                                        <div class="progress" style="width: 100%;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                                                10% - Downloading the files...
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-sm-5">
                                    <li>
                                        L. peruviania
                                        <div class="progress" style="width: 100%;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                0% - Waiting on the queue...
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-sm-5">
                                    <li>
                                        L. panamensis
                                        <div class="progress" style="width: 100%;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                0% - Waiting on the queue...
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-sm-5">
                                    <li>
                                        L. amazonensis
                                        <div class="progress" style="width: 100%;">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                0% - Waiting on the queue...
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Downloads Section -->
<div id="downloads" class="text-center">
    <div class="container">
        <div class="section-title text-center center">
            <h2>Downloads</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Organism</th>
                            <th class="text-center">GFF</th>
                            <th class="text-center">FASTA</th>
                            <th class="text-center">BED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">L. braziliensis (MHOM/BR/75/M2904)</th>
                            <th class="text-center">
                                <a class="btn btn-warning" href="../downloads/gff.zip">Download GFF</a>
                            </th>
                            <th class="text-center">
                                <a class="btn btn-warning" href="http://www.leishdb.com/downloads/fasta.zip">Download FASTA
                                </a>
                            </th>
                            <th class="text-center">
                                <a class="btn btn-warning" href="../downloads/bed.zip">Download BED</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Citing Section -->
<div id="citing" class="text-center">
    <div class="container">
        <div class="col-md-10 col-md-offset-1 section-title">
            <h2>Citing</h2>
            <hr>
            <p>Felipe Torres, Raúl Arias-Carrasco, José C. Caris-Maldonado, Aldina Barral,
                        Vinicius Maracaja-Coutinho, Artur T. L. De Queiroz; LeishDB: a database of coding gene annotation
                        and non-coding RNAs in Leishmania braziliensis. Database (Oxford) 2017;
                        2017 (1): bax047. doi: 10.1093/database/bax047; <a href="https://doi.org/10.1093/database/bax047">[ Link for access] </a> </p>
        </div>
    </div>
</div>
@endsection