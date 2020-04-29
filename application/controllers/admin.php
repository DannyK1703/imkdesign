<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    //Admin Access to firt page
    public function index(){
        $this->load->view('Admin/index');
    }

//CONNECTIONS FUNCTIONS
    public function autentification(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
        if($this->form_validation->run()) {
            $name = $this->input->post('login');
            $pwd = $this->input->post('pwd');
            $Auth = array(
                'Login' => $name,
                'Mdp' => $pwd
            );
            $this->load->model('Adm');
            $res = $this->Adm->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $ret = array('login' => $user->Login, 'mdp' => $user->Mdp, 'is_connected' => true);

                if ($pwd == $ret['mdp']) {
                    $this->session->set_userdata($ret);
                    $this->load->model('Adm');
                    $liste['questions'] = $this->Adm->listQuestions();
                    $this->load->view('Admin/navbar');
                    $this->load->view('Admin/accueil', $liste);
                }

            }else{
                $this->load->view('Admin/index');
            }


        }else{
            $this->load->view('Admin/index');
        }
    }

    public function deconnecter(){
        $this->session->unset_userdata('is_connected');
        redirect('Admin/index');
    }
//ACCUEIL FUNCTIONS

    public function accueil(){
        $this->load->model('Adm');
        $liste['questions'] = $this->Adm->listQuestions();
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/accueil', $liste);
    }



    //ARTICLE FUNCTIONS

    public function prodcat($idcat){
        $id=array('categorie_idcategorie'=>$idcat);
        $this->load->model('Adm');
        $list['prods']=$this->Adm->ArticleCat($id);
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/prodcat',$list);
    }
    public function AddArticle($idcat){
        $nom=$this->input->post('nom');
        $description=$this->input->post('desc');
        $prix=$this->input->post('prix');
        $cat=$this->input->post('categorie');
        $img=$this->input->post('image');
        $etat=$this->input->post('etat');
        $data=array(
            'NomArticle'=>$nom,
            'DescArticle'=>$description,
            'PrixArticle'=>$prix,
            'like'=>0,
            'categorie_idcategorie'=>$cat,
            'taille_idtaille'=>1,
            'Color_idColor'=>1,
            'imgArticle'=>$img,
            'etat'=>$etat
        );
        $this->load->model('Adm');
        $this->Adm->AddArticle($data);
        $this->prodcat($idcat);
    }

    public function modifArticle($id,$idcat){
        $nom=$this->input->post('nom');
        $desc=$this->input->post('desc');
        $prix=$this->input->post('prix');
        $img=$this->input->post('img');
        $etat=$this->input->post('etat');
        $data=array(
            'NomArticle'=>$nom,
            'DescArticle'=>$desc,
            'PrixArticle'=>$prix,
            'imgArticle'=>$img,
            'etat'=>$etat
        );
        $ids=array('idArticles'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateArticle($data,$ids);
        $this->prodcat($idcat);
    }

    public function suppArticle($idcat,$id){
        $ids=array('idArticles'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteArticle($ids);
        $this->prodcat($idcat);
    }

//CATEGORIE FUNCTION
    public function categories(){
        $this->load->model('Adm');
        $categ['categ']=$this->Adm->AllCategories();
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/categories',$categ);
    }

    public function modifCat($id){
        $nom=$this->input->post('titre');
        $desc=$this->input->post('desc');
        $data=array(
            'nomCategorie'=>$nom,
            'descCategorie'=>$desc
        );
        $ids=array('idcategorie'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateCategorie($ids,$data);
        $this->categories();
    }
    public function suppCat($id){
        $ids=array('idcategorie'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteCategorie($ids);
        $this->categories();
    }
    public function AddCat(){
        $nom=$this->input->post('titre');
        $desc=$this->input->post('desc');
        $data=array(
            'nomCategorie'=>$nom,
            'descCategorie'=>$desc
        );

        $this->load->model('Adm');
        $this->Adm->AddCategorie($data);
        $this->categories();
    }

    //MEMBRES FUNCTIONS

    public function Membres(){
        $this->load->model('Adm');
        $liste['mbres']=$this->Adm->AllMembres();
        $this->load->view('Admin/membres',$liste);
    }
    public function modifMembre($ids){
        $nom=$this->input->post('nom');
        $desc=$this->input->post('desc');
        $mail=$this->input->post('mail');
        $img=$this->input->post('img');
        $data=array(
            'NomMembre'=>$nom,
            'DescMembre'=>$desc,
            'email'=>$mail,
            'imgMembre'=>$img
        );
        $id=array('idMembre'=>$ids);
        $this->load->model('Adm');
        $this->Adm->UpdateMembre($id,$data);
        $this->Membres();
    }
    public function suppMembre($id){
        $ids=array('idMembre'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteMembres($ids);
        $this->Membres();
    }
    public function AddMember(){
        $nom=$this->input->post('nom');
        $desc=$this->input->post('desc');
        $mail=$this->input->post('mail');
        $img=$this->input->post('img');
        $data=array(
            'NomMembre'=>$nom,
            'DescMembre'=>$desc,
            'email'=>$mail,
            'imgMembre'=>$img
        );

        $this->load->model('Adm');
        $this->Adm->AddMembre($data);
        $this->Membres();
    }


    //PARTAINERS FUNCTIONS
    public function Partenaires(){
        $this->load->model('Adm');
        $list['part']=$this->Adm->AllPartenaire();
        $this->load->view('Admin/partenaires',$list);
    }

    public function AddPart(){
        $nom=$this->input->post('nom');
        $img=$this->input->post('img');
        $web=$this->input->post('web');

        $data=array(
            'NomPartenaires'=>$nom,
            'imagePartenaires'=>$img,
            'WebPartenaires'=>$web
        );
        $this->load->model('Adm');
        $this->Adm->AddPartenaire($data);
        $this->Partenaires();
    }
    public function ModifPart($id){
        $nom=$this->input->post('nom');
        $img=$this->input->post('img');
        $web=$this->input->post('web');

        $data=array(
            'NomPartenaires'=>$nom,
            'imagePartenaires'=>$img,
            'WebPartenaires'=>$web
        );
        $ids=array('idPartenaires'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdatePartenaire($ids,$data);
        $this->Partenaires();
    }
    public function suppPart($id){
        $ids=array('idPartenaires'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeletePartenaire($ids);
        $this->Partenaires();
    }


    //SERVICE FUNCTIONS

    public function service(){
        $this->load->model('Adm');
        $list['serv']=$this->Adm->AllServices();
        $this->load->view('Admin/services',$list);
    }

    public function AddServ(){
        $nom=$this->input->post('nom');
        $logo=$this->input->post('logo');
        $desc=$this->input->post('desc');
        $data=array('NomService'=>$nom,
                    'logoService'=>$logo,
                    'DescService'=>$desc);
        $this->load->model('Adm');
        $this->Adm->AddService($data);
        $this->service();
    }

    public function ModifServ($id){
        $nom=$this->input->post('nom');
        $logo=$this->input->post('logo');
        $desc=$this->input->post('desc');
        $data=array('NomService'=>$nom,
            'logoService'=>$logo,
            'DescService'=>$desc);
        $ids=array('idService'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateService($ids,$data);
        $this->service();
    }
    public function suppServ($id){
        $ids=array('idService'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteService($ids);
        $this->service();
    }

    //ADMINS FUNCTIONS
    public function Admins(){
        $this->load->model('Adm');
        $liste['adm']=$this->Adm->AllAdmin();
        $this->load->view('Admin/admins',$liste);
    }

    public function AddAdmin(){
        $nom=$this->input->post('nom');
        $mail=$this->input->post('mail');
        $login=$this->input->post('login');
        $data=array('NomAdmin'=>$nom,
                    'EmailAdmin'=>$mail,
                    'login'=>$login,
                    'Mdp'=>'imk2020',
                    'img'=>'default.png');
        $this->load->model('Adm');
        $this->Adm->AddAdmin($data);
        $this->Admins();
    }

    public function ModifAdmin($id){
        $mail=$this->input->post('mail');
        $login=$this->input->post('login');
        $mdp=$this->input->post('mdp');
        $img=$this->input->post('img');
        $data=array(
            'EmailAdmin'=>$mail,
            'login'=>$login,
            'Mdp'=>$mdp,
            'img'=>$img);
        $ids=array('idAdmin'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateAdmin($ids,$data);
        $this->Admins();
    }

//MSG FUNCTIONS

    public function msg(){
        $this->load->model('Adm');
        $liste['qst']=$this->Adm->listQuestions();
        $this->load->view('question',liste);
    }

    //REPONCES FONCTIONS
    public function Reponce(){
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->AllReponces();
        $this->load->view('reponces',liste);
    }
    public function AddReponce($idadm){
        $msg=$this->input->post('msg');
        $question=$this->input->post('qst');

        $data=array('Message'=>$msg,
                    'Admin_idAdmin'=>$idadm,
                    'Questions_idQuestions'=>$question);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->AddReponce($data);
        $this->Reponce();
    }
    public function suppReponce($id){
        $ids=array('idReponce'=>$id);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->DeleteReponce($ids);
        $this->Reponce();
    }
    public function ModifRep($id,$idadm){
        $msg=$this->input->post('msg');
        $data=array('Message'=>$msg,
            'Admin_idAdmin'=>$idadm
            );
        $ids=array('idReponce'=>$id);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->UpdateReponce($ids,$data);
        $this->Reponce();
    }


}