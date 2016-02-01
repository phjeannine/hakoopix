<?php 

$selectContestList = $db->prepare("SELECT * FROM contest");
$selectContestList->execute();
$contestListResult = $selectContestList->fetchAll();

include("dashboardHead.php");

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier un concours</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Modifier un concours</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div class="form-content">
                <form method="post" class="search-contest col-md-6">
                    <div class="box-body">
                        <label>Sélectionnez l'application pour modifier ses informations</label>
                        <select name="contest-name" id="select-contest-name">
                            <option value="no-value"></option>
                            <?php foreach($contestListResult as $contest) : ?>
                                <option value="<?php echo $contest['title'] ?>"><?php echo $contest['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" name="choose-contest-name" class="choose-contest-name" value="Rechercher" />
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.form-content -->

            <?php
                if(isset($_POST['choose-contest-name'])) {
                    $selected_contest = $_POST['contest-name'];
                    $selectContest = $db->prepare("SELECT * FROM contest WHERE title = '".$selected_contest."'");
                    $selectContest->execute();
                    $contestResult = $selectContest->fetch();
                }
            ?>

            <!-- Main content -->
            <?php if(isset($_POST['choose-contest-name'])) { ?>
            <div class="form-content" style="margin-top: 50px;">
              <form method="post" id="update-contest" action="../public/data/update_contest.php" enctype="multipart/form-data">
                <input type="hidden" name="choosen-contest" value="<?php echo $_POST['contest-name']; ?>" />
                <div class="box-body col-md-11">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="title">Titre</label>
                      <input type="text" value="<?php echo $contestResult['title']; ?>" class="form-control" id="contest-title" name="update-title">
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
                        <input type="text" id="date-first" value="<?php echo $contestResult['date_begin']; ?>" class="form-control" name="update-begin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                      </div><!-- /.input group -->
                    </div>
                    <div class="form-group col-md-6">
                      <label for="date-ending">Date de fin :</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="date-end" value="<?php echo $contestResult['date_ending']; ?>" class="form-control" name="update-ending" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                      </div><!-- /.input group -->
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="description">Description</label>
                      <textarea id="contest-description" class="form-control" name="update-description" rows="3"><?php echo $contestResult['description']; ?></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="color-theme">Couleur du thème</label>
                      <input class="jscolor {hash:true}" name="update-color-theme" value="<?php echo $contestResult['color_theme']; ?>">
                    </div>
                    <div class="col-md-3 col-md-offset-3"></div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="logo">Logo</label>
                      <input type="file" name="update-logo" id="logo-theme">
                      <div class="logo-size-error error">
                        <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 150 x 100</p>
                      </div>
                      <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="banner">Bannière</label>
                      <input type="file" name="update-banner" id="banner-theme">
                      <div class="banner-size-error error">
                        <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 1250 x 400</p>
                      </div>
                      <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    </div>
                  </div>

                  <div class="fields-error error">
                    <p>Vous devez renseigner tous les champs</p>
                  </div>

                  <input type="submit" class="btn btn-primary col-md-6">
                </div><!-- /.box-body -->
              </form>
            </div><!-- /.form-content -->
            <?php } ?>
                
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
