<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop extends CI_Controller {

	public function konfirmasi($value='')
	{
		$this->load->model('pesan_model');
		$this->pesan_model->konfirmasi();
	}
	public function simpan_pesan($value='')
	{
		$this->load->model('pesan_model');			
		$this->pesan_model->balaspesan();
	}
	public function detailmessage($id)
	{
		$this->load->model('pesan_model');
		$data = array(
			'data' => $this->pesan_model->detailMessageCustomers($id),
			'id'=>$id
			);
		$this->load->view('front/detailmessage',$data);
	}
	public function kirim_invoice($value='')
	{
		$config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://leios.rapidplex.com',
			'smtp_post'=>465,
			'smtp_user'=>'sales@oenlez.com',
			'smtp_pass'=>'oenlez1234',
			'mail_type'=>'html',
			'charset'=>'utf-8',
			'newline'=>"\r\n",
			'wordwrap'=>TRUE
			);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from('sales@oenlez.com','Oenlez Sales');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}