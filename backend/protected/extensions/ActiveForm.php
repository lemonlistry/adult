<?php

class ActiveForm extends CActiveForm {

    /**
     * Renders a search field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function searchField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeSearchField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a tel field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function telField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeTelField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a url field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function urlField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeUrlField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a email field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function emailField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeEmailField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a datetime field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function datetimeField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeDatetimeField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a date field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function dateField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeDateField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a month field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function monthField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeMonthField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a week field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function weekField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeWeekField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a time field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function timeField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeTimeField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a number field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function numberField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeNumberField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a range field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function rangeField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeRangeField($model, $attribute, $htmlOptions);
    }

    /**
     * Renders a color field for a model attribute.
     * This method is a wrapper of {@link CHtml::activeTextField}.
     * Please check {@link CHtml::activeTextField} for detailed information
     * about the parameters for this method.
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated input field
     */
    public function colorField($model, $attribute, $htmlOptions=array()) {
        return Html5::activeColorField($model, $attribute, $htmlOptions);
    }

}
