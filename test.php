<?php
Yii::app()->clientScript->registerScript('search', "

	$('#dop-uch').hide();

	$('#dop_region').hide();
	$('#dop_district').hide();
        $('#dop_DISTRICT_RESIDENCE_ID_1').hide();
        $('#dop_VICINITY_RESIDENCE_ID_1').hide();
        $('#dop_DISTRICT_RESIDENCE_ID_2').hide();
        $('#dop_VICINITY_RESIDENCE_ID_2').hide();
        $('#dop_DISTRICT_RESIDENCE_ID_3').hide();
        $('#dop_VICINITY_RESIDENCE_ID_3').hide();

	$('.dop-ruk-button').click(function(){
		$('.dop-ruk').toggle();
		return false;
	});

	$('#Party_TYPE_PROJECT_ID').change(function(){
		if ($(this).val() == 2) {
			$('#dop-uch').show();
		}
		else {
			$('#dop-uch').hide();
		}
		return false;
	});

        $('#Party_DISTRICT_RESIDENCE_ID_1').change(function(){
		if ($(this).val() == 8) {
			$('#dop_DISTRICT_RESIDENCE_ID_1').show();
		}
		else {
			$('#dop_DISTRICT_RESIDENCE_ID_1').hide();
		}
		return false;
	});

        $('#Party_VICINITY_RESIDENCE_ID_1').change(function(){
		if ($(this).val() == 25) {
			$('#dop_VICINITY_RESIDENCE_ID_1').show();
		}
		else {
			$('#dop_VICINITY_RESIDENCE_ID_1').hide();
		}
		return false;
	});
        $('#Party_DISTRICT_RESIDENCE_ID_2').change(function(){
		if ($(this).val() == 8) {
			$('#dop_DISTRICT_RESIDENCE_ID_2').show();
		}
		else {
			$('#dop_DISTRICT_RESIDENCE_ID_2').hide();
		}
		return false;
	});

        $('#Party_VICINITY_RESIDENCE_ID_2').change(function(){
		if ($(this).val() == 25) {
			$('#dop_VICINITY_RESIDENCE_ID_2').show();
		}
		else {
			$('#dop_VICINITY_RESIDENCE_ID_2').hide();
		}
		return false;
	});

        $('#Party_DISTRICT_RESIDENCE_ID_3').change(function(){
		if ($(this).val() == 8) {
			$('#dop_DISTRICT_RESIDENCE_ID_3').show();
		}
		else {
			$('#dop_DISTRICT_RESIDENCE_ID_3').hide();
		}
		return false;
	});

        $('#Party_VICINITY_RESIDENCE_ID_3').change(function(){
		if ($(this).val() == 25) {
			$('#dop_VICINITY_RESIDENCE_ID_3').show();
		}
		else {
			$('#dop_VICINITY_RESIDENCE_ID_3').hide();
		}
		return false;
	});

	");

////return false;

?>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'party-form',

    //'enableAjaxValidation'=>false,
    'enableClientValidation' => true,
    'clientOptions'          => array(
        'validateOnSubmit'      => true,
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),

));?>
<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

<?php echo $form->errorSummary($model);?>

<?php
if ($model->isNewRecord) {
    echo $form->hiddenField($model, 'MEASURE_ID', array('value' => $meas_id));
}

if (isset($update_access)) {
    echo CHtml::hiddenField('update_access', array('value' => true));
}
?>
<fieldset>
    <legend>СВЕДЕНИЯ О РАБОТЕ:</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'CATEGORY_ID');?>
        <?php echo $form->dropDownList($model, 'CATEGORY_ID', CHtml::listData(Category::model()->findAll(), 'CATEGORY_ID', 'CATEGORY'));?>
        <?php echo $form->error($model, 'CATEGORY_ID');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'TYPE_PROJECT_ID');?>
        <?php echo $form->dropDownList($model, 'TYPE_PROJECT_ID', CHtml::listData(TypeProject::model()->findAll(), 'TYPE_PROJECT_ID', 'TYPE_PROJECT'));?>
        <?php echo $form->error($model, 'TYPE_PROJECT_ID');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'PROJECT_NAME');?>
        <?php echo $form->textField($model, 'PROJECT_NAME', array('size' => 60, 'maxlength' => 400));?>
        <?php echo $form->error($model, 'PROJECT_NAME');?>
    </div>
