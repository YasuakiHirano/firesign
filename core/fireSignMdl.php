<?php
/**
 * @brief   Coreモデルクラス
 * @author  Y.Hirano@CodeLike
 */
class fireSignMdl
{
    public $db;

    function fireSignMdl()
    {
        if(DB_USE == "1"){

            if(DB_NAME == "Postgresql"){

                $this->db = new PostgreSQL(HOST_NAME, USER_NAME, PASSWORD, DATABASE);
                $this->db->connect();
            
            } else if(DB_NAME == "MySql"){
            /*--
                $this->db = new DBMysql();
                $ret = $this->db->_includeConnectInfo();
                $ret = $this->db->_Connect();
                if(!$ret)
                {
                    echo "データベース読み込みエラー"; 
                    die;
                }
             --*/
            }
         }
    }
}
