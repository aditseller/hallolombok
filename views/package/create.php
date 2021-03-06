 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Package */

$this->title = 'Create Package';
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-create">

    <h1><?= Html::encode($this->title) ?></h1>

      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
<div id="image_preview" class="thumbnail"><img id="previewing" src="" /></div>
	<?= $form->field($model, 'image')->fileInput(['required' => true,'id'=> 'file']) ?>
<div class="col-md-12"></br></div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>


<style> /* Style untuk tampilan Form upload gambar */
  
    #image_preview {
      
   width: 20%;
   height: 20%;
      
      text-align: center;
      color: #C0C0C0;
      background-color: #eee;
      overflow: hidden;
    }
   
   
  </style>
  <script> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimg.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview');
      $('#previewing').attr('src', e.target.result);
    }
</script>