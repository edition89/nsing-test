<?php

namespace app\services;

use app\models\User;
use Yii;

class SendService
{

    const SUBJECT_REGISTRATION = 'Confirmation of registration';
    const SUBJECT_EVENT = 'New event';

    const TEMPLATE_SIGNUP_CONFIRM = ['html' => 'user-signup-comfirm-html', 'text' => 'user-signup-comfirm-text'];
    const TEMPLATE_EVENT = ['html' => 'event-html', 'text' => 'event-text'];

    public static function sentEmail($email, $template, $subject, $data)
    {
        return Yii::$app->mailer
            ->compose(
                $template,
                $data)
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject($subject)
            ->send();
    }

}