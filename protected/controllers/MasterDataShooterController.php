<?php

class MasterDataShooterController extends CoreController
{
    public $moduleName = 'Master Data Shooter';
    
    public function actionIndex()
    {
        $model = new FormSelectFileMasterDataShooter();
        
        if(isset($_POST['FormSelectFileMasterDataShooter']))
        {
            $model->attributes = $_POST['FormSelectFileMasterDataShooter'];
            $file = CUploadedFile::getInstance($model, 'excelFile');
            
            if($model->validate())
            {
                if($file != null)
                {
                    $fileName = time() . md5($file->name) . $file->name;
                    $filePath = Yii::app()->basePath . '/../files/excels/' . $fileName;
                    $file->saveAs($filePath);
                    
                    //set file name to user state
                    Yii::app()->user->setState('filePath', $filePath);
                    Yii::app()->user->setState('fileName', $file->name);
                    
                    $this->redirect(array('masterDataShooter/summary'));
                }
                else
                {
                    Yii::app()->user->setFlash('error', 'Error occured, try to recheck file and reupload');
                }
            }
            
        }
        
        $this->render('selectFile',array(
            'model' => $model
        ));
    }
    
    public function actionSummary()
    {
        if(!isset(Yii::app()->user->filePath) || !isset(Yii::app()->user->fileName))
        {
            $this->redirect(array('masterDataShooter/index'));
        }
        
        // unregister Yii's autoloader
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        
        Yii::import('ext.phpexcel.PHPExcel', true);
        
        // register Yii's autoloader again
        spl_autoload_register(array('YiiBase', 'autoload'));
        
        $fileName = Yii::app()->user->fileName;
        $filePath = Yii::app()->user->filePath;
        
        $objPhpExcel = PHPExcel_IOFactory::load($filePath); 
        $sheet = $objPhpExcel->getActiveSheet();
        
        $dataModel = "";
        $dataTotal = "";
        $lastModifiedBy = $objPhpExcel->getProperties()->getLastModifiedBy();
        $author =  $objPhpExcel->getProperties()->getCreator();
        
        $this->render('summary',array(
            'fileName' => $fileName,
            'dataModel' => $dataModel,
            'dataTotal' => $dataTotal,
            'lastModifiedBy' => $lastModifiedBy,
            'author' => $author,
        ));
    }
    
    public function actionTemplate()
    {
        $this->render('template', array());
    }
}