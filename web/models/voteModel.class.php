<?php
class contestModel extends basesql{

	protected $id;
	protected $nb_vote;
	protected $id_contest;
	protected $id_member;
	protected $id_picture;

	public function __construct($id=-1, $nb_vote=0, $id_contest=0, $id_member=0, $id_picture=0){

		parent::__construct();

		$this->setId($id);
		$this->setNbVote($nb_vote);
		$this->setIdContest($id_contest);
		$this->setIdMember($id_member);
		$this->setIdPicture($id_picture);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
	}
	public function setNbVote($nb_vote){
		$this->nb_vote = trim($nb_vote);
	}
	public function setIdContest($id_contest){
		$this->id_contest = trim($id_contest);
	}
	public function setIdMember($id_member){
		$this->id_member = trim($id_member);
	}
	public function setIdPicture($id_picture){
		$this->id_picture = trim($id_picture);
	}


	// GETTERS
	public function getId(){
		return $this->id;
	}
	public function getNbVote(){
		return $this->nb_vote;
	}
	public function getIdContest(){
		return $this->id_contest;
	}
	public function getIdMember(){
		return $this->id_member;
	}
	public function getIdPicture(){
		return $this->id_picture;
	}

}

