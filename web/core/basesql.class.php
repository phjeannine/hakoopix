<?php 
class basesql{

	private $pdo;
	private $connect = "pgsql:host=ec2-54-204-8-224.compute-1.amazonaws.com;dbname=d5p9s6nvf6ggtq";
	private $user_sql = "bjcjnkzygeqlza";
	private $pwd_sql = "zmXSRzTXA2OWa_KOCJTbD53g82";
	private $table;
	private $class;

	public function __construct(){
		$this->connect();
		//je récupère le nom de la classe enfant
		$this->class = get_called_class();
		//je supprime le suffixe "Model"
		$this->table = str_replace("Model", "", $this->class);
	}

	//Fonction qui permet de se connecter à la base de donnée
	public function connect() {
		try{
			$this->pdo = new PDO($this->connect, $this->user_sql, $this->pwd_sql);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
			die("Erreur SQL ".$e->getMessage());
		}
	}

	public function save(){

		//On récupère toutes les variables
		$all_vars = array_keys(get_object_vars($this));
		$pdo_vars = array_keys(get_class_vars(get_class()));
		$child_vars = array_diff($all_vars, $pdo_vars);
		//Via PDO je fais un prepare
		if(is_numeric($this->id) && $this->id>0)
		{
			// "Update";
			foreach ($child_vars as $var) {
				$array_to_execute[$var] = $this->$var;
				$set_sql[]= $var."=:".$var;
			}
			$sql = "UPDATE ".$this->table." SET ".implode(",", $set_sql)." WHERE id=:id;";
			$query = $this->pdo->prepare($sql);
			print_r($array_to_execute);
			$query->execute($array_to_execute);
		} else {
			// "Insert";
			unset($child_vars[0]);
			$sql = "INSERT INTO ".$this->table." 
					( " . implode(",", $child_vars) . ") 
					VALUES ( :" . implode(",:", $child_vars) . ");";
					echo $sql;
			$query = $this->pdo->prepare($sql);

			foreach ($child_vars as $var) {
				$array_to_execute[$var] = $this->$var;
			}
			
			print_r($array_to_execute);
			$query->execute($array_to_execute);
		}
	}

	// cette fonction permet de mettre à jour l'état du concour active en état inactive (false)
	public function updateCurActive(){
		$all_vars = array_keys(get_object_vars($this));
		$pdo_vars = array_keys(get_class_vars(get_class()));
		$child_vars = array_diff($all_vars, $pdo_vars);

		foreach ($child_vars as $var) {
			$array_to_execute[$var] = $this->$var;
			$set_sql[]= $var."=:".$var;
		}

		$sql = "UPDATE ".$this->table." SET ".implode(",", $set_sql)." WHERE is_active=true;";
		$query = $this->pdo->prepare($sql);
		$query->execute($array_to_execute);
	}

	// La méthode countRow() retourne le nombre d'utilisateur enregistré dans la BDD
	public function countRow() {
		$sql = "SELECT count(*) FROM ".$this->table;
		$query = $this->pdo->prepare($sql);
		$colcount = $query->columnCount();
		$query->execute();
		//$query->setFetchMode(PDO::FETCH_ASSOC);
	}

	// Cette méthode retourne l'objet correspondant à l'ID passé en paramètre
	public function getOneBy($value, $column = "id"){
		$sql = "SELECT * FROM ".$this->table." WHERE ".$column."=:".$column." limit 1";
		$query = $this->pdo->prepare($sql);
		$query->execute([$column=>$value]);
		//On précise que dans le retour j'aurai un format [id=1, name=skrzypczyk] ....
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//On retourne le résultat de la requête dans la variable data sous forme de tableau
		$data = $query->fetch();
		//On vérifie que le tableau n'est pas vide
		if(!empty($data))
		{
			//On alimente l'enfant
			foreach ($data as $propName => $propValue)
			{
			    $this->$propName = $propValue;
			}
		}
	}

	// Cette méthode retourne l'objet correspondant à l'id_member (de facebook) passé en paramètre
	public function getOneByIdmember($value, $column = "id_member"){
		$sql = "SELECT * FROM ".$this->table." WHERE ".$column."=:".$column." limit 1";
		$query = $this->pdo->prepare($sql);
		$query->execute([$column=>$value]);
		//On précise que dans le retour j'aurai un format [id=1, name=skrzypczyk] ....
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//On retourne le résultat de la requête dans la variable data sous forme de tableau
		$data = $query->fetch();
		//On vérifie que le tableau n'est pas vide
		if(!empty($data))
		{
			//On alimente l'enfant
			foreach ($data as $propName => $propValue)
			{
			    $this->$propName = $propValue;
			}
		}
	}

	// cette méthode retourne l'ensemble des objets contenu de la table qui l'appel
	public function getAll($value){
		$sql = "SELECT * FROM ".$this->table;
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//On retourne le résultat de la requête dans la variable data sous forme de tableau
		$data = $query->fetchAll();
		//On vérifie que le tableau n'est pas vide
		if(!empty($data))
		{
			//On alimente l'enfant
			foreach ($data as $propName => $propValue)
			{
			    $this->$propName = $propValue;
			}
		}
	}

	// cette méthode retourne le concours active 
	public function getOneByActive($value, $column = "is_active"){
		$sql =  "SELECT * FROM ".$this->table." WHERE ".$column."=:".$column;
		$query = $this->pdo->prepare($sql);
		$query->execute([$column=>$value]);
		//On précise que dans le retour j'aurai un format [id=1, name=skrzypczyk] ....
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//On retourne le résultat de la requête dans la variable data sous forme de tableau
		$data = $query->fetch();
		//Je vérifie que le tableau n'est pas vide
		if(!empty($data))
		{
			//On alimente l'enfant
			foreach ($data as $propName => $propValue)
			{
			    $this->$propName = $propValue;
			}
		}
		
	}

	//cette fonction retourne l'ensemble des concours crées (par ordre ascendant) 
	public function getAllContest($column = "title") {
		$sql = 'SELECT * FROM ' . $this->table.' ORDER BY ' . $column . ' ASC';
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}

	// Sélection des 8 derniers concours inscrits => page d'accueil dashboard
	public function getContestByLimit($column = "id") {
		$sql = 'SELECT * FROM ' . $this->table.' ORDER BY ' . $column . ' ASC';
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}

	// Cette méthode permet de retourner le concours sélectionné
	public function getOneContest($selected_contest = "Concours Oasis", $column = "title") {
		$sql =  "SELECT * FROM ".$this->table." WHERE ".$column." = '".$selected_contest."'";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$data = $query->fetch();
		return $data;
	}

	// Sélection des 8 derniers utilisateurs inscrits => page d'accueil dashboard
	public function getUserByLimit($column = "id") {
		$sql = 'SELECT * FROM ' . $this->table.' ORDER BY ' . $column . ' ASC';
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$data = $query->fetchAll();
		return $data;
	}

	// Récupérer le concours actif
	public function getActiveContest() {
		$sql = 'SELECT * FROM contest WHERE is_active = TRUE';
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$data = $query->fetch();
		return $data;
	}

	// Passe a false le concours actif
	public function unsetActiveContest($id) {
		$sql = "UPDATE contest SET is_active = false WHERE id = " . $id;
		$query = $this->pdo->prepare($sql);
		$query->execute();
	}

}