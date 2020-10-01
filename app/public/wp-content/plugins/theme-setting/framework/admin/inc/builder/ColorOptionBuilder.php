<?php


class ColorOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <div id="<?php echo $this->id; ?>colorSelector" class="color-pic"><div style="background-color:<?php echo $this->data; ?>"></div></div>
        <input style="width:80px;"  name="<?php echo $this->optionName ?>" id="<?php echo $this->id; ?>" type="text" value="<?php echo $this->data ; ?>" />

        <script>
            jQuery('#<?php echo $this->id; ?>colorSelector').ColorPicker({
                color: '<?php echo $this->data; ?>',
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
                    jQuery('#<?php echo $this->id; ?>').val('#'+hex);
                }
            });
        </script>
        <?php
    }
}