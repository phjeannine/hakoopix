<?php
class contestModel extends basesql{

	protected $id;
	protected $title;
	protected $date_begin;
	protected $date_ending;
	protected $description;
	protected $color_theme;
	protected $banner;
	protected $logo;
	protected $is_active;
	protected $is_delete;

	public function __construct($id=-1, $title="", $date_begin="", $date_ending="", $description="", $color_theme="", $banner="", $logo="", $is_active=0, $is_delete=0){

		parent::__construct();

		$this->setId($id);
		$this->setTitle($title);
		$this->setDateBegin($date_begin);
		$this->setDateEnding($date_ending);
		$this->setDescription($description);
		$this->setColorTheme($color_theme);
		$this->setBanner($banner);
		$this->setLogo($logo);
		$this->setActive($is_active);
		$this->setDelete($is_delete);
	}


	// SETTERS
	public function setId($id){
		if(!is_numeric($id)) die();
		$this->id = $id;
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
	public function setDelete($is_delete){
		$this->is_delete = trim($is_delete);
	}


	// GETTERS
	public function getId(){
		return $this->id;
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
	public function getLogo(){
		return $this->logo;
	}
	public function getActive(){
		return $this->is_active;
	}
	public function getDelete(){
		return $this->is_delete;
	}

}

