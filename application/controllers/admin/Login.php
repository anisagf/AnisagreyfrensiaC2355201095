<?php 


class login extends CI_Controller
{

      public function index()
      {
      	$data['judul'] = 'Halaman Login';
      	$this->load->view('admin/templates/admin_header',$data);
      	$this->load->view('admin/login',$data);
      	$this->load->view('admin/templates/admin_footer');
      }
}



 ?>