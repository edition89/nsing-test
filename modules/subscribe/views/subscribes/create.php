<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\subscribe\models\Subscribers $model */

$this->title = 'Create Subscribers';
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
