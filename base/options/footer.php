<?php 
	
	// Option
	$options = array(

		array(
			'title' 	=> __('Footer Logo', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'image',
					'id' 			=> 'logo',
					'title' 		=> __('Logo Image', 'theme_admin'),
					'description' 	=> __('Upload your logo here and enter the height of it below', 'theme_admin')
				),
				array(
					'type' 			=> 'image',
					'id' 			=> 'logo_retina',
					'title' 		=> __('Retina Logo Image', 'theme_admin'),
					'description' 	=> __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', 'theme_admin')
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'logo_height',
					'title' 		=> __('Logo Height', 'theme_admin'),
					'description' 	=> __('Don\'t include "px" in the string. e.g. 30', 'theme_admin'),
					'default' 		=> '',
				),
				
			)
		),
		array(
			'title' 	=> __('Copyright', 'theme_admin'),
			'options' 	=> array(
							
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'copyright_text',
					'title' 		=> __('Copyright Text', 'theme_admin'),
					'description' 	=> __('copyright text you\'d like to display in footer', 'theme_admin'),
					'default' 		=> __('&copy; 2015 Novocure AG', 'theme_admin')
				),			
			)
		),
	);
	
	$config = array(
		'title' 		=> __('Footer', 'theme_admin'),
		'group_id' 		=> 'footer',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>