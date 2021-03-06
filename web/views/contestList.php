<?php

$contestListObj = new contestModel();
$contests = $contestListObj->getAllContest();

include("dashboardHead.php");

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">xz
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mes concours</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Mes concours</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div id="contest-list">
                <div class="row">
                    <div class="add-contest"><a href="/addContest" title="Ajouter un concours">Ajouter un nouveau
                            concours</a></div>
                </div>
                <div class="row list">
                    <?php foreach ($contests as $contest) : ?>
                        <div class="contest col-md-4 .col-sm-2 col-xs-12">
                            <div class="contest_img">
                                <img src="<?php if ($contest['banner'] != '') : echo $contest['banner'];
                                else : echo '../public/images/banner/photo_contest.jpg';
                                endif ?>" alt=""/>
                            </div>
                            <div class="contest-informations">
                                <h3><?php echo $contest['title'] ?></h3>

                                <div class="date_contest">
                                    <p><i class="fa fa-calendar"></i> <?php echo $contest['date_begin'] ?>
                                        - <?php echo $contest['date_ending'] ?></p>
                                </div>
                                <p class="description"><strong>Description
                                        :</strong> <?php echo $contest['description'] ?></p>

                                <p class="color-theme"><strong>Couleur du thème :</strong> <span
                                        style="background-color: <?php echo $contest['color_theme'] ?>"></span></p>
                            </div><!-- /.contest-informations -->
                        </div><!-- /.contest -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /#contest_list -->

        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->



