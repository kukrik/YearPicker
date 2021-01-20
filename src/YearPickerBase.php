<?php

namespace QCubed\Plugin;

use QCubed as Q;
use QCubed\Exception\Caller;
use QCubed\Exception\InvalidCast;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Control\FormBase;
use QCubed\Project\Application;
use QCubed\Type;

/**
 * Class YearPickerBase
 *
 * @package QCubed\Plugin
 */

class YearPickerBase extends YearPickerBaseGen
{
    public function __construct($objParentObject, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);
        $this->registerFiles();
    }

    protected function registerFiles() {
        $this->addCssFile(QCUBED_YEARPICKER_ASSETS_URL . "/css/yearpicker.css");
        $this->addJavascriptFile(QCUBED_YEARPICKER_ASSETS_URL . "/js/yearpicker.js");
        $this->AddCssFile(QCUBED_BOOTSTRAP_CSS); // make sure they know
        $this->AddCssFile(QCUBED_FONT_AWESOME_CSS); // make sure they know
    }

    public function validate()
    {
        return true;
    }

    public function __set($strName, $mixValue)
    {
        switch ($strName) {
            case 'Text':
                try {
                    $this->strText = Type::cast($mixValue, Type::INTEGER);

                } catch (InvalidCast $objExc) {
                    $objExc->incrementOffset();
                    throw $objExc;
                }
                break;

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
}

