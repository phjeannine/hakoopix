<?php
class contestModel extends basesql{

	protected $id_contest;
	protected $title;
	protected $date_begin;
	protected $date_ending;
	protected $description;
	protected $color_theme;
	protected $banner;
	protected $logo;
	protected $is_active;
	protected $id_picture;

	public function __construct($id=-1, $title="", $date_begin="", $date_ending="", $description="", $color_theme="", $status=0){
		
		parent::__construct();

		$this->setId($id);
    	$this->setName($name);
    	$this->setSurname($surname);
    	$this->setEmail($email);
    	$this->setPwd($pwd);
    	$this->setStatus($status);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
	}
	public function setName($name){
		$this->name = trim($name);
	}
	public function setSurname($surname){
		$this->surname = trim($surname);
	}
	public function setEmail($email){
		$this->email = trim($email);
	}
	public function setPwd($pwd){
		$this->pwd = md5($pwd);
	}
	public function setStatus($status){
		$this->status = $status;
	}


	// GETTERS
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPwd(){
		return $this->pwd;
	}
	public function getStatus(){
		return $this->status;
	}


}





