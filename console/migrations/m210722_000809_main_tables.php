<?php

use yii\db\Migration;

/**
 * Class m210722_000809_main_tables
 */
class m210722_000809_main_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
            
        $this->createTable('{{%Rols}}', [
            'IdRol' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%Questions}}', [
            'IdQuestion' => $this->primaryKey(),
            'Question' => $this->string()->notNull(),
            'IdQuestionType' => $this->integer()->notNull(),
            'IdCategory' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%Answers}}', [
            'IdAnswer' => $this->primaryKey(),
            'Answer' => $this->string()->notNull(),
            'IdQuestion' => $this->integer()->notNull(),
            'CorrectAnswer' => $this->string()->notNull(),
            'Image' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%Category}}', [
            'IdCategory' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%QuestionType}}', [
            'IdQuestionType' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
        ], $tableOptions);

         $this->addForeignKey('FKQuestionType', '{{%Questions}}', 'IdQuestionType', '{{%QuestionType}}', 'IdQuestionType', 'CASCADE', 'CASCADE'); 
         $this->addForeignKey('FKCategory', '{{%Questions}}', 'IdCategory', '{{%Category}}', 'IdCategory', 'CASCADE', 'CASCADE');
         $this->addForeignKey('FKAnswer', '{{%Answers}}', 'IdQuestion', '{{%Questions}}', 'IdQuestion', 'CASCADE', 'CASCADE');

        $this->addColumn('user', 'RolId', $this->integer()->notNull());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210722_000809_main_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210722_000809_main_tables cannot be reverted.\n";

        return false;
    }
    */
}
