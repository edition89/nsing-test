<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\subscribe\models\Subscribers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscribers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_type')->dropDownList([
        'registration' => 'Регистрация',
        'verification' => 'Верификация',
        'login'        => 'Вход',
        'message_send' => 'Отправка сообщения',
        'logout'       => 'Выход',
    ], ['prompt' => '', 'options' => ['registration' => ['selected' => true]]]) ?>

    <?= $form->field($model, 'email')->input('email'); ?>

    <?= $form->field($model, 'is_blocked')->dropDownList(['0' => 'Нет', '1' => 'Да',],
        ['prompt' => '', 'options' => [0 => ['selected' => true]]]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
