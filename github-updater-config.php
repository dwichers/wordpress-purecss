<?php

add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'wordpress-purecss',
			'api_url' => 'https://api.github.com/repos/dwichers/wordpress-purecss',
			'raw_url' => 'https://raw.github.com/dwichers/wordpress-purecss',
			'github_url' => 'https://github.com/dwichers/wordpress-purecss',
			'zip_url' => 'https://github.com/dwichers/wordpress-purecss/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.md',
			'access_token' => 'c9b0bbbacc9feb619c85e4c7b5c3d769144a34ee',
		);

		new WP_GitHub_Updater( $config );

	}

}
