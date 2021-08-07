<?php

use yii\db\Migration;

/**
 * Class m210801_215009_new_table_exam_logs
 */
class m210801_215009_new_table_exam_logs extends Migration
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
            
        // $this->createTable('{{%ExamGenerated}}', [
        //     'Id' => $this->primaryKey(),
        //     'Categories' => $this->string(),
        //     'Count' => $this->string(),
        //     'Time' => $this->integer(),
        //     'Type' => $this->integer()->defaultValue(1),
        //     'UserId' => $this->integer(),
        //     'Date' => $this->dateTime(),
        // ], $tableOptions);


        $this->createTable('{{%ExamResults}}', [
            'Id' => $this->primaryKey(),
            'IdExam' => $this->integer(),
            'IdQuestion' => $this->integer(),
            // 'IdAnswer' => $this->integer(),
            'IdQuestionType' => $this->integer(),
            'LogId' => $this->integer(),
            'Correct' => $this->integer()->defaultValue(0),
            'UserId' => $this->integer(),
            'Date' => $this->dateTime(),
        ], $tableOptions);


        $this->createTable('{{%ExamLogs}}', [
            'Id' => $this->primaryKey(),
            'IdExam' => $this->integer(),
            'StartedAt' => $this->dateTime(),
            'FinistAt' => $this->dateTime(),
            'UserId' => $this->integer(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210801_215009_new_table_exam_logs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210801_215009_new_table_exam_logs cannot be reverted.\n";

        return false;
    }
    */
}
