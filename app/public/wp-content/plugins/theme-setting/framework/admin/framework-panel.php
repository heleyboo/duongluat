<?php
/*-----------------------------------------------------------------------------------*/
# Clean options before store it in DB
/*-----------------------------------------------------------------------------------*/
function ts_clean_options(&$value) {
  $value = htmlspecialchars(stripslashes( $value ));
}
function ts_clean_imported_options(&$value) {
  $value = htmlspecialchars_decode( $value );
}


/*-----------------------------------------------------------------------------------*/
# Options Array
/*-----------------------------------------------------------------------------------*/
$array_options = array( "ts_options" );


/*-----------------------------------------------------------------------------------*/
# Save Theme Settings
/*-----------------------------------------------------------------------------------*/
function ts_save_settings ( $data , $refresh = 0 ) {
	global $array_options ;

	foreach( $array_options as $option ){
		if( isset( $data[$option] )){
			array_walk_recursive( $data[$option] , 'ts_clean_options');
			update_option( $option ,  $data[$option] );
		}
	}

	if( $refresh == 2 )  	die('2');
	elseif( $refresh == 1 )	die('1');
}


/*-----------------------------------------------------------------------------------*/
# Save Options
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_test_theme_data_save', 'ts_save_ajax');
function ts_save_ajax() {

	check_ajax_referer('test-theme-data', 'security');
	$data = $_POST;
	$refresh = 1;

	if( !empty( $data['ts_import'] ) ){
		$refresh = 2;
		$data = unserialize(base64_decode( $data['ts_import'] ));
		array_walk_recursive( $data , 'ts_clean_imported_options');
	}

	ts_save_settings ($data , $refresh );
}


