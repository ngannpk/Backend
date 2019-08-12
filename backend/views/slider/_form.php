<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
/**
 * @var $hinh_anh_slider \common\models\SliderImages[]
 */
?>
<div class="slider-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'images_slider[]')->fileInput(['multiple' => 'multiple']) ?>

<!--    --><?php //if(!$model->isNewRecord){ //update
//        echo "<div class='row'>";
//        foreach ($hinh_anh_slider as $item){
//            echo "<div class='col-md-3'>";
//            echo "<img src='../images/{$item->file}' width='150px'/>";
//            echo "</div>";
//        }
//        echo "</div>";
//    } ?>

    <?php if(!$model->isNewRecord): ?>
    <div class="row">
        <?php foreach ($hinh_anh_slider as $item): ?>
        <div class="col-md-2">
            <?=Html::img('../../images/'.$item->file, ['class'=>'img-responsive']) ?>
            <p><?=Html::a('<i class="glyphicon glyphicon-trash"></i>Delete', \yii\helpers\Url::toRoute(['slider/xoa-anh-slider','idhinhanh'=>$item->id]),['class'=>'btn btn-sm btn-danger'])?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
