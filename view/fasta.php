<?php

$geneid = $_GET["geneid"];
$type = $_GET["type"];
include("../model/dao-search.php");


if ($type == "nc"){
    $data = SearchbyncRNAID($conexao, $geneid); ?>
    
    <?php foreach ($data as $ncrna):
        $sequence = getSequenceGene($conexao,$ncrna["genomeid"],$ncrna["end_location"],  $ncrna["start_location"]);
        echo "\r\n > Gene {$ncrna["id"]} | {$ncrna["family"]} \r\n ";

        $i = 0;
        $tamanho = strlen($sequence["sequence"]);

        while($i <= $tamanho){
            echo substr($sequence["sequence"],$i,1);
            $i += 1;         
            if($i % 80 == 0){
                echo  " \r\n ";
            }    
        }

        header('Content-type: text/plain');
        header( 'Content-Length: ' . strlen( $content ) ); 
        header('Content-Disposition: attachment; filename="ncrna.fasta"');

        echo $content;
endforeach;
}else{
    $data = SearchbyGeneID($conexao, $geneid);  ?>
    
    <?php foreach ($data as $gene):
        $sequence = getSequenceGene($conexao,$gene["genomeid"],$gene["endgenomelocal"],  $gene["startgenomelocal"]);
        echo "\r\n > Gene {$gene["id"]} | {$gene["proteinname"]} \r\n ";
        $i = 0;
        $tamanho = strlen($sequence["sequence"]);

        while($i <= $tamanho){
            echo substr($sequence["sequence"],$i,1) ;
            $i += 1;        
            if($i % 80 == 0){
                echo  " \r\n ";
            }    
        }

        header('Content-type: text/plain');
        header( 'Content-Length: ' . strlen( $content ) ); 
        header('Content-Disposition: attachment; filename="gene.fasta"');

        echo $content;
    endforeach;
}

?>

