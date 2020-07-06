<?php

include "../com/mysqloperate.php";

$content = '';
if (!empty($_POST['content'])) {
    if (get_magic_quotes_gpc()) {
        $content = stripslashes($_POST['content']);
    } else {
        $content = $_POST['content'];
    }
}

if(!empty($_GET['id'])) {
    $res = MySqlOperate::getInstance()->field('t_id,t_title,t_type,t_selected,t_content')
        ->where('t_id='.$_GET['id'])
        ->select('T_AWARD_GRADE');
}

if(!empty($_POST['id'])) {

    $data = array(
        't_title' => $_POST['title'],
        't_type' => $_POST['type'],
        't_selected' => $_POST['selected'],
        't_content' => $content
    );

    $state =  MySqlOperate::getInstance()->where(array('t_id' => $_POST['id']))->update('T_AWARD_GRADE', $data);

    if($state != 0) {
        echo "存储成功";
        header("Location: award_grade.php");
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
                        <h3>更改奖项等级</h3>
                    </div>
                </div>
                <hr>

                <div class="row-fluid">
                    <div class="span12">

                        <form action="award_grade_update.php" method="post">
                            <input name="id" value="<?php echo $res[0]['t_id']; ?>" type="hidden">

                            <div class="field-box">
                                标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：&nbsp;&nbsp;&nbsp;
                                <input class="span8" type="text" name="title" value="<?php echo $res[0]['t_title']; ?>" />
                            </div>
                            <br />

                            <div class="field-box">
                                奖项类型：&nbsp;&nbsp;&nbsp;
                                <select name="type" style="height: 30px;">
                                    <option value = "1" <?php if($res[0]['t_type'] == 1) {?>selected = "selected" <?php } ?>>成果竞赛--等级奖</option>
                                    <option value = "2" <?php if($res[0]['t_type'] == 2) {?>selected = "selected" <?php } ?>>创意大赛--等级奖</option>
                                </select>
                            </div>
                            <br />

                            <div class="field-box">
                                是否选中：&nbsp;&nbsp;&nbsp;
                                <select name="selected" style="height: 30px;">
                                    <option value = "1" <?php if($res[0]['t_selected'] == 1) {?>selected = "selected" <?php } ?>>选中</option>
                                    <option value = "2" <?php if($res[0]['t_selected'] == 2) {?>selected = "selected" <?php } ?>>未选中</option>
                                </select>
                            </div>
                            <br />
                            等级简介：&nbsp;&nbsp;&nbsp;
                            <input type="button" value="读取数据" class="btn-glow primary " onclick="readContent();" />
                            <br><br>
                            <input id="content" name="content" type="hidden" value="<?php echo htmlspecialchars($res[0]['t_content']); ?>" >
                            <script id="editor" type="text/plain" style="width:1024px; height:500px;"></script>

                            <br />
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