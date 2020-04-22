<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();
		$this->load->view('index',$prods);
	}
	public function connection(){
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
                'loginClient' => $name,
                'pwdClient' => $pwd
            );
            $this->load->model('Adm');
            $res = $this->Adm->connection($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $ret = array('login' => $user->Login, 'mdp' => $user->Mdp, 'is_connected' => true);
            }
            if ($pwd == $ret['mdp']) {
                $this->session->set_userdata($ret);
                $this->load->model('Adm');
                $prods['produits']=$this->wel->AllProduits();
                $this->load->view('index', $prods);
            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
            }
        }else{
            $this->load->view('connexion');
        }
    }
    public function connect($name,$pwd){
        $Auth = array(
            'loginClient' => $name,
            'pwdClient' => $pwd
        );
        $this->load->model('Adm');
        $res = $this->Adm->connection($Auth);
        if (count($res) > 0) {
            $user = $res[0];
            $ret = array('login' => $user->Login, 'mdp' => $user->Mdp, 'is_connected' => true);
        }
        if ($pwd == $ret['mdp']) {
            $this->session->set_userdata($ret);
            $this->load->model('Adm');
            $prods['produits']=$this->wel->AllProduits();
            $this->load->view('index', $prods);
        } else {
            $ret = array(
                'error_login' => 'login ou mot de passe incorrect'
            );
            $this->session->set_flashdata($ret);
        }

    }
    public function inscript(){
        $this->form_validation->set_rules('nom','nom', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('email','email', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('phone','phone', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('cpwd','cpwd', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));

        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        if($this->form_validation->run()) {
            $nom=$this->input->post('nom');
            $login=$this->inpuut->post('login');
            $phone=$this->input->post('phone');
            $email=$this->input->post('email');
            $pwd=$this->input->post('pwd');
            $cpwd=$this->input->post('cpwd');
            if($pwd == $cpwd){
                $data= array('NomClient'=>$nom,
                             'EmailClient'=>$email,
                             'PhoneClient'=>$phone,
                             'loginClient'=>$login,
                             'pwdClient'=>$pwd);
                $this->load->model('wel');
                $this->wel->AddClient($data);
                $this->connect($login,$cpwd);
            }else{
                $a['msg']='mos de passes non conformes';
                $this->load->view('inscription',$a);
            }
        }else{
            $this->load->view('inscription');
        }
    }
	public function about(){
	    $this->load->model('wel');
	    $team['membres']=$this->wel->AllMembres();
	    $this->load->view('about',$team);
    }
	public function produits()
    {
        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();
        $this->load->view('product',$prods);
    }
    public  function  categories()
    {
        $this->load->model('wel');
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->AllProduits();
        $this->load->view('category',$categ);
    }
    public function factures($panier){
        $this->load->model('welcome');
        $prods['produits']=$this->wel->achats($panier);
        $this->laod->view('checkout',$prods);
    }
    public function contacts(){
        $this->load->model('wel');
        $team['membre']=$this->wel->AllMembres();
	    $this->load->view('contact',$team);
    }
    public function connexion(){
	    $this->load->view('connexion');
    }
    public function inscription(){
	    $this->load->view('inscription');
    }
    public function CatProd($id){
        $this->load->model('wel');
        $data=array('categorie_idcategorie'=>$id);
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->ProductCat($data);
        $this->load->view('category',$categ);
    }
    public function SingleArt($id){
	    $data=array('idArticles'=>$id);
        $this->load->model('wel');
        $prod=$this->wel->SingleProduits($data);
        if (count($prod) == 1) {
            $prods= $prod[0];
            $this->load->view('product',$prods);
        }
    }
}
