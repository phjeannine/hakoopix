<?php
class usersModel extends basesql{

	protected $id_member;
	protected $lastname;
	protected $firstname;
	protected $picture;

	public function __construct($id_member=-1, $lastname="", $firstname="", $picture=""){

		parent::__construct();

		  $this->setIdMember($id_member);
    	$this->setLastame($lastname);
    	$this->setFirstname($firstname);
    	$this->setPicture($picture);
	}


	// SETTERS
	public function setIdMember($id_member){
		if(!is_numeric($id_member)) die();
		$this->id_member = $id_member;
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
	public function getIdMember(){
		return $this->id_member;
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
