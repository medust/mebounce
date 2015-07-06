<?php
/*
* Plugin Name: meBounce
* Plugin URI: http://www.medust.com/
* Description: Use meBounce to convert your every visitor to subscriber and potential customer by improving bounce rate. The free replacement of Bounce Exchange for WordPress. This plugin enables you to display a modal before a user leaves your website. It will help you to optimize bounce rate and increase conversion rate.
* Version: 1.0.0
* Author: Medust
* Author URI: http://www.medust.com
* License: GPL2
*/

/*
    Copyright (C) 2010- 2015 Medust.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Some default options
add_option('as_mebounce_cookie_expire', '');
add_option('as_mebounce_delay', '');
add_option('as_mebounce_aggressive', 'false');
add_option('as_mebounce_cookie_domain', '');

add_option('as_mebounce_modal_title', 'meBounce Modal');
add_option('as_mebounce_modal_paragraph', 'My First WordPress Modal Created with meBounce Plugin');
add_option('as_mebounce_modal_submit_btn', 'Submit');


// Displays Wordpress Blog meBounce Options menu
function as_mebounce_add_option_page()
{
	add_menu_page('meBounce Subscribers List', 'meBounce', 'manage_options', __FILE__, 'as_mebounce_subscribe_page', 'dashicons-admin-generic', '26.3');
		
	add_submenu_page(__FILE__, 'meBounce Subscribers List', 'Subscribers', 'manage_options', __FILE__, 'as_mebounce_subscribe_page');
		
	add_submenu_page(__FILE__, 'meBounce Settings Page', 'Settings', 'manage_options', __FILE__.'-settings', 'as_mebounce_settings_page');
}

function as_mebounce_subscribe_page() {
	
	require_once (dirname(__FILE__) . '/includes/subscribe-page.php');
}

function as_mebounce_settings_page()
{
	$as_mebounce_modal_title = $_POST['as_mebounce_modal_title'];
    $as_mebounce_modal_paragraph = $_POST['as_mebounce_modal_paragraph'];
	$as_mebounce_modal_submit_btn = $_POST['as_mebounce_modal_submit_btn'];
	
    $as_mebounce_cookie_expire = $_POST['as_mebounce_cookie_expire'];
    $as_mebounce_delay = $_POST['as_mebounce_delay'];
    $as_mebounce_aggressive = $_POST['as_mebounce_aggressive'];
	$as_mebounce_cookie_domain = $_POST['as_mebounce_cookie_domain'];

    if (isset($_POST['info_update'])) {
    	
    	if (!isset($_POST['my_mbc_update_setting'])) die("<br><br>Hmm .. looks like you didn't send any credentials.. No CSRF for you! ");
    	if (!wp_verify_nonce($_POST['my_mbc_update_setting'],'mbc-update-setting')) die("<br><br>Hmm .. looks like you didn't send any credentials.. No CSRF for you!");
        
    	update_option('as_mebounce_modal_title', (string)$_POST["as_mebounce_modal_title"]);
        update_option('as_mebounce_modal_paragraph', (string)$_POST["as_mebounce_modal_paragraph"]);
		update_option('as_mebounce_modal_submit_btn', (string)$_POST["as_mebounce_modal_submit_btn"]);

        update_option('as_mebounce_cookie_expire', (string)$_POST["as_mebounce_cookie_expire"]);
        update_option('as_mebounce_delay', (string)$_POST["as_mebounce_delay"]);
        update_option('as_mebounce_aggressive', (string)$_POST['as_mebounce_aggressive']);
        update_option('as_mebounce_cookie_domain', (string)$_POST['as_mebounce_cookie_domain']);

        echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
        echo '</strong>';
    } else {
		$as_mebounce_modal_title = get_option('as_mebounce_modal_title');
        $as_mebounce_modal_paragraph = get_option('as_mebounce_modal_paragraph');
		$as_mebounce_modal_submit_btn = get_option('as_mebounce_modal_submit_btn');
		
        $as_mebounce_cookie_expire = get_option('as_mebounce_cookie_expire');
        $as_mebounce_delay = get_option('as_mebounce_delay');
        $as_mebounce_aggressive = get_option('as_mebounce_aggressive');
		$as_mebounce_cookie_domain = get_option('as_mebounce_cookie_domain');
    }
    
    require_once (dirname(__FILE__) . '/includes/settings-page.php');
}


function mebounce_plugin_admin_init()
{
	wp_enqueue_script('jquery');                    // Enque Default jQuery
	wp_enqueue_script('jquery-ui-core');            // Enque Default jQuery UI Core
	wp_enqueue_script('jquery-ui-tabs');            // Enque Default jQuery UI Tabs
	
    wp_register_script('mebounce-plugin-script3', plugins_url('/js/myscript.js', __FILE__));
    wp_enqueue_script('mebounce-plugin-script3');

    wp_register_script('mebounce-plugin-script4', plugins_url('/js/jquery.powertip.js', __FILE__));
    wp_enqueue_script('mebounce-plugin-script4');

    wp_register_style('mebounce-plugin-ui-css', plugins_url('/css/jquery-ui.css', __FILE__));
    wp_enqueue_style('mebounce-plugin-ui-css');

    wp_register_style('mebounce-tip-plugin-css', plugins_url('/css/jquery.powertip.css', __FILE__));
    wp_enqueue_style('mebounce-tip-plugin-css');

    wp_register_style('mebounce-plugin-css', plugins_url('/css/mebounce.css', __FILE__));
    wp_enqueue_style('mebounce-plugin-css');
}

function mebounce_plugin_init() {
	wp_register_style('ouibounce-css-mebounce', plugins_url('/css/ouibounce.css', __FILE__));
    wp_enqueue_style('ouibounce-css-mebounce');
	
	wp_register_script('ouibounce-js-mebounce', plugins_url('/js/ouibounce.min.js', __FILE__));
    wp_enqueue_script('ouibounce-js-mebounce');
}

function mebounce_custom_js_init() {
	$as_mebounce_cookie_expire = get_option('as_mebounce_cookie_expire');
    $as_mebounce_delay = get_option('as_mebounce_delay');
    $as_mebounce_aggressive = get_option('as_mebounce_aggressive');
	$as_mebounce_cookie_domain = get_option('as_mebounce_cookie_domain');
	
	$mbounce_delay = '';
	$mbounce_cookie_expire = '';
	$mbounce_cookie_domain = '';
	
	if($as_mebounce_delay!='') {
		$mbounce_delay = 'delay: ' . $as_mebounce_delay . ',';
	}
	
	if($as_mebounce_cookie_expire!='') {
		$mbounce_cookie_expire = 'cookieName: meBounce, cookieExpire: ' . $as_mebounce_cookie_expire . ',';
	}
	
	if($as_mebounce_cookie_domain!='') {
		$mbounce_cookie_domain = 'cookieDomain: ' . $as_mebounce_cookie_domain . ',';
	}
	
	echo "<!-- meBounce Plugin JS -->\n";
    echo '<script type="text/javascript">'."\n";
	
    echo "// if you want to use the 'fire' or 'disable' fn,\n";
    echo "// you need to save OuiBounce to an object\n";
	echo "(function ( $ ) {
    var _ouibounce = ouibounce(document.getElementById('mebounce-modal'), {
        aggressive: " . $as_mebounce_aggressive .",
        " . $mbounce_delay . $mbounce_cookie_expire . $mbounce_cookie_domain . "
      });
	  
	  $('#mebounce-modal .modal-footer').on('click', function() {
        $('#mebounce-modal').hide();
      });

      $('.underlay').on('click', function() {
        $('#mebounce-modal').hide();
      });

      $('#mebounce-modal .modal').on('click', function(e) {
        e.stopPropagation();
      });
	  })(jQuery);
    </script>\n";
}

function mebounce_form_submit_ajax_code() {
	echo "
	<!-- meBounce Form Submit AJAX -->
	<script>
	(function ( $ ) {
		var data_submit = false;
		
		// Email Submit
		$('#mebounce-submit').click(function () {
			var error = false;
			
			var emailCompare = /^([a-z0-9_.-]+)@([0-9a-z.-]+).([a-z.]{2,6})$/; // Syntax to compare against input
			var email = $('#mebounce-email').val().toLowerCase(); // get the value of the input field
					
			if (email == '' || email == ' ' || !emailCompare.test(email)) {
				$('#error-email').show(500);
				$('#error-email').delay(4000);
				$('#error-email').animate({
					height: 'toggle'
				}, 500, function () {
					// Animation complete.
				});
				error = true; // change the error state to true
			}
			
			if (error === false) {
				var form_data = {
					email: email,
					ajax: '1'
				};
			
				$.ajax({
					type: 'POST',
					url: $('#mebounce-form').attr('action'),
					data: form_data,
					success: function(html) {
						$('#success-submit').show();
						$('#mebounce-email').val('');
								
						data_submit = true;
					}
				});
			}
			return false;
		});
	})(jQuery);
	</script>
	";
	
}

function mebounce_modal_code_init() {
	$as_mebounce_modal_title = get_option('as_mebounce_modal_title');
    $as_mebounce_modal_paragraph = get_option('as_mebounce_modal_paragraph');
	$as_mebounce_modal_submit_btn = get_option('as_mebounce_modal_submit_btn');
		
	echo '<!-- meBounce Modal -->
    <div id="mebounce-modal">
      <div class="underlay"></div>
      <div class="modal">
        <div class="modal-title">
          <h3> ' . $as_mebounce_modal_title . ' </h3>
        </div>

        <div class="modal-body">
          <p> ' . $as_mebounce_modal_paragraph . ' </p>

          <form action="'.plugins_url('/form-submit.php', __FILE__).'" method="post" id="mebounce-form">
		  	<p class="success hide" id="success-submit">Thank You for Your Subscription.!</p>
			
            <input type="email" name="email" id="mebounce-email" placeholder="Enter Your Email Here">			
            <input type="submit" name="submit" id="mebounce-submit" value=" ' . $as_mebounce_modal_submit_btn . ' &raquo;">
			<p class="error hide" id="error-email">Your Email is Required</p>
          </form>
        </div>

        <div class="modal-footer">
          <p>no thanks</p>
        </div>
      </div>
	  <div class="sponsor">Powered By <a href="#">meBounce</a> from <a href="#">Medust</a></div>
    </div>';
}

function create_mebounce_db_on_activation() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'mebounce_user';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		email varchar(100) DEFAULT '' NOT NULL,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

function drop_db_on_deactivation() {
	global $wpdb;
    $table = $wpdb->prefix."mebounce_user";

    //Delete any options thats stored also?
	//delete_option('wp_yourplugin_version');

	$wpdb->query("DROP TABLE IF EXISTS $table");
}



register_activation_hook( __FILE__, 'create_mebounce_db_on_activation' );
register_deactivation_hook( __FILE__, 'drop_db_on_deactivation' );

add_action('admin_menu', 'mebounce_plugin_admin_init');
add_action( 'wp_enqueue_scripts', 'mebounce_plugin_init' );
add_action('wp_footer', 'mebounce_modal_code_init');
add_action('admin_menu', 'as_mebounce_add_option_page');
add_action('wp_footer', 'mebounce_custom_js_init');
add_action('wp_footer', 'mebounce_form_submit_ajax_code');
?>