<?php


class typeClass implements JsonSerializable {
	protected $key;
	protected $type;
	protected $value;
	protected $required;
	protected $status;
	protected $message;

	public function __construct($key, $value, $required, $type) {
		$this->key = $key;
		$this->value = $value;
		$this->required = $required;
		$this->type = $type;
		$this->isValid();
	}

	public function isValid(){
		if($this->required){
			if($this->value !== null){
				return $this->typeValidator();
			}else{
				$response = "Pole " . globalUtils::translate($this->key) . " není přítomno.";
				frontendError::addMessage($this->key, ERROR, $response, $this);
				return false;
			}
		}else{
			if($this->value == null){
				return true;
			}else{
				return $this->typeValidator();
			}
		}
	}

	public function typeValidator(){
		$response = "";
		$status = true;
		switch($this->type){
			case 'int':
				if(!ctype_digit($this->value)){
					$response = "Pole " . globalUtils::translate($this->key) . " není číslo.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case 'str':
				if(!is_string($this->value)){
					$response =  "Pole " . globalUtils::translate($this->key) . " není řetězec.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case 'date':
				$custom_date = $this->value;
				$custom_date = str_replace(".","-",$custom_date);
				if(strtotime($custom_date) === false){
					$response =  "Pole " . globalUtils::translate($this->key) . " není datum.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case 'tel':
				if(!preg_match(REGEX_TELEPHONE, $this->value)){
					$response =  "Pole " . globalUtils::translate($this->key) . " není ve správném formátu.";
					frontendError::addMessage($this->key, ERROR, $response , $this);
				}
				break;
			case 'url' :
				if(!Tools::isValidUrl($this->value)){
					$response =  "Pole" . globalUtils::translate($this->key) . " není URL.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case "time" :
				if(!preg_match(REGEX_TIME, $this->value)){
					$response =  "Pole" . globalUtils::translate($this->key) . " není typu čas.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case "email" :
				if(!preg_match(REGEX_EMAIL, $this->value)){
					$response =  "Pole" . globalUtils::translate($this->key) . " není typu email.";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case "array" :
				if(!is_array($this->value)){
					$response =  "Pole" . globalUtils::translate($this->key) . " není typu pole";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
			case "bool" :
				if(!is_bool($this->value)){
					$response =  "Pole" . globalUtils::translate($this->key) . " není logická hodnota";
					$status = false;
					frontendError::addMessage($this->key, ERROR, $response, $this);
				}
				break;
		}
		$this->status = $status;
		$this->message = $response;
		return $status;
	}

	/**
	 * Specify data which should be serialized to JSON
	 * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
		$info = array(
			'key' => $this->key,
			'value' => $this->value,
			'type' => $this->type,
			'required' => $this->required
		);
		return $info;
	}

	/**
	 * @return mixed
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @param mixed $key
	 */
	public function setKey( $key ) {
		$this->key = $key;
	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType( $type ) {
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue( $value ) {
		$this->value = $value;
	}

	/**
	 * @return mixed
	 */
	public function getRequired() {
		return $this->required;
	}

	/**
	 * @param mixed $required
	 */
	public function setRequired( $required ) {
		$this->required = $required;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus( $status ) {
		$this->status = $status;
	}

	/**
	 * @return mixed
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage( $message ) {
		$this->message = $message;
	}


}