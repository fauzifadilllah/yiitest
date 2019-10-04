<?php

use yii\helpers\Html;
/* <?=Html::a('User ('. Yii::$app->user->identity->username . ')')?>*/

$this->title = 'My Yii Application';
?>

<div class="site-index">
<?php if(Yii::$app->session->hasFlash('message'));?>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo Yii::$app->session->getFlash('message')?>
  </div>
    <div class="jumbotron">
        <h1 style="color : #337ab7;">YII2 SIMRS</h1>
    </div>
    <div class="row">
        
    </div>

    <div class="body-content">
   
        <div class="row">
                <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telp</th>
            <th scope="col">Keterangan</th>
            <th scope="col">tgl</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($pasien) > 0):?>
                <?php foreach($pasien as $pasien): ?>
            <tr class="table-active">
            <th scope="row"><?php echo $pasien->id;?></th>
            <td><?php echo $pasien->nama;?></td>
            <td><?php echo $pasien->alamat;?></td>
            <td><?php echo $pasien->nohp;?></td>
            <td><?php echo $pasien->keterangan;?></td>
            <td><?php echo $pasien->tgl;?></td>
           
            <td>
                <span><?= Html :: a('View',['view','id' => $pasien->id],['class'=>'label label-primary'])?></span>
                <span><?= Html :: a('Update',['update','id' => $pasien->id],['class'=>'label label-success'])?></span>
                <span><?= Html :: a('Delete',['delete','id' => $pasien->id],['class'=>'label label-danger'])?></span>
            </td>
            </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No Record</td>
                </tr>
            <?php endif; ?>
        </tbody>
        </table>
        </div>

    </div>
</div>
