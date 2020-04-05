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
		$this->load->view('index'); 
	}
	public function produits()
    {
        $this->load->model('wel');
        $prods['produits']=$this->wel->produits();
        $this->load->view('product',$prods);
    }
    public  function  categories()
    {
        $this->load->model('wel');
        $categ['categ']=$this->wel->categories();
        $categ['produits']=$this->wel->produits();
        $this->load->view('category',$categ);
    }
    public function factures($panier){
        $this->load->model('welcome');
        $prods['produits']=$this->wel->achats($panier);
        $this->laod->view('checkout',$prods);
    }
    public function contacts(){
	    $this->load->view('contact');
    }
    public function connexion(){
	    $this->load->view('connexion');
    }
    public function inscription(){
	    $this->load->view('inscription');
    }
}
