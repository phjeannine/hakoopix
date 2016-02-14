<?php
class pictureModel extends basesql{

	protected $id;
	protected $title;
	protected $description;
	protected $image_link;
	protected $id_contest;
	protected $id_member;
	protected $nb_like;

	public function __construct($id=-1, $title="", $description="", $image_link="", $id_contest="", $id_member="", $nb_like=0){
		
		parent::__construct();

		$this->setId($id);
    	$this->setTitle($title);
    	$this->setDescription($description);
    	$this->setImageLink($image_link);
    	$this->setIdContest($id_contest);
    	$this->setIdMember($id_member);
    	$this->setNbLike($nb_like);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
	}
	public function setTitle($title){
		$this->title = trim($title);
	}
	public function setDescription($description){
		$this->description = trim($description);
	}
	public function setImageLink($image_link){
		$this->image_link = $image_link;
	}
	public function setIdContest($id_contest){
		$this->id_contest = $id_contest;
	}
	public function setIdMember($id_member){
		$this->id_member = $id_member;
	}
	public function setNbLike($nb_like){
		$this->nb_like = $nb_like;
	}

	// GETTERS
	public function getTitle(){
		return $this->title;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getNbLike(){
		return $this->nb_like;
	}
	public function getImageLink(){
		return $this->image_link;
	}
	public function getIdContest(){
		return $this->id_contest;
	}
	public function getIdMember(){
		return $this->id_member;
	}


}





