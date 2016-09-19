<?php

/**
 * This is the model class for table "{{merchant}}".
 *
 * The followings are the available columns in table '{{merchant}}':
 * @property integer $merchant_id
 * @property string $restaurant_slug
 * @property string $restaurant_name
 * @property string $restaurant_phone
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_email
 * @property string $country_code
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $post_code
 * @property string $cuisine
 * @property string $service
 * @property integer $free_delivery
 * @property string $delivery_estimation
 * @property string $username
 * @property string $password
 * @property string $activation_key
 * @property string $activation_token
 * @property string $status
 * @property string $date_created
 * @property string $date_modified
 * @property string $date_activated
 * @property string $last_login
 * @property string $ip_address
 * @property integer $package_id
 * @property double $package_price
 * @property string $membership_expired
 * @property integer $payment_steps
 * @property integer $is_featured
 * @property integer $is_ready
 * @property integer $is_sponsored
 * @property string $sponsored_expiration
 * @property string $lost_password_code
 * @property integer $user_lang
 * @property string $membership_purchase_date
 * @property integer $sort_featured
 * @property integer $is_commission
 * @property double $percent_commision
 * @property string $abn
 * @property string $session_token
 * @property string $commision_type
 * @property string $halal
 * @property string $certificaat
 * @property string $alcohol
 * @property string $shisha
 */
class Merchant extends CActiveRecord {

    const PUBCOND = 'status=:status AND is_ready=:is_ready';

