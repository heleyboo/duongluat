<?php


class SelectOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <select name="<?php echo $this->optionName; ?>" id="<?php echo $this->id; ?>">
            <?php
            $i = 0;
            foreach ($this->options as $key => $option) {  $i++; ?>
                <option
                        value="<?php echo $key ?>"
                    <?php if ( ( !empty(  $this->data ) && $this->data == $key ) || ( empty( $this->data ) && $i==1 ) ) {
                        echo ' selected="selected"' ;
                    } ?>><?php echo $option; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}