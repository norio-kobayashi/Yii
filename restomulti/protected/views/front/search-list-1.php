
<div id="search-listview" class="col-md-6 border infinite-item <?php echo $delivery_fee!=true?'free-wrap':'non-free'; ?>">
    <div class="inner">
        
        <?php if ( $val['is_sponsored']==2):?>
        <div class="ribbon"><span>Sponsored</span></div>
        <?php endif;?>
        
        <?php if ($offer=FunctionsV3::getOffersByMerchant($merchant_id)):?>
        <div class="ribbon-offer"><span><?php echo $offer;?></span></div>
        <?php endif;?>

        <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>" >
        <img class="logo-medium"src="<?php echo FunctionsV3::getMerchantLogo($merchant_id);?>">
        </a>
        <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>" >
        <h2 class="concat-text"><?php echo clearString($val['restaurant_name'])?></h2>
        </a>
        <p class="merchant-address concat-text"><?php echo $val['merchant_address']?></p>
        
        <div class="mytable">
          <div class="mycol a">
             <div class="rating-stars" data-score="<?php echo $ratings['ratings']?>"></div>   
             <p><?php echo $ratings['votes']." ".t("Reviews")?></p>
          </div>
          <div class="mycol b">
             <?php echo FunctionsV3::prettyPrice($val['minimum_order'])?>
             <p><?php echo t("Minimum Order")?></p>
          </div>
        </div> <!--mytable-->

        <div class="top25"></div>
        
        <?php echo FunctionsV3::merchantOpenTag($merchant_id)?>
        <?php echo FunctionsV3::getFreeDeliveryTag($merchant_id)?>                        
        
        <p class="top15 cuisine concat-text">
        <?php echo FunctionsV3::displayCuisine($val['cuisine']);?>
        </p>                
                                 
        <p>
        <?php 
        if ($distance){
        	echo t("Distance").": ".number_format($distance,1)." $distance_type";
        } else echo  t("Distance").": ".t("not available");
        ?>
        </p>
        
        <?php if($val['service']!=3):?>
        <p><?php echo t("Delivery Est")?>: <?php echo FunctionsV3::getDeliveryEstimation($merchant_id)?></p>
        <?php endif;?>
        
        <p>
        <?php 
        if($val['service']!=3){
	        if (!empty($merchant_delivery_distance)){
	        	echo t("Delivery Distance").": ".$merchant_delivery_distance." $distance_type_orig";
	        } else echo  t("Delivery Distance").": ".t("not available");
        }
        ?>
        </p>
                                
        <p>
        <?php 
        if($val['service']!=3){
	        if ($delivery_fee){
	             echo t("Delivery Fee").": ".FunctionsV3::prettyPrice($delivery_fee);
	        } else echo  t("Delivery Fee").": ".t("Free Delivery");
        }
        ?>
        </p>
        
        <?php echo FunctionsV3::displayServicesList($val['service'])?>          
        <?php
        if(($val['service']==3 || $val['service']==5) && Yii::app()->functions->getOption("merchant_table_booking",$merchant_id)!="yes"): ?>
        <div class="row" style="padding: 15px 25px">
        <a href="<?php echo Yii::app()->createUrl('store/booking/merchant/'.$val['restaurant_slug'])?>" 
        class="orange-button rounded3 medium">
        <?php echo t("Book a Table")?>
        </a>
        </div>
        <?php endif; ?>
        <?php
        if($val['service']!=3 && Yii::app()->functions->getOption('merchant_disabled_ordering',$merchant_id)!="yes"): ?>
        <div class="row" style="padding: 15px 25px">
        <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>" 
        class="orange-button rounded3 medium">
        <?php echo t("Order Now")?>
        </a>
        </div>
        <?php endif; ?>
        <?php
        $halal = FunctionsV3::getHalal($merchant_id);
        $halalClass = FunctionsV3::getHalalClass();
        //print_r($halal['halal']);
        //print_r($halalClass);
            if (isset($halal['halal']) && !empty($halal['halal'])) :
                $halal_name = $halal['halal'];
                $halal_class = $halalClass[0];
                ?>
            <div class="list-halal" data-toggle="popover" data-placement="left" data-content="<?= $halalHtml ?>">
                <img src="<?= $halal_class['img'] ?>"><span><?= $halal_name ?></span>
            </div>
        <?php endif; ?> 
        
        
    </div> <!--inner-->
 </div> <!--col-->          