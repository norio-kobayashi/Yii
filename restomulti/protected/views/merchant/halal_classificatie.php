<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php
$connection = Yii::app()->db;
$mID = Yii::app()->functions->getMerchantID();

$user = $connection->createCommand()
        ->select('*')
        ->from('{{merchant}}')
        ->where('merchant_id=:merchant_id', array(':merchant_id' => $mID))
        ->queryAll();
if (isset($_POST['submit'])) {
    $halal = $_POST['halal'];
    $certificaat = $_POST['certificaat'];
    $alcohol = $_POST['alcohol'];
    $shisha = $_POST['shisha'];

    if (!$user) {
        $command = $connection->createCommand();
        $command->insert('{{merchant}}', array('merchant_id' => $mID, 'halal' => $halal, 'certificaat' => $certificaat, 'alcohol' => $alcohol, 'shisha' => $shisha));
        header('Refresh:0');
    } else {
        $update = $connection->createCommand()
                ->update('{{merchant}}', array('merchant_id' => $mID, 'halal' => $halal, 'certificaat' => $certificaat, 'alcohol' => $alcohol, 'shisha' => $shisha), 'merchant_id=:merchant_id', array(':merchant_id' => $mID));
        header('Refresh:0');
    }
}
?>
<form method="post" action="#">
    <div class="fieldset">
        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/halal.png"><h3>Halal Classificatie</h3>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['halal'] == 'Volledig halal') {
    echo "checked='checked'";
} ?> name="halal" value="Volledig halal" id="vh"> <label for="vh">Volledig halal</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['halal'] == 'Deels halal') {
    echo "checked='checked'";
} ?> name="halal" value="Deels halal" id="dh"> <label for="dh">Deels halal</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['halal'] == 'Kosher') {
    echo "checked='checked'";
} ?> name="halal" value="Kosher" id="kr"> <label for="kr">Kosher</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['halal'] == 'Vis beschikbaar') {
    echo "checked='checked'";
} ?> name="halal" value="Vis beschikbaar" id="vb"> <label for="vb">Vis beschikbaar</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['halal'] == 'Vegetarisch beschikbaar') {
    echo "checked='checked'";
} ?> name="halal" value="Vegetarisch beschikbaar" id="vbr"> 
            <label for="vbr">Vegetarisch beschikbaar</label>
        </div>
    </div>
    <div class="fieldset">
        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/certificaat.png"><h3>Certificaat</h3>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['certificaat'] == 'Certificaat aanwezig') {
    echo "checked='checked'";
} ?> name="certificaat" value="Certificaat aanwezig" id="cer"> <label for="cer">Ja</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['certificaat'] == 'Geen certificaat') {
    echo "checked='checked'";
} ?> name="certificaat" value="Geen certificaat" id="cert"> <label for="cert">Nee</label>
        </div>
    </div>
    <div class="fieldset">
        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/alcohol.png"><h3>Alcohol</h3>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['alcohol'] == 'Alcohol aanwezig') {
    echo "checked='checked'";
} ?> name="alcohol" value="Alcohol aanwezig" id="al"> <label for="al">Ja</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['alcohol'] == 'Geen alcohol aanwezig') {
    echo "checked='checked'";
} ?> name="alcohol" value="Geen alcohol aanwezig" id="alc"> <label for="alc">Nee</label>
        </div>
    </div>
    <div class="fieldset">
        <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/shisha.png"><h3>Shisha</h3>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['shisha'] == 'Shisha aanwezig') {
    echo "checked='checked'";
} ?> name="shisha" value="Shisha aanwezig" id="sh"> <label for="sh">ja</label>
        </div>
        <div class="fields">
            <input required="required"  type="radio" <?php if ($user[0]['shisha'] == 'Geen shisha') {
    echo "checked='checked'";
} ?> name="shisha" value="Geen shisha" id="shi"> <label for="shi">Nee</label>
        </div>
    </div>
    <div class="btn">
        <input class="uk-button uk-form-width-medium uk-button-success" name="submit" type="submit" value="Save">
    </div>
</form>