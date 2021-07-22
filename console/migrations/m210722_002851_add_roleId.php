<?php

use yii\db\Migration;

/**
 * Class m210722_002851_add_roleId
 */
class m210722_002851_add_roleId extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FKRol', '{{%User}}', 'RolId', '{{%Rols}}', 'IdRol', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210722_002851_add_roleId cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210722_002851_add_roleId cannot be reverted.\n";

        return false;
    }
    */
}
