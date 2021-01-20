<?php

namespace QCubed\Plugin;

use QCubed as Q;
use QCubed\Control;
use QCubed\Bootstrap as Bs;
use QCubed\Exception\Caller;
use QCubed\Exception\InvalidCast;
use QCubed\ModelConnector\Param as QModelConnectorParam;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Application;
use QCubed\Type;

/**
 * Class YearPickerGen
 *
 * @see YearPickerBase
 * @package QCubed\Plugin
 */

/**
 * @property integer Year Default null. Number
 * @property integer StartYear Default null. Number
 * @property integer EndYear Default null, Number
 * @property string SelectedClass Default selected. Class will be added to the selected item
 * @property string DisabledClass Default disabled. Class will be added to the disabled items
 * @property callable OnChange  Default null. A callback function that fires when the selected value is changed
 * @property callable OnShow Default null. A callback function that fires when a yearpicker is show
 * @property callable OnHide Default null. A callback function that fires when a yearpicker is hide
 * @property string Template Custom template
 *
 *
 * @see https://saravanajd.github.io/YearPicker/ or https://github.com/saravanajd/YearPicker
 * @package QCubed\Plugin
 */

class yearPickerBaseGen extends Bs\TextBox
{
    protected $strJavaScripts = QCUBED_JQUI_JS;
    protected $strStyleSheets = QCUBED_JQUI_CSS;
    /** @var integer */
    protected $intYear = null;
    /** @var integer */
    protected $intStartYear = null;
    /** @var integer */
    protected $intEndYear = null;
    /** @var string */
    protected $strSelectedClass = null;
    /** @var string */
    protected $strDisabledClass = null;
    /** @var callable */
    protected $mixOnChange = null;
    /** @var callable */
    protected $mixOnShow = null;
    /** @var callable */
    protected $mixOnHide = null;
    /** @var string */
    protected $strTemplate = null;


    protected function makeJqOptions()
    {
        $jqOptions = parent::MakeJqOptions();
        if (!is_null($val = $this->Year)) {$jqOptions['year'] = $val;}
        if (!is_null($val = $this->StartYear)) {$jqOptions['startYear'] = $val;}
        if (!is_null($val = $this->EndYear)) {$jqOptions['endYear'] = $val;}
        if (!is_null($val = $this->SelectedClass)) {$jqOptions['selectedClass'] = $val;}
        if (!is_null($val = $this->DisabledClass)) {$jqOptions['disabledClass'] = $val;}
        if (!is_null($val = $this->OnChange)) {$jqOptions['onChange'] = $val;}
        if (!is_null($val = $this->OnShow)) {$jqOptions['onShow'] = $val;}
        if (!is_null($val = $this->OnHide)) {$jqOptions['onHide'] = $val;}
        if (!is_null($val = $this->Template)) {$jqOptions['template'] = $val;}
        return $jqOptions;
    }

    public function getJqSetupFunction()
    {
        return 'yearpicker';
    }

    /**
     * Remove the yearpicker. Removes attached events, internal attached objects, and added HTML elements.
     *
     * This method does not accept any arguments.
     */
    public function remove()
    {
        Application::executeControlCommand($this->getJqControlId(), $this->getJqSetupFunction(), "remove", Application::PRIORITY_LOW);
    }

    /**
     * Show the yearpicker.
     *
     * This method does not accept any arguments.
     */
    public function show()
    {
        Application::executeControlCommand($this->getJqControlId(), $this->getJqSetupFunction(), "show", Application::PRIORITY_LOW);
    }

    /**
     * Hide the yearpicker.
     *
     * This method does not accept any arguments.
     */
    public function hide()
    {
        Application::executeControlCommand($this->getJqControlId(), $this->getJqSetupFunction(), "hide", Application::PRIORITY_LOW);
    }

    public function __get($strName)
    {
        switch ($strName) {
            case 'Year': return $this->intYear;
            case 'StartYear': return $this->intStartYear;
            case 'EndYear': return $this->intEndYear;
            case 'SelectedClass': return $this->strSelectedClass;
            case 'DisabledClass': return $this->strDisabledClass;
            case 'OnChange': return $this->mixOnChange;
            case 'OnShow': return $this->mixOnShow;
            case 'OnHide': return $this->mixOnHide;
            case 'Template': return $this->strTemplate;

            default:
                try {
                    return parent::__get($strName);
                } catch (Caller $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }
        }
    }

    public function __set($strName, $mixValue)
    {
        switch ($strName) {
            case 'Year':
                try {
                    $this->intYear = Type::Cast($mixValue, Type::INTEGER);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'year', $this->intYear);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'StartYear':
                try {
                    $this->intStartYear = Type::Cast($mixValue, Type::INTEGER);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'startYear', $this->intStartYear);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'EndYear':
                try {
                    $this->intEndYear = Type::Cast($mixValue, Type::INTEGER);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'endYear', $this->intEndYear);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'SelectedClass':
                try {
                    $this->strSelectedClass = Type::Cast($mixValue, Type::STRING);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'selectedClass', $this->strSelectedClass);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'DisabledClass':
                try {
                    $this->strDisabledClass = Type::Cast($mixValue, Type::STRING);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'disabledClass', $this->strDisabledClass);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'OnChange':
                try {
                    $this->mixOnChange = Type::Cast($mixValue, Type::CALLABLE_TYPE);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'onChange', $this->mixOnChange);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'OnShow':
                try {
                    $this->mixOnShow = Type::Cast($mixValue, Type::CALLABLE_TYPE);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'onShow', $this->mixOnShow);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'OnHide':
                try {
                    $this->mixOnHide = Type::Cast($mixValue, Type::CALLABLE_TYPE);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'onHide', $this->mixOnHide);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            case 'Template':
                try {
                    $this->strTemplate = Type::Cast($mixValue, Type::STRING);
                    $this->addAttributeScript($this->getJqSetupFunction(), 'option', 'template', $this->strTemplate);
                    break;
                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }

            default:
                try {
                    parent::__set($strName, $mixValue);
                    break;
                } catch (Caller $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }
        }
    }

    /**
     * If this control is attachable to a codegenerated control in a ModelConnector, this function will be
     * used by the ModelConnector designer dialog to display a list of options for the control.
     * @return QModelConnectorParam[]
     **/
    public static function getModelConnectorParams()
    {
        return array_merge(parent::GetModelConnectorParams(), array());
    }
}


