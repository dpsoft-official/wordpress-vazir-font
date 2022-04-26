<?php

class vazir_setting {
	private $options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, '__add_plugin_page' ) );
		add_action( 'admin_init', array( $this, '__page_init' ) );
	}

	public function __add_plugin_page() {
		add_options_page(
			'فونت وزیر', // page_title
			'وزیر فونت', // menu_title
			'manage_options', // capability
			'vazir-font', // menu_slug
			array( $this, '__create_admin_page' ) // function
		);
	}

	public function __create_admin_page() {
		$this->options = get_option( 'vazir-font' ); ?>

        <div class="wrap">
            <h1>فونت وزیر</h1>
            <p></p>

            <form method="post" action="options.php">
				<?php
				settings_fields( 'vazir-font-options-group' );
				do_settings_sections( '--admin' );
				submit_button();
				?>
            </form>
        </div>
	<?php }

	public function __page_init() {
		register_setting(
			'vazir-font-options-group', // option_group
			'vazir-font', // option_name
			array( $this, '__sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'__setting_section', // id
			'تنظیمات', // title
			array( $this, '__section_info' ), // callback
			'--admin' // page
		);

		add_settings_field(
			'active', // id
			'استفاده از فونت وزیر در سایت', // title
			array( $this, 'active_callback' ), // callback
			'--admin', // page
			'__setting_section' // section
		);
		add_settings_section(
			'__setting_section_adv', // id
			'پیشرفته', // title
			array( $this, '__section_adv_info' ), // callback
			'--admin' // page
		);
		add_settings_field(
			'cdn_url', // id
			'آدرس CDN فونت وزیر', // title
			array( $this, 'cdn_url_callback' ), // callback
			'--admin', // page
			'__setting_section_adv' // section
		);

		add_settings_field(
			'font_name', // id
			'نام فونت', // title
			array( $this, 'font_name_callback' ), // callback
			'--admin', // page
			'__setting_section_adv' // section
		);
	}

	public function __sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['active'] ) ) {
			$sanitary_values['active'] = sanitize_text_field( $input['active'] );
		}

		if ( isset( $input['cdn_url'] ) ) {
			$sanitary_values['cdn_url'] = sanitize_text_field( $input['cdn_url'] );
		}

		if ( isset( $input['font_name'] ) ) {
			$sanitary_values['font_name'] = sanitize_text_field( $input['font_name'] );
		}

		return $sanitary_values;
	}

	public function __section_info() {

	}

	public function __section_adv_info() {
		echo "<p>اگر با این تنظیمات آشنا نیستید، تغییری ندهید.</p>";
	}

	public function active_callback() {
		printf(
			'<input type="checkbox" name="vazir-font[active]" id="active" value="active" %s> <label for="active">فعال</label>',
			( isset( $this->options['active'] ) && $this->options['active'] === 'active' ) ? 'checked' : ''
		);
	}

	public function cdn_url_callback() {
		printf(
			'<input class="regular-text" type="text" dir="ltr" name="vazir-font[cdn_url]" id="cdn_url" value="%s"><p class="description">در آدرس پروژه موجود هست:<br> https://github.com/rastikerdar/vazirmatn#cdn</p>',
			isset( $this->options['cdn_url'] ) ? esc_attr( $this->options['cdn_url'] ) : ''
		);
	}

	public function font_name_callback() {
		printf(
			'<input class="regular-text" type="text" dir="ltr" name="vazir-font[font_name]" id="font_name" value="%s"><p class="description">برای استفاده در css</p>',
			isset( $this->options['font_name'] ) ? esc_attr( $this->options['font_name'] ) : ''
		);
	}

}

if ( is_admin() ) {
	$_ = new vazir_setting();
}

/*
 * Retrieve this value with:
 * $__options = get_option( 'vazir-font' ); // Array of All Options
 * $active = $__options['active']; // فعال
 * $cdn_url = $__options['cdn_url']; // آدرس CDN فونت وزیر
 * $font_name = $__options['font_name']; // نام فونت
 */
