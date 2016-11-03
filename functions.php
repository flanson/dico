<?php
// child-theme
function my_theme_enqueue_styles() {

    $parent_style = 'digitale-pracht-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'digitale-pracht-dicophilo-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// define custom toolbar for the wysiwyg editor
// adapted from https://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/)

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

function my_toolbars( $toolbars ) {

	/*echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;
	*/

	// Add a new toolbar called "Very Simple"
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('link', 'unlink', 'bold', 'italic' , 'underline', 'bullist', 'numlist', 'charmap' );
	
	// Add a new toolbar called "Most Simple"
	$toolbars['Most Simple' ] = array();
	$toolbars['Most Simple' ][1] = array('link', 'unlink', 'italic', 'charmap');
	
	// remove the 'Basic' toolbar completely
	//unset( $toolbars['Basic' ] );
	// return $toolbars - IMPORTANT!
	return $toolbars;
}

// set height for wysiwyg editor, based on what toolbar it's using
// adapted from https://wordpress.org/support/topic/wysiwyg-height/

add_action('acf/input/admin_head', 'my_acf_modify_wysiwyg_height');

function my_acf_modify_wysiwyg_height() {
    
    ?>
    <style type="text/css">
		*[data-toolbar="very_simple"] iframe {
			height:100px !important;
			min-height: 100px !important;
		}

		*[data-toolbar="most_simple"] iframe{
			height:60px !important;
			min-height: 60px !important;
		}

    </style>
    <?php    
}

// modify admin styles for a better editing experience
// adapted from https://wordpress.org/support/topic/wysiwyg-height/

add_action('acf/input/admin_head', 'my_acf_modify_admin_styles');

function my_acf_modify_admin_styles() {
    
    ?>
    <style type="text/css">
		.acf-fields > .acf-field {
			border-top: 0px;

		div[data-type=".acf-field-accordion:hover {
			background-color: red !important;
		}

    </style>
    <?php    
}

// no <p> wrapping around wysiwyg
// from https://support.advancedcustomfields.com/forums/topic/remove-p-tag-in-wysiwyg-editor/

function my_acf_add_local_field_groups() {
    remove_filter('acf_the_content', 'wpautop' );
}

add_action('acf/init', 'my_acf_add_local_field_groups');

?>
