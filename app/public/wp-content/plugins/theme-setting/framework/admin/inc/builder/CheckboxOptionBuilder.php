<?php


class CheckboxOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        if( $this->data ) {
            $checked = "checked=\"checked\"";
        } else {
            $checked = "";
        } ?>
        <input class="on-of"
               type="checkbox"
               name="<?php echo $this->optionName ?>"
               id="<?php echo $this->id ?>"
               value="true" <?php echo $checked; ?> />
        <?php
    }
}