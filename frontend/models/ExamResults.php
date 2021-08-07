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
        return 'examresults';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdExam', 'IdQuestion', 'IdQuestionType', 'Correct', 'UserId'], 'integer'],
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
            'Correct' => 'Correct',
            'UserId' => 'User ID',
            'Date' => 'Date',
        ];
    }
}
