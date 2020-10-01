<?php


class TextOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <input
                name="<?php echo $this->optionName; ?>"
                id="<?php  echo $this->id; ?>"
                type="text"
                value="<?php if( !empty( $this->data ) ) echo $this->data;
                elseif( !empty( $this->default ) ) echo $this->default;  ?>" />
        <?php
    }
}