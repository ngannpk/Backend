<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */
/* @var $form yii\widgets\ActiveForm */
//create -> insert
//insert/update: beforeSave -> save() ->afterSave
//update
//delete

?>

<div class="brand-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->fileInput() ?>

    <?php if(!$model->isNewRecord): ?>
        <?=Html::img('../../images/'.$model->logo, ['width' => '150px']) ?>
        <p><?=Html::a('<i class="glyphicon glyphicon-trash"></i>Delete', '#',['class'=>'btn btn-sm btn-danger'])?></p>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
