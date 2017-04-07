<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tools extends CI_Controller {

	public function BLAST()
	{
		$this->load->view('blast');
	}

	public function browser()
	{
		$this->load->view('browser');
	}

}
