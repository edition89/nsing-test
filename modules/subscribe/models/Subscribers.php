<?php

namespace app\modules\subscribe\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property string $event_type
 * @property string $email
 * @property int $is_blocked
 * @property string $created_at
 * @property string $updated_at
 */
class Subscribers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_type'], 'string'],
            [['email'], 'required'],
            [['is_blocked'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'event_type'      => 'Событие',
            'email'           => 'Получатель',
            'is_blocked'      => 'Заблокирован',
            'created_at'      => 'Создан',
            'updated_at'      => 'Изменен',
            'eventTypeLabels' => 'Событие',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeEventType()
    {
        return [
            'registration' => 'Регистрация',
            'verification' => 'Верификация',
            'login'        => 'Вход',
            'message_send' => 'Отправка сообщения',
            'logout'       => 'Выход',
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function getEventTypeLabels()
    {
        return ArrayHelper::getValue($this->attributeEventType(), $this->event_type);
    }
}
