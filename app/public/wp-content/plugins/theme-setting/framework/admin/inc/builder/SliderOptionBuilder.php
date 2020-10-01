<?php


class SliderOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <div id="<?php echo $this->id; ?>-slider"></div>
        <input type="text" id="<?php echo $this->id; ?>"
               value="<?php if( !empty( $this->data ) ) echo $this->data;
               elseif( !empty( $this->default ) ) echo $this->default; else echo 0; ?>"
               name="<?php echo $this->optionName; ?>" style="width:50px;" /> <?php echo $this->unit; ?>
        <script>
            jQuery(document).ready(function() {
                jQuery("#<?php echo $this->id; ?>-slider").slider({
                    range: "min",
                    min: <?php echo $this->min; ?>,
                    max: <?php echo $this->max; ?>,
                    value: <?php if( !empty( $this->data ) ) echo $this->data;
                    elseif( !empty( $this->default ) ) echo $this->default; else echo 0; ?>,

                    slide: function(event, ui) {
                        jQuery('#<?php echo $this->id; ?>').attr('value', ui.value );
                    }
                });
            });
        </script>
        <?php
    }
}