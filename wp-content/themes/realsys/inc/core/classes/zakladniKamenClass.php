<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of zkladniKamenClass
 *
 * @author Uzivatel
 */
abstract class zakladniKamenClass implements manipulationInterface, JsonSerializable {
    
    // db vars, vždy mají prefix db_
    protected $db_id;
    
    
    // runtime vars, jsou určeny pouze k běhu applikace a nikam se neeukládají
    private $tableName;
    private $empty;
    private $ignoreInterface;
    private $valid;
    
    private $maskProperties; // vlastnosti které mají být maskovány
    private $maskTable; // tabulka ze k teré mají být dohledávány a ukládány náhradní vlastnosti
    private $maskingContextColumn; // název sloupce v maskovacíTabulce podle, kterého má být maskováno
    private $maskingContextValue; // hodnota sloupce v maskovacíTabulce podle, které má být provedena maska
    private $maskingJoinColumn; // název sloupce přes který se má vyhledávat maska - vazba na ID
    
    /*
     * Konstruktor základního Kamene
     */
    protected function __construct($id) {
        $this->db_id = $id;
        $this->tableName = $this->getTableName();
        
        $this->maskProperties = array();
        $this->maskTable = NULL;
        $this->maskingContextValue = NULL;
        $this->maskingContextColumn = NULL;
        $this->maskingJoinColumn = NULL;
        $this->ignoreInterface = false;
        $this->valid = true;
        
        if( $id > -1 ){
            $this->empty = true;
        }else {
            $this->empty = false;
        }
        
    }

    /*
     * Metoda pro smazání objektu, smazaný objekt má všechny VARs nastaveny na NULL a empty na true
     * Pokud dojde ke smazání vrací true, pokud ne vrací false a vyhodí chybu
     */
    public function smazat() {
       if($this->maskTable){
           trigger_error("Maskovaný produkt nelze odstranit :: smazat");
           return false;
       }
       global $wpdb;
       $result = $wpdb->delete(
               $this->tableName,
               array(
                   "id" => $this->db_id
                       )
               );
       
       if($result !== false){
           $properties = get_object_vars($this);
           foreach ($properties as $key => $value) {
               $this->$key = null;
           }
           $this->empty = true;
           return true;
       }else {
           trigger_error("Něco se pokazilo při odstraňování objektu :: smazat");
           return false;
       }
    }

    /*
     * Metoda pro změnu objektu
     * změní data v databázi tzn že data a objekt budou zrcadlo
     * Vrací buď true v případě úspěchu nebo false a chybu v případě neúspěchu
     */
    public function aktualizovat() {
        global $wpdb;
        $db_properties = $this->vratDbPromenne();

        if(!$this->valid){
        	trigger_error("Některé z položek třídy jsou nevalidní, tudíž nelze uložit");
        	return false;
        }
        $result = $wpdb->update(
            $this->tableName,
            $db_properties,
            array( "id" => $this->db_id)
        );
        if(!$this->ulozDoMasky()){
            //trigger_error("Při změně masky nastala chyba :: aktualizovat");
            return false;
        }
        if($result > 0 ){
            return true;
        }elseif ($result === 0) {
            return true;
        }else {
            print_r($result);
            trigger_error("Něco se pokazilo při změně objektu :: aktualizovat");
            return false;
        }
        
    }
    
    
    /*
     * Pokud má instance id = -1 je počítáno, že objekt bude zakládán, instance všechny své db proměnné
     * vloží do databáze a nastaví si odpovídající ID
     * Pokud vše vyjde vrací true, pokud se něco pokrací vrací false a vyhazuje chybu
     */
    public function vytvorit(){
        if($this->maskTable){
            trigger_error("Maskovaný produkt nelze vytvořit :: vytvorit");
            return false;
        }
        
        global $wpdb;
        $db_properties = $this->vratDbPromenne();
                
        unset($db_properties["id"]);
        
        if($this->db_id==-1 && count($db_properties) > 0){
            $isOk = $wpdb->insert(
                    $this->tableName,
                    $db_properties
            );
            $this->db_id = $wpdb->insert_id;
            $this->empty = false;
            if($isOk){
                return true;
            }else {
                trigger_error("Nepodařilo se vložit objekt :: vytvorit");
            }
        }else {
            trigger_error("Objekt není určen k založení :: vytvorit");
            return false;
        }
    }
    
