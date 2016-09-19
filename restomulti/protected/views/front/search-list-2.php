
<div id="search-listgrid" class="infinite-item <?php echo $delivery_fee!=true?'free-wrap':'non-free'; ?>">
    <div class="inner list-view">
    
    <?php if ( $val['is_sponsored']==2):?>
    <div class="ribbon"><span><?php echo t("Sponsored")?></span></div>
    <?php endif;?>
    
    <?php if ($offer=FunctionsV3::getOffersByMerchant($merchant_id)):?>
    <div class="ribbon-offer"><span><?php echo $offer;?></span></div>
    <?php endif;?>
    
    <div class="row">
	    <div class="col-md-2 border ">
	     <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>">
	      <img class="logo-small"src="<?php echo FunctionsV3::getMerchantLogo($merchant_id);?>">
	     </a>
	     <?php echo FunctionsV3::displayServicesList($val['service'])?>    
	     <?php FunctionsV3::displayCashAvailable($merchant_id)?>      
	    </div> <!--col-->
	    
	    <div class="col-md-6 border">
	     
	       <div class="mytable">
	         <div class="mycol">
	            <div class="rating-stars" data-score="<?php echo $ratings['ratings']?>"></div>   
	         </div>
	         <div class="mycol">
	            <p><?php echo $ratings['votes']." ".t("Reviews")?></p>
	         </div>
	         <div class="mycol">
	            <?php echo FunctionsV3::merchantOpenTag($merchant_id)?>                
	         </div>
	         
	         <div class="mycol">
	          <p><?php echo t("Minimum Order").": ".FunctionsV3::prettyPrice($val['minimum_order'])?></p>
	         </div>
	         
	       </div> <!--mytable-->
	       <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>">
	       <h2><?php echo clearString($val['restaurant_name'])?></h2>
	       </a>
	       <p class="merchant-address concat-text"><?php echo $val['merchant_address']?></p>   
	       	       	       
	       <p class="cuisine">
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
	        
	        <p class="top15"><?php echo FunctionsV3::getFreeDeliveryTag($merchant_id)?></p>
	    
	    </div> <!--col-->
	    
	    <div class="col-md-4 relative border">
        <?php
        if(($val['service']==3 || $val['service']==5) && Yii::app()->functions->getOption("merchant_table_booking",$merchant_id)!="yes"): ?>
        <a href="<?php echo Yii::app()->createUrl('store/booking/merchant/'.$val['restaurant_slug'])?>" 
        class="orange-button rounded3 medium" style="margin-top: 2%">
        <?php echo t("Book a Table")?>
        </a>
        <?php endif; ?>
        <?php
        if($val['service']!=3 && Yii::app()->functions->getOption('merchant_disabled_ordering',$merchant_id)!="yes"): ?>
        <a href="<?php echo Yii::app()->createUrl('store/menu/merchant/'.$val['restaurant_slug'])?>" 
        class="orange-button rounded3 medium" style="margin-top: 2%">
        <?php echo t("Order Now")?>
        </a>
        <?php endif; ?>
         <!--halal classificatie--> 
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
	    
	    </div>
    </div> <!--row-->
    
    </div> <!--inner-->
</div>  <!--infinite-item-->   