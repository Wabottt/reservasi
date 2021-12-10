<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_User');
    }

	public function index()
	{
		$data=[
			'title' => 'Data User',
            'user'=> $this->M_User->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'data/user', $data);
	}

    public function ubah_password($id_karyawan){
        $where=array('id_karyawan' => $id_karyawan);
        $data = array(
            'title'=>'Reset Password',
            'user'=>$this->M_User->editPassword($where,'user')->result() 
        );

		$this->load->view('data/edit_password',$data);
    }

    public function update(){

        $this->form_validation->set_rules('password','pasword','required|trim|min_length[5]|matches[password2]',[
            'min_length' =>'Pasword terlalu pendek',
            'matches'=>'Pasword harus sama'
            ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password]');

        if($this->form_validation->run() == false){
            $this->load->view('data/edit_password');

        } else {
        $password=$this->input->post('password');

        $data['password'] = password_hash($password, PASSWORD_DEFAULT) ;
        $where=array(
            'password'=>$password);

        $this->M_User->update_password($where, $data,'user');
            redirect('User');
        }
    }
}