    /*
     * Funkce načte všechny DB proměnné z databáze do instance objektu,
     * objet je v tu chvíli obrazem databáze
     * v případě že nalezne záznam s id naplní objekt a vrací true
     * v případě že nenalezne záznam s id vrací false a vyhazuje chybu
     */
    public function nactiSe($wp_mysql_object = NULL){
        if($this->maskTable){
            trigger_error("Maskovaný produkt nelze načíst :: nactiSe");
            return false;
        }
        
        global $wpdb;
        if($this->empty === true){
            if($wp_mysql_object){
                $results = $wp_mysql_object;
            }else{
                $results = $wpdb->get_row("SELECT * FROM $this->tableName WHERE id=$this->db_id");
            }


            if($results != NULL){
                foreach ($results as $key => $value) {
                    $objectProperty = "db_" . $key;
                    
                    // pokud je proměnná serializovaná musíme ji deserializovat
                    $this->$objectProperty = maybe_unserialize($value);

                }
                return true;
            }else {

                trigger_error("Objekt s tímto ID nebyl v systému nalezen :: nactiSe");
                return false;
            }
        }
        return false;
    }
    
    
    
    /*
     * Funkce která vrací proměnné, které jsou určené k nahrávání do DB (mají prefix _db)
     */
    public function vratDbPromenne(){
        $all_properties = get_object_vars($this);
        $db_properties = array();
        foreach ($all_properties as $key => $value) {
            if(preg_match('/^db_.+$/m', $key)){
                $newkey = explode("db_", $key)[1];
                $newvalue = $value;
                if(is_array($newvalue)){
                    $newvalue = maybe_serialize($newvalue);
                }
                $db_properties[$newkey] = $newvalue; 
            }
        }
        foreach ($this->maskProperties as $key => $value) {
            if(isset($db_properties[$value])){
                unset($db_properties[$value]);
            }
        }
        
        return $db_properties;
    }


    /*
     * magic set
     */
    public function __set($name, $value) {
        if(isset($value) && isset($name)){
	        $this->valid = $this->checkValidity($name, $value);
        	$this->$name = $value;
            return $this->aktualizovat();
        }
        
    }

    /*
     * Set který neukládá hned do databáze, hodí se např pro nastavení mnoha proměných a pak až následné dávkové uložení do DB
     */
    public function set_not_update($name, $value) {
        if(isset($value) && isset($name)){
        	$this->valid = $this->checkValidity($name, $value);
            $this->$name = $value;
        }
        
    }
    
    /*
     * magic get
     */
    public function __get($name) {
        return $this->$name;
    }
    
    /*
     * vrací ID
     */
    public function getId(){
        return $this->db_id;
    }
    

    /*
     * tato metoda by měla umět nastavit masku pro daný objekt, tím pádem některé zvolené
     * db proměnné se nevytahují z původní tabulky ale z masky, objekt pak i ukládá 
     * zvolené db proměnné do masky a ne do produktu, tím pádem se neovliní původní produkt
     * zbylé vlastnosti objekt ukládá na původní místa a tím ovlivnuje původní produkt
     * přijímá argumenty formou pole které specifikuje maskované db_proměnné a dále maskující
     * tabulku kde má tyto data hledat v závislosti na vlasním ID
     * maska přenačte právě zmíněné hodnoty
     */
    public function registrovatMasku($maskProperties, $maskTable, $maskingContextColumn, $maskingContextValue, $maskingJoinColumn){
        if(is_array($maskProperties) && is_string($maskTable) && is_string($maskingContextColumn) && isset($maskingContextValue) && isset($maskingJoinColumn)){
            $this->maskProperties = $maskProperties;
            $this->maskTable = $maskTable;
            $this->maskingContextColumn = $maskingContextColumn;
            $this->maskingContextValue = $maskingContextValue;
            $this->maskingJoinColumn = $maskingJoinColumn;
        }else {
            return false;
            trigger_error("Masku se nepodařilo zaregistrovat, špatné parametry :: registrovatMasku");
        }
        global $wpdb;
        $whatSelect = implode(",", $maskProperties);
        $result = $wpdb->get_row(
                "SELECT " . $whatSelect . 
                " FROM " . $maskTable . 
                " WHERE " . $maskingContextColumn . " = " . $maskingContextValue .
                " AND " . $maskingJoinColumn . " = " . $this->getId(), ARRAY_A);
        if($result == NULL){
            trigger_error("Pozor maska nemá v DB svůj odpovídající spoj na entitu :: registrovaMasku");
            return true;
        }
        foreach ($result as $key => $value){
            if($value != NULL){
                $localName = "db_". $key;
                $this->$localName = $value;
            }
        }
    }
    
    
    /*
     * Odstraní masku tzn, zvolené proměné již nejsou maskované a je upravován původní objekt
     */
    public function odstranitMasku(){
        $this->maskProperties = array();
        $this->maskTable = "";
        $this->maskingContextColumn = "";
        $this->maskingContextValue = "";
        $this->maskingJoinColumn = "";
    }
    
