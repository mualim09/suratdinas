<?php
/**
 * by ilham
 */
class MY_user extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function cloginA()
	{
		if($this->session->userdata('login')==TRUE AND $this->session->userdata('lvl_akses')==1){
		}else{
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user=$this->session->userdata('id_user');
	}
	function clogin()
	{
		if($this->session->userdata('login')==TRUE){
		}else{
			redirect('login/?error=harusdaftarlagi&kode=0');
		}
		$this->id_user=$this->session->userdata('id_user');
	}
}