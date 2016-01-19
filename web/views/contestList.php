<?php 

$selectContest = $db->prepare("SELECT * FROM contest;");
$selectContest->execute();
 
$contestResult = $selectContest->fetchAll();

include('headerAdmin.php');

?>

<!-- Page Content -->
<div class="content-wrapper">

    <div id="contest_list">
        <div class="row">
            <div class="col-lg-12 title">
                <h1 class="page-header">Application Concours Photos</h1>

            </div>
        </div><!-- /.row -->

        <div class="row list">
            <div class="col-lg-12">
                <?php foreach($contestResult as $contest) : ?>
                <div class="contest">
                    <div class="contest_img">
                        <img src="../public/images/photo_contest.jpg" alt=""/>
                    </div>
                    <div class="description">
                        <h3><?php echo $contest[1] ?></h3>
                        <div class="date_contest">
                            <p><?php echo $contest['date_begin'] ?></p>
                            <p><?php echo $contest['date_ending'] ?></p>
                        </div>
                        <p><?php echo $contest['description'] ?></p>
                    </div>
                </div><!-- /.contest -->
                <?php endforeach; ?>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /#contest_list -->
</div><!-- /.content-wrapper -->

<?php include("footerAdmin.php"); ?>


