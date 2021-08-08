<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $IdAnswer
 * @property string $Answer
 * @property int $IdQuestion
 * @property string $CorrectAnswer
 * @property string $Image
 *
 * @property Questions $idQuestion
 */
class Answers extends \yii\db\ActiveRecord
{
    public $archivo;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Answer', 'IdQuestion', 'CorrectAnswer'], 'required'],
            [['IdQuestion'], 'integer'],
            [['Answer', 'CorrectAnswer'], 'string', 'max' => 255],
            [['IdQuestion'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::className(), 'targetAttribute' => ['IdQuestion' => 'IdQuestion']],
            // [['archivo'], 'file', 'extensions' => 'jpg,png'],
        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAnswer' => 'Id Answer',
            'Answer' => 'Answer',
            'IdQuestion' => 'Id Question',
            'CorrectAnswer' => 'Correct Answer',
            'archivo' => 'Image',
        ];
    }

    /**
     * Gets query for [[IdQuestion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdQuestion()
    {
        return $this->hasOne(Questions::className(), ['IdQuestion' => 'IdQuestion']);
    }
}
