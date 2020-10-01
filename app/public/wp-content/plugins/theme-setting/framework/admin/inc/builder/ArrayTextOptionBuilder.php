<?php


class ArrayTextOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <input
                name="<?php echo $this->optionName ?>[<?php echo $this->key; ?>]"
                id="<?php  echo $this->id; ?>[<?php echo $this->key; ?>]"
                type="text"
                value="<?php if( !empty( $currentValue[$this->key] ) ) echo $currentValue[$this->key] ?>" />
        <?php
    }
}