<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKiosDetail */

$this->title = 'Create Setoran Kios Detail';
$this->params['breadcrumbs'][] = ['label' => 'Setoran Kios Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-kios-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
