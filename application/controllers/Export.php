<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class export extends CI_Controller {

    public function FASTA()
    {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Genes_model');
        $this->load->model('Chromosomes_model');
        $this->load->model('Ncrna_model');

        $id = $_GET["id"];
        $type = $_GET["type"];

        if ($type == "nc"){
            $content = "";
            $data = $this->Ncrna_model->selectByID($id);

            foreach ($data as $ncrna):
                $sequence = $this->Chromosomes_model->getSequence($ncrna["chromosomeid"],$ncrna["start"],  $ncrna["end"]);
                $content = $content .  "\r\n > ncRNA {$ncrna["id"]} | {$ncrna["type"]} \r\n ";
                $i = 0;
                $tamanho = strlen($sequence[0]["sequence"]);

                while($i <= $tamanho){
                    $content = $content . substr($sequence[0]["sequence"],$i,1);
                    $i += 1;
                    if($i % 80 == 0){
                        $content = $content .  " \r\n ";
                    }
                }

                header('Content-type: text/plain');
                header( 'Content-Length: ' . strlen( $content ) );
                header('Content-Disposition: attachment; filename="ncrna.fasta"');
                echo $content;
            endforeach;

        }else{
            $content = "";
            $data = $this->Genes_model->selectByID($id);

            foreach ($data as $gene):
                $sequence = $this->Chromosomes_model->getSequence($gene["chromosomeid"],$gene["start"],   $gene["end"]);
                $content = $content . "\r\n > Gene {$gene["id"]} | {$gene["proteinname"]} \r\n ";
                $i = 0;
                $tamanho = strlen($sequence[0]["sequence"]);

                while($i <= $tamanho){
                    $content = $content . substr($sequence[0]["sequence"],$i,1) ;
                    $i += 1;
                    if($i % 80 == 0){
                        $content = $content .  " \r\n ";
                    }
                }

                header('Content-type: text/plain');
                header( 'Content-Length: ' . strlen( $content ) );
                header('Content-Disposition: attachment; filename="gene.fasta"');
                echo $content;
            endforeach;
        }

    }
}
