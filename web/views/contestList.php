<?php 

$selectContest = $db->prepare("SELECT * FROM contest;");
$selectContest->execute();
 
$contestResult = $selectContest->fetchAll();

include("dashboardHead.php");

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mes concours</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Mes concours</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div id="contest_list">
                <div class="row list">
                    <?php
                        foreach($contestResult as $contest) :

                        $idContest = $contest['id_contest'];
                        echo $idContest;
                    ?>
                    <div class="contest">
                        <div class="contest_img col-md-4">
                            <img src="../public/images/photo_contest.jpg" alt=""/>
                        </div>
                        <div class="contest-informations col-md-4">
                            <h3><?php echo $contest['title'] ?></h3>
                            <div class="date_contest">
                                <p>Date de commencement : <?php echo $contest['date_begin'] ?></p>
                                <p>Date de fin : <?php echo $contest['date_ending'] ?></p>
                            </div>
                            <p class="description">Description : <?php echo $contest['description'] ?></p>
                            <p class="color-theme">Couleur du thème : <span style="background-color: <?php echo $contest['color_theme'] ?>"></span></p>
                        </div><!-- /.contest-informations -->
                    </div><!-- /.contest -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /#contest_list -->
                
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->



