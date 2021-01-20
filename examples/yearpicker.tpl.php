<?php require(QCUBED_CONFIG_DIR . '/header.inc.php'); ?>
    <style >
        body {font-size: medium;}
        p, footer {font-size: medium;}
    </style>

<?php $this->RenderBegin(); ?>

    <div class="instructions">
        <h1 class="instruction_title">YearPicker some usage examples</h1>
        <p>The YearPicker plugin allows to you use the Year Picker, which is a Bootstrap
            form component to handle only year data, on your forms.</p>
        <p>YearPicker.js is a lightweight yet configurable yearpicker for jQuery that makes it easy to select a year from
            a popup similar to the date picker. This plugin allows you to easily customaize the YearPicker the way you want it to.</p>

        <p>Home page for the lib is <a href="https://github.com/saravanajd/YearPicker">https://github.com/saravanajd/YearPicker</a>
            and demo is at <a href="https://saravanajd.github.io/YearPicker/">https://saravanajd.github.io/YearPicker/</a>,
            where you can see example of use.</p>
    </div>

    <div class="form-horizontal" style="padding-top: 25px;">



        <div class="form-group">
            <label class="col-sm-3 control-label">Year Picking</label>
            <div class="col-sm-3">
                <?= _r($this->yearpicker); ?>
            </div>
            <p style="padding-top: 6px; display: inline-block;">Output to database in the correct format - in numbers: <?= _r($this->label); ?></p>
        </div>

    </div>

<?php $this->RenderEnd(); ?>

<?php require(QCUBED_CONFIG_DIR . '/footer.inc.php'); ?>