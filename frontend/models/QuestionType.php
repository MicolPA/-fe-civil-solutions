<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questiontype".
 *
 * @property int $IdQuestionType
 * @property string $QuestionType
 *
 * @property Questions[] $questions
 */
class QuestionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'QuestionType';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['QuestionType'], 'required'],
            [['QuestionType'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdQuestionType' => 'Id Question Type',
            'QuestionType' => 'Question Type',
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Questions::className(), ['IdQuestionType' => 'IdQuestionType']);
    }
}
