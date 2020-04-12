<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Model
{
    public $admin='Admin';
    public $articles='Articles';
    public $membres='membres';
    public $categorie='categorie';
    public $partenaires='Partenaires';
    public $questions='Questions';
    public $reponces='Reponce';
    public $services='Service';
    public $achats='Achat';
    function authentification($data){
        $this->db->where($data);
        $q=$this->db->get($this->admin);
        $res=$q->result();
        return $res;
    }
    function listQuestions(){
        return $this->db->get($this->questions)->result();
    }


    //Articles Model for Admin

    function AllArticles(){
        return $this->db->get($this->articles)->result();
    }
    function SingleArticle($data){
        $this->db->where($data);
        $q=$this->db->get($this->articles);
        $res=$q->result();
        return $res;
    }
    function ArticleCat($idcat){
        $this->db->where($idcat);
        $q=$this->db->get($this->articles);
        $res=$q->result();
        return$res;
    }

    function ArticleProm($state){
        $this->db->where($state);
        $q=$this->db->get($this->articles);
        $res=$q->result();
        return$res;
    }
    function AddArticle($art){
        $this->db->insert($this->articles, $art);
    }
    function UpdateArticle($art,$id){
        $this->db->set($art);
        $this->db->where($id);
        $this->db->update($this->articles);
    }
    function DeleteArticle($id){
        $this->db->where($id);
        $this->db->delete($this->articles);
    }
    function DeleteAllArticles(){
        $this->db->delete($this->articles);
    }


    //Parteners Models for Admins

    function AllPartenaire(){
        return $this->db->get($this->partenaires)->result();
    }
    function Partenaire($id){
        $this->db->where($id);
        $q=$this->db->get($this->partenaires);
        $res=$q->result();
        return$res;
    }
    function UpdatePartenaire($id,$part){
        $this->db->set($part);
        $this->db->where($id);
        $this->db->update($this->partenaires);
    }
    function DeletePartenaire($id){
        $this->db->where($id);
        $this->db->delete($this->partenaires);
    }
    function AddPartenaire($data){
        $this->db->insert($this->partenaires, $data);
    }


    //Membres Model for Admin

    function AllMembres(){
        return $this->db->get($this->partenaires)->result();
    }
    function UpdateMembre($id,$mbr){
        $this->db->set($mbr);
        $this->db->where($id);
        $this->db->update($this->membres);
    }
    function DeleteMembres($id){
        $this->db->where($id);
        $this->db->delete($this->membres);
    }
    function AddMembre($data){
        $this->db->insert($this->membres, $data);
    }
    function SingleMembre($id){
        $this->db->where($id);
        $q=$this->db->get($this->membres);
        $res=$q->result();
        return$res;
    }

    
}