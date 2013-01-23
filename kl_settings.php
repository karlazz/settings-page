<?php
Plugin Name: Test a settings page.
Description: Use this code to test a settings page.
//This is my own code for adding a settings page. This worked but I changed some names so might not now. 
// create custom plugin settings menu
add_action('admin_menu', 'kl_create_menu');

function kl_create_menu() {

  //create settings submenu
  //  add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 
	add_submenu_page( 'options-general.php','Sample Plugin Settings', 'Sample Settings', 'administrator', __FILE__, 'kl_settings_page');

	//call register settings function
	add_action( 'admin_init', 'kl_register_settings' );
}


function kl_register_settings() {
	//register our settings
	register_setting( 'kl-settings-group', 'kl_settings' );
}

function kl_settings_page() {
?>
<?php $options=get_option("kl_settings");?>
<div class="wrap">
<h2>Sample Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'kl-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Option 1</th>
        <td><input type="text" name="kl_settings[option_1]" value="<?php echo $options[option_1]; ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Option 2</th>
        <td><input type="text" name="kl_settings[option_2]" value="<?php echo $options[option_2]; ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Option 3</th>
        <td><input type="text" name="kl_settings[option_3]" value="<?php echo $options[option_3]; ?>" /></td>
	</tr>
        
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
<?php /* Normally I wouldn't use a table, but I took the code from the WordPress Codex on adding an options page and that's what they used */ ?>
