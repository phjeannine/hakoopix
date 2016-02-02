<?php
class usersModel extends basesql{

	protected $id;
	protected $lastname;
	protected $firstname;
	protected $picture;

	public function __construct($id=-1, $lastname="", $firstname="", $picture=""){

		parent::__construct();

		$this->setIdMember($id_member);
    	$this->setLastame($lastname);
    	$this->setFirstname($firstname);
    	$this->setPicture($picture);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
	}
	public function setLastame($lastname){
		$this->lastname = trim($lastname);
	}
	public function setFirstname($firstname){
		$this->firstname = trim($firstname);
	}
	public function setPicture($picture){
		$this->picture = trim($picture);
	}


	// GETTERS
	public function getId(){
		return $this->id;
	}
	public function getLastname(){
		return $this->lastname;
	}
	public function getFirstname(){
		return $this->firstname;
	}
	public function getPicture(){
		return $this->picture;
	}

}
