<div class="box-grey rounded merchant-halals" style="margin-top:0;">
<div class="section-label bottom20">
    <a class="section-label-a">
      <span class="bold" style="background:#fff;">
      <?php echo t("Halal Classcification")?></span>
      <b></b>
    </a>     
</div>  

<?php if ( $res=FunctionsV3::getHalal($merchant_id)):?>
  <?php $class=FunctionsV3::getHalalClass() ?>
  <?php if ( isset($res['halal']) && !empty($res['halal']) ):?>
   <div class="row list-halal">
      <div class="col-md-3 col-xs-3"><img src="<?= $class[0]['img'] ?>"></div>
      <div class="col-md-6 col-xs-6"><?php echo $res['halal']?></div>
   </div>
  <?php endif;?>
  <?php if ( isset($res['certificaat']) && !empty($res['halal']) ):?> 
   <div class="row list-halal">
      <div class="col-md-3 col-xs-3"><img src="<?= $class[1]['img'] ?>"></div>
      <div class="col-md-6 col-xs-6"><?php echo $res['certificaat']?></div>
   </div>
   <?php endif;?>
   <?php if ( isset($res['alcohol']) && !empty($res['halal']) ):?>
   <div class="row list-halal">
      <div class="col-md-3 col-xs-3"><img src="<?= $class[2]['img'] ?>"></div>
      <div class="col-md-6 col-xs-6"><?php echo $res['alcohol']?></div>
   </div>
   <?php endif;?>
   <?php if ( isset($res['shisha']) && !empty($res['halal']) ):?>
   <div class="row list-halal">
      <div class="col-md-3 col-xs-3"><img src="<?= $class[3]['img'] ?>"></div>
      <div class="col-md-6 col-xs-6"><?php echo $res['shisha']?></div>
   </div>
   <?php endif;?>
<?php else :?>
<p class="text-danger"><?php echo t("Not available.")?></p>
<?php endif;?>

</div> <!--box-grey-->