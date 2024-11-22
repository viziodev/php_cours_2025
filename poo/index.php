<?php 

//Design Pattern
//Principes SOLID
//1-Single Responsability ==>Principe de la Responsability unique
//O Open Close Principal 
//D Dependancy Injection
//Achitecture
 //MVC
    //Model =Entity+Repository
    //1-Description des donnees  ou Diagramme de classe ==> Entity
    //2-communique avec la source de Donnee(array,fichier,base de donnee)==>Repository
  //Controller Interagir avec les vues + Services Definir les Use Case==> Fonctionnel
  class Stokage{
    private array $bd;
    private function __construct(){
        $this->bd=[];
    }
    public function findAll(){return    $this->bd;}
    public function add(array $client){
        array_push($bd,$client);
        //$this->bd[] = $client;
    }
  }

  //Model
  class ClientModel{
 //Description des donnees  ou Diagramme de classe ==> Entity
    private int $id;
    public string $nom;
    private string $prenom;
    private string $surname;
    private string $adresse;
    private string $telephone;


    //Couplage
    private Stokage $stokage;

    private function __construct(){
        $this->stokage=new Stokage();
    }
  //Acces aux donnees==>Repository ==>Crud (create, update, delete,read)
    public function create(array $client){
        $this->stokage->add($client);
    }
 }

  class ClientController{
     //Couplage
    private ClientModel $clientModel;

    private function __construct(){
        $this->clientModel=new ClientModel();
    }
     public function enregistrerClient(array $client){
      
        $this->clientModel->create($client);
     }
  }


  //View  ==>Ecrans qui exposent les fonctionnalites
  class View {
     //Couplage
    private ClientController $clientController;

    private function __construct(){
        $this->clientController=new ClientController();
    } 
  public function render(){
    //Menu Principal
    while(true){
      echo"\nGestion Cahier de Dette";
      echo"\n1-Enregistrer Client";
      echo"\n2-Enregistrer Dette";
      echo"\n3-Lister Dette"; 
      echo"\n4-Quitter";
      echo"\nFaites votre choix\n";
      $choix=trim(fgets(STDIN)) ; 

      switch ($choix) {
        case '1':
            echo"Entrer le nom du client \n";
              $nom=trim(fgets(STDIN)); 
              $this->clientController->enregistrerClient([
                "nom" => $nom,
              ]);
            break;
        case '2':
                # code...
                break;
        case '3':
           # code...
           break;   
        
         case '4':
                        # code...
         exit() ;
        default:
            # code...
            break;
      }


    }

}

}

//Appel 
$view = new View;
$view->render();