<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();
        $prods['partu']=$this->wel->AllPartenaires();

        if (!isset($_SESSION['pannier'])){
           $_SESSION['pannier'] = [];
        }

        $this->load->view('navbar');
		$this->load->view('index',$prods);
		$this->load->view('footer');
	}
	public function AddtoCard(){
        if (isset($_SESSION['pannier'])){
            $id=array('idArticles'=>$_POST['id']);
            $this->load->model('wel');

            $artincart=[];
            array_push($artincart,$this->wel->SingleProduits($id));
            array_push($artincart,$_POST['id']);
            array_push($artincart,$_POST['size']);
            array_push($artincart,$_POST['qte']);

            if (!$this->check_cart($_POST['id'])) array_push($_SESSION['pannier'], $artincart);
            else {
                foreach ($this->session->pannier as $i => $articles){
                    if ($_SESSION['pannier'][$i][1] == $_POST['id']) $_SESSION['pannier'][$i][3]+=$_POST['qte'];
                }
            }
        }
        else{
            $_SESSION['pannier'] = [];
        }
       echo'
            <div class="alert alert-success">gdjcgn</div>
       ';
        $this->SingleArt($_POST['id']);
    }

    public function check_cart($id){
	    foreach ($this->session->pannier as $pannier){

	        if ($pannier[1] == $id) return true;
	        else return  false;
        }
    }

    public function deconnecter(){
	    $this->load->model('wel');
        foreach ($this->session->pannier as $prods){
            $data=array(
            'idArticles'=>$prods[1],
            'prix'=>$prods[0][0]->PrixArticle*$prods[3],
            'cat'=>$prods[0][0]->categorie_idcategorie,
            'qte'=>$prods[3],
            'size'=>$prods[2],
            'date'=>date('Y-m-d'));
            $this->wel->newAchat($data);
        }
        session_destroy();
        redirect('Welcome/index');
    }

	/*public function connection(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'saisi ton login',
                'min_length' => 'le login dois avoir au minimum 4 caractères '));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'saisi le mot de passe',
                'min_length' => 'le mot de passe dois avoir 4 caractères minimum'));
        if($this->form_validation->run()) {
            $name = $this->input->post('login',TRUE);
            $pwd = $this->input->post('pwd',TRUE);
            $pwd=hash('fnv1a64',$pwd);
            $Auth = array(
                'loginClient' => $name,
                'pwdClient' => $pwd
            );
            $this->security->xss_clean($Auth);
            $this->load->model('wel');
            $res = $this->wel->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $pann=$this->wel->getArticleClient(['idUser'=>$user->idClient]);

                $ret = array('id'=>$user->idClient,'pseudo' => $user->loginClient,'nom'=>$user->NomClient,'email'=>$user->EmailClient,'phone'=>$user->PhoneClient, 'is_connected' => true);

            if ($name == $ret['pseudo']) {
                $this->session->set_userdata($ret);
                $this->load->model('wel');
                $prods['produits']=$this->wel->AllProduits();
                $prods['partu']=$this->wel->AllPartenaires();
                $this->load->view('navbar');
                $this->load->view('index',$prods);
                $this->load->view('footer');

            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
                $m['mess']='';
                $this->load->view('connexion',$m);
                //echo 2;
            }}else{
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
                $m['mess']='';
                $this->load->view('connexion',$m);
            }

        }else{
            $m['mess']='';
            $this->load->view('connexion',$m);
        }
    }

    public function ModifProfil($id){
	    $ids=array('idClient'=>$id);
	    $this->load->model('wel');
	    $ret=$this->wel->SingleClient($ids);
        if (count($ret)==1) {
            $cat = $ret[0];
            $this->load->view('modifClient', $cat);
        }
    }
    public function ModifInfo($id){
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
                $ids=array('idClient'=>$id);
                $this->load->model('wel');
                $this->wel->UpdateClient($ids,$data);
                $this->connect($login,$cpwd);
            }else{
                $a['msg']='mots de passes non conformes';
                $this->load->view('inscription',$a);
                //echo 1;
            }
        }else{
            //echo 2;
            $this->load->view('inscription');
        }
    }

    public function connect($name,$pwd){
        $pwd=hash('fnv1a64',$pwd);
        $Auth = array(
            'loginClient' => $name,
            'pwdClient' => $pwd
        );
        $this->security->xss_clean($Auth);
        $this->load->model('wel');
        $res = $this->wel->authentification($Auth);
        if (count($res) > 0) {
            $user = $res[0];
            $pann=$this->wel->getArticleClient(['idUser'=>$user->idClient]);
            $ret = array('id'=>$user->idClient,'pseudo' => $user->loginClient,'nom'=>$user->NomClient,'email'=>$user->EmailClient,'phone'=>$user->PhoneClient, 'is_connected' => true);

            if ($name == $ret['pseudo']) {
                $this->session->set_userdata($ret);
                $this->load->model('wel');
                $prods['produits'] = $this->wel->AllProduits();
                $prods['partu'] = $this->wel->AllPartenaires();
                $this->load->view('navbar');
                $this->load->view('index', $prods);
                $this->load->view('footer');
            } else {
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
                $ret = array(
                    'error_login' => 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($ret);
                $m['mess']='';
                $this->load->view('connexion',$m);
            }

        }
        $ret = array(
            'error_login' => 'login ou mot de passe incorrect'
        );
        $this->session->set_flashdata($ret);
        $m['mess']='';
        $this->load->view('connexion',$m);

	}
    public function inscript(){
        $this->form_validation->set_rules('nom','nom', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('login','login', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('email','email', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('phone','phone', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('cpwd','cpwd', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('adresse','adresse','required|min_length[10]|trim|xss_clean|strip_tags',
            array('required'=>'Ce champs est obligatoire',
                'min_length'=>'donnez une adresse precise SVP'));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        if($this->form_validation->run()) {
            $nom=$this->input->post('nom',TRUE);
            $login=$this->input->post('login',TRUE);
            $phone=$this->input->post('phone',TRUE);
            $email=$this->input->post('email',TRUE);
            $adresse=$this->input->post('adresse',TRUE);
            $pwd=$this->input->post('pwd',TRUE);
            $cpwd=$this->input->post('cpwd',TRUE);
            $this->load->model('wel');
            $data=$this->wel->authentification(['loginClient'=>$login]);
            if(count($data)>0){
                $a['msg']='Login deja utilisé';
                $this->load->view('inscription',$a);
            }else{
            if($pwd == $cpwd){
                $pwd=hash('fnv1a64',$pwd);
                $data= array('NomClient'=>$nom,
                             'EmailClient'=>$email,
                             'PhoneClient'=>$phone,
                             'loginClient'=>$login,
                             'pwdClient'=>$pwd,
                             'adresse'=>$adresse);
                $this->security->xss_clean($data);

                    $desc=array('desc'=>'Pannier');
                    $id=$this->wel->pannier($desc);
                    $datai=$id;


                $ida=$this->wel->AddClient($data);
                $this->wel->AddClienPan(array('idUser'=>$ida,'idPanier'=>$datai));
                $this->connect($login,$cpwd);
            }else{
                $a['msg']='mots de passes non conformes';
                $this->load->view('inscription',$a);
                //echo 1;
            }}
        }else{
            //echo 2;
            $a['msg']=NULL;
           $this->load->view('inscription');
        }

    }
	public function inscription(){
        $a['msg']=NULL;
	    $this->load->view('inscription',$a);
    }
	public function connexion(){
	    $m['mess']='';
	    $this->load->view('connexion',$m);
    }
    public function connexions($m){
	    $this->load->view('connexion',$m);
    }
	*/
	public function about(){
	    $this->load->model('wel');
        $this->load->view('navbar');
	    $team['membres']=$this->wel->AllMembres();

	    $this->load->view('about',$team);
        $this->load->view('footer');
    }
	public function produits()
    {
        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();

        $this->load->view('navbar');
        $this->load->view('product',$prods);
        $this->load->view('footer');
    }
    public  function  categories()
    {
        $this->load->model('wel');
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->AllProduits();
        $this->load->view('navbar');
        $this->load->view('category',$categ);

        $this->load->view('footer');
    }
    public function factures(){

        $this->load->view('navbar');
        $this->load->view('checkout');
        $this->load->view('footer');
    }

    public function pannier(){

        $this->load->model('wel');
        $prods['produits']=$this->wel->AllProduits();

        $this->load->view('navbar');
        $this->load->view('cart',$prods);
        $this->load->view('footer');


    }
    public function suppToPan($id){
	    //var_dump($_SESSION['pannier']);die();
	    foreach ($_SESSION['pannier'] as $i=>$pann){
	        if($pann[1]==$id){
	            unset($_SESSION['pannier'][$i]);
            }
        }

	    $this->pannier();
    }
    public function contacter(){
	    $nom=$this->input->post('nom');
	    $mail=$this->input->post('mail');
	    $subject=$this->input->post('subject');
	    $msg=$this->input->post('msg');
	    $data=array('nom'=>$nom,'email'=>$mail,'subject'=>$subject,'msg'=>$msg);
	    $this->load->model('wel');
    }
    public function services(){
        $this->load->view('navbar');
        $this->load->view('services');
        $this->load->view('footer');
    }
    public function contacts(){
        $this->load->model('wel');
        $this->load->view('navbar');
        $team['membre']=$this->wel->AllMembres();
	    $this->load->view('contact',$team);

        $this->load->view('footer');
    }


    public function CatProd($id){
        $this->load->model('wel');
        $data=array('categorie_idcategorie'=>$id);
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->ProductCat($data);
        $this->load->view('navbar');
        $this->load->view('category',$categ);
        $this->load->view('footer');
    }
    public function SingleArt($id){
	    $data=array('idArticles'=>$id);
        $this->load->model('wel');
        $prod=$this->wel->SingleProduits($data);
        if (count($prod) == 1) {
            $datas=$this->wel->getTailles();
            $prods= $prod[0];
            $detail=array('prod'=>$prods,'taille'=>$datas);
            $this->load->view('navbar');
            $this->load->view('product',$detail);

            $this->load->view('footer');
        }
    }
}
