<?php
add_action( 'admin_head', 'vazir_font_add_css_to_admin' );


function vazir_font_add_css_to_admin() {
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
        body,.components-combobox-control__suggestions-container,
        .rtl .media-frame, .rtl .media-frame .search, .rtl .media-frame input[type=email], .rtl .media-frame input[type=number], .rtl .media-frame input[type=password], .rtl .media-frame input[type=search], .rtl .media-frame input[type=tel], .rtl .media-frame input[type=text], .rtl .media-frame input[type=url], .rtl .media-frame select, .rtl .media-frame textarea, .rtl .media-modal {
            font-family: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --wp--preset--font-family--system-font: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --fontFamily: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
            --bodyFontFamily: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif !important;
        }
        button, input, select, textarea{
            font-family: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }
        .rtl #wpadminbar *, .wp-editor-area {
            font-family: <?php esc_attr_e($font_name) ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }
    </style>
	<?php
}