<?php
$this->renderPartial('/front/banner-tipus',array(
   'h1'=>t("Inform Us")
));
?>
<div class="sections section-grey2 section-tipus relative">
  <div class="container-map1">
	  <div class="inner">
	  
		  <div class="row">
		  <div class="col-md-6 col-md-offset-3 black">
		  <div class="top30"></div>
		  <form class="uk-form uk-form-horizontal forms" id="forms" onsubmit="return false;">
            <div class="row top10">
             <div class="col-md-12">
	           <?php echo CHtml::radioButton('tip_opt',true,
		         array('class'=>"icheck tip_option",'value'=>'tip_one'))?>
		         <span class="tipus-radio-txt">
		       <?php echo Yii::t("default","I WANT TO TIP YOU ABOUT A RESTAURANT")?>
		       </span>
		       </div>
            </div>
            <div class="row top10">
             <div class="col-md-12">
	           <?php echo CHtml::radioButton('tip_opt',false,
		         array('class'=>"icheck tip_option",'value'=>'tip_more'))?>
		         <span class="tipus-radio-txt">
		       <?php echo Yii::t("default","I AM A RESTAURANT OWNER AND WANT MORE INFORMATION")?>
		       </span>
		       </div>
            </div>
            <div class="row top10">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('Name'),'',array(
	            'placeholder'=>t('Name'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('Email'),'',array(
	            'placeholder'=>t('Email address'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('RestoName'),'',array(
	            'placeholder'=>t('Restaurant Name'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10 tip-hidden" id="tip-st">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('StAndHouseNum'),'',array(
	            'placeholder'=>t('Street And HouseNumber'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10 tip-hidden" id="tip-zip">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('Zipcode'),'',array(
	            'placeholder'=>t('Zipcode'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10" id="tip-city">
             <div class="col-md-12">
	           <?php echo CHtml::textField(t('City'),'',array(
	            'placeholder'=>t('City'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10 tip-hidden" id="tip-phone">
             <div class="col-md-12">
	           <?php echo CHtml::textField('Phone','',array(
	            'placeholder'=>t('Phone Number'),
	            'class'=>'grey-fields full-width',
	            'data-validation'=>1
	           ))?>
	           </div>
           </div>
            <div class="row top10" id="tip-message">
             <div class="col-md-12">
               <?php echo CHtml::textArea('message','',array(
                'placeholder'=>t('Message'),
                'class'=>'grey-fields full-width'
               ))?>
	           </div>
           </div>
           <div class="row top10">
             <div class="col-md-12 text-center">
                <input type="submit" value="<?php echo t("Submit")?>" class="orange-button medium inline rounded">
             </div>
           </div>
          </form>
    	</div>
	  </div>
	  </div>
  </div>
</div>  