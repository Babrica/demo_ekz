<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $Id_user
 * @property string $description
 * @property string $number_car
 * @property int $status
 *
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id_user', 'description', 'number_car'], 'required'],
            [['Id_user', 'status'], 'integer'],
            [['description'], 'string'],
            [['number_car'], 'string', 'max' => 50],
            [['Id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Id_user' => 'Id User',
            'description' => 'Description',
            'number_car' => 'Number Car',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'Id_user']);
    }
}
