<?php

use yii\db\Migration;

/**
 * Class m210731_200318_question_update
 */
class m210731_200318_question_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Questions', 'Image', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('Questions', 'Image');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210731_200318_question_update cannot be reverted.\n";

        return false;
    }
    */
}
