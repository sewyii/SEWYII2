<?php

/**
 * {{user_session}}.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package sewyii2
 * @since 1.0
 */

/**
 * This is the model class for table "{{user_session}}".
 *
 * The followings are the available columns in table '{{user_session}}':
 * @property string $ssesion_key
 * @property integer $id_user
 * @property string $ip_create
 * @property string $ip_last
 * @property string $create_date
 * @property string $last_date
 */
class UserSession extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return UserSession the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_session}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('id_user', 'numerical', 'integerOnly'=>true),
                array('ssesion_key, ip_create, ip_last', 'length', 'max'=>255),
                array('create_date, last_date', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('ssesion_key, id_user, ip_create, ip_last, create_date, last_date', 'safe', 'on'=>'search'),
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
                'ssesion_key' => Yii::t('sewyiiUser','Ssesion Key'),
                'id_user' => Yii::t('sewyiiUser','Id User'),
                'ip_create' => Yii::t('sewyiiUser','Ip Create'),
                'ip_last' => Yii::t('sewyiiUser','Ip Last'),
                'create_date' => Yii::t('sewyiiUser','Create Date'),
                'last_date' => Yii::t('sewyiiUser','Last Date'),
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

        $criteria->compare('ssesion_key',$this->ssesion_key,true);
        $criteria->compare('id_user',$this->id_user);
        $criteria->compare('ip_create',$this->ip_create,true);
        $criteria->compare('ip_last',$this->ip_last,true);
        $criteria->compare('create_date',$this->create_date,true);
        $criteria->compare('last_date',$this->last_date,true);

        return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
        ));
    }
}