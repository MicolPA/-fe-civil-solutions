<?php

use yii\db\Migration;

/**
 * Class m210726_132634_category_update
 */
class m210726_132634_category_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Category', 'Count', $this->integer()->notNull());
        $this->addColumn('Category', 'Limit', $this->integer()->notNull());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_132634_category_update cannot be reverted.\n";
        $this->dropColumn('Category', 'Count', $this->integer()->notNull());
        $this->dropColumn('Category', 'Limit', $this->integer()->notNull());
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_132634_category_update cannot be reverted.\n";

        return false;
    }
    */
}
