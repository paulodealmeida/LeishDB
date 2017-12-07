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
                            <h3 class="box-title">Gene 2584 - TATE DNA Transposon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="#" class="btn btn-primary btn-lg active"
                               role="button">Sequence download</a>
                            <h4>Genomic information</h4>
                            <table class="table table-bordered" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">LeishDB ID:</td>
                                        <td>2584</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">Gene name:</td>
                                        <td>LBRM_34_0020</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">Genomic location:</td>
                                        <td>chr:109 - 6297 </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%;">Size:</td>
                                        <td> 6188bp </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">Validated by:</td>
                                        <td>
                                            <i class="fa fa-retweet fa-lg" title="RNA transcript"></i> (RNA transcript - 87 reads) </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Databases cross-reference</h4>
                            <table class="table table-bordered" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width:  20%">UNIPROT ID</td>
                                        <td>
                                            <a href="http://www.uniprot.org/uniprot/A4HM37" target="_blank">A4HM37</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">EMBL</td>
                                        <td>
                                            <a target="_blank" href="http://www.ebi.ac.uk/ena/data/view/FR799009">FR799009</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">KEGG</td>
                                        <td>
                                            <a target="_blank" href="http://www.genome.jp/dbget-bin/www_bget?lbz:LBRM_34_0020">lbz:LBRM_34_0020</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Annotations cross-reference</h4>
                            <table class="table table-bordered" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">NCBI</td>
                                        <td>
                                            <a target="_blank" href="https://www.ncbi.nlm.nih.gov/gene/5414638">5414638</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: bold; width: 20%">TRITRYPDB</td>
                                        <td>
                                            <a target="_blank" href="http://tritrypdb.org/tritrypdb/app/record/gene/LbrM.18.0010">LbrM.18.0010</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Publications</h4>
                            <table class="table table-bordered" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td> Peacock CS, Seeger K, Harris D, Murphy L, Ruiz JC, Quail MA, Peters N, Adlem E, Tivey A, Aslett M, Kerhornou
                                            A, Ivens A, Fraser A, Rajandream MA, Carver T, Norbertczak H, Chillingworth T, Hance Z, Jagels K, Moule
                                            S, Ormond D, Rutter S, Squares R, Whitehead S, Rabbinowitsch E, Arrowsmith C, White B, Thurston S, Bringaud
                                            F, Baldauf SL, Faulconbridge A, Jeffares D, Depledge DP, Oyola SO, Hilley JD, Brito LO, Tosi LR, Barrell
                                            B, Cruz AK, Mottram JC, Smith DF, Berriman M. (2007).
                                            <b>Comparative genomic analysis of three Leishmania species that cause diverse human disease.</b> Nat Genet(39),
                                            839-847. 10.1038/ng2053
                                            <a href="http://www.ncbi.nlm.nih.gov/pubmed/17572675">[PUBMEDID: 17572675]</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Genome browser</h4>
                            <iframe style="border: 1px solid #505050;width:100%" src="http://regadb.bahia.fiocruz.br/jbrowse/index.html?&amp;loc=chr18%3A109..&#9;&#9;&#9;&#9;&#9;&#9;6297&amp;tracks=DNA%2CAnnotations%2CLeishDB&amp;highlight=chr18%3A109..6297"
                                    height="450"> </iframe>
                            <h4>DNA Sequence</h4>
                            <div class="well well-lg">
                                <title>Gene </title>
                                <div style="font-family: Courier New,Courier; text-align: justify; text-justify: inter-word;"> &gt; Gene 2584 | TATE DNA Transposon
                                    <br>CGTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCCTAACCC
                                    <br>TAACCCTAACCCTAATGCCACCGTCCTGTGTGATAGGGTGCTCGCGAAGATATAATTTCTTGAAGACAACAGAGGGCGAG
                                    <br>AAGGGAGAAAGATTTGTGGAAGGCAGATGGGTATGGAGAGAGTCTTCGCGACCCCATTGGGAAGCGGCAAGGCAGGCACG
                                    <br>CAACCACGACCGCGGCGCCGCGTCATGATTATGCCGCCGGTCCCCTCTACCGCGCTCGGTCGCGTGAGGAGCACATCAAG
                                    <br>TCGTCTTGGACTTCTTTTGTGTGCTTTTTCTTATGGCTTGGCACCGGTACCGGGGAAGCCTCCCCCCATAGCACGCGGTT
                                    <br>AGCCATCCATATCTTGTGAGCGATGTCGTCGCACCGTCCTCCGGAGAGTCGGCCGTCAGGTTCCGGCTCCCCTCGGATGT
                                    <br>TTCTGGTGACGATCATATCTCGCCGCCCTCCTCGCGGCGCCGCTCTTCGCATAGCGGGCACCACATGTGCCGGAGGAACG
                                    <br>GCACGCCAAACGGTTCAACTCGGTGAACCTCCAGCGATCCTGTCGCGTCCACCCCGAAGTGTCGCGAGTAGGCGTCCGCC
                                    <br>GGATTCCGCGCACCCTCTACGTAGAAAAAGACTACGTCGATCCCTCTGTTGTACCAGAGGTCGTAGGTGTACTCGAAAAG
                                    <br>TTTGTTCAGGGCGTAGCCTCTGCCAATGCCGTCGAAACCGTTCAGGTGTTTCTGCGCAATGACAATCGCACGGTGGTCCG
                                    <br>TGGCAAGCGCGATTCGCGCTCCGTTGGGCACCCTGTGGTGCTCCACCAGGTGTCGCAGCATTAGTTGTGCCGCGCGTGGT
                                    <br>TCCGCGTGTGCCGAGTACCGCGCCTGGAAGCGGTCCGCCTGCAGGTCTGGGTCCTCGAACCGGCCTCCCGACCGGACGCG
                                    <br>GCGACGCAGCTGGTACTGGCGCAGTTTTTCGAGGACGCGTTCCGCCTCGCCGTCGTCGCCGCCGAGTTGCCGTTCCAGGT
                                    <br>CCTCGGTCCAGCGCTGCCGATAGGTCCACATTTCTGTGGCGCCCGCGTCGCGGAGGTGAAGTACAGCACCCCACCCTTCC
                                    <br>AGCGACGCGTCGGTGAAGGCCACCGCGTCATAGGTCGCCTCGTCCGTCGTTGGGTGTCTCTCGTCCGAGATTTTCCACCA
                                    <br>CGGATTCTGCACCAGTGCGCCGCCGATCTCCTGCAGCGACCGCGCCACGGAGGAGTCGATGTACGGCACCGCGTCGTCCC
                                    <br>AGTCGTACCCGCGGAACGTCAGCCGGTATATGCCTCGGTAGGCTCTCAGCAGCTTGAATGCCCGTGCGGGGTTCATTTGC
                                    <br>GTGGTATGGAGCGCGAAGAAAATCAGCGAGATCAGCGAGGCCAGACTGCGTATGGTGTGGCTGGTCTTTTGGAGCGCAAG
                                    <br>CTTCAGCTTCGCCACCGTCTTCACCGAGTTGCGGATCAGCCGCTCTCGGCCATTCCATGTGTATTCTTCACCGAGAAAAA
                                    <br>CGGTGTTGGCACTCGCCAGCTGCAGGATTTCCTCGTCCGACATCGCCTCCAGCTCGTCCCGGTTGGGTGACGTCATCAGG
                                    <br>TTCGCCGCCTTGATGCGTGCGACGACCGTGCGCACCGCGAGCACAAACTCACGCTCCTGGCCTTCGCGTGCGGCCACGAG
                                    <br>AATGTTGTCGATGAGCGTGGTGATGGTGACGGGCGTGTCGATGTCGACAATCGTCCACGTCACCGCCTGGCCGACGGCAA
                                    <br>CGCTCCACCGCGCGCCGGTCGGGAGAGTACGAAGGCGGTAGTATCGCCCGTCATGCCTGGCTCGAAAAACGAACTTGTTA
                                    <br>CGGAGTGTCGCCGCGATCGGGATAGCGTCGTAATAAGCTTCGAAGTCGATCTGTAGCATGTACCGGGCGTATCGCAGCCG
                                    <br>CTGTCGTCTTCCGAGGCGCGTGTCGTAGTGGACGCGCGGGACGTGATGTTTGGGGATCACGCGGTTCAGCAGGGGCTCCG
                                    <br>TGATGAGGCGTCGTCGTCCTTTCAGCTCCGGCACCGTGAAGACGTTCACGCCGTGCATGCCCTCTGGCAATTGCACCTGG
                                    <br>GCGCCGATGTCGCTGATCGGGCACGGTTCGAACTTGCCCATCTCGACCGCCTGTTGGATTTCCGCAGCCGTGAGCGCACA
                                    <br>CTTTTTGATGGTTCGTGAGGTCCTCAACCCATCGTAGAAGGAGGGATCCAGAAAGCACTGGATTCGCTGGAGAAACCGCT
                                    <br>TCGTTGAGGCGCGTTTTGTCGGCATCGCCAGCACGGTATCCATGTCCAGTGGTGTGTTCCGTTTCAGGTGCAGCGGCCAC
                                    <br>TGCTTCACGAGTGCCGGTCGCTCCGTCAGCACTTGGATGAAACCGGACATCTGGTCCACCATGGCCGCCACCTCCTGTGG
                                    <br>TGCGATTCCGAGATTCGCGCACGATGACTCTTGCGATCGGAAACGGAACACGGAAGCCGCAGCCTCTAGAGGGTCTGGAA
                                    <br>TAGCGCTCTTCCGGCGTTGTCCCTTGCGGTCTCGGCCTCCACCGTAGGCTGCTGGCCATACCCAAGATAGCGCAGCAGCG
                                    <br>TGGCCTGCTTCGCGTGCCCGGAAATCATCATCAGGTCCTTCAACGGGACACCCGCTTCCGCCATACAACGGAGCGCGCCT
                                    <br>TTCCGGATCGAGGGCAGCTGTGCACCTCGCATCTCTGTTCGCACCTCCTGGGCGATCAGCGCCCGCAGCTCCTCCACGTG
                                    <br>TGGTGAGAAAAGCTCCTCGGATGGTTTTTTCTCGACCAGCATCTCCTGCAGCGTCGCTGCGAGGTCCCTCGTTAGCATCG
                                    <br>ATGGGATCGGGTATGGGCCGCGTGTTTTGGCACCCTTTCCCTTGCGGATCGTCAGCGTGACCTTCACGTATGTCGTTTTT
                                    <br>TCGTCGCGGGCCGCATCAACTCCACTTAGTGTGAATTACTTCATACATTTTGAGAAGAGATAGAGGGACAACAGTGAAGT
                                    <br>AAGAATCCATAAGATACACATGATTAGTAAGATACATATTTATCGACCAAGTGGAAGTGAGGAGTGGGTTTCCGAGACAC
                                    <br>ACGCGCTCACTCAGGATTCCTTTTCCACGGATACACGAACACCGATTCAGCTATCGGTCAAATTTCGCACATCCAACACC
                                    <br>ACATCCCACCAACCACCCCCCCCCCCCCTATAAGGTCAAGTGCCATTCGATTGCCTTTGTGGTTTTACACGCCGCCAATT
                                    <br>GAACCCTAACCCTAACCCTAACCCGTGTACCCTGGCCCTCGGGAGGATTTCCCCGGTACAGTGGGAGAGGGTGTCGCAGG
                                    <br>GCGAGGAAGCACTGGAAAGAAAATGATCTCACCGTGAGACCTCGGCACCGCGGAAGGCCCAGTTGCCCCCAGCTTAGGGT
                                    <br>GTGCTGCGGCGTAGCATCGCTCATCCAGGTGAGATCGTGGGGTTCTGGAGAAGAGGCCAAACGGACAGCCGCGAGAGAGC
                                    <br>CGGATAGATCGAATGCAGCTGAGGTTCCCAGCGAGGTGCTCTCAAGGAATGCCCCGTGGAGAAGGGCGCCTACCACCTCA
                                    <br>CGCGTGTCTAGTGGCCTTTCGCCGTGGCAGGAAAAGCTAGGGTGCCGCATTCCGTGAGGATGCGGAACGATGTCCAGGAA
                                    <br>AGCTGGAGTGCAGCCTCTTACGGCCAAGCAGTGAATGAGGGAGAGCACTGCAAAACGGGCTCCAGAAAACCTTCCATGGG
                                    <br>GAGCATTTTCTGCAGCTGCCGCAGGTGCAGTGTCCCCCGGACGCGTGATGCTCCTGACGTAACAGACAGGGCATATGGTC
                                    <br>TGTCGTTTCGTCAACACGTTCGGTGGCGCAGAGTGCCGCCACAGCACCCCCTCCCCACCCCTAAACCGTCCACAAGAGTT
                                    <br>GGGACTTGCAGCTTCACCAAGGGATGCACCGCACCGACCGGAGAGGTCCAAGGGGATGACTGTCACGTTCGAGCCCGCGC
                                    <br>GCAATCCAGTTGGAGGGGGGATATATCAGTGTTCCCCTGCACAATGTGATGCGCACACCACCATTGCACTCCCCAGGGGA
                                    <br>TGATGATCACACACACACACACACACACACACACACACACACACACACACACGTGAATACATGCGTATTGGTCGGCATCG
                                    <br>CAGCAAAGGTGGTGGGAGCGGTGCCTTGCGTGAAGCGAAGAGCCTGCCGGAGCTGCCCCAGCACGGATGGCTGCCACGAC
                                    <br>CCCCTGTGGCCTGCGAGACGCACCGTCACGGACGCTGCACACCCACTCGATAGCCTTTGAAGAGGGATTGCATCTGCTCC
                                    <br>TTGGAGCAACGCCGGTTCTGCGGCAGTACAGGAGGGGGGGGTAACGCGACGCCTGCAATACCGATTCCACGCCTGCAAGA
                                    <br>CAAAGGGTTCTCGGGGGATACGAAAACGGAGTTTGGGGGCGCCTAGTCCGCCTAAACAGCGCAGCAGAGGAGCGGCAAGC
                                    <br>GTCCTGGCACCTCCTGTGACGCTTGAGGCCAGGCATAACGAGGAGGAGTAACAGCACACGTAGGGGGCCCGGTGCTTGAA
                                    <br>TGGTGCGCTCCCCTCTCAGTCGCTCACTGCAGAAGTGAACGCAGGAGCGTGGGGGGACGCGGAGCGCATGGTACCTGAAA
                                    <br>ACGCCCGAGGGTGGCACTGCACCCGCGATCGTTGAGTGCACCTTCAGAGTGGACACGGCACGTGCCACTCGCTAGCACGG
                                    <br>GAGGGTGGGGAGAAGAGGGAGAAACGAGCAGCAAGAATAATCAATCAGGACTGGAAGAGGCGGAAGCGAGGCAGTGCAGA
                                    <br>GGGGGCTTCCGGATCTCGCGCTTAGTCTATGCAATAGAGCGCCGCGTGTACCGGCATGGCGCCGCATAGAGACATTCGAT
                                    <br>TCGAGGAAAGAACGATACTGTGCAGCTTTGCGGATCCCGCAAGCGGCAGGGTGCTCTGCAGCTGCCCCCAGTGGCTGAAG
                                    <br>TTGGCGAGCTCCAGCGCACGGCACTTGCTGAGGGCACCGATGTTGCGTACACCACTCCCACTGGTGTAGATTCCGCACGG
                                    <br>TCATCGCCGGTGCACCCGCTGCAAGCACGGCAAGGCTCTCCAGGCACCCGCCATCACGGATCCCCACAGACTCCAGCACG
                                    <br>GGTCAAGTCCTCCACCCTTCACTGTTGCCCATGCAGCCCGCACAGGCGACGACCATGCGAAGGCACCGCGCTCGTGTCAG
                                    <br>CGGTGCGTGGCCCCTCAGCTGCTGAGGTGAGCCAAAGCAAGCTTGCGTGAGTGGTACGCATCGATGAAAGTCGGAGGCTT
                                    <br>CCTCAATCGAAGACCCCCCGGACAGAAAGTCCAACTAGGCGGGCGGTACTCATGAACTCCTCAAGGTGGGGGGTCACTCT
                                    <br>TTGGGGACCACACACGACGAGGCTCTTCCATGCGAGCAGCTGAGACGTGAGCCGCAAACGGGCCTCGCGGCAGTCGTTGA
                                    <br>TGCAGCGCGTGCGGCGTTGGGTCATCCTGGCCGGGACTGCACTGTGCCGTACCACGTGACTCTCACATGAGTGACGCTCT
                                    <br>CGTTCAGCTGCAGGAGCGCGCGCTGGTTGACGCCAAGAGCTGTGGCAGCCTCACCATCTGCCACCTCGAACAGAAGCAGG
                                    <br>TGTGACGCCCTATCAGGCGGAGCGGCGAGTATCGCACGCACTGCACCCACACCCCACGCACAGTCAGAGCCAACGCACGC
                                    <br>TTTCCCAGCCACCAGCTGGTGTGCTGGATGGCATTCTCCGGGTTTGACAAGGCATCAGCCAAGCCCACTGCGTCGCGTAC
                                    <br>AACGTCTCCCGTCAAAGTGATGGTGGTGCACTCCATGCAGTACTCTCCCCGCTGCTCCGCATACACTTACGCGCGAGACA
                                    <br>GCGCCGCCAACACTGTCAGGTGGGCGTGTGCCGACACACAGTAGGTCACCTGTACCAGCAGAGCTCCCTCCGACGAGTCC
                                    <br>AAGGAACTGCGCACCTCGCTCGTCCTGTAGTCGTCCAAGTCGAGCAAGTCACGGTGGGCTTGCGTCACTCTGCAAAGTAC
                                    <br>AGCGTCCGTCTCGATGGGTGTGGTATCCCGCCGACGCAAAGAAGAGGATGCGGTACAAGGTCTGTGGAACAGCGGGGAGC
                                    <br>CGGTGACGGCAGTGGGAGCACAAAAGGGACGACGACAGGCAGTTCTTCAGTGGAGGAGACGAGCGGCACGTTGAGCACCG
                                    <br>CTGGAAGAGAGCGGGGTTGTGCGTCTGTGGGCGTGCAGGCGCACATGGTGTGGAGATCGAGGAGGCGAGAAATGCCCGGA
                                    <br>CAAGTCCATCAAGAAGAACCCACAGGCA
                                </div>
                            </div>
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