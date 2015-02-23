<?php

class FormSelectFileMasterDataShooter extends CFormModel
{
    public $excelFile;
    
    public function rules()
    {
        return array(
            array('excelFile', 'file', 'allowEmpty' => false, 'types' => 'xls, xlsx')
        );
    }

    public function attributeLabels()
    {
        return array(
            'excelFile' => 'Excel file',
        );
    }
}