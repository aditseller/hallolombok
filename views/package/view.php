<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Package */

$this->title = $model->package;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-view">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?= $model->price ?>
	<?= $model->detail ?>
	
	<?= Html::a('Book Now',['/booking/create'],['class'=>'btn btn-lg btn-success']) ?>




</div>