    public $delete = false;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Merchant the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{merchant}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('restaurant_slug, restaurant_name, restaurant_phone, contact_name, contact_phone, contact_email, country_code, street, city, state, post_code, cuisine, service, delivery_estimation, username, password, activation_key, activation_token, date_created, date_modified, date_activated, last_login, ip_address, package_id, package_price, membership_expired, sponsored_expiration, lost_password_code, user_lang, membership_purchase_date, sort_featured, percent_commision, abn, session_token, halal, certificaat, alcohol, shisha', 'required'),
            array('free_delivery, package_id, payment_steps, is_featured, is_ready, is_sponsored, user_lang, sort_featured, is_commission', 'numerical', 'integerOnly' => true),
            array('package_price, percent_commision', 'numerical'),
            array('restaurant_slug, restaurant_name, contact_name, contact_email, city, state, service, activation_token, abn, session_token', 'length', 'max' => 255),
            array('restaurant_phone, contact_phone, post_code, delivery_estimation, username, password, status', 'length', 'max' => 100),
            array('country_code', 'length', 'max' => 3),
            array('activation_key, ip_address, lost_password_code, commision_type', 'length', 'max' => 50),
            array('halal, certificaat, alcohol, shisha', 'length', 'max' => 200),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('merchant_id, restaurant_slug, restaurant_name, restaurant_phone, contact_name, contact_phone, 
				contact_email, country_code, street, city, state, post_code, cuisine, service, free_delivery, 
				delivery_estimation, username, password, activation_key, activation_token, status, date_created, 
				date_modified, date_activated, last_login, ip_address, package_id, package_price, membership_expired, 
				payment_steps, is_featured, is_ready, is_sponsored, sponsored_expiration, lost_password_code, 
				user_lang, membership_purchase_date, sort_featured, is_commission, percent_commision, abn, 
				session_token, commision_type, halal, certificaat, alcohol, shisha, avg_rating', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'reviews' => [self::HAS_MANY, 'Review', 'merchant_id', 'order' => 'date_created DESC'],
            'reviewCount' => [self::STAT, 'Review', 'merchant_id'],
            'rating' => [self::HAS_MANY, 'Rating', 'merchant_id'],
            'avgRating' => [self::STAT, 'Rating', 'merchant_id', 'select' => 'AVG(ratings)'],
            'menu' => [self::HAS_MANY, 'Item', 'merchant_id'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'merchant_id' => 'Merchant',
            'restaurant_slug' => 'Restaurant Slug',
            'restaurant_name' => 'Restaurant Name',
            'restaurant_phone' => 'Restaurant Phone',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'contact_email' => 'Contact Email',
            'country_code' => 'Country Code',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'post_code' => 'Post Code',
            'cuisine' => 'Cuisine',
            'service' => 'Service',
            'free_delivery' => 'Free Delivery',
            'delivery_estimation' => 'Delivery Estimation',
            'username' => 'Username',
            'password' => 'Password',
            'activation_key' => 'Activation Key',
            'activation_token' => 'Activation Token',
            'status' => 'Status',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'date_activated' => 'Date Activated',
            'last_login' => 'Last Login',
            'ip_address' => 'Ip Address',
            'package_id' => 'Package',
            'package_price' => 'Package Price',
            'membership_expired' => 'Membership Expired',
            'payment_steps' => 'Payment Steps',
            'is_featured' => 'Is Featured',
            'is_ready' => 'Is Ready',
            'is_sponsored' => 'Is Sponsored',
            'sponsored_expiration' => 'Sponsored Expiration',
            'lost_password_code' => 'Lost Password Code',
            'user_lang' => 'User Lang',
            'membership_purchase_date' => 'Membership Purchase Date',
            'sort_featured' => 'Sort Featured',
            'is_commission' => 'Is Commission',
            'percent_commision' => 'Percent Commision',
            'abn' => 'Abn',
            'session_token' => 'Session Token',
            'commision_type' => 'Commision Type',
            'halal' => 'Halal',
            'certificaat' => 'Certificaat',
            'alcohol' => 'Alcohol',
            'shisha' => 'Shisha',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('merchant_id', $this->merchant_id);
        $criteria->compare('restaurant_slug', $this->restaurant_slug, true);
        $criteria->compare('restaurant_name', $this->restaurant_name, true);
        $criteria->compare('restaurant_phone', $this->restaurant_phone, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_phone', $this->contact_phone, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('country_code', $this->country_code, true);
        $criteria->compare('street', $this->street, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('post_code', $this->post_code, true);
        $criteria->compare('cuisine', $this->cuisine, true);
        $criteria->compare('service', $this->service, true);
        $criteria->compare('free_delivery', $this->free_delivery);
        $criteria->compare('delivery_estimation', $this->delivery_estimation, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('activation_key', $this->activation_key, true);
        $criteria->compare('activation_token', $this->activation_token, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('date_created', $this->date_created, true);
        $criteria->compare('date_modified', $this->date_modified, true);
        $criteria->compare('date_activated', $this->date_activated, true);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('ip_address', $this->ip_address, true);
        $criteria->compare('package_id', $this->package_id);
        $criteria->compare('package_price', $this->package_price);
        $criteria->compare('membership_expired', $this->membership_expired, true);
        $criteria->compare('payment_steps', $this->payment_steps);
        $criteria->compare('is_featured', $this->is_featured);
        $criteria->compare('is_ready', $this->is_ready);
        $criteria->compare('is_sponsored', $this->is_sponsored);
        $criteria->compare('sponsored_expiration', $this->sponsored_expiration, true);
        $criteria->compare('lost_password_code', $this->lost_password_code, true);
        $criteria->compare('user_lang', $this->user_lang);
        $criteria->compare('membership_purchase_date', $this->membership_purchase_date, true);
        $criteria->compare('sort_featured', $this->sort_featured);
        $criteria->compare('is_commission', $this->is_commission);
        $criteria->compare('percent_commision', $this->percent_commision);
        $criteria->compare('abn', $this->abn, true);
        $criteria->compare('session_token', $this->session_token, true);
        $criteria->compare('commision_type', $this->commision_type, true);
        $criteria->compare('halal', $this->halal, true);
        $criteria->compare('certificaat', $this->certificaat, true);
        $criteria->compare('alcohol', $this->alcohol, true);
        $criteria->compare('shisha', $this->shisha, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected static function pubParam() {
        return [':status' => 'active', ':is_ready' => 2];
    }

    public static function dataById($id) {
        $merchant = self::model()->findByAttributes(['merchant_id' => $id]);
        return toDataArray();
    }

    public function getId() {
        return $this->merchant_id;
    }

    public function getUrl() {
        return CHtml::normalizeUrl('/store/item/' . $this->restaurant_slug);
    }

    public function getName() {
        return $this->restaurant_name;
    }

    public function getAddress() {
        return $this->street . ', ' . $this->city;
    }

    public function getLatitude() {
        $lat = Yii::app()->functions->getOption("merchant_latitude", $this->merchant_id);
        return $lat ? $lat : false;
    }

    public function getLongitude() {
        $lon = Yii::app()->functions->getOption("merchant_longtitude", $this->merchant_id);
        return $lon ? $lon : false;
    }

    public function getTypeImage() {
        return Yii::app()->request->baseUrl . '/assets/icons/restaurants-bars/restaurants/restaurant.png';
    }

    public function getDescription() {
        return Yii::app()->functions->getOption("merchant_information", $this->merchant_id);
    }

    public function getShortDescription() {
        $s = strip_tags($this->description);
        $n = 90;
        if (strlen($s) < $n + 31)
            return $s;
        $k = strpos($s, ' ', $n);
        if ($k > $n + 30)
            $k = $n;
        $p = substr($s, 0, $k);
        $a = strlen($p) ? $p{strlen($p) - 1} : '';
        if (in_array($a, array('.', ',', '!', '?', ':', ';')))
            $p = substr($p, 0, strlen($p) - 1);
        if ($p)
            $p .= '&hellip;';
        return $p;
    }

    public function getBusinnesHours() {
        $a = Yii::app()->functions->getBusinnesHours($this->merchant_id);
        if (!$a) {
            return [];
        } else {
            return $a;
        }
    }

    public function getMinimumOrder() {
        return Yii::app()->functions->getOption("merchant_minimum_order", $this->merchant_id);
    }

    public function getPhotos() {
        $gallery = Yii::app()->functions->getOption("merchant_gallery", $this->merchant_id);
        $gallery = !empty($gallery) ? json_decode($gallery) : [];
        $photos = [
            Yii::app()->request->baseUrl . '/upload/' . Yii::app()->functions->getOption("merchant_photo", $this->merchant_id),
        ];
        foreach ($gallery as $photo) {
            $photos[] = Yii::app()->request->baseUrl . '/upload/' . $photo;
        }
        return $photos;
    }

    public function getFeatured() {
        return $this->is_featured == 2 ? 1 : 0;
    }

    public function getItem_specific() {
        $menu = new stdClass();
        if ($this->menuPrice > 0) {
            $menu->menu = '&euro;' . $this->menuPrice;
        }
        if ($this->menu) {
            $n = 1;
            foreach ($this->menu as $item) {
                $name = 'offer' . $n;
                $pname = "offer{$n}_price";
                $menu->$name = $item->item_name;
                $menu->$pname = $item->minPrice;
                $n++;
            }
        }
        return $menu;
    }

    public function getTypes() {
        if (!$this->cuisine)
            return [''];
        $s = str_replace(['[', ']', '"'], '', $this->cuisine);
        $a = explode(',', $s);
        if (!$a)
            return [''];
        $c = [];
        foreach ($a as $id) {
            $id = (int) $id;
            $c[] = Yii::app()->functions->GetCuisine($id)['cuisine_name'];
        }
        return $c;
    }

    public function getType() {
        return $this->types[0];
    }

    public function getMenuPrice() {
        return number_format($this->package_price, 2, '.', ',');
    }

    public function getLastReview() {
        return isset($this->reviews[0]) ? $this->reviews[0]->review : '';
    }

    public function getLastReviewRating() {
        return isset($this->reviews[0]) ? $this->reviews[0]->rating : '';
    }

    public function getFeatures() {
        $data = [];
        if ($this->halal)
            $data[] = $this->halal;
        if ($this->certificaat)
            $data[] = $this->certificaat;
        if ($this->alcohol)
            $data[] = $this->alcohol;
        if ($this->shisha)
            $data[] = $this->shisha;
        return $data;
    }

    public function getHalalClass() {
        $path = Yii::app()->request->baseUrl . '/assets/images/';
        $data = [];
        if ($this->halal)
            $data[] = ['img' => $path . 'halal.png', 'name' => $this->halal];
        if ($this->certificaat)
            $data[] = ['img' => $path . 'certificaat.png', 'name' => $this->certificaat];
        if ($this->alcohol)
            $data[] = ['img' => $path . 'alcohol.png', 'name' => $this->alcohol];
        if ($this->shisha)
            $data[] = ['img' => $path . 'shisha.png', 'name' => $this->shisha];
        return $data;
    }

    public function getDeliveryEstimation() {
        return Yii::app()->functions->getOption("merchant_delivery_estimation", $this->merchant_id);
    }

    public function getDeliveryMiles() {
        return Yii::app()->functions->getOption("merchant_delivery_miles", $this->merchant_id);
    }

    public function getShippingEnabled() {
        return Yii::app()->functions->getOption("shipping_enabled", $this->merchant_id);
    }

    public function getDeliveryFee() {
        return Yii::app()->functions->getOption("merchant_delivery_charges", $this->merchant_id);
    }

    public function distance($to) {
        /* $from = $this->street . ',' . $this->city . ',' . $this->state;
          return Yii::app()->functions->getDistance($from, $to, $this->country_code); */
        return MerchantHelper::distanceStr($this, $to);
    }

    public function getOpen() {
        return Yii::app()->functions->isMerchantOpen($this->id);
    }

    public function getCanOrder() {
        return ($this->service != 3);
    }

    public function getCanBook() {
        return ($this->service == 3 || $this->service == 2);
    }

    public static function toDataArray($merchant, $type = 'full', $location = '') {
        if (!$merchant)
            return [];
        if (isset($merchant->delete) && $merchant->delete)
            return [];
        $upload_path = Yii::app()->request->baseUrl . '/upload/';
        $data = [
            'id' => $merchant->merchant_id,
            'name' => $merchant->restaurant_name,
            'service' => $merchant->service,
            'url' => createUrl($merchant->url),
            'address' => $merchant->address,
            'typeImage' => \Yii::app()->request->baseUrl . '/assets/icons/restaurants-bars/restaurants/restaurant.png',
            'type' => $merchant->types[0],
            'minimumOrder' => $merchant->minimumOrder,
            'img' => $upload_path . Yii::app()->functions->getOption("merchant_photo", $merchant->merchant_id),
            'rating' => $merchant->avgRating,
            'reviewCount' => $merchant->reviewCount,
            'menuPrice' => $merchant->menuPrice,
            'menu' => $merchant->menu,
            'businnesHours' => $merchant->businnesHours,
            'distance' => $location ? $merchant->distance($location) : 0,
            'open' => $merchant->open,
            'minimumOrder' => $merchant->minimumOrder,
            'cuisine' => $merchant->types,
            'self' => $merchant,
        ];
        switch ($type) {
            case 'short':
                $a = [
                    'description' => $merchant->shortDescription,
                ];
                break;
            case 'full':
                $a = [
                    'description' => $merchant->description,
                    'city' => $merchant->city,
                    'state' => $merchant->state,
                    'post_code' => $merchant->post_code,
                    'phone' => $merchant->contact_phone,
                    'mobile_phone' => '',
                    'website' => Yii::app()->functions->getOption("merchant_extenal", $merchant->merchant_id),
                    'event' => '',
                    'photos' => $merchant->photos,
                    'thumbs' => $merchant->photos,
                    'features' => $merchant->features,
                    'halalClass' => $merchant->halalClass,
                    'price' => $merchant->menuPrice,
                    'reviews' => $merchant->reviews, //?
                    'service' => $merchant->service,
                    'latitude' => $merchant->latitude,
                    'longitude' => $merchant->longitude,
                ];
                break;
            default:
                $a = [];
                break;
        }
        return array_merge($data, $a);
    }

    public static function allToDataArray($merchants, $type = 'short', $location = '') {
        if (!$merchants)
            return [];
        $data = [];
        foreach ($merchants as $merchant) {
            $a = self::toDataArray($merchant, $type, $location);
            if ($a) {
                $data[] = $a;
            }
        }
        return $data;
    }

    public static function findOne($id) {
        $merchant = Merchant::model()->findByAttributes(['merchant_id' => $id]);
        return self::toDataArray($merchant);
    }

    public static function findBySlug($slug) {
        $merchant = Merchant::model()->findByAttributes(['restaurant_slug' => $slug]);
        $data = self::toDataArray($merchant);
        $data['self'] = $merchant;
        return $data;
    }

    public static function findLast($n = 3) {
        $criteria = new CDbCriteria;
        //$criteria->select = 'merchant_id, restaurant_name';
        $criteria->condition = self::PUBCOND;
        $criteria->params = self::pubParam();
        $criteria->order = 'date_created DESC';
        $criteria->limit = $n;
        $merchants = self::model()->findAll($criteria);
        $data = self::allToDataArray($merchants);
        //echo '<pre>'; print_r($data);
        return $data;
    }

    public static function findFeatured() {
        $criteria = new CDbCriteria;
        //$criteria->select = 'merchant_id, restaurant_name';
        $criteria->condition = self::PUBCOND . ' AND is_featured=:is_featured';
        $criteria->params = array_merge(self::pubParam(), [':is_featured' => 2]);
        $criteria->order = 'RAND()';
        $criteria->limit = 4;
        $merchants = self::model()->findAll($criteria);
        $data = self::allToDataArray($merchants);
        //echo '<pre>'; print_r($data);
        return $data;
    }

    public static function findPopular() {
        $criteria = new CDbCriteria;
        $ratingTbl = Rating::model()->tableName();
        $avgRatingSql = "(select AVG(ratings) from $ratingTbl AS rt where rt.merchant_id = t.merchant_id)";
        $criteria->select = "*, $avgRatingSql AS avg_rating";
        $criteria->condition = self::PUBCOND . ' AND is_sponsored=2';
        $criteria->params = self::pubParam();
        $criteria->order = 'avg_rating DESC';
        $criteria->limit = 4;
        //$merchants = self::model()->with('avgRating')->findAll($criteria);
        $merchants = self::model()->findAll($criteria);
        $data = self::allToDataArray($merchants);
        //echo '<pre>'; print_r($data);
        return $data;
    }

    public static function findPopularToday() {
        $criteria = new CDbCriteria;
        $ratingTbl = Rating::model()->tableName();
        $date = date('Y-m-d', time() - 3600 * 24 * 10); // last 10 days
        $avgRatingSql = "(select AVG(ratings) from $ratingTbl AS rt WHERE rt.merchant_id = t.merchant_id AND rt.date_created>='$date')";
        $criteria->select = "*, $avgRatingSql AS avg_rating";
        $criteria->condition = self::PUBCOND;
        $criteria->params = self::pubParam();
        $criteria->order = 'avg_rating DESC';
        $criteria->limit = 6;
        $merchants = self::model()->findAll($criteria);
        $data = self::allToDataArray($merchants);
        return $data;
    }

    public static function findForResuts($opt, $location = '') {
        $condition = '';
        $params = [];
        $join = '';
        if ($opt['service']) {
            switch ($opt['service']) {
                case 1:
                    $condition = ' AND (service=1 OR service=4 OR service=5)';
                    break;
                case 2:
                    $condition = ' AND (service=2 OR service=4)';
                    break;
                case 3:
                    $condition = ' AND (service=3 OR service=5)';
                    break;
            }
        }
        if ($opt['halal']) {
            $condition .= ' AND halal=:halal';
            $params[':halal'] = $opt['halal'];
        }
        if ($opt['cuisine']) {
            $condition .= " AND cuisine LIKE :cuisine";
            $params[':cuisine'] = '%' . $opt['cuisine'] . '%';
        }
        
        if ($opt['name']) {
            $condition .= " AND restaurant_name LIKE :restaurant_name";
            $params[':restaurant_name'] = '%' . $opt['name'] . '%';
        }

        $criteria = new CDbCriteria;
        $criteria->select = '*';
        if ($condition) {
            $criteria->condition = self::PUBCOND . $condition;
            $criteria->params = array_merge(self::pubParam(), $params);
        }
        
        $merchants = self::model()->findAll($criteria);
        foreach ($merchants as $merchant) {
            if ($opt['price'] && $merchant->minimumOrder > $opt['price']) {
                $merchant->delete = true;
            }
            if ($opt['distance'] && $location && floatval($merchant->distance($location)) > $opt['distance']) {
                $merchant->delete = true;
            }
        }
        $data = Merchant::allToDataArray($merchants, 'short', $location);
        return $data;
    }

    public static function findForMap() {
        $criteria = new CDbCriteria;
        $criteria->condition = self::PUBCOND;
        $criteria->params = self::pubParam();
        $merchants = self::model()->findAll($criteria);
        $data = [];
        $n = 1;
        foreach ($merchants as $m) {
            if (!$m->latitude || !$m->longitude)
                continue;
            $data[] = self::dataForMap($m);
            $n++;
        }
        return $data;
    }

    public static function findOneForMap($id) {
        $merchant = self::model()->findByPk($id);
        $data = [];
        $data[] = self::dataForMap($merchant);
        return $data;
    }

    private static function dataForMap($m) {
        $item = new stdClass();
        $item->id = $m->id; //$n;
        $item->category = 'bar_restaurant';
        $item->title = $m->name;
        $item->location = $m->address;
        $item->latitude = $m->latitude;
        $item->longitude = $m->longitude;
        $item->url = createUrl($m->url);
        $item->type = $m->type;
        $item->type_icon = $m->typeImage;
        $item->rating = $m->rating;
        $item->gallery = $m->photos;
        $item->features = $m->features;
        $item->date_created = $m->date_created;
        $item->featured = $m->featured;
        $item->color = '';
        $item->person_id = 1;
        $item->year = '';
        $item->special_offer = 0;
        $item->item_specific = $m->item_specific;
        $item->description = $m->shortDescription;
        $item->last_review = $m->lastReview;
        $item->last_review_rating = $m->lastReviewRating;
        return $item;
    }

}
