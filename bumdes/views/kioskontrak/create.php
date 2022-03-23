<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KiosKontrak */

$this->title = 'Create Kios Kontrak';
$this->params['breadcrumbs'][] = ['label' => 'Kios Kontraks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kios-kontrak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
