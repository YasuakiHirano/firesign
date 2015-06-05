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

        // view に表示する値を渡す
        $this->viewData= array('hello' => 'Hello, FireSign Page!!', 
                            'title' => 'FireSign');

        // top view表示
        $this->showView('topView');
    }

}
