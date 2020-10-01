<?php


class RadioOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <div class="option-contents">
            <?php
            $i = 0;
            foreach ($this->options as $key => $option) { $i++; ?>
                <label style="display:block; margin-bottom:8px;">
                    <input
                            name="<?php echo $this->optionName; ?>"
                            id="<?php echo $this->id; ?>"
                            type="radio"
                            value="<?php echo $key ?>"
                        <?php if ( ( !empty(  $this->data ) && $this->data == $key ) || ( empty( $this->data ) && $i==1 ) ) {
                            echo ' checked="checked"' ;
                        } ?>> <?php echo $option; ?>
                </label>
            <?php } ?>
        </div>
        <?php
    }
}