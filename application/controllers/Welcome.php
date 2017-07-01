<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Organism_model');
		$this->load->model('Genes_model');
		$this->load->model('Proteins_model');
		$this->load->model('Ncrna_model');

		$dados["organisms"] = $this->Organism_model->selectAll();

		//Statistics rates
		$dados["count_orfs"] = $this->Genes_model->countORFs();
		$dados["count_organisms"] = $this->Organism_model->countOrganisms();
		$dados["count_genes"] = $this->Genes_model->countGeneswithfunctions();
		$dados["count_ncrna"] = $this->Ncrna_model->countncRNA();

		//Load the protein descriptions
        $proteinsdescriptions = $this->Proteins_model->selectAllProteinsDescriptions();
        $descriptions = "";
        $lastKey = key($proteinsdescriptions);
        foreach( $proteinsdescriptions as $protein):
            $descriptions = $descriptions . '"' . $protein["proteinname"] . '"';
            if ($protein <> $lastKey){
                $descriptions = $descriptions . ',';
            }
        endforeach;

		$dados["autocompleteproteins"] = 'var availableTags = ['. $descriptions . '];';
		$this->load->view('leishdb',$dados);
	}
}
