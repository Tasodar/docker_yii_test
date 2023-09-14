<?php

use yii\db\Migration;

/**
 * Class m230913_180016_user_tab_create
 */
class m230913_180016_user_tab_create extends Migration
{
    private const TABLE_NAME = 'profile';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'create_at' => 'datetime NOT NULL DEFAULT NOW()'
        ]);

        // add test data

        $this->insert(self::TABLE_NAME, ['name' => 'Vasja', 'email' => 'vasja@gmail.com']);
        $this->insert(self::TABLE_NAME, ['name' => 'Kain_the_Comissar', 'email' => 'kain@gmail.com']);
        $this->insert(self::TABLE_NAME, ['name' => 'redGobba', 'email' => 'gretchin@gmail.com']);
        $this->insert(self::TABLE_NAME, ['name' => 'Jaffa', 'email' => 'jaffa@gmail.com']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230913_180016_user_tab_create cannot be reverted.\n";

        return false;
    }
    */
}
