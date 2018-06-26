<?php

use yii\helpers\Html;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\Booking */
date_default_timezone_set("Asia/Makassar");
$this->title = 'Update Booking: ' . $model->id_book;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_book, 'url' => ['view', 'id' => $model->id_book]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="panel panel-default">
  <div class="panel-heading"><h3 align="center"><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
<div class="booking-update">

    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'package')->dropDownList(ArrayHelper::map(\app\models\Package::find()->asArray()->all(), 'package', 'package'), ['prompt' => '-- Select Package --']) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_number')->textInput(['type'=>'number','maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>
	
	<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Booking', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

</div>
</div>

