<?php


class TypoOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        # get Google Fonts
        /*---------------------------*/
        $google_api_output = '';
        require ( get_plugin_dir() . '/framework/admin/google-fonts.php');
        $google_font_array = json_decode ($google_api_output,true) ;

        $options_fonts = array();
        $options_fonts[''] = __( 'Default Font', 'tie' );
        foreach ($google_font_array as $item) {
            $variants='';
            $variantCount=0;
            foreach ($item['variants'] as $variant) {
                $variantCount++;
                if ($variantCount>1) { $variants .= '|'; }
                $variants .= $variant;
            }
            $variantText = ' (' . $variantCount .' '. __( 'Variants', 'tie' ) . ')';
            if ($variantCount <= 1) $variantText = '';
            $options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
        }

        $defaultValue = array(
            'color' => '#fff',
            'size' => 12,
            'font' => '',
            'weight' => 'normal',
            'style' => 'normal'
        );
        $current_value = is_array($this->data) ? $this->data : $defaultValue;

        ?>
        <div style="clear:both;"></div>
        <div style="clear:both; padding:10px 14px; margin:0 -15px;">
            <div id="<?php echo $this->id; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo $current_value['color'] ; ?>"></div></div>
            <input style="width:80px;"  name="<?php echo $this->optionName ?>[color]" id="<?php  echo $this->id; ?>color" type="text" value="<?php echo $current_value['color'] ; ?>" />

            <select name="<?php echo $this->optionName ?>[size]" id="<?php echo $this->id; ?>[size]" style="width:55px;">
                <option value="" <?php if (!$current_value['size'] ) { echo ' selected="selected"' ; } ?>></option>
                <?php for( $i=1 ; $i<101 ; $i++){ ?>
                    <option value="<?php echo $i ?>" <?php if (( $current_value['size']  == $i ) ) { echo ' selected="selected"' ; } ?>><?php echo $i ?></option>
                <?php } ?>
            </select>

            <select name="<?php echo $this->optionName ?>[font]" id="<?php echo $this->id; ?>[font]" style="width:190px;">
                <?php foreach( $options_fonts as $font => $font_name ){
                    if( empty($font_name) || $font_name == 'Arabic' ){ ?>
                        <optgroup disabled="disabled" label="<?php echo $font_name ?>"></optgroup>
                    <?php  }else{ ?>
                        <option value="<?php echo $font ?>" <?php if ( $current_value['font']  == $font ) { echo ' selected="selected"' ; } ?>><?php echo $font_name ?></option>
                    <?php  }
                } ?>
            </select>

            <select name="<?php echo $this->optionName ?>[weight]" id="<?php echo $this->id; ?>[weight]" style="width:96px;">
                <option value="" <?php if ( !$current_value['weight'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="normal" <?php if ( $current_value['weight']  == 'normal' ) { echo ' selected="selected"' ; } ?>><?php _e( 'Normal', 'tie' )  ?></option>
                <option value="bold" <?php if ( $current_value['weight']  == 'bold') { echo ' selected="selected"' ; } ?>><?php _e( 'Bold', 'tie' )  ?></option>
                <option value="lighter" <?php if ( $current_value['weight'] == 'lighter') { echo ' selected="selected"' ; } ?>><?php _e( 'Lighter', 'tie' )  ?></option>
                <option value="bolder" <?php if ( $current_value['weight'] == 'bolder') { echo ' selected="selected"' ; } ?>><?php _e( 'Bolder', 'tie' )  ?></option>
                <option value="100" <?php if ( $current_value['weight'] == '100') { echo ' selected="selected"' ; } ?>>100</option>
                <option value="200" <?php if ( $current_value['weight'] == '200') { echo ' selected="selected"' ; } ?>>200</option>
                <option value="300" <?php if ( $current_value['weight'] == '300') { echo ' selected="selected"' ; } ?>>300</option>
                <option value="400" <?php if ( $current_value['weight'] == '400') { echo ' selected="selected"' ; } ?>>400</option>
                <option value="500" <?php if ( $current_value['weight'] == '500') { echo ' selected="selected"' ; } ?>>500</option>
                <option value="600" <?php if ( $current_value['weight'] == '600') { echo ' selected="selected"' ; } ?>>600</option>
                <option value="700" <?php if ( $current_value['weight'] == '700') { echo ' selected="selected"' ; } ?>>700</option>
                <option value="800" <?php if ( $current_value['weight'] == '800') { echo ' selected="selected"' ; } ?>>800</option>
                <option value="900" <?php if ( $current_value['weight'] == '900') { echo ' selected="selected"' ; } ?>>900</option>
            </select>

            <select name="<?php echo $this->optionName ?>[style]" id="<?php echo $this->id; ?>[style]" style="width:100px;">
                <option value="" <?php if ( !$current_value['style'] ) { echo ' selected="selected"' ; } ?>></option>
                <option value="normal" <?php if ( $current_value['style']  == 'normal' ) { echo ' selected="selected"' ; } ?>><?php _e( 'Normal', 'tie' )  ?></option>
                <option value="italic" <?php if ( $current_value['style'] == 'italic') { echo ' selected="selected"' ; } ?>><?php _e( 'Italic', 'tie' )  ?></option>
                <option value="oblique" <?php if ( $current_value['style']  == 'oblique') { echo ' selected="selected"' ; } ?>><?php _e( 'Oblique', 'tie' )  ?></option>
            </select>
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
                    <?php if( $this->id == 'typography_test' ): ?>
                    jQuery('#font-preview').css('color', '#' + hex);
                    <?php endif; ?>
                }
            });
        </script>
        <?php
    }
}