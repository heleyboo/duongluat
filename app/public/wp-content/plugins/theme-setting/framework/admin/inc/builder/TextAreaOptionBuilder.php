<?php


class TextAreaOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <textarea
                style="direction:ltr; text-align:left; width:350px;"
                name="<?php echo $this->optionName; ?>"
                id="<?php echo $this->id; ?>"
                type="textarea" rows="3" tabindex="4"><?php echo $this->data;  ?>
        </textarea>
        <?php
    }
}