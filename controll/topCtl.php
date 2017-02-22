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

        if(DB_USE == "1") {
            //DBを使う場合にmodelをnewする
            $topMdl = new topMdl();

            // DB値取得
            $ret = $topMdl->getUsers();
            $arr = pg_fetch_all($ret);

            // view に表示する値を渡す
            $this->viewData= array('hello' => 'Hello, FireSign Page!!', 
                                'title' => 'FireSign',
                                'users' => $arr);
        } else {

            $this->viewData= array('hello' => 'Hello, FireSign Page!!', 
                                'title' => 'FireSign');
        }

        // top view表示
        $this->showView('topView');
    }

}
