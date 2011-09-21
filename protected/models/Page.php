<?php

/**
 * {{page}}.
 * @author Serov Alexander <serov.sh@gmail.com> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $content
 * @property integer $parent
 * @property integer $template
 * @property integer $status
 * @property string $create_date
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
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
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent, template, status', 'required'),
			array('parent, template, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>250),
			array('title', 'length', 'max'=>450),
			array('content, create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, content, parent, template, status, create_date', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('wby','ID'),
			'name' => Yii::t('wby','Name'),
			'title' => Yii::t('wby','Title'),
			'content' => Yii::t('wby','Content'),
			'parent' => Yii::t('wby','Parent'),
			'template' => Yii::t('wby','Template'),
			'status' => Yii::t('wby','Status'),
			'create_date' => Yii::t('wby','Create Date'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('template',$this->template);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}