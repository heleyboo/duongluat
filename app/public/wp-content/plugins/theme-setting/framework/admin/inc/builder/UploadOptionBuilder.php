<?php


class UploadOptionBuilder extends OptionBuilder
{

    public function buildOption()
    {
        ?>
        <input id="<?php echo $this->id; ?>" class="img-path" type="text" size="56" style="direction:ltr; text-align:left"
               name="<?php echo $this->optionName; ?>" value="<?php echo $this->data; ?>" />
        <input id="upload_<?php echo $this->id; ?>_button"
               type="button" class="button" value="<?php _e( 'Upload', 'ts' )  ?>" />

        <?php if( isset( $this->extraText ) ) : ?>
            <span class="extra-text"><?php echo $this->extraText; ?></span>
        <?php endif; ?>

        <div id="<?php echo $this->id; ?>-preview" class="img-preview"
            <?php if( !$this->data ) echo 'style="display:none;"' ?>>
            <img src="<?php if( $this->data ) echo $this->data;
            else echo get_plugin_uri().'/framework/admin/images/empty.png'; ?>" alt="" />
            <a class="del-img" title="Delete"></a>
        </div>
        <script type='text/javascript'>
            jQuery('#<?php echo $this->id; ?>').change(function(){
                jQuery('#<?php echo $this->id; ?>-preview').show();
                jQuery('#<?php echo $this->id; ?>-preview img').attr("src", jQuery(this).val());
            });
            ts_set_uploader( '<?php echo $this->id; ?>' );
        </script>
        <?php
    }
}