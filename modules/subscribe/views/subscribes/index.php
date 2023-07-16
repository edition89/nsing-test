<?php

use app\modules\subscribe\models\Subscribers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\subscribe\models\search\SubscribesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Subscribers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subscribers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'event_type',
                'filter'    => [
                    'registration' => 'Регистрация',
                    'verification' => 'Верификация',
                    'login'        => 'Вход',
                    'message_send' => 'Отправка сообщения',
                    'logout'       => 'Выход',
                ],
                'value'     => function ($data) {
                    return $data->eventTypeLabels;
                },
            ],
            'email:email',
            [
                'attribute' => 'is_blocked',
                'filter'    => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
                'format'    => 'raw',
                'value'     => function ($data) {
                    return $data->is_blocked ? '<span class="text-danger">Да</span>' : '<span class="text-success">Нет</span>';
                },
            ],
            // 'created_at:datetime',
            // 'updated_at:datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscribers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>


</div>
