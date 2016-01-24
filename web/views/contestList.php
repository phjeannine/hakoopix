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

            <div id="contest-list">
                <div class="row list">
                    <?php foreach($contestResult as $contest) :?>
                        <div class="contest col-md-4 .col-sm-2 col-xs-12">
                            <div class="contest_img">
                                <img src="../public/images/photo_contest.jpg" alt=""/>
                            </div>
                            <div class="contest-informations">
                                <h3><?php echo $contest['title'] ?></h3>
                                <div class="date_contest">
                                    <p><i class="fa fa-calendar"></i> <?php echo $contest['date_begin'] ?> - <?php echo $contest['date_ending'] ?></p>
                                </div>
                                <p class="description"><strong>Description :</strong> <?php echo $contest['description'] ?></p>
                                <p class="color-theme"><strong>Couleur du thème :</strong> <span style="background-color: <?php echo $contest['color_theme'] ?>"></span></p>
                                <div class="contest-actions">
                                    <a href="/updateContest?id='.$contest['id'].'" class="update-contest col-md-4"><i class="fa fa-pencil"></i> Modifier</a>
                                    <a href="/updateContest?id='.$contest['id'].'" class="delete-contest col-md-4"><i class="fa fa-trash-o"></i> Supprimer</a>
                                </div>
                            </div><!-- /.contest-informations -->
                        </div><!-- /.contest -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /#contest_list -->
                
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->



