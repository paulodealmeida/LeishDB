<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller to rule collaborative annotations
 *
 * @author paulo
 */
class CollaborativeAnnotations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proteins_model');
    }

    public function create()
    {
        $this->load->view('collaborative_annotations/create');
    }

    public function store()
    {
        $this->load->helper('url');

        $protein = [
            'entryname' => $this->input->post('entryname'),
            'proteinname' => $this->input->post('proteinname'),
            'genename' => $this->input->post('genename'),
            'organism' => $this->input->post('organism'),
            'taxonomiclineage' => $this->input->post('taxonomiclineage'),
            'proteinfamily' => $this->input->post('proteinfamily'),
        ];

        $id = $this->Proteins_model->insert($protein);

        $dados["id"] = $id;
        $this->load->view('data', $dados);
    }

}
