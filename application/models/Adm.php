<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Model
{
    public $admin='admin';
    public $articles='Articles';
    public $membres='membre';
    public $categories='categorie';
    public $partenaires='Partenaires';
    public $questions='Questions';
    public $reponces='Reponce';
    public $services='Service';
    public $achats='Achat';

   /* function __construct() {
        $this->load->library('encrypt');
    }

    public function validate($mail, $password) {
        if (($passwd_crypt = $this->_getUser($mail)) !== FALSE)
            return (bool) ($password == $passwd_crypt);
        return false;
    }

    private function _getUser($mail) {
        $user = $this->db->select(array('mail', 'password'))->get_where($this->_table, array('mail' => $mail))->row();
        if (isset($user->password))
            return $this->encrypt->decode($user->password);
        return false;
    }
*/
    function achats(){

        return $this->db->get($this->achats)->result();
    }
    function authentification($data){
        //$this->db->escape($data);
        $this->db->where($data);
        $q=$this->db->get($this->admin);
        $res=$q->result();
        return $res;
    }

    //Questions model for admin
    function listQuestions(){
        $etat=array('etat'=>0);
        $this->db->where($etat);
        return $this->db->get($this->questions)->result();
    }


    //Reponce Model for Admin
    function  AllReponces(){
        return $this->db->get($this->reponces)->result();
    }
    function AddReponce($data){
        //$this->db->escape($data);
        $this->db->insert($this->reponces, $data);
    }
    function DeleteReponce($id){
        $this->db->where($id);
        $this->db->delete($this->reponces);
    }
    function UpdateReponce($id,$data){
        //$this->db->escape($data);
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($this->reponces);
    }


    //Articles Model for Admin

    function AllArticles(){
        return $this->db->get($this->articles)->result();
    }
    function  QteArticles($idcat){
        $this->db->select('idArticles');
        $this->db->from($this->articles);
        $this->db->where($idcat);
        $result=$this->db->get()->result();
        $res=count($result);
        return $res;
    }
    function SingleArticle($data){
        //$this->db->escape($data);
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
        return $res;
    }
    function AddArticle($art){
        //$this->db->escape($art);
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
        return $res;
    }
    function UpdatePartenaire($id,$part){
        //$this->db->escape($part);
        $this->db->set($part);
        $this->db->where($id);
        $this->db->update($this->partenaires);
    }
    function DeletePartenaire($id){
        $this->db->where($id);
        $this->db->delete($this->partenaires);
    }
    function AddPartenaire($data){
        //$this->db->escape($data);
        $this->db->insert($this->partenaires, $data);
    }
    function singlePartenaire($id){
        $this->db->where($id);
        $q=$this->db->get($this->partenaires);
        $res=$q->result();
        return $res;
    }

    //Membres Model for Admin

    function AllMembres(){
        return $this->db->get($this->membres)->result();
    }
    function UpdateMembre($id,$mbr){
        //$this->db->escape($mbr);
        $this->db->set($mbr);
        $this->db->where($id);
        $this->db->update($this->membres);
    }
    function DeleteMembres($id){
        $this->db->where($id);
        $this->db->delete($this->membres);
    }
    function AddMembre($data){
        //$this->db->escape($data);
        $this->db->insert($this->membres, $data);
    }
    function SingleMembre($id){
        $this->db->where($id);
        $q=$this->db->get($this->membres);
        $res=$q->result();
        return $res;
    }

    //Categorie Model for Admin

    function AddCategorie($data){
        //$this->db->escape($data);
        $this->db->insert($this->categories, $data);
    }
    function SingleCategorie($id){
        $this->db->where($id);
        $q=$this->db->get($this->categories);
        $res=$q->result();
        return $res;
    }
    function AllCategories(){
        return $this->db->get($this->categories)->result();
    }
    function UpdateCategorie($id,$cat){
        //$this->db->escape($cat);
        $this->db->set($cat);
        $this->db->where($id);
        $this->db->update($this->categories);
    }
    function DeleteCategorie($id){
        $this->db->where($id);
        $this->db->delete($this->categories);
    }

    //Services Model for Admin

    function AddService($data){
        //$this->db->escape($data);
        $this->db->insert($this->services, $data);
    }
    function AllServices(){
        return $this->db->get($this->services)->result();
    }
    function UpdateService($id,$serv){
        //$this->db->escape($serv);
        $this->db->set($serv);
        $this->db->where($id);
        $this->db->update($this->services);
    }
    function DeleteService($id){
        $this->db->where($id);
        $this->db->delete($this->services);
    }
    function SingleService($id){
        $this->db->where($id);
        $q=$this->db->get($this->services);
        $res=$q->result();
        return $res;
    }


    //Achat Model for Admin

    function AllAchat(){
        return $this->db->get($this->achats)->result();
    }
    function SingleAchat($id){
        $this->db->where($id);
        $q=$this->db->get($this->achats);
        $res=$q->result();
        return $res;
    }

    //Admin Model for Admin

    function AllAdmin(){
        return $this->db->get($this->admin)->result();
    }
    function AddAdmin($data){
        //$this->db->escape($data);
        $this->db->insert($this->admin, $data);
    }
    function DeleteAdmin($id){

        $this->db->where($id);
        $this->db->delete($this->admin);
    }
    function UpdateAdmin($id,$data){
        //$this->db->escape($data);
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($this->admin);
    }
    function SingleAdmin($id){
        $this->db->where($id);
        $q=$this->db->get($this->admin);
        $res=$q->result();
        return $res;
    }
}