<?php
add_theme_support('post-thumbnails');
add_theme_support( 'title-tag' );
register_nav_menus();

define('HOME',46); // Главная страница
define('TMPL',get_bloginfo('template_directory'));

// Включение jquery
function enable_css_js(){
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'custom-theme-css', get_template_directory_uri() . '/style.css?v=' . filemtime(get_template_directory() . '/style.css') );
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper-bundle.min.css');
	wp_enqueue_script('custom-theme-js', get_template_directory_uri() .'/js/script.js?v=' . filemtime(get_template_directory() . '/js/script.js') );
	wp_enqueue_script('swiper-js', get_template_directory_uri() .'/js/swiper-bundle.min.js');
}
add_action( 'wp_enqueue_scripts', 'enable_css_js' );



// Получение ACF картинки
function get_acf_pic_url($field, $set_params = array()) {
	$def_params = array(
		'size_name' => '', 
		'stub' => '', 
	);
	$params = array_merge($def_params, $set_params);
	$size_name = $params['size_name'];
	$stub      = $params['stub'];
	
	if ( is_array($field) ) {
		if ( !empty($size_name) && isset($field['sizes'][$size_name]) ) {
			$pic = $field['sizes'][$size_name];
		} else {
			$pic = $field['url'];
		}
	} elseif ( $field == preg_replace('|[^0-9]|', '', $field) ) {
		$pic = wp_get_attachment_url($field);
	} else {
		$pic = $field;
	}
	if ( empty($pic) && !empty($stub) ) {
		$pic = $stub;
	}
	return $pic;
}
function get_acf_pic($field, $set_params = array()) {
	$def_params = array(
		'svg_as_img' => false, 
		'modal' => false, 
		'modal_size' => '',
		'size_name' => '', 
		'stub' => '', 
		'class' => '', 
		'width' => 0, 
		'height' => 0, 
		'alt' => ''
	);
	$params = array_merge($def_params, $set_params);
	$svg_as_img = $params['svg_as_img'];
	$modal      = $params['modal'];
	$modal_size = $params['modal_size'];
	$size_name  = $params['size_name'];
	$stub       = $params['stub'];
	$class      = $params['class'];
	$width      = $params['width'];
	$height     = $params['height'];
	$alt        = $params['alt'];

	$pic = get_acf_pic_url($field, array('size_name' => $size_name, 'stub' => $stub));

	if (!empty($pic)) {
		$pic_info = pathinfo($pic);
	
		if ( empty($width) && empty($height) ) {
			if ( is_array($field) ) {
				if ( !empty($size_name) ) {
					$width = $field['sizes'][$size_name.'-width'];
					$height = $field['sizes'][$size_name.'-height'];
				} else {
					$width = $field['width'];
					$height = $field['height'];
				}
			} else {
				$pic_data = getimagesize($pic);
				if ( is_array($pic_data) ) {
					$width = $pic_data[0];
					$height = $pic_data[1];
				}
			}
		}

		$tag_img = '<img width="'.$width.'" height="'.$height.'" class="'.$class.'" src="'.$pic.'" alt="'.$alt.'">';
		switch ($modal) {
			case 'fancybox':
				return '<a href="'.get_acf_pic_url($field, array('size_name' => $modal_size)).'" class="fancybox" data-fancybox="gallery" data-thumb="'.get_acf_pic_url($field, array('size_name' => $modal_size)).'">'.$tag_img.'</a>';
			break;
		}
		return $tag_img;
	}
	return false;
}
function get_acf_bg_pic($field, $size_name='', $stub='') {
	$pic = get_acf_pic_url($field, array('size_name' => $size_name, 'stub' => $stub));
	if (!empty($pic)) {
		return 'background-image: url('.$pic.')';
	}
	return false;
}
function get_tel_link($text) {
	$tel_link = preg_replace('|[^0-9\+]|', '', $text );
	return $tel_link;
}

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	$classes[] = 'menu__item';

	return $classes;
}
?>
