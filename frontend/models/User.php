<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property string $region
 * @property string $hobbies
 * @property string $avatar
 * @property string $password
 * @property string $email
 * @property string $note
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'dob', 'gender', 'password'], 'required'],
            [['dob', 'hobbies'], 'safe'],
            [['gender', 'region'], 'string'],
            [['name', 'avatar', 'note'], 'string', 'max' => 100],
            //[['hobbies'], 'string', 'max' => 200],
            [['password', 'email'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'dob' => 'DOB',
            'gender' => 'Gender',
            'region' => 'Region',
            'hobbies' => 'Hobbies',
            'avatar' => 'Avatar',
            'password' => 'Password',
            'email' => 'Email',
            'note' => 'Note'
        ];
    }
}

