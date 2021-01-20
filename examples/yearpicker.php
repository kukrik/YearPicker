<?php
require('qcubed.inc.php');

use QCubed as Q;
use QCubed\Bootstrap as Bs;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Control\FormBase as Form;
use QCubed\Action\ActionParams;
use QCubed\Action\Ajax;
use QCubed\Event\Change;

class ExamplesForm extends Form
{

    protected $yearpicker;

    protected $label;

    protected function formCreate()
    {
        $this->yearpicker = new Q\Plugin\YearPicker($this);
        //$this->yearpicker->AutoHide = true;
        //$this->yearpicker->Year = null;
        //$this->yearpicker->StartYear = null;
        //$this->yearpicker->EndYear = null;
        //$this->yearpicker->ItemTag = 'li';
        //$this->yearpicker->SelectedClass = 'selected';
        //$this->yearpicker->DisabledClass = 'disabled';
        //$this->yearpicker->HideClass = 'hide';
        //$this->yearpicker->HighlightedClass = 'highlighted';


        //$this->yearpicker->ActionParameter = $this->yearpicker->ControlId;
        //$this->yearpicker->addAction(new Change(), new Ajax('setYear'));

        $this->label = new Bs\Label($this);
        $this->label->setCssStyle('display', 'inline;');

    }

    protected function setYear(ActionParams $params)
    {
        $objControlToLookup = $this->getControl($params->ActionParameter);
        $this->label->Text = $objControlToLookup->Text;
    }



}
ExamplesForm::Run('ExamplesForm');
