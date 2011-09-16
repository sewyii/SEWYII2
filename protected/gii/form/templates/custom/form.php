<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass).'-'.basename($this->viewName)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<?php echo "<?php echo Yii::t('wby','"; ?><p class="note">Fields with <span class="required">*</span> are required.</p><?php echo "'); ?>"; ?>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php foreach($this->getModelAttributes() as $attribute): ?>
	<div class="row">
		<?php echo "<?php echo \$form->labelEx(\$model,'$attribute'); ?>\n"; ?>
		<?php echo "<?php echo \$form->textField(\$model,'$attribute'); ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'$attribute'); ?>\n"; ?>
	</div>

<?php endforeach; ?>

	<div class="row buttons">
		<?php echo "<?php echo CHtml::submitButton(Yii::t('wby','Submit')); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->