<?php

namespace app\models;

use Yii;
use app\models\Category;

/**
 * This is the model class for table "questions".
 *
 * @property int $IdQuestion
 * @property string $Question
 * @property int $IdQuestionType
 * @property int $IdCategory
 *
 * @property Answers[] $answers
 * @property Category $idCategory
 * @property Questiontype $idQuestionType
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Question', 'IdQuestionType', 'IdCategory'], 'required'],
            [['IdQuestionType', 'IdCategory'], 'integer'],
            [['Question'], 'string', 'max' => 255],
            [['IdCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['IdCategory' => 'IdCategory']],
            [['IdQuestionType'], 'exist', 'skipOnError' => true, 'targetClass' => Questiontype::className(), 'targetAttribute' => ['IdQuestionType' => 'IdQuestionType']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdQuestion' => 'Id Question',
            'Question' => 'Question',
            'IdQuestionType' => 'Id Question Type',
            'IdCategory' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::className(), ['IdQuestion' => 'IdQuestion']);
    }

    /**
     * Gets query for [[IdCategory]].
     *
     * @return \yii\db\ActvieQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(Category::className(), ['IdCategory' => 'IdCategory']);
    }

    /**
     * Gets query for [[IdQuestionType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdQuestionType()
    {
        return $this->hasOne(Questiontype::className(), ['IdQuestionType' => 'IdQuestionType']);
    }
}
