<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "examlogs".
 *
 * @property int $Id
 * @property int|null $IdExam
 * @property string|null $StartedAt
 * @property string|null $FinishAt
 * @property int|null $UserId
 */
class Examlogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examlogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdExam', 'UserId'], 'integer'],
            [['StartedAt', 'FinishAt'], 'safe'],
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
            'StartedAt' => 'Started At',
            'FinishAt' => 'Finish At',
            'UserId' => 'User ID',
        ];
    }
}
