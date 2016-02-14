<?php 

include("dashboardHead.php"); 

/* Count Member */
$memberCountObj = new memberModel();
$nbMember = $memberCountObj->countRow();

/* Count Picture */
$pictureCountObj = new pictureModel();
$nbPicture = $pictureCountObj->countRow();

/* Count Contest */
$contestCountObj = new contestModel();
$nbContest = $contestCountObj->countRow();

// Select user limit 8
$memberListObj = new memberModel();
$members = $memberListObj->getUserByLimit();

// Select contest limit 8
$contestListObj = new contestModel();
$contests = $contestListObj->getContestByLimit();

?>

<div id="wrapper">
    <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-dashboard"></i> Les Statistiques</li>
                        </ol>
                    </div>
                </div><!-- /.row -->

                <div id="dashboard-panel">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="panel panel-violet">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-trophy fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $nbContest; ?></div>
                                            <div>concours créés</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-image-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $nbPicture; ?></div>
                                            <div>photos ajoutées</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="panel panel-blue">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $nbMember; ?></div>
                                            <div>membres Hakoopix</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /#dashboard-panel -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Autres Statistiques</h3>
                            </div>
                            <div class="panel-body">
                                <div id="statistics-chart"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Derniers utilisateurs inscrits</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach($members as $member) :?>
                                        <div class="list-group-item">
                                            <p><strong><?php echo $member['id_member'] ?></strong> - <?php echo $member['firstname'] ?> <?php echo $member['lastname'] ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-right">
                                    <a href="/userList">Voir tous les utilisateurs <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-trophy fa-fw"></i> Derniers concours créés</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach($contests as $contest) :?>
                                        <div class="list-group-item">
                                            <p><?php echo $contest['title'] ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="text-right">
                                    <a href="/contestList">Voir tous les concours <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
