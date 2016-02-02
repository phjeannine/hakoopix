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

	public function __construct($id_contest=-1, $title="", $date_begin="", $date_ending="", $description="", $color_theme="", $banner="", $logo="", $is_active=false, $id_picture=0){
		
		parent::__construct();

		$this->setIdContest($id_contest);
    	$this->setTitle($title);
    	$this->setDateBegin($date_begin);
    	$this->setDateEnding($date_ending);
    	$this->setDescription($description);
    	$this->setColorTheme($color_theme);
    	$this->setBanner($banner);
    	$this->setLogo($logo);
    	$this->setActive($is_active);
    	$this->setIdPicture($id_picture);
	}


	// SETTERS
	public function setIdContest($id_contest){
		if(!is_numeric($id_contest)) die();
		$this->id_contest = $id_contest;
	}
	public function setTitle($title){
		$this->title = trim($title);
	}
	public function setDateBegin($date_begin){
		$this->date_begin = trim($date_begin);
	}
	public function setDateEnding($date_ending){
		$this->date_ending = trim($date_ending);
	}
	public function setDescription($description){
		$this->description = trim($description);
	}
	public function setColorTheme($color_theme){
		$this->color_theme = trim($color_theme);
	}
	public function setBanner($banner){
		$this->banner = trim($banner);
	}
	public function setLogo($logo){
		$this->logo = trim($logo);
	}
	public function setActive($is_active){
		$this->is_active = trim($is_active);
	}
	public function setIdPicture($id_picture){
		if(!is_numeric($id_picture)) die();
		$this->id_picture = $id_picture;
	}


	// GETTERS
	public function getIdContest(){
		return $this->id_contest;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getDateBegin(){
		return $this->date_begin;
	}
	public function getDateEnding(){
		return $this->date_ending;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getColorTheme(){
		return $this->color_theme;
	}
	public function getBanner(){
		return $this->banner;
	}
	public function getLogo()){
		return $this->logo;
	}
	public function getActive(){
		return $this->is_active;
	}
	public function getIdPicture(){
		return $this->id_picture;
	}


}