/*-----------------------------------------------------------------------------------*/
# Add Panel Page
/*-----------------------------------------------------------------------------------*/
add_action('admin_menu', 'ts_add_admin');
function ts_add_admin() {

	$current_page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
	$theme_setting_page = add_menu_page(
	        THEME_NAME ,
            THEME_NAME ,
            'switch_themes',
            'panel' ,
            'ts_panel_options',
            'dashicons-schedule'
    );

	add_action( 'admin_head-'. $theme_setting_page, 'ts_admin_head' );
	function ts_admin_head(){

	?>
	<script type="text/javascript">
		var emptyImg = '<?php echo get_plugin_uri(); ?>/framework/admin/images/empty.png';

		jQuery(document).ready(function($) {
		  jQuery('.on-of').checkbox({empty: emptyImg});

		  jQuery('form#ts_form').submit(function() {

		  	/* Disable Empty options */
			  jQuery('form#ts_form input, form#ts_form textarea, form#ts_form select').each(function() {
					if (!jQuery(this).val()) jQuery(this).attr("disabled", true );
			  });
			   jQuery('#typography_test-item input, #typography_test-item select').attr("disabled", true );

			  var data = jQuery(this).serialize();

			/* Enable Empty options */
			  jQuery('form#ts_form input:disabled, form#ts_form textarea:disabled, form#ts_form select:disabled').attr("disabled", false );

			  jQuery.post(ajaxurl, data, function(response) {
				  if(response == 1) {
					  jQuery('#save-alert').addClass('save-done');
					  t = setTimeout('fade_message()', 1000);
				  }
				else if( response == 2 ){
					location.reload();
				}
				else {
					 jQuery('#save-alert').addClass('save-error');
					  t = setTimeout('fade_message()', 1000);
				  }
			  });
			  return false;
		  });

		});

		function fade_message() {
			jQuery('#save-alert').fadeOut(function() {
				jQuery('#save-alert').removeClass('save-done');
			});
			clearTimeout(t);
		}

		jQuery(function() {
			jQuery( "#customList"   ).sortable({placeholder: "ui-state-highlight"});
		});
	</script>
	<?php
		wp_enqueue_media();
	}
	if( isset( $_REQUEST['action'] ) ){
		if( 'reset' == $_REQUEST['action']  && $current_page == 'panel' && check_admin_referer('reset-action-code' , 'resetnonce') ) {
			global $default_data;
			ts_save_settings( $default_data );
			header("Location: admin.php?page=panel&reset=true");
			die;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
# Get The Panel Options
/*-----------------------------------------------------------------------------------*/
function ts_options ( $value ) {
    $builder = OptionBuilderFactory::createOptionBuilder($value);
    if ($builder) {
        $builder->display();
    }
}

/*-----------------------------------------------------------------------------------*/
# The Panel UI
/*-----------------------------------------------------------------------------------*/
function ts_panel_options() {

	//Custom settings
    $settings = apply_filters( 'ts_setting_items', array() );
    $save='
        <div class="mpanel-submit">
            <input type="hidden" name="action" value="test_theme_data_save" />
            <input type="hidden" name="security" value="'. wp_create_nonce("test-theme-data").'" />
            <input name="save" class="mpanel-save button button-primary button-large" type="submit" value="'.__( "Save Changes", 'beautyspa' ).'" />
        </div>';
?>


<div id="save-alert"></div>
	<?php do_action( 'ts_before_theme_panel' );?>
<div class="mo-panel">
	<div class="mo-panel-tabs">
		<a href="https://mmovoz.com/" target="_blank" class="ts-logo"></a>
		<ul>
            <?php foreach ($settings as $key => $setting): ?>
                <li class="ts-tabs">
                    <a href="#extab<?php echo $key; ?>">
                        <span class="dashicons-before <?php echo $setting['icon'] ? $setting['icon'] : 'dashicons-admin-settings' ?> ts-icon-menu"></span><?php echo $setting['title']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li class="ts-tabs import">
                <a href="#tabImport">
                    <span class="dashicons-before dashicons-info ts-icon-menu"></span>
                    <?php _e( 'Import & Export settings', 'beautyspa' ) ?>
                </a>
            </li>
        </ul>
		<div class="clear"></div>
	</div> <!-- .mo-panel-tabs -->

	<div class="mo-panel-content">
	<form action="/" name="ts_form" id="ts_form">
        <?php foreach ($settings as $key => $setting): ?>
            <div id="extab<?php echo $key; ?>" class="tab_content tabs-wrap">
                <h2><?php echo $setting['title']; ?></h2>	<?php echo $save ?>
                <?php foreach ($setting['items'] as $item): ?>
                    <div class="tspanel-item">
                        <h3><?php echo $item['header']; ?></h3>
                        <?php foreach ($item['options'] as $option) {
                            $builder = OptionBuilderFactory::createOptionBuilder($option);
                            if ($builder) {
                                $builder->display();
                            }
                        } ?>
                    </div>
                <?php endforeach; ?>
            </div>
             <!-- Advanced -->
        <?php endforeach; ?>
        <div id="tabImport" class="tab_content tabs-wrap">
            <h2><?php _e( 'Import & Export Settings', 'beautyspa' ) ?></h2>	<?php echo $save ?>
            <?php
            global $array_options ;

            $current_options = array();
            foreach( $array_options as $option ){
                if( get_option( $option ) )
                    $current_options[$option] =  get_option( $option ) ;
            }
            ?>

            <div class="tspanel-item">
                <h3><?php _e( 'Export', 'beautyspa' ) ?></h3>
                <div class="option-item">
                    <textarea style="width:100%" rows="7"><?php echo $currentsettings = base64_encode( serialize( $current_options )); ?></textarea>
                </div>
            </div>
            <div class="tspanel-item">
                <h3><?php _e( 'Import', 'beautyspa' ) ?></h3>
                <div class="option-item">
                    <p class="ts_message_hint">To import settings, copy exported settings and paste here, the press Save Changes</p>
                    <textarea id="ts_import" name="ts_import" style="width:100%" rows="7"></textarea>
                </div>
            </div>


        </div>
		<div class="mo-footer">
			<?php echo $save; ?>
		</form>
			<form method="post">
				<div class="mpanel-reset">
					<input type="hidden" name="resetnonce" value="<?php echo wp_create_nonce('reset-action-code'); ?>" />
					<input name="reset" class="mpanel-reset-button button button-primary button-large" type="submit" onClick="if(confirm('<?php _e( 'All settings will be rest .. Are you sure ?', 'beautyspa' ) ?>')) return true ; else return false; " value="<?php _e( 'Reset All Settings', 'beautyspa' ) ?>" />
					<input type="hidden" name="action" value="reset" />
				</div>
			</form>
		</div>

	</div><!-- .mo-panel-content -->
	<div class="clear"></div>
</div><!-- .mo-panel -->
<?php
}
?>