    /*
     * Maska slouží k zamaskování některých proměných
     * které se se přebírají z jiné, více specifické tabulky
     * Maskovací tabulka je proměná maskTable a specifikuje se metodou registrovatMasku
     * Maskovací tabulka se skládá z maskingContextColumn a MaskingJoinColum a dalších maskovaných properties
     * maskingContextColumn a maskingContextValue specifikuje vztah k nějaké konkrétní entitě a její konkrétní ID
     * maskigJoinColumn specifikuje že se jedná o konkrétní entitu
     * metoda ověří zda jde maska nastavená a pokud ano začne pracovat s maskProperties(maskované hodnoty)
     * Zjistí zda již nějaké maskování je, pokud ano tak ho aktualizuje
     * pokud ne tak vytvoří nový maskovací záznam
     */
    protected function ulozDoMasky(){
        if(is_string($this->maskTable) && $this->maskingContextValue && is_string($this->maskingJoinColumn) && is_string($this->maskingContextColumn) ){
            global $wpdb;
            $tosave = array();
            foreach ($this->maskProperties as $key => $value) {
                $localName = "db_". $value;
                if(isset($this->$localName)){
                    $tosave[$value] = $this->$localName;
                }
            }
            if(is_array($tosave) && count($tosave)>0){
                
                $result = $wpdb->get_row(
                        "SELECT * " .
                        " FROM " . $this->maskTable . 
                        " WHERE " . $this->maskingContextColumn . " = " . $this->maskingContextValue .
                        " AND " . $this->maskingJoinColumn . " = " . $this->getId(), ARRAY_A);
                if($result == NULL){
                    $tosave[$this->maskingContextColumn] = $this->maskingContextValue;
                    $tosave[$this->maskingJoinColumn] = $this->getId();
                    $result = $wpdb->insert(
                        $this->maskTable,
                        $tosave
                    );
                    
                    if($result!==false){
                        return true;
                    }
                    trigger_error("Nepodařilo se vytvořit maskovací záznam :: ulozDoMasky");
                    return false;
                    
                }else {
                    $result = $wpdb->update(
                        $this->maskTable,
                        $tosave,
                        array( $this->maskingContextColumn => $this->maskingContextValue, $this->maskingJoinColumn => $this->getId())
                    );
                    if($result === false){
                        return false;
                    }
                    
                    return true; 
                }
                

            }
            return true;
        }
        //trigger_error("Maska není správně nastavená :: ulozDoMasky");
        return false;

        
    }

    /*
     * vrací ošetřená data z entity
     */
    public function dejData($property){
        if(property_exists($this, $property)){
            return htmlentities($this->$property);
        }else {
            trigger_error("Pozor taková hodnota v rámci třídy neexistuje :: dejData");
        }
    }
    
    /*
     * vrací jakou tabulkou je entita maskována
     */
    public function dejMasku(){
        return $this->maskTable;
    }
    
     /*
     * vrací skrze jakou hodnotu je tento objekt maskován
     */
    public function dejContextId(){
        return $this->maskingContextValue;
    }
    
    /*
     * nastaví entitě že má ve svém JSON outputu ignorovat nastavení políček v configuration.php 
     */
    public function ignoreInterface(){
        $this->ignoreInterface = true;
    }


    /*
     * serializuje data z objektu
     * filtruje db_properties které by se měli v rámci entity dodat v JSON formátu
     * následně je předá ke spracování do json_encode 
     * je možné také zablokovat speciální předávání na základně configuration.php
     * pomocí ignoreInterface proměnné
     */
    public function jsonSerialize() {
        $all_properties = get_object_vars($this);
        $db_properties = array();
        
        foreach ($all_properties as $key => $value) {
            if(preg_match('/^db_.+$/m', $key)){
                $newkey = $key;
                $newvalue = $value;
                $db_properties[$newkey] = $newvalue; 
            }
        }
        if(!$this->ignoreInterface){
            global $INTERFACE_DATA;
            if(isset($INTERFACE_DATA[get_class($this)])){

                $output = array();
                $interfaceData = $INTERFACE_DATA[get_class($this)];
                foreach ($interfaceData as $key => $value){
                    if(isset($db_properties[$key])){
                        $output[$value] = $db_properties[$key];
                    }else {
                        $output[$key] = $value;
                    }
                }
                return $output;
            }    
        }
        
        return $db_properties;
        
    }


    public function populateClass($arrayOfParams){
        foreach ($arrayOfParams as $key => $value) {
            $new_key = "db_" . $key;
            if(property_exists(get_class($this), $new_key)){
                $this->$new_key = $value;
            }else{
                trigger_error("Zadaná vlastnost " . $new_key . " v třídě " . __CLASS__ . " neexistuje : populateClass");
            }
        }
    }

    private function checkValidity($key, $value){
		global $field_rules;
		$format = array();
		if(isset($field_rules[get_class($this)])){
			$format = $field_rules[get_class($this)];
			$type = $format['type'];
			$required = $format['required'];
			$field_checker = new typeClass($key, $value, $required, $type);
			return $field_checker->getStatus();
		}else{
			trigger_error("checkValidity:: Formát není specifikovaný.");
			return false;
		}

    }


        // predpis implementaci
    protected abstract function zakladniVypis();
    protected abstract function zakladniHtmlVypis();
    protected abstract function getTableName();
}
