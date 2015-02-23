<div id="breadcumb">
	<a href="<?php echo Yii::app()->createUrl('appUser/index'); ?>"> <span class="icon_home"> Home </span> </a> 
    <small>></small> 
    <a href="<?php echo Yii::app()->createUrl('masterDataShooter/index'); ?>">Master Data Shooter</a> 
    <small>></small>
    <a href="#">Summary</a>
</div>

<?php
/* @var $this MasterDataShooterController */
?>

<div id="wrapped_content">
    <h1>Summary</h1>
    
    <table>
        <tr>
            <td style="width: 100px;">Data Model</td>
            <td><b><?php echo isset($dataModel) ? $dataModel : ""; ?></b></td>
        </tr>
        <tr>
            <td>Total data</td>
            <td><?php echo isset($dataTotal) ? $dataTotal : ""; ?></td>
        </tr>
        <tr>
            <td>File name</td>
            <td><?php echo isset($fileName) ? $fileName : ""; ?></td>
        </tr>
        <tr>
            <td>Last modified time</td>
            <td><?php echo isset($lastModifiedBy) ? $lastModifiedBy : ""; ?></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><?php echo isset($author) ? $author : ""; ?></td>
        </tr>
        <tr>
            <td>First 10 data</td>
            <td>-</td>
        </tr>
        <tr>
            <td>
                <br/></br>
                <?php echo CHtml::submitButton('Start shoot data', array(
                    'name' => 'osx', 'class' => 'osx demo')
                    ); ?>
            </td>
            <td></td>
        </tr>
    </table>
    
		<!-- modal content -->
		<div id="osx-modal-content">
			<div id="osx-modal-title">OSX Style Modal Dialog</div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
				<h2>Hello! I'm SimpleModal!</h2>
				<p>SimpleModal is a lightweight jQuery Plugin which provides a powerful interface for modal dialog development. Think of it as a modal dialog framework.</p>
				<p>SimpleModal gives you the flexibility to build whatever you can envision, while shielding you from related cross-browser issues inherent with UI development..</p>
				<p>As you can see by this example, SimpleModal can be easily configured to behave like an OSX dialog. With a handful options, 2 custom callbacks and some styling, you have a visually appealing dialog that is ready to use!</p>
				<p><button class="simplemodal-close">Close</button> <span>(or press ESC or click the overlay)</span></p>
			</div>
		</div>
</div>