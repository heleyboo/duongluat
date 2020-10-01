<?php


class ShortTextOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <input style="width:50px"
                name="<?php echo $this->optionName ?>"
                id="<?php  echo $this->id; ?>"
                type="text"
                value="<?php if( !empty( $this->data ) ) echo $this->data;
                elseif( !empty( $this->default ) ) echo $this->default; ?>" />
        <?php
    }
}