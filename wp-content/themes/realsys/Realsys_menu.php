<?php


class Realsys_menu extends Walker_Nav_Menu {

	public function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;
		$output .= "<li>";


		//Add SPAN if no Permalink
		if( $permalink && $permalink != '#' ) {
			$output .= '<a class="' .  implode(" ", $item->classes) . '" href="' . $permalink . '">';
		} else {
			$output .= '<span>';
		}

		$output .= $title;
		if( $description != '' && $depth == 0 ) {
			$output .= '<small class="description">' . $description . '</small>';
		}
		if( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

	}
}