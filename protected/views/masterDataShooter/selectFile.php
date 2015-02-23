<div id="breadcumb">
	<a href="<?php echo Yii::app()->createUrl('appUser/index'); ?>"> <span class="icon_home"> Home </span> </a> 
    <small>></small> 
    <a href="">Master Data Shooter</a> 
</div>


<?php
/* @var $this MasterDataShooterController */
?>


<div id="wrapped_content">
    <h1>Select An Excel File</h1>
    
        <?php
        foreach(Yii::app()->user->getFlashes() as $key => $message) 
        {
            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
        }
    ?>
    
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'selectfile-form',
            'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data')));
    ?>
    
    <div class="form">
         <?php echo $form->errorSummary($model); ?>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'excelFile'); ?>
            <?php echo $form->fileField($model,'excelFile'); ?>
            <?php echo $form->error($model, 'excelFile'); ?>
        </div>
        <div id="row">
            <?php echo CHtml::submitButton('Upload'); ?>
        </div>
    </div>
    
    <?php $this->endWidget(); ?>
</div>