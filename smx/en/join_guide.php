<?php
$page_id = 3;
$page_base_name = "Join";
$page_name = "Entry Guide";
$page_link = "";
$page_sub_name = "";


include "com/mysqloperate.php";

$res = MySqlOperate::getInstance()->field('t_id,t_title,t_content,t_time')
    ->order('t_time desc')
    ->where('t_selected=1')
    ->select('T_GUIDE');

?>

<?php include "_head.php"; ?>

<?php include "_header.php"; ?>

    <!-- ==================== 导航栏 ==================== -->
    <section class="padding-room"> </section>

<?php include "_start.php"; ?>

<?php include "_nav.php"; ?>

    <!-- ==================== blog-section start ==================== -->
    <section id="blog-section" class="intro-section w100dt mb-10">
        <div class="container">
            <div class="row">
                <div class="col s9 m9 l3">
                    <div class="mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content w100dt">
                                <div id="adminMenus" class="mod">
                                    <ul>
                                        <strong>Join</strong>
                                        <li><a href="join_institution.php?type=1">Organization</a></li>
                                        <li><a href="join_guide.php">Entry Guide</a></li>
                                        <li><a href="join_award_grade.php?type=1">Award Settings</a></li>
                                        <li><a href="join_consult.php">Consultation and Answer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s9 m9 l9">
                    <div class="blogs mb-30">
                        <div class="card">
                            <!-- /.card-image -->
                            <div class="card-content">
                                <ul>
                                    <li class="p_news_title">
                                        <span class="title-left"><?php if(!empty($res)) echo $res[0]['t_title'] ?></span>
                                    </li>
                                </ul>

                                <div class="text-content">
                                    <?php if(!empty($res)) echo $res[0]['t_content'] ?>
                                </div>

                            </div>
                            <!-- /.card-content -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blogs -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- /#blog-section -->
    <!-- ==================== blog-section end ==================== -->

<?php
include "_footer.php";
?>