<?php
require_once 'C:\xampp\htdocs\frameworkk\Model\etudiant.php'; 
require_once 'C:\xampp\htdocs\frameworkk\Model\etudiantTransaction.php';
require_once 'C:\xampp\htdocs\frameworkk\View\view.php'; 

class ControllerEtudiant {
private $etudiant ;
private $etudiantTransaction;

public function __construct() {

    $this->etudiant = new Etudiant();
    $this->etudiantTransaction = new EtudiantTransaction(); 
}
// Affiche la liste de tous les billets du blog 

public function welcome() {
        $etudiants = $this->etudiantTransaction->getList(); 
       $view = new View("Welcome"); 
       $view->generate(array('etudiants' => $etudiants));
} 
public function viewModifier(){
    $view=new View("Modifier");
    $view->generate([]);
}

public function viewAjouter(){
    $view=new View("Ajouter");
    $view->generate([]);
    
}
public function viewAction(){
    $view=new View("Action");
    $view->generate([]);
    
}
public function viewError($msg){
    $view=new View("Action");
    $view->generate([$msg]);


}
// une nouvelle action get one Personne
public function getOne($id) {

    
   
    $etudiant = $this->etudiantTransaction->get($id); 
   $view = new View("Etudiant"); 
   $view->generate(array('Nom' => $etudiant->getNom(),'Prenom' => $etudiant->getPrenom(),'Age' => $etudiant->getAge(),'Cne' => $etudiant->getCne(),));
} 
public function ajouter($nom,$prenom,$age,$cne){
   
    $etudiant=new Etudiant($nom,$prenom,$age,NULL,$cne);
    $this->etudiantTransaction->add($etudiant);
   
}
public function modifier($id,$nom,$prenom,$age,$cne){
    $etudiant=new Etudiant($nom,$prenom,$age,$id,$cne);
    $this->etudiantTransaction->update($etudiant);
}
public function supprimer($id,$nom,$prenom,$age,$cne){
    $etudiant=new Etudiant($nom,$prenom,$age,$id,$cne);
    $this->etudiantTransaction->delete($etudiant);


}
}