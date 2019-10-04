<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<h1 style="color : #337ab7;">Update Pasien</h1>
  
    <div class="body-content">
        <?php
            $form = ActiveForm::begin()
        ?>
        <div class="row">
        
            <div class="form-group">
                <div class="col-lg-6">
                    <?=$form->field($post,'nama')?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?=$form->field($post,'alamat')->textarea(['rows'=>'6'])?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?=$form->field($post,'nohp')->label('No Handphone')?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                <?php $items = [date('Y-m-d')=>'date']?>
                    <?=$form->field($post,'tgl')->dropDownList($items)->hiddenInput()->label(false)?>
                </div>
            </div>
        </div>
      
        
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                   <div class="col-lg-3">
                    <?= Html::submitButton('Update',['class'=>'btn btn-primary'])?>
                   </div>
                   <div class="col-lg-2">
                    <a href=<?php echo yii::$app->homeUrl?> class="btn btn-danger">Cancel</a>
                   </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end()?>
    </div>  
</div>
