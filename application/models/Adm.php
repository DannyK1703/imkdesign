<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Model
{
    public $admin='Admin';
    public $articles='Articles';
    public $membre='membres';
    public $categorie='categorie';
    public $partenaires='Partenaires';
    public $questions='Questions';
    public $reponce='Reponce';
    public $service='Service';
    public $achat='Achat';
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

}