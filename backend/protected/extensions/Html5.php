<?php

class Html5 extends CHtml {

    /**
     * Generates a search field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeSearchField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('search', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a search field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function searchField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('search', $name, $value, $htmlOptions);
    }

    /**
     * Generates a tel field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeTelField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('tel', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a tel field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function telField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('tel', $name, $value, $htmlOptions);
    }

    /**
     * Generates a url field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeUrlField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('url', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a tel field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function urlField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('url', $name, $value, $htmlOptions);
    }

    /**
     * Generates a email field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeEmailField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('email', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a email field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function emailField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('email', $name, $value, $htmlOptions);
    }

    /**
     * Generates a datetime field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeDatetimeField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('datetime', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a datetime field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function datetimeField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('datetime', $name, $value, $htmlOptions);
    }

    /**
     * Generates a date field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeDateField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('date', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a date field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function dateField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('date', $name, $value, $htmlOptions);
    }

    /**
     * Generates a month field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeMonthField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('month', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a month field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function monthField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('month', $name, $value, $htmlOptions);
    }

    /**
     * Generates a week field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeWeekField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('week', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a week field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function weekField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('week', $name, $value, $htmlOptions);
    }

    /**
     * Generates a time field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeTimeField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('time', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a time field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function timeField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('time', $name, $value, $htmlOptions);
    }

    /**
     * Generates a number field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeNumberField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('number', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a number field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function numberField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('number', $name, $value, $htmlOptions);
    }

    /**
     * Generates a range field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeRangeField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('range', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a range field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function rangeField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('range', $name, $value, $htmlOptions);
    }

    /**
     * Generates a color field input for a model attribute.
     * If the attribute has input error, the input field's CSS class will
     * be appended with {@link errorCss}.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see activeInputField
     */
    public static function activeColorField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('color', $model, $attribute, $htmlOptions);
    }

    /**
     * Generates a color field input.
     * @param string $name the input name
     * @param string $value the input value
     * @param array $htmlOptions additional HTML attributes. Besides normal HTML attributes, a few special
     * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
     * @return string the generated input field
     * @see clientChange
     * @see inputField
     */
    public static function colorField($name, $value='', $htmlOptions=array()) {
        self::clientChange('change', $htmlOptions);
        return self::inputField('color', $name, $value, $htmlOptions);
    }

}
