<?php

/**
 * {{user}}.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package sewyiiUser2
 * @since 1.0
 */

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $date_register
 * @property string $date_activate
 * @property string $ip_register
 * @property string $status
 * @property string $activate_key
 */
class User extends SEActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('login, password, salt, email, date_register, ip_register', 'required'),
                array('email, login', 'unique', 'on'=>'registration'),
                array('login', 'length', 'max'=>30),
                array('password, salt, email', 'length', 'max'=>50),
                array('ip_register', 'length', 'max'=>20),
                array('status', 'length', 'max'=>10),
                array('activate_key', 'length', 'max'=>32),
                array('date_activate', 'safe'),
                array('email', 'email'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, login, password, salt, email, date_register, date_activate, ip_register, status, activate_key', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'profile'=>array(self::HAS_ONE, 'UserProfile', 'id_user'),
            'settings'=>array(self::HAS_ONE, 'UserSettings', 'id_user'),
            'session'=>array(self::HAS_ONE, 'UserSession', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('sewyiiUser','ID'),
                'login' => Yii::t('sewyiiUser','Login'),
                'password' => Yii::t('sewyiiUser','Password'),
                'salt' => Yii::t('sewyiiUser','Salt'),
                'email' => Yii::t('sewyiiUser','E-mail'),
                'date_register' => Yii::t('sewyiiUser','Date Register'),
                'date_activate' => Yii::t('sewyiiUser','Date Activate'),
                'ip_register' => Yii::t('sewyiiUser','Ip Register'),
                'status' => Yii::t('sewyiiUser','Status'),
                'activate_key' => Yii::t('sewyiiUser','Activate Key'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('login',$this->login,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('salt',$this->salt,true);
        $criteria->compare('email',$this->mail,true);
        $criteria->compare('date_register',$this->date_register,true);
        $criteria->compare('date_activate',$this->date_activate,true);
        $criteria->compare('ip_register',$this->ip_register,true);
        $criteria->compare('status',$this->status,true);
        $criteria->compare('activate_key',$this->activate_key,true);

        return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
        ));
    }

    public function addUser() {
        if($this->validate())
            $this->save();
        return $this;
    }

    public function validatePassword($password) {
        if ($this->password === $this->hashPassword($password, $this->salt)) {
            return true;
        }
        return false;
    }

    static function registrationUser($array) {
        $user = new User('registration');
        $user->attributes = $array;
        $user->salt = $user->generateSalt();
        $user->password = $user->hashPassword($user->password, $user->salt);
        $user->activate_key = $user->generateActivationKey();
        $user->date_register=date('y-m-d H:i:s');
        $user->ip_register = Yii::app()->request->userHostAddress;
        return $user->addUser();
    }

    protected function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    protected function generateSalt() {
        return md5(uniqid(date('Y-i H:s:i m d'), true));
    }

    protected function generateRandomPassword($length = null) {
        if (!$length) {
            //$length = Yii::app()->getModule('user')->minPasswordLength;
            $length=8;
        }
        return substr(md5(uniqid(mt_rand(), true) . time()), 0, $length);
    }

    protected function generateActivationKey() {
        return md5(time() . $this->email . uniqid());
    }




}