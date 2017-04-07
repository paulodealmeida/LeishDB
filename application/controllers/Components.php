<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class components extends CI_Controller {

	public function valuesForCBChromosome()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Chromosomes_model');
		$organism = $_GET["organism"];

		$data = $this->Chromosomes_model->selectByOrganismID($organism);

		echo '<option value="">Select the chromosome</option>';

		foreach ($data as $row):
			echo "<option value='{$row["id"]}'>Chromosome {$row["number"]}</option>";
		endforeach;
	}

}
