<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?= Yii::$app->homeUrl ?>public/img/slider/1.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="<?= Yii::$app->homeUrl ?>public/img/slider/2.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="<?= Yii::$app->homeUrl ?>public/img/slider/3.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr/>

<h1 style="font-weight:bold;"><center>PAKET TOUR</center></h1>
    <div class="body-content col-md-12">

        <div class="row">
		
		
             <div class="col-lg-3">
			   <div class="thumbnail">
                <img src="<?= Yii::$app->homeUrl ?>public/img/satu.jpg">
				<h3>Desa Sade, Lombok</h3>
                <p style="color:orange; font-weight:bold; font-size:1.3em">Rp 850.000</p>
           

                <a class="btn btn-warning btn-block" href="http://www.yiiframework.com/doc/">Book Now</a>
            </div>
            </div>
			   <div class="col-lg-3">
			   <div class="thumbnail">
                <img src="<?= Yii::$app->homeUrl ?>public/img/dua.jpg">
				<h3>Desa Sade, Lombok</h3>
                <p style="color:orange; font-weight:bold; font-size:1.3em">Rp 850.000</p>
           

                <a class="btn btn-warning btn-block" href="http://www.yiiframework.com/doc/">Book Now</a>
            </div>
            </div>
			   <div class="col-lg-3">
			   <div class="thumbnail">
                <img src="<?= Yii::$app->homeUrl ?>public/img/tiga.jpg">
				<h3>Desa Sade, Lombok</h3>
                <p style="color:orange; font-weight:bold; font-size:1.3em">Rp 850.000</p>
           

                <a class="btn btn-warning btn-block" href="http://www.yiiframework.com/doc/">Book Now</a>
            </div>
            </div>
			   <div class="col-lg-3">
			   <div class="thumbnail">
                <img src="<?= Yii::$app->homeUrl ?>public/img/tiga.jpg">
				<h3>Desa Sade, Lombok</h3>
                <p style="color:orange; font-weight:bold; font-size:1.3em">Rp 850.000</p>
           

                <a class="btn btn-warning btn-block" href="http://www.yiiframework.com/doc/">Book Now</a>
            </div>
            </div>
            
        </div>

    </div>
	<div class="col-md-12"></div>

	<h1 style="font-weight:bold;"><center>BLOG</center></h1>
	 <div class="body-content col-md-12">

        <div class="row">
		
		
             <div class="col-lg-3">
			 <a href="">	
                <img width="100%" src="<?= Yii::$app->homeUrl ?>public/img/article1.jpg">
				<p style="font-size:1.2em; font-weight:bold; text-align:center;">List Air Terjun Di Lombok Yang Selalu Memukau</p>
			</a>
           </div>
		     <div class="col-lg-3">
			 <a href="">	
                <img width="100%" src="<?= Yii::$app->homeUrl ?>public/img/article2.jpg">
				<p style="font-size:1.2em; font-weight:bold; text-align:center;">Keramahan Desa Sade Dengan Keunikan Budayanya</p>
			</a>
           </div>
		     <div class="col-lg-3">
			 <a href="">	
                <img width="100%" src="<?= Yii::$app->homeUrl ?>public/img/article1.jpg">
				<p style="font-size:1.2em; font-weight:bold; text-align:center;">List Air Terjun Di Lombok Yang Selalu Memukau</p>
			</a>
           </div>
		     <div class="col-lg-3">
			 <a href="">	
                <img width="100%" src="<?= Yii::$app->homeUrl ?>public/img/article1.jpg">
				<p style="font-size:1.2em; font-weight:bold; text-align:center;">List Air Terjun Di Lombok Yang Selalu Memukau</p>
			</a>
           </div>
		   
            
        </div>

    </div>
</div>
