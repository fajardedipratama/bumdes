<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InsentifDetail */

$this->title = 'Create Insentif Detail';
$this->params['breadcrumbs'][] = ['label' => 'Insentif Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insentif-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
