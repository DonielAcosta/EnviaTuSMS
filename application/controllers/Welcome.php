<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/**
	 * The index function loads the welcome_message view
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function smsDroc($numberCLI,$templade,$factu){

		$this->load->model('mensajeria_model');
	
		$sms = $this->mensajeria_model->smsdrocerca($numberCLI,$templade,$factu);

	}
}
