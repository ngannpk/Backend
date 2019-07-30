<?php
/*
 * @var $user \app\models\User
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!--http://localhost/yii/index.php?r=user/create-user-->
<?= Yii::$app->session->getFlash('Notification');?>
<div class="container">
    <?php $form = \yii\widgets\ActiveForm::begin(['options' => array(
        'enctype' => 'multipart/form-data',
        'id' => 'form-user',
        'action' => Url::toRoute('user/create-user'))]);?>
    <?php $this->title = "User Form"?>
    <h1>User Form</h1>
    <div class="row">
        <div class="col-md-4">
            <?=$form->field($user, 'name')->textInput([
                'placeholder' => 'Enter Your Full Name'
            ])->label('Full Name') ?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'password')->textInput(['type'=>'password',
                    'autocomplete' => 'new-password'])?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'dob')->textInput(['type' => 'date'])?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?=$form->field($user, 'email')->textInput(['type'=>'email'])?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'gender')->radioList([
                    'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'hobbies')->checkboxList(
                ['Eat' => 'Eat', 'Game' => 'Game', 'Sleep' => 'Sleep'])?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?=$form->field($user, 'region')->dropDownList([
                'North' => 'North', 'Center' => 'Center', 'South' => 'South'],
                array('prompt'=>''))?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'note')->textarea()?>
        </div>
        <div class="col-md-4">
            <?=$form->field($user, 'avatar')->fileInput()?>
        </div>
    </div>
    <?=Html::submitButton('Submit', array('class' => 'btn btn-success'))?>
    <?php \yii\widgets\ActiveForm::end();?>
</div>
