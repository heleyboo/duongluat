<?php


class ImageSelectOptionBuilder extends OptionBuilder
{

    protected $showOptionName = false;
    public function buildOption()
    {
        ?>
        <ul id="<?php echo $this->id; ?>" class="ts-options theme-image-select">
            <?php
            $i = 0;

            foreach ($this->options as $key => $imageUrl) { $i++;
                $dataCompare = $this->imageValue ? $imageUrl : $key;
                $isSelected = (!empty(  $this->data ) && $this->data == $dataCompare) || ( empty( $this->data ) && $i==1);
                ?>
                <li <?php if ($isSelected) {
                    echo ' class="selected"' ;
                } ?>>
                    <input
                            id="<?php echo $this->id; ?>"
                           name="<?php echo $this->optionName; ?>" type="radio" value="<?php echo $dataCompare ?>"
                        <?php if ($isSelected) {
                            echo ' checked="checked"' ;
                        } ?> />
                    <a class="checkbox-select" href="#">
                        <img src="<?php echo $imageUrl; ?>" />
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php
    }
}