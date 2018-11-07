<?php

use yii\db\Migration;

/**
 * Class m181107_222726_add_newsletter_table
 */
class m181107_222726_add_newsletter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('newsletter', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()
        ]);
        $this->alterColumn('newsletter', 'id', $this->integer(11) . ' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('newsletter');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181107_222726_add_newsletter_table cannot be reverted.\n";

        return false;
    }
    */
}
