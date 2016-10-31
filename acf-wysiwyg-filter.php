<?php 
// adapted from https://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

function my_toolbars( $toolbars ) {

	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('link', 'unlink', 'bold', 'italic' , 'underline', 'bullist', 'numlist' );

	// Add a new toolbar called "Most Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('link', 'unlink', 'italic');

	// remove the 'Basic' toolbar completely
	//unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}

?>
