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


	public function connect() {
		try{
			$this->pdo = new PDO($this->connect, $this->user_sql, $this->pwd_sql);	
		} catch(Exception $e) {
			die("Erreur SQL ".$e->getMessage());
		}
	}

	public function save(){

		//Je récupère toutes les variables
		$all_vars = array_keys(get_object_vars($this));
		$pdo_vars = array_keys(get_class_vars(get_class()));
		$child_vars = array_diff($all_vars, $pdo_vars);
		//id, name, surname, email, pwd, status
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

			$query->execute($array_to_execute);


		}else{
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

	public function delete(){
		
	}


	public function getOneBy($value, $column = "id"){
		$sql = "SELECT * FROM ".$this->table." WHERE ".$column."=:".$column." limit 1";
		$query = $this->pdo->prepare($sql);
		$query->execute([$column=>$value]);
		//Je précise que dans le retour j'aurai un format [id=1, name=skrzypczyk] ....
		$query->setFetchMode(PDO::FETCH_ASSOC);
		//Je retourne le résultat de la requête dans la variable data sous forme de tableau
		$data = $query->fetch();
		//Je vérifie que le tableau n'est pas vide
		if(!empty($data))
		{
			//J'alimente l'enfant
			foreach ($data as $propName => $propValue)
			{
			    $this->$propName = $propValue;
			}
		}
	}






}