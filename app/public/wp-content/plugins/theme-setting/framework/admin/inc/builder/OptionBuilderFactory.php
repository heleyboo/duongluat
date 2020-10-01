<?php


class OptionBuilderFactory
{
    /**
     * @param $setting
     * @return ArrayTextOptionBuilder|BackgroundOptionBuilder|CheckboxOptionBuilder|ColorOptionBuilder|DateOptionBuilder|RadioOptionBuilder|SelectOptionBuilder|ShortTextOptionBuilder|SliderOptionBuilder|TextAreaOptionBuilder|TextOptionBuilder|TypoOptionBuilder|UploadOptionBuilder|null
     */
    public static function createOptionBuilder($setting) {
        $type = isset($setting['type']) ? $setting['type'] : false;
        switch ($type) {
            case InputType::TYPE_TEXT:
                return new TextOptionBuilder($setting);
            case InputType::TYPE_TEXTAREA:
                return new TextAreaOptionBuilder($setting);
            case InputType::TYPE_ARRAYTEXT:
                return new ArrayTextOptionBuilder($setting);
            case InputType::TYPE_SHORTTEXT:
                return new ShortTextOptionBuilder($setting);
            case InputType::TYPE_RADIO:
                return new RadioOptionBuilder($setting);
            case InputType::TYPE_SELECT:
                return new SelectOptionBuilder($setting);
            case InputType::TYPE_CHECKBOX:
                return new CheckboxOptionBuilder($setting);
            case InputType::TYPE_DATE:
                return new DateOptionBuilder($setting);
            case InputType::TYPE_UPLOAD:
                return new UploadOptionBuilder($setting);
            case InputType::TYPE_SLIDER:
                return new SliderOptionBuilder($setting);
            case InputType::TYPE_BACKGROUND:
                return new BackgroundOptionBuilder($setting);
            case InputType::TYPE_COLOR:
                return new ColorOptionBuilder($setting);
            case InputType::TYPE_TYPO:
                return new TypoOptionBuilder($setting);
            case InputType::TYPE_IMAGESELECT:
                return new ImageSelectOptionBuilder($setting);
            default: return null;
        }
    }
}