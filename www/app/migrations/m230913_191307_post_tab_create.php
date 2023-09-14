<?php

use yii\db\Migration;

/**
 * Class m230913_191307_post_tab_create
 */
class m230913_191307_post_tab_create extends Migration
{

    private const TABLE_NAME = 'post';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'body' => $this->text()->notNull(),
            'profile_id' => $this->integer()->notNull(),
            'create_at' => 'datetime NOT NULL DEFAULT NOW()'
        ]);

        $this->createIndex(
            'idx-post-profile_id',
            self::TABLE_NAME,
            'profile_id'
        );

        $this->addForeignKey(
            'fk-post-profile_id',
            'post',
            'profile_id',
            'profile',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post-profile_id', self::TABLE_NAME);
        $this->dropIndex('idx-post-profile_id', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230913_191307_post_tab_create cannot be reverted.\n";

        return false;
    }
    */
}
