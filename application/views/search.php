<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->

<html lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

    <head>
        <?php
        $this->load->helper('url');
        $this->load->view("header.php");
        include("header.php");
        ?>
        <script>
            $(document).ready(function () {
                $('#dataTable').dataTable();
            });
        </script>
    </head>

    <body data-spy="scroll">


        <?php $this->load->view("menu.php"); ?>

        <?php
        //Carregando variáveis sessions
        session_start();
        $genes = $_SESSION["genes"];
        $ncrnas = $_SESSION["ncrna"];
        $resultsgenesnumber = count($genes);
        $resultsncrnanumber = count($ncrnas);
        $resultstotal = $resultsgenesnumber + $resultsncrnanumber;
        ?>

        <section id="about" class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Results</h3>
                        <h3 class="title"><?= $resultstotal ?> founded results</h3>
                            <div class="panel" >
                                <table id="dataTable" class="table table-hover  header-fixed  table-condensed" cellspacing="0" width="80%" >
                                    <thead>
                                    <tr>
                                        <th>LeishDB ID</th>
                                        <th>Type</th>
                                        <th>Protein / ncRNA name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //Coding genes
                                    if (count($genes) > 0) {
                                        foreach ($genes as $gene):
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= base_url("data?id=".$gene["id"]."&type=c")?>"><?= $gene["id"] ?></a>
                                                </td>
                                                <td>Coding Gene</td>
                                                <td>
                                                    <a href="<?= base_url("data?id=".$gene["id"]."&type=c")?>"><?= $gene["proteinname"] ?></a>
                                                    <br> Genomic location: chr<?= $gene["chromosomeid"] ?>:<?= $gene["start"] ?>-<?= $gene["end"] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-cta-primary " title="Download DNA Sequence" target="_blank"
                                                       href="<?= base_url("fasta?id=".$gene["id"]."&type=c")?>">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </a> <br><br>
                                                    <a class="btn btn-cta-primary " title="See more"
                                                       href="<?= base_url("data?id=".$gene["id"]."&type=c")?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    }
                                    //Non-Coding genes
                                    if (count($ncrnas) > 0) {
                                        foreach ($ncrnas as $ncrna):
                                            ?>
                                            <tr>
                                                <td><a href="<?= base_url("data?id=".$ncrna["id"]."&type=nc")?>"><?= $ncrna["id"] ?></a></td>
                                                <td>non-coding RNA</td>
                                                <td><a  href="<?= base_url("data?id=".$ncrna["id"]."&type=nc")?>"><?= $ncrna["type"] ?></a></td>
                                                <td><?= $ncrna["end"] - $ncrna["start"] ?>bp</td>
                                                <td>
                                                    <?php
                                                    if ($ncrna["frame"] < 0) {
                                                        echo "<strong> - </strong>";
                                                    } else {
                                                        echo "<strong> + </strong>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>chr<?= $ncrna["chromosomeid"] ?>:<?= $ncrna["start"] ?>
                                                    -<?= $ncrna["end"] ?></td>
                                                <td>
                                                    <a class="btn btn-cta-primary " title="Download DNA Sequence" target="_blank"
                                                       href="<?= base_url("fasta?id=".$ncrna["id"]."&type=nc")?>">
                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                    </a><br><br>
                                                    <a class="btn btn-cta-primary " title="See more"
                                                       href="<?= base_url("data?id=".$ncrna["id"]."&type=nc")?>">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div><!--//container-->
        </section><!--//about-->

        <?php
        $this->load->view("footer.php");
        ?>
    </body>
</html> 



