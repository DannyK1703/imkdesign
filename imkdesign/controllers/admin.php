<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    //Admin Access to firt page
    public function VerifSession(){
		
		if($this->session->connected==true){
			return true;
		
		}
		else{
			redirect("Admin/index");
		}
	}
    public function index(){
        $health_d=array(
            'error_login'=> ''
        );
        $this->session->set_flashdata($health_d);
        $this->load->view('Admin/index');
    }



//CONNECTIONS FUNCTIONS
    public function autentification(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => 'Le login dois avoir 4 caractères minimum'));
        $this->form_validation->set_rules('pwd','pwd', 'required|min_length[4]|trim|xss_clean|strip_tags',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => 'Le Mot de passe dois avoir 4 caractères minimum'));
        if($this->form_validation->run()) {
            $name = $this->input->post('login',TRUE);
            $pwd = $this->input->post('pwd',TRUE);
            $pwd=hash('fnv1a64',$pwd);
            $Auth = array(
                'Login' => $name,
                'Mdp' => $pwd
            );
           $this->security->xss_clean($Auth);
            $this->load->model('Adm');
            $res = $this->Adm->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
                $ret = array('id'=>$user->idAdmin,'login' => $user->Login,'img'=>$user->img, 'nom' =>$user->NomAdmin,'connected' => true,'email'=>$user->EmailAdmin);

                if ($ret['connected'] && $user->Mdp!=hash('fnv1a64','imk2020D')) {

                    $this->session->set_userdata($ret);
                    $this->load->model('Adm');
                    $liste['categ'] = $this->Adm->AllCategories();

                    $this->accueil();
                }
                else if($ret['connected'] && $user->Mdp==hash('fnv1a64',$pwd))
                {
                    $this->load->model('Adm');
                    $idi=array('idAdmin'=>$ret['id']);
                    $reto=$this->Adm->SingleAdmin($idi);

                    if (count($reto)==1) {
                        $cat = $reto[0];
                        $this->load->view('Admin/navAdmin',$user);
                        $this->load->view('Admin/modifAdm', $cat);
                        $this->accueil();
                    }
                }
                else{
                    $health_d=array(
                        'error_login'=> 'login ou mot de passe incorrect'
                    );
                    $this->session->set_flashdata($health_d);
                   $this->load->view('Admin/index');
                    //echo '2';
                }

            }
            else{
                $health_d=array(
                    'error_login'=> 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($health_d);
                $this->load->view('Admin/index');
                //echo 'zero';
            }


        }else{
            //echo '1';
            $this->load->view('Admin/index');
        }
    }

    public function deconnecter(){
        session_destroy();
        redirect('admin/index');
    }
