<?php

class TestController extends Controller
{
    public function actionDb()
    {
        /*
        $con = Yii::app()->db;
        echo $con->active . "<br/>";
        echo $con->serverInfo . "<br/>";
        */
        
        //echo gettype($con);
        //var_dump($con);
        //die();
        //print_r($con);
        
        // create a new connection
        /*
        $dsn = "mysql:host=localhost;dbname=dl";
        $user = "root";
        $pwd = "";
        
        $con2 = new CDbConnection($dsn, $user, $pwd);
        echo $con2->setActive(true) . "<br/>";
                
        echo $con2->active . "<br/>";
        die();
        */
        
        /*
        // query
        $conn = Yii::app()->db;
        
        $query = "SELECT * FROM user";
        
        $cmd = $conn->createCommand($query);
        $data = $cmd->query();
        
        
        foreach($data as $d)
        {
            echo $d['name'] . "<br/>";
        }
        
        // transaction
        /*
        $tr = $conn->beginTransaction();
        $q1 = "INSERT INTO user (name) values (':valName')";
        
        try
        {
            $conn->createCommand($q1)->execute();
            $conn->createCommand($q1)->execute();
            $conn->createCommand($q1)->execute();
            $tr->commit();
        }
        catch(Exception $e)
        {
            $tr->rollback();
            print_r($e);
        }
        
        die();
         * *
         */
        
         // transaction bind param
        /*
        $tr = $conn->beginTransaction();
        $q1 = "INSERT INTO user (name) values (:valName)";
        $cmd = $conn->createCommand($q1);
        
        
        $name = "anjar";
        try
        {
            $cmd->bindParam(":valName", $name, PDO::PARAM_STR);
            $cmd->execute();
            
            $cmd->bindParam(":valName", $name, PDO::PARAM_STR);
            $cmd->execute();
            
            $cmd->bindParam(":valName", $name, PDO::PARAM_STR);
            $cmd->execute();
            
            $cmd->bindParam(":valName", $name, PDO::PARAM_STR);
            $cmd->execute();
            
            $cmd->execute();
            $tr->commit();
        }
        catch(Exception $e)
        {
            $tr->rollback();
            print_r($e);
        }
        
        */
        
        // query builder
        /*
        $qcmd = Yii::app()->db->createCommand();
        
        $qcmd->select('p.*');
        $qcmd->from('(select * from user) as p');
        
        $rdr = $qcmd->query();
        
        foreach($rdr as $d)
        {
            print_r($d);
        }
         * 
         * *
         */
        
        // active record
        
//        $user = new User();
//        $user->name  = "NOW()";
//        echo $user->isNewRecord;
//          
//        $user1 = User::model()->findByPk(234);
//        echo $user1->name;
//        
//        
//        $arrUser = User::model()->findAll();
//        
//        foreach($arrUser as  $d)
//        {
//            echo $d->name . "<br/>";
//        }
//        
//        echo count($arrUser);
//        echo $arrUser[0]->name;
//        
//        
//        $user2 = User::model()->findAll("name=:pName", array(":pName" => "aqua"));
//        echo count($user2);
        
        
        //die();
        /*
        try
        {
            $id = $user->save();
        }
        catch(Exception $e)
        {
            
        }
         * 
         */
//        
//        // criteria
//        $criteria = new CDbCriteria();
//        //$criteria->select = "t.name, ul.name";
//        //$criteria->condition = "name=:mId";
//        //$criteria->params = array(":mId" => "aqua");
//       // $criteria->compare("user_level_id", ">= 2");
//        $criteria->compare("name", "anjar");
//       // $criteria->order = "id asc";
//        //$criteria->limit = 10;
//        //$criteria->join = "LEFT JOIN user_level as ul ON ul.id = t.user_level_id";
//        
//        $arrIn = array(234, 237);
//        $criteria->addNotInCondition("id", $arrIn, 'OR');
//        $user = User::model()->findAll($criteria);
//        
//        echo $user[0]->name ."<br/>";
//        echo count($user);
//        //die();
//        
////        $sql = "SELECT * FROM User Where id = '234'";
////        $user = User::model()->findAllBySql($sql);
////        
////        echo count($user);
//        //die();
        
        $user = User::model()->with(array('userLevel', 'createdBy'))->findByPk(234);
        echo $user->userLevel->name;
        
        $this->render("index", array());
    }
    
    public function actionGetExcel()
    {
        Yii::import('ext.phpExcel.PHPExcel');
        
        $objPHPExcel = new PHPExcel();
    
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Hello')
        ->setCellValue('B2', 'world!')
        ->setCellValue('C1', 'Hello')
        ->setCellValue('D2', 'world!');

        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A4', 'Miscellaneous glyphs')
        ->setCellValue('A5', 'eaeuaeioueiuyaouc');

        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="test.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}