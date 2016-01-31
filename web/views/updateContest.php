<?php

$selectContest = $db->prepare('SELECT * FROM contest WHERE id_contest = ' . $id[0] .';');
$selectContest->execute();

$contestResult = $selectContest->fetch();

include("dashboardHead.php"); ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modification du concours</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> <a href="/contestList"> Mes concours</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Modification du concours</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Main content -->
            <div class="form-content">
                <form method="post" id="add-contest" action="../public/data/update_contest.php" class="col-md-offset-1" enctype="multipart/form-data">
                    <div class="box-body col-md-11">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="contest-title" name="title" value="<?php if (isset($contestResult['title'])) echo $contestResult['title'] ?>">
                            </div>
                            <div class="col-md-3 col-md-offset-3"></div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date-begin">Date de commencement :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="date-first" class="form-control" name="begin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php if (isset($contestResult['date_begin'])) echo $contestResult['date_begin'] ?>">
                                </div><!-- /.input group -->
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date-ending">Date de fin :</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="date-end" class="form-control" name="ending" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php if (isset($contestResult['date_ending'])) echo $contestResult['date_ending'] ?>">
                                </div><!-- /.input group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea id="contest-description" class="form-control" name="description" rows="3"><?php if (isset($contestResult['description'])) echo $contestResult['description'] ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="color-theme">Couleur du thème</label>
                                <input class="jscolor {hash:true}" name="color-theme" value="<?php if (isset($contestResult['color_theme'])) echo $contestResult['color_theme'] ?>">
                            </div>
                            <div class="col-md-3 col-md-offset-3"></div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo-theme" value="<?php if (isset($contestResult['logo'])) echo $contestResult['logo'] ?>">
                                <div class="logo-size-error error">
                                    <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 150 x 100</p>
                                </div>
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="banner">Bannière</label>
                                <input type="file" name="banner" id="banner-theme" value="<?php if (isset($contestResult['banner'])) echo $contestResult['banner'] ?>">
                                <div class="banner-size-error error">
                                    <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 1250 x 400</p>
                                </div>
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label><input type="checkbox" <?php if (isset($contestResult['is_active']) && true) echo 'checked' ?>>&nbsp;Actif</label>
                            </div>
                        </div>

                        <div class="fields-error error">
                            <p>Vous devez renseigner tous les champs</p>
                        </div>

                        <input type="submit" class="btn btn-primary col-md-6" value="Modifier le concours">
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.form-content -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->




