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
        $part['partu']=$this->wel->AllPartenaires();
        $this->load->view('navbar');
		$this->load->view('index',$prods);
		$this->load->view('footer',$part);
	}
	public function AddtoCard($id){
	    $ids=array('idArticles'=>$id);
	    $this->load->model('wel');
	    $ret=$this->wel->SingleProduits($ids);
        if (count($ret)==1){
            $pro=$ret[0];

            $this->cart->insert($pro);
            //$this->categories();
        var_dump($this->cart->contents());
        }
    }

    public function deconnecter(){
        $this->session->unset_userdata('is_connected');
        redirect('Welcome/index');
    }

	public function connection(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[3]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        if($this->form_validation->run()) {
            $name = $this->input->post('login');
            $pwd = $this->input->post('pwd');
            $Auth = array(
                'loginClient' => $name,
                'pwdClient' => $pwd
            );
            $this->load->model('wel');
            $res = $this->wel->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $ret = array('pseudo' => $user->loginClient,'nom'=>$user->NomClient,'email'=>$user->EmailClient,'phone'=>$user->PhoneClient, 'is_connected' => true);

            if ($name == $ret['pseudo']) {
                $this->session->set_userdata($ret);
                $this->load->model('wel');
                $prods['produits']=$this->wel->AllProduits();
                $part['partu']=$this->wel->AllPartenaires();
                $this->load->view('navbar');
                $this->load->view('index',$prods);
                $this->load->view('footer',$part);

            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
                $this->load->view('connexion');
                //echo 2;
            }}else
                echo $pwd;
        }else{
            $this->load->view('connexion');

        }
    }

    public function ModifProfil(){
        $this->load->view('modifClient');
    }

    public function connect($name,$pwd){
        $Auth = array(
            'loginClient' => $name,
            'pwdClient' => $pwd
        );
        $this->load->model('wel');
        $res = $this->wel->authentification($Auth);
        if (count($res) > 0) {
            $user = $res[0];
            $ret = array('pseudo' => $user->loginClient,'nom'=>$user->NomClient,'email'=>$user->EmailClient,'phone'=>$user->PhoneClient, 'is_connected' => true);

            if ($name == $ret['pseudo']) {
                $this->session->set_userdata($ret);
                $this->load->model('wel');
                $prods['produits'] = $this->wel->AllProduits();
                $part['partu'] = $this->wel->AllPartenaires();
                $this->load->view('navbar');
                $this->load->view('index', $prods);
                $this->load->view('footer', $part);
            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
            }

        }}
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
            $login=$this->input->post('login');
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
                $a['msg']='mots de passes non conformes';
                //$this->load->view('inscription',$a);
                echo 1;
            }
        }else{
            echo 2;
           // $this->load->view('inscription');
        }
    }
	public function about(){
	    $this->load->model('wel');
        $this->load->view('navbar');
	    $team['membres']=$this->wel->AllMembres();
        $part['partu']=$this->wel->AllPartenaires();

	    $this->load->view('about',$team);
        $this->load->view('footer',$part);
    }
	public function produits()
    {
        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();
        $part['partu']=$this->wel->AllPartenaires();
        $this->load->view('navbar');
        $this->load->view('product',$prods);
        $this->load->view('footer',$part);
    }
    public  function  categories()
    {
        $this->load->model('wel');
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->AllProduits();
        $this->load->view('navbar');
        $this->load->view('category',$categ);
        $part['partu']=$this->wel->AllPartenaires();
        $this->load->view('footer',$part);
    }
    public function factures($panier){
        $this->load->model('welcome');
        $prods['produits']=$this->wel->achats($panier);
        $part['partu']=$this->wel->AllPartenaires();
        $this->load->view('navbar');
        $this->laod->view('checkout',$prods);
        $this->load->view('footer',$part);
    }
    public function contacts(){
        $this->load->model('wel');
        $this->load->view('navbar');
        $team['membre']=$this->wel->AllMembres();
	    $this->load->view('contact',$team);
        $part['partu']=$this->wel->AllPartenaires();

        $this->load->view('footer',$part);
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
        $this->load->view('navbar');
        $this->load->view('category',$categ);
        $part['partu']=$this->wel->AllPartenaires();
        $this->load->view('footer',$part);
    }
    public function SingleArt($id){
	    $data=array('idArticles'=>$id);
        $this->load->model('wel');
        $prod=$this->wel->SingleProduits($data);
        if (count($prod) == 1) {
            $prods= $prod[0];
            $this->load->view('navbar');
            $this->load->view('product',$prods);
            $part['partu']=$this->wel->AllPartenaires();

            $this->load->view('footer',$part);
        }
    }
}
