<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Package */

$this->title = $model->package;

?>
<div class="package-view">
<?= Html::a('Book Now',['/booking/create'],['class'=>'act-btn btn btn-lg btn-success']) ?>

<center><h1><?= Html::encode($this->title) ?></h1>
<img width="100%" src="<?= Yii::$app->request->baseUrl ?>/public/img/<?= sha1($model->id_package) ?>.jpg"></center>
    <hr/>
	<div class="col-md-12"><?= $model->detail ?></div>




</div>


<style>
.act-btn{
            
            display: block;
            position: fixed;
            right: 30px;
            bottom:70px;
        }

</style>