<?php
class memberModel extends basesql{

	protected $id;
	protected $lastname;
	protected $firstname;
	protected $picture;
	protected $id_member;
	protected $email;

	public function __construct($lastname="", $firstname="", $picture="", $id_member=0, $email=""){

		parent::__construct();

    	$this->setLastame($lastname);
    	$this->setFirstname($firstname);
    	$this->setPicture($picture);
    	$this->setIdMember($id_member);
    	$this->setEmail($email);
	}


	// SETTERS
	public function setLastame($lastname){
		$this->lastname = trim($lastname);
	}
	public function setFirstname($firstname){
		$this->firstname = trim($firstname);
	}
	public function setPicture($picture){
		$this->picture = trim($picture);
	}
	public function setIdMember($id_member){
		$this->id_member = trim($id_member);
	}
	public function setEmail($email){
		$this->email = $email;
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
	public function getIdMember(){
		return $this->id_member;
	}
	public function getEmail(){
		return $this->email;
	}
}
