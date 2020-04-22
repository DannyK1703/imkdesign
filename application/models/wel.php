<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wel extends CI_Model
{
    public $produit='Articles';
    public $membre='membre';
    public $categorie='categorie';
    public $partenaires='Partenaires';
    public $questions='Questions';
    public $reponce='Reponce';
    public $service='Service';
    public $couleur='color';
    public $panier='panier';
    public $taille='taille';
    public $achat='Achat';


    //Product Model for user
    function AllProduits(){
        return $this->db->get($this->produit)->result();
    }
    function SingleProduits($id){
        $this->db->where($id);
        return $this->db->get($this->produit)->result();
    }
    function ProductCat($cat){
        $this->db->where($cat);
        return $this->db->get($this->produit)->result();
    }

    //services model for user
    function AllServices(){
        return $this->db->get($this->service)->result();
    }

    //Question model for user
    function AddQuestion($data){
        $this->db->insert($this->questions,$data);
    }
    function AllQuestions(){
        return $this->db->get($this->questions)->result();
    }

    //Responce Model for user
    function AllReponces(){
        return $this->db->get($this->reponce)->result();
    }

    //categorie model for user
    function categories(){
        return $this->db->get($this->categorie)->result();
    }
    function achats($pann){
        $this->db->where('idPanier',$pann);
        return $this->db->get($this->achat)->result();
    }

    //Partenaires Model for User
    function AllPartenaires(){
        return $this->db->get($this->partenaires)->result();
    }

    //membres Models for User
    function AllMembres(){
        return $this->db->get($this->membre)->result();
    }
    

}