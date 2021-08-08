<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "examresults".
 *
 * @property int $Id
 * @property int|null $IdExam
 * @property int|null $IdQuestion
 * @property int|null $IdQuestionType
 * @property int|null $LogId
 * @property int|null $Correct
 * @property int|null $UserId
 * @property string|null $Date
 */
class Examresults extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ExamResults';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdExam', 'IdQuestion', 'IdQuestionType', 'LogId', 'Correct', 'UserId'], 'integer'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdExam' => 'Id Exam',
            'IdQuestion' => 'Id Question',
            'IdQuestionType' => 'Id Question Type',
            'LogId' => 'Log ID',
            'Correct' => 'Correct',
            'UserId' => 'User ID',
            'Date' => 'Date',
        ];
    }
}
