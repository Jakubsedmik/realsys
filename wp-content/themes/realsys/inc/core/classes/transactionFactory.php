<?php


class transactionFactory {

	protected $uzivatel;
	protected $entity;
	protected $performable;

	public function __construct($uzivatel, $entity = null) {
		if(get_class($uzivatel) == "uzivatelClass" && is_object($entity)){
			$this->uzivatel = $uzivatel;
			$this->entity = $entity;
			$this->performable = true;
		}else{
			$this->performable = false;
		}
	}

	public function requestService($service){
		$response = new stdClass();
		global $cenik_sluzeb;
		if($this->performable){

			if(isset($cenik_sluzeb[$service])){
				$sluzba = $cenik_sluzeb[$service];
				$user_billance = $this->uzivatel->getUserBillance();
				if($user_billance >= $sluzba['price']){

					$transakce = assetsFactory::createEntity("transakceClass", array(
						"id_odesilatel" => $this->uzivatel->getId(),
						"id_prijemce" => -1,
						"mnozstvi" => $sluzba['price'],
						"nazev_sluzby" => sprintf($sluzba['name'], $this->entity->getId())
					));

					if(isset($sluzba['handleFunction'])){
						$handleFunction = $sluzba['handleFunction'];
						$response = $this->entity->$handleFunction($transakce, $this->entity);
						return $response;
					}

					$response->status = 1;
					$response->message = "Transakce proběhla úspěšně.";

				}else{
					$response->status = 0;
					$response->message = "Nedostatek kreditů na účtě, nejdříve proveďte nabití.";
				}
			}else{
				$response->status = -1;
				$response->message = "Neznámý typ služby.";
			}
		}else{
			$response->status = -2;
			$response->message = "Poskytnuté parametry transakce nejsou správného typu.";
		}

		return $response;
	}

}