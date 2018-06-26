<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Package */

$this->title = 'Update Package: ' . $model->id_package;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_package, 'url' => ['view', 'id' => $model->id_package]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="package-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(\app\models\TypePackage::find()->asArray()->all(), 'type', 'type'), ['prompt' => '-- Select Type --']) ?>

    <?= $form->field($model, 'package')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'price')->textInput(['type'=>'number','maxlength' => true,'placeholder'=>'Rupiah Currency (Rp)']) ?>

   <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'detail',
	'model' => $model,
	'attribute'=>'detail',
    'options'=>[// html attributes
        'id'=>'content'
    ],
    'clientOptions'=>[
        'toolbarInline'=> false,
        'theme' =>'royal',//optional: dark, red, gray, royal
		'height' => 370,
        'language'=>'en_us', // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
		'label' => 'Detail'
    ]
]);; ?>
<div class="col-md-12"></br></div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
	
</div>
