<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link media="all" rel="stylesheet" href="<?php echo CSS_DIR; ?>main.css" type="text/css" />
        <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-2.0.3.js"></script>
        <script type="text/javascript" src="<?php echo JS_DIR; ?>common.js"></script>

        <link media="all" rel="stylesheet" href="<?php echo CSS_DIR; ?>styles/solarized_dark.css" type="text/css" />
        <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.2/highlight.min.js"></script>
        <title><?php echo $title?></title>
        <script>
            $(document).ready(function() {
            $('pre').each(function(i, block) {
            hljs.highlightBlock(block);
            });
            });
        </script>

        <script type="text/javascript" src="<?php echo JS_DIR; ?>languages/php.js"></script>
    </head>
    <body>
    <div id="page_main">
        <div style="width:100%;float:left;margin-top:10px;">
            <?php echo $hello?>
            <div>
                FireSignはphpフレームワークです。<br />
                軽量で使いやすい、簡単に目的のサイトが構築できるフレームワークを目指します！<br />
                <ul>
                    <li><a href="#makesite">・firesignで新規にサイトを作る</a></li>
                    <li>・コントローラについて</li>
                    <li>・モデルについて</li>
                    <li>・ライブラリについて</li>
                </ul>
                <div id="makesite">firesignで新規にサイトを作る</div>
                本体をまず、ドキュメントルートなどに設置します。
                config.phpを編集して、最初に表示するページの名前を決定します。
                下記のように編集します。

                <div class="file_name">config.php</a>

<pre><code class="php hljs">&lt;?php define(NO_LOGIN_ROOT, "top"); // 「top」をルートにする設定
</code></pre>
                合わせて下記のように、コントロール・モデルクラスファイルを作ります。
                <div class="file_name">topCtl.php</a>
<pre><code class="php hljs">&lt;?php
class topCtl extends fireSignCtl
{
    public $topMdl;
    function mainAct()  
    {
        $topMdl = new topMdl();

        // view に表示する値を渡す
        $this-&gt;viewData = array('hello' =&gt; 'Hello, FireSign Page!!');

        // top view表示
        $this-&gt;showView('topView');
    }

}
</code></pre>
                モデルファイルは下記のようにして作ります、モデル（DB等）にアクセスしない場合は
                <div class="file_name">topModel.php</a>
<pre><code class="php hljs">&lt;?php
class topMdl extends fireSignMdl
{
    function getContents($min,$max)
    {
       $sql = "select * from tablename order by create_time desc limit ".$min.",".$max;
       $ret = $this-&gt;db-&gt;_selectQuery($sql);
       return $ret;
    }

    function getTagContents($tag_text,$min,$max)
    {
       $sql = "select * from tablename where tag_text like '%".$tag_text."%' order by create_time desc limit ".$min.",".$max;
       $ret = $this-&gt;db-&gt;_selectQuery($sql);
       return $ret;
    }

    function getContnentOne($id)
    {
       $sql = "select * from tablename where id = ".$id;
       $ret = $this-&gt;db-&gt;_selectQuery($sql);
       return $ret;
    }
}
</code></pre>
                下記のようにfunctionを実装せずにファイルのみ用意します。
                <div class="file_name">topModel.php</a>
<pre><code class="php hljs">&lt;?php
class topMdl extends fireSignMdl
{
}
</code></pre>
                最後にビューを作ります。phpファイルなので、好きなようにタグが使えます。<br />
                基本的にはコントローラで渡した値を表示するだけにしましょう。
                <div class="file_name">topView.php</a>
<pre><code class="html hljs">
&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
    &lt;head&gt;test&lt;/head&gt;
    &lt;body&gt;
        &lt;?php echo $hello; ?&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

            </div>
        </div>
    </div>
    </body>
</html>
