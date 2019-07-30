<?php
/*
 * http://localhost/yii/backend/web/index.php?r=toan-hoc/user
 * @var $this \yii\web\view
 */
use yii\bootstrap\Html;
?>

<?=\yii\bootstrap\Html::beginForm()?>
<?php $this->title = "User Form"?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>User Form</h1>
            <div class="form-group">
                <?=Html::Label('Full Name', 'full-name')?>
                <?=Html::textInput('full_name', null, ['id' => 'full-name', 'class' => 'form-control', 'placeholder' => 'Enter Your Full Name', 'required' => 'required'])?>
            </div>
            <div class="form-group">
                <?=Html::Label('Date Of Birth', 'date-of-birth')?>
                <?=Html::textInput('date_of_birth', null, ['id' => 'date-of-birth', 'type' => 'date', 'class' => 'form-control'])?>
            </div>
            <div class="form-group">
                <?=Html::Label('Email', 'email')?>
                <?=Html::textInput('email', null, ['id' => 'email', 'class' => 'form-control', 'type' => 'email', 'required' => 'required'])?>
            </div>
            <div class="form-group">
                <?=Html::Label('Gender', 'gender')?>
                <?=Html::radioList('gender', 'Male', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])?>
            </div>
            <div class="form-group">
                <?=Html::Label('Hobbies', 'hobbies')?>
                <?=Html::checkboxList('hobbies[]', '',['Reading' => 'Reading', 'Traveling' => 'Traveling', 'Sleeping' => 'Sleeping'])?>
            </div>
            <div class="form-group">
                <?=Html::Label('Note', 'note')?>
                <?=Html::textarea('note', null, ['id' => 'note', 'class' => 'form-control', 'rows' => 3])?>
            </div>
            <?=Html::submitButton('Submit', array('class' => 'btn btn-primary'))?>
            <?="Your age: ".$age?>
        </div>
    </div>
<?=\yii\bootstrap\Html::endForm()?>
