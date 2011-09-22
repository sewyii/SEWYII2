<?php

/**
 * {{user_profile}}.
 * @author Serov Alexander <serov.sh@gmail.com> 
 * @version 
 * @package sewyii2
 * @since 1.0
 */

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property string $id_user
 * @property string $name
 * @property string $sex
 * @property string $birthday
 * @property string $about
 * @property string $site
 * @property string $icq
 * @property string $avatar
 * @property string $create_date
 * @property string $update_date
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'required'),
			array('id_user', 'numerical'),
                        array('id_user', 'compare', 'operator'=>'>', 'compareValue'=>'0'),
			array('name, site', 'length', 'max'=>50),
			array('sex', 'length', 'max'=>8),
			array('icq', 'length', 'max'=>10),
			array('avatar', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, name, sex, birthday, about, site, icq, avatar, create_date, update_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => Yii::t('sewyiiUser','Id User'),
			'name' => Yii::t('sewyiiUser','Name'),
			'sex' => Yii::t('sewyiiUser','Sex'),
			'birthday' => Yii::t('sewyiiUser','Birthday'),
			'about' => Yii::t('sewyiiUser','About'),
			'site' => Yii::t('sewyiiUser','Site'),
			'icq' => Yii::t('sewyiiUser','Icq'),
			'avatar' => Yii::t('sewyiiUser','Avatar'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('icq',$this->icq,true);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}