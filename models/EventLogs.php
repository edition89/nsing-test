<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "event_logs".
 *
 * @property int $id
 * @property string|null $event_name
 * @property string|null $email
 * @property int|null $is_send
 * @property int $created_at
 */
class EventLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['is_send'], 'boolean'],
            [['event_name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'event_name' => 'Название события',
            'email'      => 'Email',
            'is_send'    => 'Статус отправки',
            'created_at' => 'Создан',
        ];
    }


    public function behaviors(): array
    {
        return [
            'timestamp' => [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }
}
