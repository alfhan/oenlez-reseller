<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop extends CI_Controller {

	public function konfirmasi($value='')
	{
		$this->load->model('shop_model');
		$this->shop_model->konfirmasi();
	}
}