<?php


class assetWalkerClass {

	protected $page;
	protected $page_count;
	protected $template;
	protected $has_paging;
	protected $sort_param;
	protected $model_name;
	protected $model_condition;
	protected $sort_direction;
	protected $model_filter_or;
	protected $wrap_el;
	protected $wrap_class;

	protected $items;
	protected $total_items;
	protected $total_pages;
	protected $render_buffer;
	protected $props;
	protected $filename;



	public function __construct($model_name, $template, $page = 0, $page_count = PAGING, $wrap_el='div', $wrap_class='row', $has_paging=true, $sort_param="datum_zalozeni", $sort_direction="ASC", $model_condition=NULL, $model_filter_or = FALSE) {
		$this->model_name = $model_name;
		$this->template = $template;
		$this->page = $page;
		$this->page_count = $page_count;
		$this->has_paging = $has_paging;
		$this->sort_param = $sort_param;
		$this->model_condition = $model_condition;
		$this->sort_direction = $sort_direction;
		$this->model_filter_or = $model_filter_or;
		$this->props = array();
		$this->filename = false;
		$this->wrap_el = $wrap_el;
		$this->wrap_class = $wrap_class;
	}

	public function listenURL(){
		if(Tools::checkPresenceOfParam("pg", $_GET)){
			$this->page = $_GET['pg'];
		}
	}

	public function loadWalker(){

		if(class_exists($this->model_name)){

			$offset = $this->page_count * $this->page;
			$order = "ORDER BY " . $this->sort_param . " " . $this->sort_direction;
			$this->items = assetsFactory::getAllEntity(
				$this->model_name,
				$this->model_condition,
				$offset,
				$this->page_count,
				$this->model_filter_or,
				$order
			);

			$this->total_items = assetsFactory::getAllEntityCount(
				$this->model_name,
				$this->model_condition,
				$this->model_filter_or
			);

			$this->total_pages = ceil($this->total_items / $this->page_count);

		}else{
			trigger_error("Takováto třída v rozhraní neexistuje :: loadWalker");
			return false;
		}

	}

	public function walk($echo = false){
		$this->loadWalker();
		$this->loadTemplate();
		return $this->render($echo);
	}

	public function loadTemplate(){


		if ( strlen( $this->template ) > 0 ) {
			if ( strpos( $this->template, ".php" ) !== false ) {
				$filename = __DIR__ . "/../frontend_views/" . $this->template;
				if ( file_exists( $filename ) ) {
					$this->filename = $filename;
				} else {
					trigger_error( "Zadaná šablona neexistuje :: loadTemplate" );

					return false;
				}
			}
		} else {
			trigger_error( "Není zadaná žádná šablona" );

			return false;
		}

		$this->verifyTemplate();
		return true;


	}

	private function verifyTemplate(){
		$matches = array();
		preg_match_all('/{{\S+}}/m', $this->template, $matches, PREG_PATTERN_ORDER);
		$matches = $matches[0];
		$ok = true;
		foreach ($matches as $key => $value){
			$prop = str_replace("{","",$value);
			$prop = str_replace("}","", $prop);

			if(!property_exists($this->model_name,"db_" . $prop)){
				$ok = false;
				trigger_error("Model nedisponuje vlastností uvedenou v šabloně :: verifyTemplate" . $value);
			}else{
				$this->props[$prop] = $value;
			}
		}
		return $ok;
	}

	public function render($echo = FALSE){
		$this->render_buffer = "";
		foreach ($this->items as $key => $item){
			if($this->filename !== FALSE){

				ob_start();
				include $this->filename;
				$template = ob_get_clean();
				$this->writeVars($item, $template);

			}else{
				$this->writeVars($item, $this->template);
			}
		}

		if(strlen($this->wrap_el)>0){
			$this->render_buffer = '<' . $this->wrap_el . ' class=' . $this->wrap_class . ' >' . $this->render_buffer . '</' . $this->wrap_el . '>';
		}

		if($this->has_paging){
			$this->render_buffer .= $this->renderPaging();
		}

		if($echo){
			echo $this->render_buffer;
			return $this->render_buffer;
		}

		return $this->render_buffer;
	}

	private function writeVars($item, $template){
		$item_html = $template;
		foreach ($this->props as $key1 => $prop){
			$prop_name = "db_" . $key1;
			$replace_with = $item->$prop_name;
			$item_html = str_replace( $prop, $replace_with, $item_html);
		}
		$this->render_buffer .= $item_html;
	}

	public function renderPaging(){
		$output = "";
		if($this->total_pages >1){
			$output = '<ul class="pagination"><li class="arrow left"><a href="' . Tools::getCleanUrl() . '?pg=1">První</a></li>';
			$maximum = $this->page + intval((MAX_PAGING_POSITIONS / 2));
			$minimum = $this->page  - intval((MAX_PAGING_POSITIONS / 2));

			if($maximum > $this->total_pages){ $maximum = $this->total_pages;}
			if($minimum < 1){ $minimum = 1;}

			for($i=$minimum; $i<=$maximum; $i++){
				if($i == $this->page){
					$output .= '<li class="current"><a href="' . Tools::getCleanUrl() . '?pg=' . $i .  '">' . $i . '</a></li>';
				}else {
					$output .= '<li><a href="' . Tools::getCleanUrl() . '?pg=' . $i . '">' . $i . '</a></li>';
				}

			}
			$output .= '<li class="arrow right"><a href="' . Tools::getCleanUrl() . '?pg=' . $this->total_pages . '">Poslední</a></li></ul>';
		}
		return $output;
	}

}