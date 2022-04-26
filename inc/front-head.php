<?php
add_action( 'wp_head', 'vazir_font_add_css_to_header' );
add_action( 'login_head', 'vazir_font_add_css_to_header' );

function vazir_font_add_css_to_header() {
	$plugin_options = get_option( 'vazir-font' );
	if ( empty( $plugin_options['active'] ) or $plugin_options['active'] !== 'active' ) {
		return;
	}
	if ( isset( $plugin_options['cdn_url'] ) ) {
		$cdn_url = $plugin_options['cdn_url'];
	} else {
		$cdn_url = 'https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v32.102/Vazirmatn-font-face.css';
	}
	if ( isset( $plugin_options['font_name'] ) ) {
		$font_name = $plugin_options['font_name'];
	} else {
		$font_name = 'Vazirmatn';
	}

	?>
    <link href="<?php esc_attr_e( $cdn_url ) ?>" rel="stylesheet" type="text/css"/>
    <style>
        body.rtl,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        #wpadminbar a,
        .rtl #wpadminbar,
        #wpadminbar,
        body {
            font-family: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --wp--preset--font-family--system-font: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --fontFamily: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --bodyFontFamily: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
        }

        .rtl #wpadminbar * {
            font-family: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }
    </style>
	<?php

}
