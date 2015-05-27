<?php
/**
 * @brief   Coreコントロールクラス
 * @author  Y.Hirano@CodeLike
 */
require_once 'fireSignRequest.php';
class fireSignCtl
{
    public $request;
    public $db;
    public $debug;
    public $viewData;

    //コンストラクタ
    function fireSignCoreCtl()
    {
        //$this->debug = new Debug();
        $this->request = new fireSignRequest();
        /*--
         * DB を使わない場合コメントアウト
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

    //ログインしているか判断
    function loginJudge()
    {
        $loginid = '';
        $loginid = $this->request->getSession("login_id");
        if($loginid == '')
        {
            header("Location:index.php"); 
        }
    }

    //viewの表示
    function showView($page)
    {
        extract($this->viewData);
        require_once VIEW_DIR.$page.".php";
    }
}
