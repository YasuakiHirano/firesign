<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link media="all" rel="stylesheet" href="<?php echo CSS_DIR; ?>main.css" type="text/css" />
        <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-2.0.3.js"></script>
        <script type="text/javascript" src="<?php echo JS_DIR; ?>common.js"></script>

        <link media="all" rel="stylesheet" href="<?php echo CSS_DIR; ?>styles/solarized_dark.css" type="text/css" />
        <link media="all" rel="stylesheet" href="./common/bootstrap/css/bootstrap.min.css" type="text/css" />
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
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#"><?php echo $title;?></a>
            <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </div>
    <div id="page_main">
        <?php echo $hello?>
        FireSignはphpフレームワークです。<br />
        軽量で使いやすい、簡単に目的のサイトが構築できるフレームワークを目指します！<br />
        <ul>
            <li><a href="#makesite">firesignで新規にサイトを作る</a></li>
            <li><a href="#mvc">mvcについて</a></li>
            <li><a href="#controller">コントローラについて</a></li>
            <li><a href="#model">モデルについて</a></li>
            <li><a href="#library">ライブラリについて</a></li>
        </ul>

        <div class="one_discript">
        <div id="makesite"><i class="icon-hand-right"></i>firesignで新規にサイトを作る</div>
        本体をまず、ドキュメントルートなどに設置します。
        config.phpを下記のように編集します。

        <div class="file_name">config.php</div>

        <pre><code class="php">&lt;?php
        define("SYSTEM_ROOT","/var/html/www/tools.codelike.info/firesign"); // 本体設置ディレクトリ
        define("SITE_URL","http://tools.codelike.info/firesign/"); // トップのURL
        define(NO_LOGIN_ROOT, "top"); // 「top」ページをルートにする設定(コントローラ・モデル名に紐付きます）
        </code></pre>

        合わせて下記のように、コントロール・モデルクラスファイルを作ります。
        <div class="file_name">topCtl.php</div>
<pre><code class="php hljs">&lt;?php
class topCtl extends fireSignCtl
{
    public $topMdl;
    function mainAct()  
    {
        $topMdl = new topMdl();

        // view に表示する値を渡す
        $this-&gt;viewData = array('hello' =&gt; 'Hello, FireSign Page!!');
        // DB値取得
        $ret = $topMdl-&gt;getUsers();
        $arr = pg_fetch_all($ret);

        // view に表示する値を渡す
        $this-&gt;viewData= array('hello' =&gt; 'Hello, FireSign Page!!', 
                            'title' =&gt; 'FireSign',
                            'users' =&gt; $arr);



        // top view表示
        $this-&gt;showView('topView');
    }

}
</code></pre>
        モデルファイルは下記のようにして作ります、モデル（DB等）にアクセスしない場合は
        <div class="file_name">topModel.php</div>
<pre><code class="php hljs">&lt;?php
class topMdl extends fireSignMdl
{    function getUsers(){
       $ret = $this-&gt;db-&gt;selectQuery("users");
       return $ret;
    }
}
</code></pre>
        下記のようにfunctionを実装せずにファイルのみ用意します。
        <div class="file_name">topModel.php</div>
<pre><code class="php hljs">&lt;?php
class topMdl extends fireSignMdl
{
}
</code></pre>
        最後にビューを作ります。phpファイルなので、好きなようにタグが使えます。<br />
        基本的にはコントローラで渡した値を表示するだけにしましょう。
        <div class="file_name">topView.php</div>
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

        <div class="one_discript">
        <div id="mvc"><i class="icon-hand-right"></i>MVCモデル</div>
        MVCはモデル・ビュー・コントローラにわけて、ものを作ろうという考え方です。<br />
        詳しくはgoogle先生まで。<br />

        firesignではcontrollerディレクトリにコントローラを、modelディレクトリにモデルを<br />
        viewディレクトリにビューを配置して、それぞれデータのやり取りをしてページを構成します。<br />

        link:<a href="http://ja.wikipedia.org/wiki/Model_View_Controller" target="_blank">MVC wiki</a><br /><br />
        </div>

        <div class="one_discript">
        <div id="controller"><i class="icon-hand-right"></i>コントローラについて</div>
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
コントローラのソースが上記になります。controllerディレクトリに配置します。<br />
クラス名のCtlは固定です。configを変更することで、かえることができます。<br />
extendsしてるのがコントローラの親クラスになります。基本的な機能を入れてます。<br />
coreディレクトリのなかにおいてます。<br />
コントローラでは色々なデータを加工したりして、viewに渡します。<br />
$this-&gt;viewDataに配列で追加することによって、viewで使用できます。ここではhelloのキーで渡しているためviewでは$helloで使うことになります。<br />
$this-&gt;showViewでビューを表示します。その時にviewDataに格納したデータをビューに渡します。
        </div>
        <div id="model"><i class="icon-hand-right"></i>モデルについて</div>
<pre><code class="php hljs">&lt;?php
class topMdl extends fireSignMdl
{
    function getUsers(){
       $ret = $this-&gt;db-&gt;selectQuery("users");
       return $ret;
    }
}
</code></pre>
モデルのソースが上記になります。modelディレクトリに配置します。<br />
クラス名のMdlは固定です。configを変更することで、かえることができます。<br />
controllerと同様にextendsし、主処理をcoreディレクトリにいれてます。<br />
モデルはDBからデータを取得したりするのに使います。コントローラから呼び出して、データ取得します。<br />
上記はusersテーブルからすべてのデータを取得する例です。
        <div id="library"><i class="icon-hand-right"></i>ライブラリについて</div>
ライブラリはlibディレクトリに配置しています。<br />
下記のようにconfig.phpに記載してインクルードしておきます。<br />
<pre><code class="php hljs">
require_once('./utils/pgsql.class.php');
require_once('./utils/logger.php');
</code></pre>
コントローラでクラスをnewして使います。
    </div>

    </body>
</html>
