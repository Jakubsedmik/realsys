<?php


class uzivatelClass extends zakladniKamenClass {

	// db vars
	protected $db_jmeno;
	protected $db_prijmeni;
	protected $db_email;
	protected $db_telefon;

	protected $db_fbid;
	protected $db_gmid;


	protected $db_avatar;
	protected $db_popis;
	protected $db_stav;

	protected $db_heslo;


	protected function zakladniVypis() {
		// TODO: Implement zakladniVypis() method.
	}

	protected function zakladniHtmlVypis() {
		// TODO: Implement zakladniHtmlVypis() method.
	}

	public function getTableName() {
		return "s7_uzivatel";
	}

	public function getInterfaceTypes() {
		return array(
			"db_id" => "number",
			"db_jmeno" => "string",
			"db_prijmeni" => "string",
			"db_email" => "string",
			"db_telefon" => "string"

		);
	}

	public function getFullName(){
		return $this->db_jmeno . " " . $this->db_prijmeni;
	}


	/*
	 * Funkce pro obecnou funkci uživatele, heslo se musí hashovat
	 */

	public function storePassword($value) {
		$this->db_heslo = password_hash($value, PASSWORD_BCRYPT);
		$this->aktualizovat();
		return $this->db_heslo;
	}

	public function populateClass($arrOfParams){
		if(isset($arrOfParams['db_heslo'])){
			$arrOfParams['db_heslo'] = password_hash($arrOfParams['heslo'], PASSWORD_BCRYPT);
		}
		parent::populateClass($arrOfParams);
	}

	public function verifyPassword($password){
		return password_verify($password, $this->db_heslo);
	}

	public function isUserLoggedIn(){
		return (isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == $this->db_id);
	}

	public function logOut(){
		if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == $this->db_id){
			unset($_SESSION['prihlaseny']);
			return true;
		}else{
			return false;
		}
	}

	public function logIn(){
		$_SESSION['prihlaseny'] = $this->getId();
	}

	public static function getUserLoggedId(){
		if(isset($_SESSION['prihlaseny'])){
			return $_SESSION['prihlaseny'];
		}else{
			return false;
		}
	}

	public function set_not_update( $name, $value ) {
		if($name == "db_heslo"){
			$this->storePassword($value);
		}else{
			parent::set_not_update( $name, $value );
		}
	}

	public function __set( $name, $value ) {
		if($name == "db_heslo"){
			$this->storePassword($value);
		}else{
			return parent::__set( $name, $value );
		}
	}




}