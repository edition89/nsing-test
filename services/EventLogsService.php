<?php

namespace app\services;


use app\models\EventLogs;
use app\modules\subscribe\models\Subscribers;

class EventLogsService
{

    public static function sendMailForSubscribes($event)
    {
        $subscribers = Subscribers::findAll(['event_type' => $event->name, 'is_blocked' => 0]);
        foreach ($subscribers as $subscriber) {
            $sent = SendService::sentEmail($subscriber->email, SendService::TEMPLATE_EVENT,
                SendService::SUBJECT_EVENT, ['eventName' => $event->name, 'userEmail' => $event->data->email]);
            $eventLog = new EventLogs();
            $eventLog->event_name = $event->name;
            $eventLog->email = $subscriber->email;
            $eventLog->is_send = $sent;
            $eventLog->save();
        }

    }

}