</fieldset>
<fieldset>
<legend>СВЕДЕНИЯ ОБ УЧАСТНИКE(АХ) КОНКУРСА:</legend>
<!--                                         Первый участник                                           -->
<div class="row">
    <?php echo $form->labelEx($model, 'FIRST_NAME_1');?>
    <?php echo $form->textField($model, 'FIRST_NAME_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'FIRST_NAME_1');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'FIRST_NAME_LATINSKIE_1');?>
    <?php echo $form->textField($model, 'FIRST_NAME_LATINSKIE_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'FIRST_NAME_LATINSKIE_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'LAST_NAME_1');?>
    <?php echo $form->textField($model, 'LAST_NAME_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'LAST_NAME_1');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'LAST_NAME_LATINSKIE_1');?>
    <?php echo $form->textField($model, 'LAST_NAME_LATINSKIE_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'LAST_NAME_LATINSKIE_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'SUR_NAME_1');?>
    <?php echo $form->textField($model, 'SUR_NAME_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'SUR_NAME_1');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'SUR_NAME_LATINSKIE_1');?>
    <?php echo $form->textField($model, 'SUR_NAME_LATINSKIE_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'SUR_NAME_LATINSKIE_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'SEX_1');?>
    <?php echo $form->radioButtonList($model, 'SEX_1', array('мужской' => 'мужской', 'женский' => 'женский'), array('separator' => ' | ',
        'labelOptions'                                                                          => array('style'                                                                          => 'display: inline')));?>
    <?php echo $form->error($model, 'SEX_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'BIRTH_DATE_1');?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'        => 'Party[BIRTH_DATE_1]',
        'id'          => 'Party_BIRTH_DATE_1',
        'model'       => $model,
        'value'       => $model->BIRTH_DATE_1,
        'language'    => 'ru',
        'options'     => array(
            'showAnim'   => 'fold',
            'dateFormat' => 'dd.mm.yy',
            //'showOn'=>'button',
            //'buttonImageOnly'=>true,
            'changeMonth' => true,
            'changeYear'  => true,
            'yearRange'   => '1960:2020',
            //'Year' => '1966',
            //'showButtonPanel'=>true,
            'showOtherMonths' => true,
        ),
        'htmlOptions' => array(
            'style'      => 'height:20px;',
        ),
    ));
    ?>
    <?php echo $form->error($model, 'BIRTH_DATE_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'COUNTRY_RESIDENCE_1');?>
    <?php echo $form->textField($model, 'COUNTRY_RESIDENCE_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'COUNTRY_RESIDENCE_1');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'DISTRICT_RESIDENCE_ID_1');?>
    <?php echo $form->dropDownList($model, 'DISTRICT_RESIDENCE_ID_1', CHtml::listData(Region::model()->findAll(), 'REGION_ID', 'REGION'));?>
    <?php echo $form->error($model, 'DISTRICT_RESIDENCE_ID_1');?>
</div>
<div id="dop_DISTRICT_RESIDENCE_ID_1" style="background-color: #CAE1FF;">
    <?php echo $form->labelEx($model, 'DOP_DISTRICT_RESIDENCE_ID_1');?>
    <?php echo $form->textField($model, 'DOP_DISTRICT_RESIDENCE_ID_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'DOP_DISTRICT_RESIDENCE_ID_1');?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'VICINITY_RESIDENCE_ID_1');?>
    <?php echo $form->dropDownList($model, 'VICINITY_RESIDENCE_ID_1', CHtml::listData(District::model()->findAll(), 'DISTRICT_ID', 'DISTRICT'));?>
    <?php echo $form->error($model, 'VICINITY_RESIDENCE_ID_1');?>
</div>

<div id="dop_VICINITY_RESIDENCE_ID_1" style="background-color: #CAE1FF;">
    <?php echo $form->labelEx($model, 'DOP_VICINITY_RESIDENCE_ID_1');?>
    <?php echo $form->textField($model, 'DOP_VICINITY_RESIDENCE_ID_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'DOP_VICINITY_RESIDENCE_ID_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'CITY_RESIDENCE_1');?>
    <?php echo $form->textField($model, 'CITY_RESIDENCE_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'CITY_RESIDENCE_1');?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'HOME_ADRESS_1');?>
    <?php echo $form->textField($model, 'HOME_ADRESS_1', array('size' => 60, 'maxlength' => 150));?>
    <?php echo $form->error($model, 'HOME_ADRESS_1');?>
</div>

<!--   <div class="row">
<?php echo $form->labelEx($model, 'CLASS_KURS_1');?>
                    <?php echo $form->textField($model, 'CLASS_KURS_1', array('size' => 50, 'maxlength' => 50));?>
                    <?php echo $form->error($model, 'CLASS_KURS_1');?>
</div>
            <div class="row">
<?php echo $form->labelEx($model, 'UO_PHONE_NUMBER_1');?>
                    <?php
$this->widget('CMaskedTextField', array(
    'model'       => $model,
    'attribute'   => 'UO_PHONE_NUMBER_1',
    'mask'        => '+375-999-999-99-99',
    'placeholder' => '*',
    'completed'   => 'function(){console.log("ok");}',
));
?>
                    <?php echo $form->error($model, 'UO_PHONE_NUMBER_1');?>
</div>

            <div class="row">
<?php echo $form->labelEx($model, 'UO_EMAIL_1');?>
                    <?php echo $form->textField($model, 'UO_EMAIL_1', array('size' => 50, 'maxlength' => 50));?>
                    <?php echo $form->error($model, 'UO_EMAIL_1');?>
</div> -->
<div class="row">
    <?php echo $form->labelEx($model, 'SSP_USER_ID_1');?>
    <?php echo $form->textField($model, 'SSP_USER_ID_1', array('size' => 50, 'maxlength' => 50));?>
    <?php echo $form->error($model, 'SSP_USER_ID_1');?>
</div>
<!-- <div class="row">
<?php echo $form->labelEx($model, 'EDUCATION_INSTITUTION_1');?>
                  <?php echo $form->textField($model, 'EDUCATION_INSTITUTION_1', array('size' => 60, 'maxlength' => 150));?>
                  <?php echo $form->error($model, 'EDUCATION_INSTITUTION_1');?>
</div>
           <div class="row">
<?php echo $form->labelEx($model, 'ADRESS_EDUCATION_INSTITUTION_1');?>
                  <?php echo $form->textField($model, 'ADRESS_EDUCATION_INSTITUTION_1', array('size' => 60, 'maxlength' => 150));?>
                  <?php echo $form->error($model, 'ADRESS_EDUCATION_INSTITUTION_1');?>
</div>
 -->
<div id="dop-uch" style="background-color: #CAE1FF;">
<!--                                             Второй участник                          -->
<fieldset>
    <legend>СВЕДЕНИЯ О ВТОРОМ УЧАСТНИКЕ:</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'FIRST_NAME_2');?>
        <?php echo $form->textField($model, 'FIRST_NAME_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'FIRST_NAME_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'FIRST_NAME_LATINSKIE_2');?>
        <?php echo $form->textField($model, 'FIRST_NAME_LATINSKIE_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'FIRST_NAME_LATINSKIE_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'LAST_NAME_2');?>
        <?php echo $form->textField($model, 'LAST_NAME_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'LAST_NAME_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'LAST_NAME_LATINSKIE_2');?>
        <?php echo $form->textField($model, 'LAST_NAME_LATINSKIE_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'LAST_NAME_LATINSKIE_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'SUR_NAME_2');?>
        <?php echo $form->textField($model, 'SUR_NAME_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'SUR_NAME_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'SUR_NAME_LATINSKIE_2');?>
        <?php echo $form->textField($model, 'SUR_NAME_LATINSKIE_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'SUR_NAME_LATINSKIE_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'SEX_2');?>
        <?php echo $form->radioButtonList($model, 'SEX_2', array('мужской' => 'мужской', 'женский' => 'женский'), array('separator' => '<br>',
            'labelOptions'                                                                      => array('style'                                                                      => 'display: inline')));?>
        <?php echo $form->error($model, 'SEX_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'BIRTH_DATE_2');?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'        => 'Party[BIRTH_DATE_2]',
            'id'          => 'Party_BIRTH_DATE_2',
            'model'       => $model,
            'value'       => $model->BIRTH_DATE_2,
            'language'    => 'ru',
            'options'     => array(
                'showAnim'   => 'fold',
                'dateFormat' => 'dd.mm.yy',
                //'showOn'=>'button',
                //'buttonImageOnly'=>true,
                'changeMonth' => true,
                'changeYear'  => true,
                'yearRange'   => '1960:2020',
                //'Year' => '1966',
                //'showButtonPanel'=>true,
                'showOtherMonths' => true,
            ),
            'htmlOptions' => array(
                'style'      => 'height:20px;',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'BIRTH_DATE_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'COUNTRY_RESIDENCE_2');?>
        <?php echo $form->textField($model, 'COUNTRY_RESIDENCE_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'COUNTRY_RESIDENCE_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'DISTRICT_RESIDENCE_ID_2');?>
        <?php echo $form->dropDownList($model, 'DISTRICT_RESIDENCE_ID_2', CHtml::listData(Region::model()->findAll(), 'REGION_ID', 'REGION'));?>
        <?php echo $form->error($model, 'DISTRICT_RESIDENCE_ID_2');?>
    </div>
    <div id="dop_DISTRICT_RESIDENCE_ID_2" style="background-color: #CAE1FF;">
        <?php echo $form->labelEx($model, 'DOP_DISTRICT_RESIDENCE_ID_2');?>
        <?php echo $form->textField($model, 'DOP_DISTRICT_RESIDENCE_ID_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'DOP_DISTRICT_RESIDENCE_ID_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'VICINITY_RESIDENCE_ID_2');?>
        <?php echo $form->dropDownList($model, 'VICINITY_RESIDENCE_ID_2', CHtml::listData(District::model()->findAll(), 'DISTRICT_ID', 'DISTRICT'));?>
        <?php echo $form->error($model, 'VICINITY_RESIDENCE_ID_2');?>
    </div>
    <div id="dop_VICINITY_RESIDENCE_ID_2" style="background-color: #CAE1FF;">
        <?php echo $form->labelEx($model, 'DOP_VICINITY_RESIDENCE_ID_2');?>
        <?php echo $form->textField($model, 'DOP_VICINITY_RESIDENCE_ID_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'DOP_VICINITY_RESIDENCE_ID_2');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'CITY_RESIDENCE_2');?>
        <?php echo $form->textField($model, 'CITY_RESIDENCE_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'CITY_RESIDENCE_2');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'HOME_ADRESS_2');?>
        <?php echo $form->textField($model, 'HOME_ADRESS_2', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'HOME_ADRESS_2');?>
    </div>
    <!--
        <div class="row">
<?php echo $form->labelEx($model, 'CLASS_KURS_2');?>
                <?php echo $form->textField($model, 'CLASS_KURS_2', array('size' => 50, 'maxlength' => 50));?>
                <?php echo $form->error($model, 'CLASS_KURS_2');?>
</div>
         <div class="row">
<?php echo $form->labelEx($model, 'UO_PHONE_NUMBER_2');?>
                <?php
    $this->widget('CMaskedTextField', array(
        'model'       => $model,
        'attribute'   => 'UO_PHONE_NUMBER_2',
        'mask'        => '+375-999-999-99-99',
        'placeholder' => '*',
        'completed'   => 'function(){console.log("ok");}',
    ));
    ?>
                <?php echo $form->error($model, 'UO_PHONE_NUMBER_2');?>
</div> -->

    <!--  <div class="row">
<?php echo $form->labelEx($model, 'UO_EMAIL_2');?>
		<?php echo $form->textField($model, 'UO_EMAIL_2', array('size' => 50, 'maxlength' => 50));?>
		<?php echo $form->error($model, 'UO_EMAIL_2');?>
</div> -->
    <div class="row">
        <?php echo $form->labelEx($model, 'SSP_USER_ID_2');?>
        <?php echo $form->textField($model, 'SSP_USER_ID_2', array('size' => 50, 'maxlength' => 50));?>
        <?php echo $form->error($model, 'SSP_USER_ID_2');?>
    </div>

    <!--   <div class="row">
<?php echo $form->labelEx($model, 'EDUCATION_INSTITUTION_2');?>
                <?php echo $form->textField($model, 'EDUCATION_INSTITUTION_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'EDUCATION_INSTITUTION_2');?>
</div>
        <div class="row">
<?php echo $form->labelEx($model, 'ADRESS_EDUCATION_INSTITUTION_2');?>
                <?php echo $form->textField($model, 'ADRESS_EDUCATION_INSTITUTION_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'ADRESS_EDUCATION_INSTITUTION_2');?>
</div> -->
</fieldset>
<!--                                          Трейтий участник                                  -->
<fieldset><legend>СВЕДЕНИЯ О ТРЕТЬЕМ УЧАСТНИКЕ:</legend>
    <div class="row">
        <?php echo $form->labelEx($model, 'FIRST_NAME_3');?>
        <?php echo $form->textField($model, 'FIRST_NAME_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'FIRST_NAME_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'FIRST_NAME_LATINSKIE_3');?>
        <?php echo $form->textField($model, 'FIRST_NAME_LATINSKIE_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'FIRST_NAME_LATINSKIE_3');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'LAST_NAME_3');?>
        <?php echo $form->textField($model, 'LAST_NAME_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'LAST_NAME_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'LAST_NAME_LATINSKIE_3');?>
        <?php echo $form->textField($model, 'LAST_NAME_LATINSKIE_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'LAST_NAME_LATINSKIE_3');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'SUR_NAME_3');?>
        <?php echo $form->textField($model, 'SUR_NAME_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'SUR_NAME_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'SUR_NAME_LATINSKIE_3');?>
        <?php echo $form->textField($model, 'SUR_NAME_LATINSKIE_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'SUR_NAME_LATINSKIE_3');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'SEX_3');?>
        <?php echo $form->radioButtonList($model, 'SEX_3', array('мужской' => 'мужской', 'женский' => 'женский'), array('separator' => '<br>',
            'labelOptions'                                                                      => array('style'                                                                      => 'display: inline')));?>
        <?php echo $form->error($model, 'SEX_3');?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'BIRTH_DATE_3');?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'        => 'Party[BIRTH_DATE_3]',
            'id'          => 'Party_BIRTH_DATE_3',
            'model'       => $model,
            'value'       => $model->BIRTH_DATE_3,
            'language'    => 'ru',
            'options'     => array(
                'showAnim'   => 'fold',
                'dateFormat' => 'dd.mm.yy',
                //'showOn'=>'button',
                //'buttonImageOnly'=>true,
                'changeMonth' => true,
                'changeYear'  => true,
                'yearRange'   => '1960:2020',
                //'Year' => '1966',
                //'showButtonPanel'=>true,
                'showOtherMonths' => true,
            ),
            'htmlOptions' => array(
                'style'      => 'height:20px;',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'BIRTH_DATE_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'COUNTRY_RESIDENCE_3');?>
        <?php echo $form->textField($model, 'COUNTRY_RESIDENCE_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'COUNTRY_RESIDENCE_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'DISTRICT_RESIDENCE_ID_3');?>
        <?php echo $form->dropDownList($model, 'DISTRICT_RESIDENCE_ID_3', CHtml::listData(Region::model()->findAll(), 'REGION_ID', 'REGION'));?>
        <?php echo $form->error($model, 'DISTRICT_RESIDENCE_ID_3');?>
    </div>
    <div id="dop_DISTRICT_RESIDENCE_ID_3" style="background-color: #CAE1FF;">
        <?php echo $form->labelEx($model, 'DOP_DISTRICT_RESIDENCE_ID_3');?>
        <?php echo $form->textField($model, 'DOP_DISTRICT_RESIDENCE_ID_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'DOP_DISTRICT_RESIDENCE_ID_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'VICINITY_RESIDENCE_ID_3');?>
        <?php echo $form->dropDownList($model, 'VICINITY_RESIDENCE_ID_3', CHtml::listData(District::model()->findAll(), 'DISTRICT_ID', 'DISTRICT'));?>
        <?php echo $form->error($model, 'VICINITY_RESIDENCE_ID_3');?>
    </div>
    <div id="dop_VICINITY_RESIDENCE_ID_3" style="background-color: #CAE1FF;">
        <?php echo $form->labelEx($model, 'DOP_VICINITY_RESIDENCE_ID_3');?>
        <?php echo $form->textField($model, 'DOP_VICINITY_RESIDENCE_ID_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'DOP_VICINITY_RESIDENCE_ID_3');?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'CITY_RESIDENCE_3');?>
        <?php echo $form->textField($model, 'CITY_RESIDENCE_3', array('size' => 60, 'maxlength' => 150));?>
        <?php echo $form->error($model, 'CITY_RESIDENCE_3');?>
    </div>
    <!--    <div class="row">
<?php echo $form->labelEx($model, 'HOME_ADRESS_3');?>
		<?php echo $form->textField($model, 'HOME_ADRESS_3', array('size' => 60, 'maxlength' => 150));?>
		<?php echo $form->error($model, 'HOME_ADRESS_3');?>
</div>
        <div class="row">
<?php echo $form->labelEx($model, 'CLASS_KURS_3');?>
                <?php echo $form->textField($model, 'CLASS_KURS_3', array('size' => 50, 'maxlength' => 50));?>
                <?php echo $form->error($model, 'CLASS_KURS_3');?>
</div>
         <div class="row">
<?php echo $form->labelEx($model, 'UO_PHONE_NUMBER_3');?>
                <?php
    $this->widget('CMaskedTextField', array(
        'model'       => $model,
        'attribute'   => 'UO_PHONE_NUMBER_3',
        'mask'        => '+375-999-999-99-99',
        'placeholder' => '*',
        'completed'   => 'function(){console.log("ok");}',
    ));
    ?>
                <?php echo $form->error($model, 'UO_PHONE_NUMBER_3');?>
</div>
        <div class="row">
<?php echo $form->labelEx($model, 'UO_EMAIL_3');?>
		<?php echo $form->textField($model, 'UO_EMAIL_3', array('size' => 50, 'maxlength' => 50));?>
		<?php echo $form->error($model, 'UO_EMAIL_3');?>
</div> -->
    <div class="row">
        <?php echo $form->labelEx($model, 'SSP_USER_ID_3');?>
        <?php echo $form->textField($model, 'SSP_USER_ID_3', array('size' => 50, 'maxlength' => 50));?>
        <?php echo $form->error($model, 'SSP_USER_ID_3');?>
    </div>
    <!-- <div class="row">
<?php echo $form->labelEx($model, 'EDUCATION_INSTITUTION_3');?>
                <?php echo $form->textField($model, 'EDUCATION_INSTITUTION_3', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'EDUCATION_INSTITUTION_3');?>
</div>
        <div class="row">
<?php echo $form->labelEx($model, 'ADRESS_EDUCATION_INSTITUTION_3');?>
                <?php echo $form->textField($model, 'ADRESS_EDUCATION_INSTITUTION_3', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'ADRESS_EDUCATION_INSTITUTION_3');?>
</div> -->
</fieldset>
</div>
<div>
    <fieldset>
        <legend>СВЕДЕНИЯ О НАУЧНОМ РУКОВОДИТЕЛЕ РАБОТЫ:</legend>
        <div class="row">
            <?php echo $form->labelEx($model, 'HFIRST_NAME_1');?>
            <?php echo $form->textField($model, 'HFIRST_NAME_1', array('size' => 60, 'maxlength' => 150));?>
            <?php echo $form->error($model, 'HFIRST_NAME_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'HLAST_NAME_1');?>
            <?php echo $form->textField($model, 'HLAST_NAME_1', array('size' => 60, 'maxlength' => 150));?>
            <?php echo $form->error($model, 'HLAST_NAME_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'HSUR_NAME_1');?>
            <?php echo $form->textField($model, 'HSUR_NAME_1', array('size' => 60, 'maxlength' => 150));?>
            <?php echo $form->error($model, 'HSUR_NAME_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'WORKING_PLACE_1');?>
            <?php echo $form->textField($model, 'WORKING_PLACE_1', array('size' => 60, 'maxlength' => 300));?>
            <?php echo $form->error($model, 'WORKING_PLACE_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'POSITION_1');?>
            <?php echo $form->textField($model, 'POSITION_1', array('size' => 60, 'maxlength' => 150));?>
            <?php echo $form->error($model, 'POSITION_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'ACADEMIC_DEGREE_1');?>
            <?php echo $form->textField($model, 'ACADEMIC_DEGREE_1', array('size' => 60, 'maxlength' => 100));?>
            <?php echo $form->error($model, 'ACADEMIC_DEGREE_1');?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'HCONTACT_PHONE_1');?>
            <?php
            $this->widget('CMaskedTextField', array(
                'model'       => $model,
                'attribute'   => 'HCONTACT_PHONE_1',
                'mask'        => '+8-999-999-99-99',
                'placeholder' => '*',
                'completed'   => 'function(){console.log("ok");}',
            ));
            ?>
            <?php echo $form->error($model, 'HCONTACT_PHONE_1');?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'HCONTACT_EMAIL_1');?>
            <?php echo $form->textField($model, 'HCONTACT_EMAIL_1', array('size' => 60, 'maxlength' => 100));?>
            <?php echo $form->error($model, 'HCONTACT_EMAIL_1');?>
        </div>

        <?php echo CHtml::link('Второй научный руководитель', '#', array('class' => 'dop-ruk-button'));?><br/><br/>

        <div class="dop-ruk" style="display:none;background-color: #CAE1FF;">
            <h4>СВЕДЕНИЯ О ВТОРОМ НАУЧНОМ РУКОВОДИТЕЛЕ ПРОЕКТА:</h4>

            <div class="row">
                <?php echo $form->labelEx($model, 'HFIRST_NAME_2');?>
                <?php echo $form->textField($model, 'HFIRST_NAME_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'HFIRST_NAME_2');?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'HLAST_NAME_2');?>
                <?php echo $form->textField($model, 'HLAST_NAME_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'HLAST_NAME_2');?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'HSUR_NAME_2');?>
                <?php echo $form->textField($model, 'HSUR_NAME_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'HSUR_NAME_2');?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'WORKING_PLACE_2');?>
                <?php echo $form->textField($model, 'WORKING_PLACE_2', array('size' => 60, 'maxlength' => 300));?>
                <?php echo $form->error($model, 'WORKING_PLACE_2');?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'POSITION_2');?>
                <?php echo $form->textField($model, 'POSITION_2', array('size' => 60, 'maxlength' => 150));?>
                <?php echo $form->error($model, 'POSITION_2');?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'ACADEMIC_DEGREE_2');?>
                <?php echo $form->textField($model, 'ACADEMIC_DEGREE_2', array('size' => 60, 'maxlength' => 100));?>
                <?php echo $form->error($model, 'ACADEMIC_DEGREE_2');?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'HCONTACT_PHONE_2');?>
                <?php
                $this->widget('CMaskedTextField', array(
                    'model'       => $model,
                    'attribute'   => 'HCONTACT_PHONE_2',
                    'mask'        => '+375-999-999-99-99',
                    'placeholder' => '*',
                    'completed'   => 'function(){console.log("ok");}',
                ));
                ?>
                <?php echo $form->error($model, 'HCONTACT_PHONE_2');?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'HCONTACT_EMAIL_2');?>
                <?php echo $form->textField($model, 'HCONTACT_EMAIL_2', array('size' => 60, 'maxlength' => 100));?>
                <?php echo $form->error($model, 'HCONTACT_EMAIL_2');?>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <p><b>Опишите проект в 3-4 предложениях.</b> Этот текст будет использован для первичного ознакомления с работой, а также будет приведен в сборниках и материалах конкурса.<br/>Он должен быть четким, давать хорошее представление о Вашей работе, и, одновременно, интересным и понятным для неспециалиста.</p>
        <?php echo $form->labelEx($model, 'DESCRIPTION_PROJECT');?>
        <?php echo $form->textArea($model, 'DESCRIPTION_PROJECT', array('style' => "maxlength : 250; width: 100%;"));
        ?>
        <?php echo $form->error($model, 'DESCRIPTION_PROJECT');?>
    </div>
    <fieldset>
        <legend>МАТЕРИАЛЫ:</legend>
        <fieldset><legend>Файлы</legend>

            <p>Файл <u>Тезисы работы</u> должен быть в форматах <b>doc</b> или <b>docx</b>, не более 6000 символов.
            <div class="row">
                <?php if ($model->FILE_NAME_DOC) {
                    echo "<b>Загружен файл: </b>".CHtml::encode($model->FILE_NAME_DOC);
                }
                echo $form->labelEx($model, 'FILE_NAME_DOC');
                echo $form->fileField($model, 'FILE_NAME_DOC', array('size' => 60, 'maxlength' => 200, ));
                echo $form->error($model, 'FILE_NAME_DOC');

                ?>
            </div>
            </p>
            <p>Файл <u>работы</u> может быть архив в формате <b>zip</b> или <b>rar</b> не более 1MБ.
            <div class="row">
                <?php echo $form->labelEx($model, 'FILE_NAME_OTHER_SOURCE');?>
                <?php echo $form->fileField($model, 'FILE_NAME_OTHER_SOURCE', array('size' => 60, 'maxlength' => 200));?>
                <?php echo $form->error($model, 'FILE_NAME_OTHER_SOURCE');?>
            </div>
            </p>
            <div class="row rememberMe">
                <?php echo $form->labelEx($model, 'SOCKET');?>
                <?php echo $form->checkBox($model, 'SOCKET', array('value' => 'ДА'));?>
                <?php echo $form->error($model, 'SOCKET');?>
            </div>
        </fieldset>
        <?php
        if ($model->isNewRecord) {
            $dt = date("Y-m-d H:i:s", time());
            echo $form->hiddenField($model, 'CREATE_DATE_TIME', array('value' => "$dt"));
        }
        ?>
        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord?'Создать':'Сохранить');?>
        </div>

        <?php $this->endWidget();?>
    </fieldset>
</div><!-- form -->
