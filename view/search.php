<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->
<head>
    <?php
        include($_SESSION["dir"]. "/view/header.php");
        include($_SESSION["dir"]. "/model/dao-search.php");
        include($_SESSION["dir"]. "/functions-aux.php");
    ?>
    <script>
        $(document).ready(function(){
            $('#dataTable').dataTable();
        });
    </script>
</head>

<body data-spy="scroll">

<!-- ******HEADER****** -->
<header id="header" class="header">
    <div class="container">
        <h1 class="logo pull-left">
            <a class="scrollto" href="index.php?p=leishdb.php">
                <span class="logo-title">leishDB</span>
            </a>
        </h1><!--//logo-->
        <nav id="main-nav" class="main-nav navbar-right" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
            </div><!--//navbar-header-->
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="index.php?p=leishdb.php">Back page</a></li>
                    <!--<li class="nav-item"><a class="scrollto" href="#license">Works</a></li>-->
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div>
</header><!--//header-->


<?php
//Carregando variáveis sessions
session_start();
$genes = $_SESSION["genes"];
$ncrnas = $_SESSION["ncrna"];

$resultsgenesnumber = count($genes);
$resultsncrnanumber =  count($ncrna);
$resultstotal = $resultsgenesnumber + $resultsncrnanumber;
?>

<section id="about" class="about section">
    <div class="container">

        <div class="row">

            <div class="col-md-10">
                <h3>Results</h3>
                <h3 class="title"><?=$resultstotal?> founded results</h3>
                <div class="panel panel-default" id="table">	
        <table id="dataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>LeishDB ID</th>
                <th>Type</th>
                <th>Protein name</th>
                <th>Size</th>
                <th>Strand</th>
                <th>Genomic location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            	//Coding genes
            	if (count($genes)>0) {
		            foreach ($genes as $gene):
	            ?>
	            	<tr>
		                <td><a href="<?=$_SESSION["dir"]. "/view/" ?>data.php?geneid=<?=$gene["id"]?>&type=c"><?=$gene["id"]?></a></td>
		                <td>Coding Gene</td>
		                <td><a href="<?=$_SESSION["dir"]. "/view/" ?>data.php?geneid=<?=$gene["id"]?>&type=c"><?=$gene["proteinname"]?></a></td>
		                <td><?=$gene["endgenomelocal"]-$gene["startgenomelocal"]?>bp</td>
		                <td>
			                <?php
	                        if($gene["frame"]<0){
	                            echo "<strong> - </strong>";
	                        }else{
	                            echo "<strong> + </strong>";
	                        }
	                        ?>
	                    </td>
		                <td>chr<?=$gene["genomeid"]?>:<?=$gene["startgenomelocal"]?>-<?=$gene["endgenomelocal"]?></td>
		                <td>
			                <a class="btn btn-cta-primary "  title="Download DNA Sequence"  target="_blank" href="<?=$_SESSION["dir"]. "/view/" ?>fasta.php?geneid=<?=$gene["id"]?>&type=c">
			                	<i class="fa fa-download" aria-hidden="true"></i>
			                </a> <br><br>
			                <a class="btn btn-cta-primary "  title="See more" href="<?=$_SESSION["dir"]. "/view/" ?>data.php?geneid=<?=$gene["id"]?>&type=c">
			                	<i class="fa fa-eye" aria-hidden="true"></i>
			                </a>
		                </td>
		            </tr>
	            <?php
	                endforeach;
            	}
            ?>
            <?php
            	//Non-Coding genes
            	if (count($ncrnas)>0) {
		            foreach ($ncrnas as $ncrna):
	            ?>
	            	<tr>
		                <td><?=$ncrna["id"]?></td>
		                <td>non-coding RNA - <?=$ncrna["family"]?></td>
		                <td>-</td>
		                <td><?= $ncrna["start_location"] - $ncrna["end_location"] ?>bp</td>
		                <td>
			                <?php
	                        if($gene["frame"]<0){
	                            echo "<strong> - </strong>";
	                        }else{
	                            echo "<strong> + </strong>";
	                        }
	                        ?>
	                    </td>
                        
                        <?php
                        if($ncrna["end_location"] < $ncrna["start_location"]){
                            $var_tmp = $ncrna["end_location"];
                            $ncrna["end_location"] = $ncrna["start_location"];
                            $ncrna["start_location"] = $var_tmp;
                        }
                        
                        ?>

		                <td>chr<?= $ncrna["genomeid"] ?>:<?= $ncrna["start_location"] ?>-<?= $ncrna["end_location"] ?></td>
		                <td>
		                <a class="btn btn-cta-primary "  title="Download DNA Sequence" target="_blank" href="<?=$_SESSION["dir"]. "/view/" ?>fasta.php?geneid=<?=$ncrna["id"]?>&type=nc">
		                	<i class="fa fa-download" aria-hidden="true"></i>
		                </a><br><br>
		                <a class="btn btn-cta-primary " title="See more" href="<?=$_SESSION["dir"]. "/view/" ?>data.php?geneid=<?=$ncrna["id"]?>&type=nc">
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
include("footer.php");
?>

</body>
</html> 

