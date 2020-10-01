<?php


class BackgroundOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        $current_value = $this->data;
        if( is_serialized( $current_value ) ) {
            $current_value = unserialize ( $current_value );
        }

        ?>
        <input id="<?php echo $this->id; ?>-img" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="<?php echo $this->optionName ?>[img]" value="<?php echo $current_value['img']; ?>" />
        <input id="upload_<?php echo $this->id; ?>_button" type="button" class="button" value="<?php _e( 'Upload', 'tie' )  ?>" />

        <div style="margin-top:15px; clear:both">
            <div id="<?php echo $this->id; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo $current_value['color'] ; ?>"></div></div>
            <input style="width:100px;"  name="<?php echo $this->optionName ?>[color]" id="<?php  echo $this->id; ?>color" type="text" value="<?php echo $current_value['color'] ; ?>" />

            <select name="<?php echo $this->optionName ?>[repeat]" id="<?php echo $this->id; ?>[repeat]" style="width:96px;">
                <option value="" <?php if ( !$current_value['repeat'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="repeat" <?php if ( $current_value['repeat']  == 'repeat' ) { echo ' selected="selected"' ; } ?>><?php _e( 'repeat', 'tie' )  ?></option>
                <option value="no-repeat" <?php if ( $current_value['repeat']  == 'no-repeat') { echo ' selected="selected"' ; } ?>><?php _e( 'no-repeat', 'tie' )  ?></option>
                <option value="repeat-x" <?php if ( $current_value['repeat'] == 'repeat-x') { echo ' selected="selected"' ; } ?>><?php _e( 'repeat-x', 'tie' )  ?></option>
                <option value="repeat-y" <?php if ( $current_value['repeat'] == 'repeat-y') { echo ' selected="selected"' ; } ?>><?php _e( 'repeat-y', 'tie' )  ?></option>
            </select>

            <select name="<?php echo $this->optionName ?>[attachment]" id="<?php echo $this->id; ?>[attachment]" style="width:96px;">
                <option value="" <?php if ( !$current_value['attachment'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="fixed" <?php if ( $current_value['attachment']  == 'fixed' ) { echo ' selected="selected"' ; } ?>><?php _e( 'Fixed', 'tie' )  ?></option>
                <option value="scroll" <?php if ( $current_value['attachment']  == 'scroll') { echo ' selected="selected"' ; } ?>><?php _e( 'Scroll', 'tie' )  ?></option>
            </select>

            <select name="<?php echo $this->optionName ?>[hor]" id="<?php echo $this->id; ?>[hor]" style="width:96px;">
                <option value="" <?php if ( !$current_value['hor'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="left" <?php if ( $current_value['hor']  == 'left' ) { echo ' selected="selected"' ; } ?>><?php _e( 'Left', 'tie' )  ?></option>
                <option value="right" <?php if ( $current_value['hor']  == 'right') { echo ' selected="selected"' ; } ?>><?php _e( 'Right', 'tie' )  ?></option>
                <option value="center" <?php if ( $current_value['hor'] == 'center') { echo ' selected="selected"' ; } ?>><?php _e( 'Center', 'tie' )  ?></option>
            </select>

            <select name="<?php echo $this->optionName ?>[ver]" id="<?php echo $this->id; ?>[ver]" style="width:100px;">
                <option value="" <?php if ( !$current_value['ver'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="top" <?php if ( $current_value['ver']  == 'top' ) { echo ' selected="selected"' ; } ?>><?php _e( 'Top', 'tie' )  ?></option>
                <option value="bottom" <?php if ( $current_value['ver']  == 'bottom') { echo ' selected="selected"' ; } ?>><?php _e( 'Bottom', 'tie' )  ?></option>
                <option value="center" <?php if ( $current_value['ver'] == 'center') { echo ' selected="selected"' ; } ?>><?php _e( 'Center', 'tie' )  ?></option>

            </select>
        </div>
        <div id="<?php echo $this->id; ?>-preview" class="img-preview" <?php if( !$current_value['img']  ) echo 'style="display:none;"' ?>>
            <img src="<?php if( $current_value['img'] ) echo $current_value['img'] ; else echo get_plugin_uri().'/framework/admin/images/empty.png'; ?>" alt="" />
            <a class="del-img" title="Delete"></a>
        </div>

        <script>
            jQuery('#<?php echo $this->id; ?>colorSelector').ColorPicker({
                color: '<?php echo $current_value['color'] ; ?>',
                onShow: function (colpkr) {
                    jQuery(colpkr).fadeIn(500);
                    return false;
                },
                onHide: function (colpkr) {
                    jQuery(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function (hsb, hex, rgb) {
                    jQuery('#<?php echo $this->id; ?>colorSelector div').css('backgroundColor', '#' + hex);
                    jQuery('#<?php echo $this->id; ?>color').val('#'+hex);
                }
            });
            jQuery('#<?php echo $this->id; ?>-img').change(function(){
                jQuery('#<?php echo $this->id; ?>-preview').show();
                jQuery('#<?php echo $this->id; ?>-preview img').attr("src", jQuery(this).val());
            });
            ts_set_uploader( '<?php echo $this->id; ?>', true );
        </script>
        <?php
    }
}