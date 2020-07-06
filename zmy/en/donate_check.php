<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php
$page_id = 6;
$page_base_name = "Love Donation";
$page_name = "Donation Query";
$page_link = "";
$page_sub_name = "";
?>

<?php include "admin/com/mysqloperate.php"?>

<?php include "_head.php"; ?>

<body>

<!--top menu-->
<?php include "_top.php"?>

<!--菜单栏-->
<?php include "_header.php"; ?>

<!--页面导航栏-->
<?php include "_nav.php"; ?>

<section id="container">
    <div class="container">
        <div class="row">
            <aside id="sidebar" class="pull-left span2">
                <section>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="donate_person.php">
                                    Donor
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="donate_enterprise.php">
                                    Caring Enterprise
                                </a>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" href="donate_check.php">
                                    Donation Query
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

            <div class="span10">
                <img src="images/bg_payattion.jpg">
            </div>

        </div>
    </div>
</section>

<?php include "_footer.php"; ?>

</body>
</html>