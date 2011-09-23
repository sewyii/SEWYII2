<?php

/**
 * {{facebook_auth}}.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package SEWYII2
 * @since 1.0
 */

/**
 * This is the model class for table "{{facebook_auth}}".
 *
 * The followings are the available columns in table '{{facebook_auth}}':
 * @property integer $id_user
 * @property string $uid
 */
class FacebookAuth extends SEActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return Facebook the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{facebook_auth}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('id_user, uid', 'required'),
                array('id_user', 'numerical', 'integerOnly'=>true),
                array('uid', 'length', 'max'=>50),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id_user, uid', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_user' => Yii::t('sewyii','Id User'),
                'uid' => Yii::t('sewyii','Uid'),
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

        $criteria->compare('id_user',$this->id_user);
        $criteria->compare('uid',$this->uid,true);

        return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
        ));
    }



    static function getFacebookInfo() {
        Yii::import('application.modules.ExtensionLogin.extensions.Facebook');
        $facebook = new Facebook(array(
                        'appId' =>Yii::app()->params['fbAppId'],
                        'secret' =>Yii::app()->params['fbAppSecret'],
                        'cookie' => true,
        ));

        //print_r($facebook);

         
        //print_r($session);

        //if ($session) {
            try {
                $facebook->getSession();
                $uid = $facebook->getUser();
                print_r($uid);
            }
            catch (Exception $e) {
                print_r($e);
                echo $e->message;
                ExtensionLogin::loginError($e);
            }
        //}
    }



    static function login() {
      //  self::getFacebookInfo(); вбщем эта функция должна выдавать данные с фейсбука
        $fbAuthData['id']=1; //получаем uid от Facebook
        $facebook = self::model()->findByAttributes(array('uid'=>$fbAuthData['id']));
        if(isset($facebook->id_user) && is_numeric($facebook->id_user))
            ExtensionLogin::login($facebook->id_user);
        else
            ExtensionLogin::loginError();
    }









    //как пример функции полнстью переопределяющей функцию actionLogin()  в FrontendController.php
    //Вызывается по сбытию onLogin

    /*
    public function login() {
        $arr = Yii::app()->request->getArray('LoginForm', array(), 'POST');
        $model=new LoginForm;

        if(!empty($arr)) {
            $model->attributes=$arr;
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        //print_r($model->errors);
        Yii::app()->controller->render('application.modules.ExtensionLogin.views.default.login', array('model'=>$model));
        Yii::app()->end();
        //$this->render('login',array('model'=>$model));
    }
    */

}
