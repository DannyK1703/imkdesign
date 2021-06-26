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
    public $client='client';
    public $pannel='pannel';
    public $AchatClient='AchatClient';

    function authentification($data){
        $this->db->where($data);
        $q=$this->db->get($this->client);
        $res=$q->result();
        return $res;
    }
    public function UpdateClient($ids,$data){
        $this->db->set($data);
        $this->db->where($ids);
        $this->db->update($this->client);
    }





    
    //panier model for user
    public function getArticleClient($ids)
    {
        $this->db->where($ids);
        return $this->db->get($this->AchatClient)->result();
    }

    public function pannier($data){
        //$this->db->escape($data);
        $this->db->insert($this->panier,$data);
        return $ids=$this->db->insert_id();
    }
    public function addPan($v){
        //$this->db->escape($v);
        $this->db->insert($this->pannel,$v);
    }
    public function getPannel($ids){
        $this->db->where($ids);
        return $this->db->get($this->pannel)->result();
    }
    public function suppToPann($data)
    {
        $this->db->where($data);
        $this->db->delete($this->pannel);
    }

    //Product Model for user
    public function getTailles(){
        return $this->db->get($this->taille)->result();
    }
    function AllProduits(){
        return $this->db->get($this->produit)->result();
    }
    function SingleProduits($id){
        $this->db->select('idArticles,NomArticle,categorie_idcategorie, DescArticle, PrixArticle,imgArticle,etat');
        $this->db->from($this->produit);
        $this->db->where($id);
        return $this->db->get()->result();
    }
    function SingleClient($id){
        $this->db->where($id);
        return $this->db->get($this->client)->result();
    }
    function ProductCat($cat){
        $this->db->escape($cat);
        $this->db->where($cat);
        return $this->db->get($this->produit)->result();
    }

    //services model for user
    function AllServices(){
        return $this->db->get($this->service)->result();
    }

    //Question model for user
    function AddQuestion($data){
        $this->db->escape($data);
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

    function newAchat($data){
        $this->db->escape($data);
        $this->db->insert($this->achat,$data);
    }

    //Partenaires Model for User
    function AllPartenaires(){
        return $this->db->get($this->partenaires)->result();
    }

    //membres Models for User
    function AllMembres(){
        return $this->db->get($this->membre)->result();
    }
    //Connnexion models for users

    function connection($data){
        $this->db->escape($data);
        $this->db->where($data);
        $q=$this->db->get($this->client);
        $res=$q->result();
        return $res;
    }
    function AddClient($data)
    {
        $this->db->escape($data);
        $this->db->insert($this->client,$data);
        return $ids=$this->db->insert_id();
    }
    function AddClienPan($data){
        $this->db->escape($data);
        $this->db->insert($this->AchatClient,$data);
    }

}