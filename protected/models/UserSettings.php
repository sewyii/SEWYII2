<?php

/**
 * {{user_settings}}.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package sewyii2
 * @since 1.0
 */

/**
 * This is the model class for table "{{user_settings}}".
 *
 * The followings are the available columns in table '{{user_settings}}':
 * @property integer $id
 * @property integer $send_email
 * @property integer $view_email
 */
class UserSettings extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return UserSettings the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_settings}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('id_user', 'required'),
                array('send_email, view_email', 'numerical', 'integerOnly'=>true),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, send_email, view_email', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'user'=>array(self::BELONGS_TO, 'User', 'id_user'),
        );
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('sewyiiUser','ID'),
                'send_email' => Yii::t('sewyiiUser','Send Email'),
                'view_email' => Yii::t('sewyiiUser','View Email'),
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

        $criteria->compare('id',$this->id);
        $criteria->compare('send_email',$this->send_email);
        $criteria->compare('view_email',$this->view_email);

        return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
        ));
    }
}