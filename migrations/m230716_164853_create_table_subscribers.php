<?php

use yii\db\Migration;

/**
 * Class m230713_184853_subscribers
 */
class m230716_164853_create_table_subscribers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers', [
            'id'         => $this->primaryKey(),
            'event_type' => 'ENUM("registration", "verification", "login", "message_send", "logout") NOT NULL',
            'email'      => $this->string()->notNull(),
            'is_blocked' => $this->tinyInteger()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230713_184853_subscribers cannot be reverted.\n";

        return false;
    }
    */
}
