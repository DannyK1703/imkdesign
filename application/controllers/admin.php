<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    public function index(){
        $this->load->view('Admin/index');
    }
    public function categories(){
        $this->load->model('Adm');
        $categ['categ']=$this->Adm->listCategories();
        $this->load->view('Admin/categories',$categ);
    }
    public function autentification(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        if($this->form_validation->run()) {
            $name = $this->input->post('login');
            $pwd = $this->input->post('pwd');
            $Auth = array(
                'Login' => $name,
                'Mdp' => $pwd
            );
            $this->load->model('Adm');
            $res = $this->Adm->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $ret = array('login' => $user->Login, 'mdp' => $user->Mdp, 'is_connected' => true);
            }
            if ($pwd == $ret['mdp']) {
                $this->session->set_userdata($ret);
                $this->load->model('Adm');
                $liste['questions'] = $this->Adm->listQuestions();
                $this->load->view('Admin/accueil', $liste);
            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);

            }
        }else{
            $this->load->view('Admin/index');
        }


    }



}