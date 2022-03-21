<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $profilname
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord
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
            [['profilname', 'username'], 'required'],
            [['profilname', 'username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profilname' => 'Nama',
            'username' => 'User Login',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
    public function beforeSave($options = array()) {

        //authkey accesstoken and hash password
        $authKey = md5($this->username);
        $accessToken = md5($this->username);

        if(empty($_POST['Users']['password']))
        {
            $pass = $_POST['oldps'];
        }
        else
        {
            $pass = Yii::$app->security->generatePasswordHash($this->password);
        }
        
        $this->password = $pass;
        $this->authKey = $authKey;
        $this->accessToken = $accessToken;

        return true;
    }
}
