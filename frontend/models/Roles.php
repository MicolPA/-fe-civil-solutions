<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rols".
 *
 * @property int $IdRol
 * @property string $name
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Rols';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdRol' => 'Id Rol',
            'name' => 'Name',
        ];
    }
}
