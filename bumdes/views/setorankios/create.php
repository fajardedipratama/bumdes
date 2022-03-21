<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKios */

$this->title = 'Create Setoran Kios';
?>
<div class="setoran-kios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
