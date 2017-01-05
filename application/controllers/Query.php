<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class query extends CI_Controller {

	public function search()
	{
		$this->load->view('search');
	}

	public function actsearch()
	{
		try {
			
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Genes_model');
			$this->load->model('Ncrna_model');

			$term = $this->input->post("term");

			$this->session->set_userdata("genes", $this->Genes_model->selectByEverything($term));
			$this->session->set_userdata("ncrna", $this->Ncrna_model->selectByEverything($term));

			if(count($this->session->userdata('genes'))>0 or count($this->session->userdata('ncrna'))>0){
				$this->load->view('search');
			}else{
				echo ("<script>window.alert('We not fount registers relationed the your search. Try again !');</script>");
				redirect("welcome");
			}
		} catch (Exception $e) {
			$this->load->library('session');
		}

	}

	public function actadvsearch()
	{
		try {

			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Genes_model');
			$this->load->model('Ncrna_model');

			$option = $this->input->post("advoption");


			if ($option == 1){
				$chromosome = $this->input->post("genomeid");
				$start = $this->input->post("start");
				$end = $this->input->post("end");

				if($chromosome <> ""){
					$this->session->set_userdata("genes", $this->Genes_model->selectGenesByCoordinates($chromosome, $start, $end));
					$this->session->set_userdata("ncrna", $this->Ncrna_model->selectByCoordinates($chromosome, $start, $end));
				}else{
					echo "<script> window.location.href='" . base_url() . "welcome'; alert('You need to choose the chromosome number for to apply this filter. Try again !');</script>";
				}
			}else if ($option == 2){
				$ncrnatype = $this->input->post("ncrnatype");
				$this->session->set_userdata("genes", array());
				$this->session->set_userdata("ncrna", $this->Ncrna_model->selectByType($ncrnatype));
			}

			if(count($this->session->userdata('genes'))>0 or count($this->session->userdata('ncrna'))>0){
				$this->load->view('search');
			}else{
				echo "<script> window.location.href='" . base_url() . "welcome'; alert('We not fount registers relationed the your search. Try again !');</script>";
			}
		} catch (Exception $e) {
			$this->load->library('session');
		}

	}
	
	public function data()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Genes_model');
		$this->load->model('Ncrna_model');
		$this->load->model('Proteins_model');
		$this->load->model('Chromosomes_model');

		$id = $_GET["id"];
		$type = $_GET["type"];

		if($type == "nc"){
			$data = $this->Ncrna_model->selectByID($id);
			$start = $data[0]["start"];
			$end = $data[0]["end"];
			$sequence = $this->Chromosomes_model->getSequence($data[0]["chromosomeid"],$start,  $end);
			$dados["data"] = $data;
			$dados["start"] = $start;
			$dados["end"] = $end;
			$dados["sequence"] = $sequence;
		}else{
			$data =  $this->Genes_model->selectByID($id);
			$goterms = $this->Proteins_model->selectAllGoTermsByID($data[0]["proteinid"]);
			$gotermsb = $this->Proteins_model->selectAllGoTermsByType($data[0]["proteinid"], "b");
			$gotermsm = $this->Proteins_model->selectAllGoTermsByType($data[0]["proteinid"], "m");
			$gotermsc = $this->Proteins_model->selectAllGoTermsByType($data[0]["proteinid"], "c");
			$databases = $this->Proteins_model->selectDatabasesByID($data[0]["proteinid"]);
			$publications = $this->Proteins_model->selectPublicationsByID($data[0]["proteinid"]);
			$start = $data[0]["start"];
			$end = $data[0]["end"];
			$sequence = $this->Chromosomes_model->getSequence($data[0]["chromosomeid"],$start,  $end);
			$dados["data"] = $data;
			$dados["goterms"] = $goterms;
			$dados["gotermsb"] = $gotermsb;
			$dados["gotermsm"] = $gotermsm;
			$dados["gotermsc"] = $gotermsc;
			$dados["databases"] = $databases;
			$dados["publications"] = $publications;
			$dados["start"] = $start;
			$dados["sequence"] = $sequence;
			$dados["end"] = $end;
		};

		$dados["type"] = $type;
		$dados["id"] = $id;
		$this->load->view('data',$dados);
	}
}
