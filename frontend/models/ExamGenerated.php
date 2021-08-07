<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "examgenerated".
 *
 * @property int $Id
 * @property string|null $Categories
 * @property string|null $Count
 * @property int|null $Time
 * @property int|null $Type
 * @property int|null $UserId
 * @property string|null $Date
 */
class ExamGenerated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examgenerated';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Time', 'Type', 'UserId'], 'integer'],
            [['Date'], 'safe'],
            [['Categories', 'Count'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Categories' => 'Categories',
            'Count' => 'Count',
            'Time' => 'Time',
            'Type' => 'Type',
            'UserId' => 'User ID',
            'Date' => 'Date',
        ];
    }
}
