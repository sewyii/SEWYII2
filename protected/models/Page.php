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
 * @property integer $name
 * @property string $title
 * @property string $content
 * @property integer $parent
 * @property integer $tmplate
 * @property integer $status
 * @property string $create_date
 */
class Page extends SEActiveRecord
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
			array('name, parent, tmplate, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('content, create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, content, parent, tmplate, status, create_date', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('sewyiiPage','ID'),
			'name' => Yii::t('sewyiiPage','Name'),
			'title' => Yii::t('sewyiiPage','Title'),
			'content' => Yii::t('sewyiiPage','Content'),
			'parent' => Yii::t('sewyiiPage','Parent'),
			'tmplate' => Yii::t('sewyiiPage','Tmplate'),
			'status' => Yii::t('sewyiiPage','Status'),
			'create_date' => Yii::t('sewyiiPage','Create Date'),
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
		$criteria->compare('name',$this->name);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('tmplate',$this->tmplate);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}