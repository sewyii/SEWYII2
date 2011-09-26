<?php

/**
 * {{topic}}.
 * @author Serov Alexander <serov.sh@gmail.com> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

/**
 * This is the model class for table "{{topic}}".
 *
 * The followings are the available columns in table '{{topic}}':
 * @property integer $id
 * @property integer $id_blog
 * @property integer $id_user
 * @property integer $type
 * @property string $title
 * @property string $tags
 * @property integer $tmplate
 * @property integer $publish
 * @property string $create_date
 * @property string $edit_date
 * @property string $text
 * @property string $short
 * @property string $source
 * @property string $hash
 */
class Topic extends SEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Topic the static model class
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
		return '{{topic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_blog, id_user, type, tmplate, publish', 'numerical', 'integerOnly'=>true),
			array('title, tags, hash', 'length', 'max'=>255),
			array('create_date, edit_date, text, short, source', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_blog, id_user, type, title, tags, tmplate, publish, create_date, edit_date, text, short, source, hash', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('sewyii','ID'),
			'id_blog' => Yii::t('sewyii','Id Blog'),
			'id_user' => Yii::t('sewyii','Id User'),
			'type' => Yii::t('sewyii','Type'),
			'title' => Yii::t('sewyii','Title'),
			'tags' => Yii::t('sewyii','Tags'),
			'tmplate' => Yii::t('sewyii','Tmplate'),
			'publish' => Yii::t('sewyii','Publish'),
			'create_date' => Yii::t('sewyii','Create Date'),
			'edit_date' => Yii::t('sewyii','Edit Date'),
			'text' => Yii::t('sewyii','Text'),
			'short' => Yii::t('sewyii','Short'),
			'source' => Yii::t('sewyii','Source'),
			'hash' => Yii::t('sewyii','Hash'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_blog',$this->id_blog);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('tmplate',$this->tmplate);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('edit_date',$this->edit_date,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('short',$this->short,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('hash',$this->hash,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}