<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $IdCategory
 * @property string $Name
 * @property int $Count
 * @property int $Limit
 *
 * @property Questions[] $questions
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Count', 'Limit'], 'required'],
            [['Count', 'Limit'], 'integer'],
            [['Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCategory' => 'Id Category',
            'Name' => 'Name',
            'Count' => 'Count',
            'Limit' => "Question's limit",
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Questions::className(), ['IdCategory' => 'IdCategory']);
    }
}
