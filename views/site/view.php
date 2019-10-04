<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<h1 style="color : #337ab7;">View data</h1>
  
    <div class="body-content">
    <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <?php echo $post->id?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $post->nama?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $post->alamat?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $post->nohp?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $post->tgl?>
  </li>
</ul>
<div class="col-lg-2">
     <a href=<?php echo yii::$app->homeUrl?> class="btn btn-primary">Go to Back</a>
  </div>
    </div>  
</div>
