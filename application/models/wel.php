<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wel extends CI_Model
{
    public $produit='Articles';
    public $membre='membres';
    public $categorie='categorie';
    public $partenaires='Partenaires';
    public $questions='Questions';
    public $reponce='Reponce';
    public $service='Service';
    public $couleur='color';
    public $panier='panier';
    public $taille='taille';
    public $achat='Achat';

    function produits(){
        return $this->db->get($this->produit)->result();
    }
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
    
    

}