@extends('layouts.base') 

@section('style')
<style>
    .progress-bar {
        color: black;
    }
</style>
@endsection

@section('content')
<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>leish
                            <span class="highlight">DB</span>
                        </h1>
                        <p>Integrating Leishmania genomic information.</p>

                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <form action="http://www.leishdb.com/query/actsearch" method="post">
                                    <input type="text" class="form-control ui-autocomplete-input" name="term" id="term" placeholder="Proteins names, UNIPROT ID, ncRNA type, Gene name, LeishDB ID"
                                           required="required" style="border-radius: 10px; height: 60px" autocomplete="off">
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-warning btn-lg page-scroll" target="_blank">Search</button>
                                        <button type="button" class="btn btn-success btn-lg page-scroll" data-toggle="modal" data-target="#advancedSearch">
                                            Advanced Search
                                        </button>
                                        <!--<a href="../index.php?p=blast.php" class="btn btn-cta-secondary" >BLAST</a>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="advancedSearch" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" name="adv" id="adv" action="http://www.leishdb.com/query/actadvsearch">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-left">&nbsp;Select the species:</h5>
                            <select class="form-control" onchange="showExtra()" id="organism" name="organism">
                                <option selected="selected" value="">Select the species</option>
                                <option value="1">Leishmania braziliensis</option>
                            </select>
                        </div>
                        <div id="extra" name="extra" hidden="">
                            <div class="col-md-8">
                                <h5 class="text-left">
                                    <input type="radio" name="advoption" id="advoption" required="required" value="1">&nbsp;Select genes/ncRNAs by genomic coordinates:</h5>
                                <select class="form-control" onchange="onclickChromossome(0)" id="genomeid" name="genomeid">
                                    <option selected="selected" value="">Select the chromossome:</option>
                                </select>
                                <input class="form-control" type="number" name="start" id="start" placeholder="Start position">
                                <input class="form-control" type="number" name="end" id="end" placeholder="End position">
                            </div>
                            <div class="col-md-5">
                                <h5 class="text-left">
                                    <input type="radio" name="advoption" id="advoption" required="required" value="2"> &nbsp;Select ncRNA by type:</h5>
                                <select class="form-control" onchange="onclickChromossome(1)" id="ncrnatype" name="ncrnatype">
                                    <option selected="selected" value="">Select the ncRNA type</option>
                                    <option value="miRNA">miRNA</option>
                                    <option value="snoRNA">snoRNA</option>
                                    <option value="snRNA">snRNA</option>
                                    <option value="rRNA">rRNA</option>
                                    <option value="tRNA">tRNA</option>
                                    <option value="IRES">IRES</option>
                                    <option value="sRNA">sRNA</option>
                                    <option value="piRNA">piRNA</option>
                                    <option value="siRNA">siRNA</option>
                                    <option value="lncRNA">lncRNA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

    </div>
</div>

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
                    <h3>&nbsp;</h3>
                    <div class="row">
                        <p>1 annotated organism (L. braziliensis)</p>
                        <p>11491 predicted ORFs</p>
                        <p>5263 genes with defined function</p>
                        <p>10595 predicted and classified non-coding RNAs</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="statistics-text">
                    <h3>Annotations in running</h3>
                    <div class="row">
                        <div class="col-sm-5">
                            L. braziliensis
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    100% - Completed
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            L. major
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                                    10% - Downloading the files...
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            L. peruviania
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0% - Waiting on the queue...
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            L. panamensis
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0% - Waiting on the queue...
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            L. amazonensis
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    0% - Waiting on the queue...
                                </div>
                            </div>
                        </div>
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
            <div class="col-xs-12 col-md-3">
                <h4>Organism</h4>
                <p>L. braziliensis (MHOM/BR/75/M2904)</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <h4>GFF</h4>
                <p><a class="btn btn-warning" href="../downloads/gff.zip">Download GFF</a></p>
            </div>
            <div class="col-xs-12 col-md-3">
                <h4>FASTA</h4>
                <p><a class="btn btn-warning" href="http://www.leishdb.com/downloads/fasta.zip">Download FASTA</a></p>
            </div>
            <div class="col-xs-12 col-md-3">
                <h4>BED</h4>
                <p><a class="btn btn-warning" href="../downloads/bed.zip">Download BED</a></p>
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
            <p>Felipe Torres, Raúl Arias-Carrasco, José C. Caris-Maldonado, Aldina Barral, Vinicius Maracaja-Coutinho, Artur
                T. L. De Queiroz; LeishDB: a database of coding gene annotation and non-coding RNAs in Leishmania braziliensis.
                Database (Oxford) 2017; 2017 (1): bax047. doi: 10.1093/database/bax047;
                <a href="https://doi.org/10.1093/database/bax047">[ Link for access] </a>
            </p>
        </div>
    </div>
</div>
@endsection