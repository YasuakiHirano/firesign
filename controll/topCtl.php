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

		$data = "<ul>";
		for($i = 0; $i <= 10; $i++){
			$data .= "<li>data list is {$i} </li>";	
		}
		$data .= "</ul>";

		// view に表示する値を渡す
		$this->viewData= array('hello' => 'Hello, FireSign Page!!',
								'data_list' => $data);

		// top view表示
		$this->showView('topView');
    }

}
