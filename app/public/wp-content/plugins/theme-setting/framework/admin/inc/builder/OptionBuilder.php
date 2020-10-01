<?php


abstract class OptionBuilder implements OptionBuilderInterface
{
    /**
     * @var option ID
     */
    protected $id;
    /**
     * @var Name of the option
     */
    protected $name;

    /**
     * @var InputType
     */
    protected $type;
    /**
     * @var Options
     */
    protected $options;

    protected $extraText;

    protected $help;

    protected $data = false;

    protected $optionName;

    protected $default;

    protected $key;

    protected $unit;

    protected $min;

    protected $max;

    protected $builder;

    protected $setting;

    protected $showOptionName = true;

    protected $imageValue = false;

    public function __construct($setting)
    {
        $this->setting = $setting;

        if (isset($setting['id']) && $setting['id']) {
            $this->id = $setting['id'];
        }

        if (isset($setting['name']) && $setting['name']) {
            $this->name = $setting['name'];
        }

        if (isset($setting['type']) && $setting['type']) {
            $this->type = $setting['type'];
        }

        if (isset($setting['options']) && $setting['options']) {
            $this->options = $setting['options'];
        }

        if (isset($setting['extra_text']) && $setting['extra_text']) {
            $this->extraText = $setting['extra_text'];
        }

        if (isset($setting['help']) && $setting['help']) {
            $this->help = $setting['help'];
        }

        if (isset($setting['default']) && $setting['default']) {
            $this->default = $setting['default'];
        }

        if (isset($setting['key']) && $setting['key']) {
            $this->default = $setting['key'];
        }

        if (isset($setting['unit']) && $setting['unit']) {
            $this->unit = $setting['unit'];
        }

        if (isset($setting['unit']) && $setting['unit']) {
            $this->unit = $setting['unit'];
        }

        if (isset($setting['min']) && $setting['min']) {
            $this->min = $setting['min'];
        }

        if (isset($setting['max']) && $setting['max']) {
            $this->max = $setting['max'];
        }

        if (isset($setting['builder']) && $setting['builder']) {
            $this->builder = $setting['builder'];
        }

        if (isset($setting['image_value']) && $setting['image_value']) {
            $this->imageValue = $setting['image_value'];
        }

        if( ts_get_option( $this->id ) ) $this->data = ts_get_option( $this->id );

        $this->optionName = 'ts_options['. $this->id .']';
    }

    protected function beforeOption() {
        ?>
        <div class="option-item" id="<?php echo $this->id; ?>-item">
            <?php if($this->showOptionName): ?>
            <span class="label">
            <?php echo $this->name; ?></span>
            <?php endif; ?>
        <?php
    }

    public function display() {
        $this->beforeOption();
        if ($this->builder && is_callable($this->builder)) {
            call_user_func($this->builder, $this->optionName, $this->data, $this->setting);
        } else {
            $this->buildOption();
        }
        $this->afterOption();
    }

    protected function afterOption() {
        ?>
            <?php if( ( $this->extraText ) && $this->type != InputType::TYPE_UPLOAD ) : ?>
                <span class="extra-text"><?php echo $this->extraText; ?></span>
            <?php endif; ?>
            <?php if( $this->help ) : ?>
                <a class="mo-help tie-tooltip"  title="<?php echo $this->help; ?>"></a>
            <?php endif; ?>
        </div>
        <?php
    }
}