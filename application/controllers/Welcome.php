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
