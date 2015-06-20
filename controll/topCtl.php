<?php
/**
 * @brief   TOPページを表示するコントロールクラス
 * @author  Y.Hirano@CodeLike
 */
class topCtl extends fireSignCtl
{
    public $topMdl;
    function mainAct()  
    {
        $topMdl = new topMdl();

        // DB値取得
        $ret = $topMdl->getUsers();
        $arr = pg_fetch_all($ret);

        // view に表示する値を渡す
        $this->viewData= array('hello' => 'Hello, FireSign Page!!', 
                            'title' => 'FireSign');

        // top view表示
        $this->showView('topView');
    }

}
