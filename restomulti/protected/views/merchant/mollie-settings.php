<?php
$enabled_mollie=Yii::app()->functions->getOptionAdmin('admin_mollie_enabled');
$mollie_api=Yii::app()->functions->getOptionAdmin('admin_mollie_api_key');
?>
<div id="error-message-wrapper"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','saveAdminMollieSettings')?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Enabled Mollie")?>?</label>
  <?php 
  echo CHtml::checkBox('admin_mollie_enabled',
  $enabled_mollie=="yes"?true:false
  ,array(
    'value'=>"yes",
    'class'=>"icheck"
  ))
  ?> 
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Mollie API Key")?></label>
  <?php 
  echo CHtml::textField('admin_mollie_api_key',
  Yii::app()->functions->getOptionAdmin('admin_mollie_api_key')
  ,array(
    'class'=>"uk-form-width-large"
  ))
  ?>
</div>


<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>