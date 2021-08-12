<?php

use yii\db\Migration;

/**
 * Class m210812_225511_alter_colum_answer
 */
class m210812_225511_alter_colum_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('questions', 'Question', $this->text());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210812_225511_alter_colum_answer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210812_225511_alter_colum_answer cannot be reverted.\n";

        return false;
    }
    */
}
