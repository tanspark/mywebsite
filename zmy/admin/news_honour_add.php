<?php

include "com/mysqloperate.php";

$content = '';
if (!empty($_POST['content'])) {
    if (get_magic_quotes_gpc()) {
        $content = stripslashes($_POST['content']);
    } else {
        $content = $_POST['content'];
    }
}

if(!empty($_POST['title']) && $_POST['content']) {

    if ($_FILES["file"]["size"] < 2000000) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $fileType = substr($_FILES["file"]["name"], strpos($_FILES["file"]["name"], '.'));
            $filePath = "upload/" . date('Y_m_d_H_i_s') . $fileType;
            move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
        }
    }

    $data = array(
        't_title' => $_POST['title'],
        't_year' => $_POST['year'],
        't_content' => $content,
        't_file_name' => $_FILES['file']['name'],
        't_file_path' => 'admin/'.$filePath
    );
    $state =  MySqlOperate::getInstance()->insert('T_NEWS_HONOUR', $data);

    if($state) {
        echo "存储成功";
        header("Location: news_honour.php");
    } else {
        echo "存储失败";
    }
}

?>

<?php include "_head.php";?>

<body>

    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div class="container-fluid">
            <div id="pad-wrapper">
                 <div class="row-fluid head">
                    <div class="span12">
                        <h3>新增荣誉</h3>
                    </div>
                 </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="news_honour_add.php" method="post" enctype="multipart/form-data">
                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" />
                            </div>
                            <br>

                            <div class="field-box">
                                时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="year" />
                            </div>
                            <br>

                            <div class="field-box">
                                上传图片：&nbsp;&nbsp;&nbsp;
                                <input type="file" name="file" id="file" accept=".png,.gif,.jpg,.jpeg"/>
                            </div>
                            <br>

                            简&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;介：&nbsp;&nbsp;&nbsp;
                            <input id="content" name="content" type="hidden"  >
                            <script id="editor" type="text/plain" style="width:1024px; height:500px;"></script>
                            <br>

                            <input type="button" value="填充数据" class="btn-glow primary " onclick="onWriteForm();" />

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="button" class="btn-glow primary " value="提交内容" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

</body>
</html>