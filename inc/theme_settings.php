<?php

	function opt_theme_settings_validator($input)
	{
		foreach ($_FILES as $image) {
			if ($image['size']) {
				if (preg_match('/(jpg|jpeg|png|gif)$/i',$image['type'])) {
					$override = array('test_form' => false);
					$file = wp_handle_upload($image, $override);
					$input['logo'] = $file['url'];
				} else {
					wpam_die('Nessuna immagine caricata');
				}
			} else {
				$options = get_option('opt_theme_settings');
				$input['logo'] = $options['logo'];
			}
		}
		return $input;
	}

	function section_text_cb()
	{
		echo "<p>Da qui puoi caricare il tuo logo</p>";
		$options = get_option('logo');
		echo "<p>Carica qui il tuo file:</p>";

		if ($file = $options['logo']) {
			echo "<img src='{$file}' />";
		}
	}

	function load_logo_cb()
	{
		echo '<input id="logo" type="file" name="logo"/>';
	}

	function init_theme_settings_page()
	{
		register_setting('opt_theme_settings', 'logo', 'opt_theme_settings_validator');
		add_settings_section('main_section', 'Sezione Principale', 'section_text_cb', __FILE__);
		add_settings_field('logo', 'Logo', 'load_logo_cb', __FILE__, 'main_section');
	}

	add_action('admin_init', 'init_theme_settings_page');

	function get_theme_settings_page_layout_cb()
	{
		?>
			<div class="wrap">
				<div calss="icon32", id="icon-options-general"></div>
				<h2>Impostazioni per il tema Zero</h2>
				<p>Un po di testo descrittivo.</p>
				<form action="options.php" method="post" enctype="multipart/form-data">
					<?php settings_fields('opt_theme_settings') ?>
					<?php do_settings_sections(__FILE__) ?>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php
	}

	function add_theme_settings_page_cb()
	{
		$theme_settings_page = add_theme_page(
			__('Impostazioni Tema', 'zero'),
			__('Impostazioni Tema', 'zero'),
			'administrator',
			__FILE__,
			'get_theme_settings_page_layout_cb'
		);
	}

	add_action('admin_menu', 'add_theme_settings_page_cb');
