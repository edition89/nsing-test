<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_logs}}`.
 */
class m230716_165131_create_event_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_logs}}', [
            'id'         => $this->primaryKey(),
            'event_name' => $this->string(),
            'email'      => $this->string(),
            'is_send'    => $this->tinyInteger(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_logs}}');
    }
}