//ACCUEIL FUNCTIONS

    public function accueil(){
        
        $this->load->model('Adm');

        $a=$this->Adm->AllCategories();
        $datas=array();
        foreach ($a as $f){
            $idcat=array('categorie_idcategorie'=>$f->idcategorie);
            $a=$this->Adm->QteArticles($idcat);
            $b=array('nom'=>$f->nomCategorie,'qte'=>$a);
            array_push($datas,$b);
        }
        $liste['categories']=$datas;
        $liste['Achat']=$this->Adm->achats();
        $liste['questions'] = $this->Adm->listQuestions();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/accueil', $liste);
    }

    public function achat_journalier(){
        $this->VerifSession();
        $this->load->model('Adm');

        $data=array();
            $a=$this->Adm->achats();
            foreach ($a as $art){
                $t = explode('-', $art->date);
                $d=explode(' ',$t[2]);
                if($t[1] == date('m') and $t[0]== date('Y')and $d[0]==date('d')){
                    $b=$this->Adm->SingleArticle(array('idArticles'=>$art->idArticles));

                    $c=array('idArt'=>$art->idArticles,'nomArt'=>$b[0]->NomArticle,'qte'=>$art->qte,'prix'=>$art->prix);
                    array_push($data,$c);
                }

            }
            $liste['Articles']=$data;

        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/achatjourn', $liste);

    }
        public function achat_mensuel(){
            $this->VerifSession();
            $this->load->model('Adm');

            $data=array();
            $a=$this->Adm->achats();
            foreach ($a as $art){
                $t = explode('-', $art->date);

                if($t[1] == date('m') ){
                    $b=$this->Adm->SingleArticle(array('idArticles'=>$art->idArticles));

                    $c=array('idArt'=>$art->idArticles,'nomArt'=>$b[0]->NomArticle,'qte'=>$art->qte,'prix'=>$art->prix);
                    array_push($data,$c);
                }

            }
            $liste['Articles']=$data;

            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/achatmens', $liste);

        }
        public function achat_annuel()
        {
            $this->VerifSession();
            $this->load->model('Adm');

            $data=array();
            $a=$this->Adm->achats();
            foreach ($a as $art){
                $t = explode('-', $art->date);

                if($t[0] == date('Y') ){
                    $b=$this->Adm->SingleArticle(array('idArticles'=>$art->idArticles));

                    $c=array('idArt'=>$art->idArticles,'nomArt'=>$b[0]->NomArticle,'qte'=>$art->qte,'prix'=>$art->prix);
                    array_push($data,$c);
                }

            }
            $liste['Articles']=$data;

            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/achatannuel', $liste);
        }

    public function prodcat($idcat){
        $this->VerifSession();
        $id=array('categorie_idcategorie'=>$idcat);
        $this->load->model('Adm');
        $list['prods']=$this->Adm->ArticleCat($id);
        $list['cat']=$idcat;
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/prodcat',$list);
    }
    public function newArticle($id){
        $this->VerifSession();
        $list['idcat']=$id;
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newArticle',$list);
    }

    public function modifierArt($id){
        $this->VerifSession();
        $ids=array('idArticles'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleArticle($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifArt',$cat);
        }

    }
    public function AddArticle($idcat){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $description=$this->input->post('desc',TRUE);
        $prix=$this->input->post('prix',TRUE);

        $img=$this->input->post('image',TRUE);
        $etat=$this->input->post('etat',TRUE);
        $config['upload_path']          = './Assets/img/product';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            //echo 'reussite';
        $data=array(
            'NomArticle'=>$nom,
            'DescArticle'=>$description,
            'PrixArticle'=>$prix,
            'like'=>0,
            'categorie_idcategorie'=>$idcat,
            'taille_idtaille'=>1,
            'Color_idColor'=>1,
            'imgArticle'=>$ty['file_name'],
            'etat'=>$etat
        );
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $this->Adm->AddArticle($data);
        $this->prodcat($idcat);
    }}

    public function modifArticle($id,$idcat){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $prix=$this->input->post('prix',TRUE);
        $img=$this->input->post('img',TRUE);
        $etat=$this->input->post('etat',TRUE);
        $config['upload_path']          = './Assets/img/product';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            //echo 'reussite';
        $data=array(
            'NomArticle'=>$nom,
            'DescArticle'=>$desc,
            'PrixArticle'=>$prix,
            'imgArticle'=>$ty['file_name'],
            'etat'=>$etat
        );
        $this->security->xss_clean($data);
        $ids=array('idArticles'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateArticle($data,$ids);
        $this->prodcat($idcat);
    }}

    public function suppArticle($id){
        $this->VerifSession();
        $ids=array('idArticles'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleArticle($ids);
        $this->Adm->DeleteArticle($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->prodcat($cat->categorie_idcategorie);
        }
    }

//CATEGORIE FUNCTION
    public function categories(){
        $this->VerifSession();
        $this->load->model('Adm');
        $categ['categ']=$this->Adm->AllCategories();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/categories',$categ);

    }
    public function newCategorie(){
        $this->VerifSession();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newCat');
    }

    public function modifierCat($id){
        $this->VerifSession();
        $ids=array('idcategorie'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleCategorie($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifcat',$cat);
        }

    }

    public function modifCat($id){
        $this->VerifSession();
        $nom=$this->input->post('titre',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $data=array(
            'nomCategorie'=>$nom,
            'descCategorie'=>$desc
        );
        $this->security->xss_clean($data);
        $ids=array('idcategorie'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateCategorie($ids,$data);
        $this->categories();
    }
    public function suppCat($id){
        $this->VerifSession();
        $ids=array('idcategorie'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteCategorie($ids);
        $this->categories();
    }
    public function AddCat(){
        $this->VerifSession();
        $nom=$this->input->post('titre',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $data=array(
            'nomCategorie'=>$nom,
            'descCategorie'=>$desc
        );
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $this->Adm->AddCategorie($data);
        $this->categories();
    }

    //MEMBRES FUNCTIONS

    public function Membres(){
        $this->VerifSession();
        $this->load->model('Adm');
        $liste['mbres']=$this->Adm->AllMembres();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/membres',$liste);
    }

    public function modifierMembre($id){
        $this->VerifSession();
        $ids=array('idMembre'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleMembre($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifmbr',$cat);
        }

    }

    public function newMembre(){
        $this->VerifSession();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newMbr');
    }
    public function modifMembre($ids){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $mail=$this->input->post('mail',TRUE);
        $img=$this->input->post('img',TRUE);
        $phone=$this->input->post('phone',TRUE);

        $config['upload_path']          = './Assets/images/membres';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            $data=array(
                'NomMembre'=>$nom,
                'DescMembre'=>$desc,
                'email'=>$mail,
                'imgMembre'=>$ty['file_name'],
                'phone'=>$phone
            );
            $this->security->xss_clean($data);
            $id=array('idMembre'=>$ids);
            $this->load->model('Adm');
            $this->Adm->UpdateMembre($id,$data);
            $this->Membres();
        }



    }
    public function suppMembre($id){
        $this->VerifSession();
        $ids=array('idMembre'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteMembres($ids);
        $this->Membres();
    }
    public function AddMembre(){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $mail=$this->input->post('mail',TRUE);
        $img=$this->input->post('img',TRUE);
        $phone=$this->input->post('phone',TRUE);

        $config['upload_path']          = './Assets/images/membres';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            $data=array(
                'NomMembre'=>$nom,
                'DescMembre'=>$desc,
                'email'=>$mail,
                'imgMembre'=>$ty['file_name'],
                'phone'=>$phone
            );
            $this->security->xss_clean($data);
            //echo 'reussite';
        $this->load->model('Adm');
        $this->Adm->AddMembre($data);
        $this->Membres();
    }}


    //PARTAINERS FUNCTIONS
    public function Partenaires(){
        $this->VerifSession();
        $this->load->model('Adm');
        $list['part']=$this->Adm->AllPartenaire();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/partenaires',$list);
    }
    public function newPartenaire(){
        $this->VerifSession();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newPart');
    }
    public function modifierPart($id){
        $ids=array('idPartenaires'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->singlePartenaire($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifpart',$cat);
        }

    }
    public function AddPart(){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $img=$this->input->post('img',TRUE);
        $web=$this->input->post('web',TRUE);

        $config['upload_path']          = './Assets/images/part';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];

        $data=array(
            'NomPartenaires'=>$nom,
            'imagePartenaires'=>$ty['file_name'],
            'WebPartenaires'=>$web
        );
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $this->Adm->AddPartenaire($data);
        $this->Partenaires();
    }}
    public function ModifPart($id){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $img=$this->input->post('img',TRUE);
        $web=$this->input->post('web',TRUE);

        $config['upload_path']          = './Assets/images/part';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];

        $data=array(
            'NomPartenaires'=>$nom,
            'imagePartenaires'=>$ty['file_name'],
            'WebPartenaires'=>$web
        );
        $this->security->xss_clean($data);
        $ids=array('idPartenaires'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdatePartenaire($ids,$data);
        $this->Partenaires();
    }}
    public function suppPart($id){
        $ids=array('idPartenaires'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeletePartenaire($ids);
        $this->Partenaires();
    }


    //SERVICE FUNCTIONS

    public function service(){
        $this->VerifSession();
        $this->load->model('Adm');
        $list['serv']=$this->Adm->AllServices();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/services',$list);
    }

    public function modifierServ($id){
        $this->VerifSession();
        $ids=array('idService'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleService($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifserv',$cat);
        }

    }

    public function newService(){
        $this->VerifSession();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newServ');
    }

    public function AddServ(){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $logo=$this->input->post('logo',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $data=array('NomService'=>$nom,
                    'logoService'=>$logo,
                    'DescService'=>$desc);
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $this->Adm->AddService($data);
        $this->service();
    }

    public function ModifServ($id){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $logo=$this->input->post('logo',TRUE);
        $desc=$this->input->post('desc',TRUE);
        $data=array('NomService'=>$nom,
            'logoService'=>$logo,
            'DescService'=>$desc);
        $this->security->xss_clean($data);
        $ids=array('idService'=>$id);
        $this->load->model('Adm');
        $this->Adm->UpdateService($ids,$data);
        $this->service();
    }
    public function suppServ($id){
        $this->VerifSession();
        $ids=array('idService'=>$id);
        $this->load->model('Adm');
        $this->Adm->DeleteService($ids);
        $this->service();
    }

    //ADMINS FUNCTIONS
    public function Admins(){
        $this->VerifSession();
        $this->load->model('Adm');
        $liste['adm']=$this->Adm->AllAdmin();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/admins',$liste);
    }

    public function Admons(){


        $this->load->view('Admin/admons');
    }


    public function modifierAdmin($id){
        $this->VerifSession();
        $ids=array('idAdmin'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleAdmin($ids);
        if (count($ret)==1){
            $cat=$ret[0];
            $this->load->view('Admin/navAdmin');
            $this->load->view('Admin/modifAdm',$cat);
        }

    }

    public function newAdmin(){
        $this->VerifSession();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/newAdmin');
    }

    public function AddAdmin(){
        $this->VerifSession();
        $nom=$this->input->post('nom',TRUE);
        $mail=$this->input->post('mail',TRUE);
        $login=$this->input->post('login',TRUE);
        $data=array('NomAdmin'=>$nom,
                    'EmailAdmin'=>$mail,
                    'login'=>$login,
                    'Mdp'=>hash('fnv1a64','imk2020D'),
                    'img'=>'default.png');
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $this->Adm->AddAdmin($data);
        $this->Admins();
    }
    public function exo(){
        $this->load->view('Admin/exoupload');
    }
    public function ModifAdmin($id){
        $this->VerifSession();
        $mail=$this->input->post('mail',TRUE);
        $login=$this->input->post('login',TRUE);
        $mdp=$this->input->post('mdp',TRUE);
        $img=$this->input->post('userFile',TRUE);


        $config['upload_path']          = './Assets/images/Admins';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10055;
        $config['max_width']            = 102455;
        $config['max_height']           = 76855;
        $config['file_name']            =$this->session->nom;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'echec';
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $ty=$data['upload_data'];
            //echo 'reussite';
            //*$this->load->view('upload_success', $data);
            $datas=array(
                'EmailAdmin'=>$mail,
                'Login'=>$login,
                'Mdp'=>hash('fnv1a64',$mdp),
                'img'=>$ty['file_name']);
            $this->security->xss_clean($datas);
            $ids=array('idAdmin'=>$id);
            $this->load->model('Adm');
            $this->Adm->UpdateAdmin($ids,$datas);
            $Auth=array('Login'=>$login,'Mdp'=>hash('fnv1a64',$mdp));
            $this->load->model('Adm');
            $res = $this->Adm->authentification($Auth);
            if (count($res) > 0) {
                $user = $res[0];
            $ret = array('id'=>$user->idAdmin,'login' => $user->Login, 'nom' =>$user->NomAdmin,'mdp' => $user->Mdp, 'connected' => true);
                $this->session->set_userdata($ret);
            $this->Admins();}

    }}
    public function SuppAdmin($id,$idac){
        $this->VerifSession();
        $ids=array('idAdmin'=>$id);
        $this->load->model('Adm');
        $ret=$this->Adm->SingleAdmin($ids);
        if (count($ret)==1){
            $cat=$ret[0];

            if($cat->Login!='imkAdmin'){

                    if($idac=='imkAdmin'){
                        /*echo '<pre>';
                        print_r($cat);
                        echo '</pre>';*/

                        $this->Adm->DeleteAdmin($ids);
                        $liste['adm']=$this->Adm->AllAdmin();
                        $this->load->view('Admin/navAdmin');
                        $this->load->view('Admin/admins',$liste);
                    }
                    else{
                        $this->Admons();
                    }

            }
            else{
                $this->Admons();
            }
        }

    }

//MSG FUNCTIONS

    public function msg(){
        $this->VerifSession();
        $this->load->model('Adm');
        $liste['qst']=$this->Adm->listQuestions();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/messages',liste);
    }

    //REPONCES FONCTIONS
    public function Reponce(){
        $this->VerifSession();
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->AllReponces();
        $this->load->view('Admin/navAdmin');
        $this->load->view('Admin/reponces',$liste);
    }

    public function newReponce(){
        $this->VerifSession();
        $this->load->veiw('newRep');
    }

    public function AddReponce($idadm){
        $this->VerifSession();
        $msg=$this->input->post('msg',TRUE);
        $question=$this->input->post('qst',TRUE);

        $data=array('Message'=>$msg,
                    'Admin_idAdmin'=>$idadm,
                    'Questions_idQuestions'=>$question);
        $this->security->xss_clean($data);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->AddReponce($data);
        $this->Reponce();
    }
    public function suppReponce($id){
        $this->VerifSession();
        $ids=array('idReponce'=>$id);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->DeleteReponce($ids);
        $this->Reponce();
    }
    public function ModifRep($id,$idadm){
        $this->VerifSession();
        $msg=$this->input->post('msg');
        $data=array('Message'=>$msg,
            'Admin_idAdmin'=>$idadm
            );
        $ids=array('idReponce'=>$id);
        $this->load->model('Adm');
        $liste['rpc']=$this->Adm->UpdateReponce($ids,$data);
        $this->Reponce();
    }
    public function myn(){

        $a=hash('fnv1a64','imk2021D');
        echo $a;
    }

}