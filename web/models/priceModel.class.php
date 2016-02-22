<?php
class priceModel extends basesql{

	protected $id;
	protected $rank;
	protected $title;
	protected $image_link;
	protected $id_contest;

	public function __construct($id=-1, $rank="", $title="", $image_link="", $description="", $id_contest=""){
		
		parent::__construct();

		$this->setId($id);
    	$this->setRank($rank);
    	$this->setTitle($title);
    	$this->setImageLink($image_link);
    	$this->setDescription($description);
    	$this->setIdContest($id_contest);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
	}
	public function setRank($rank){
		$this->rank = $rank;
	}
	public function setTitle($title){
		$this->title = trim($title);
	}
	public function setImageLink($image_link){
		$this->image_link = $image_link;
	}
	public function setDescription($description){
		$this->description = $description;
	}
	public function setIdContest($id_contest){
		$this->id_contest = $id_contest;
	}

	// GETTERS
	/*public function getId(){
		return $this->id;
	}*/
	public function getRank(){
		return $this->rank;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getImageLink(){
		return $this->image_link;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getIdContest(){
		return $this->id_contest;
	}

}





