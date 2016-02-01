<?php include("dashboardHead.php"); ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ajouter un concours</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                            <li class="active"><i class="fa fa-edit"></i> Ajouter un concours</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main content -->
                <div class="form-content">
                  <form method="post" id="add-contest" action="../public/data/insert_contest.php" class="col-md-offset-1" enctype="multipart/form-data">
                    <div class="box-body col-md-11">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="title">Titre</label>
                          <input type="text" class="form-control" id="contest-title" name="title">
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
                            <input type="text" id="date-first" class="form-control" name="begin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                          </div><!-- /.input group -->
                        </div>
                        <div class="form-group col-md-6">
                          <label for="date-ending">Date de fin :</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="date-end" class="form-control" name="ending" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                          </div><!-- /.input group -->
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="description">Description</label>
                          <textarea id="contest-description" class="form-control" name="description" rows="3"></textarea>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="color-theme">Couleur du thème</label>
                          <input class="jscolor {hash:true}" name="color-theme">
                        </div>
                        <div class="col-md-3 col-md-offset-3"></div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="logo">Logo</label>
                          <input type="file" name="logo" id="logo-theme">
                          <div class="logo-size-error error">
                            <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 150 x 100</p>
                          </div>
                          <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="banner">Bannière</label>
                          <input type="file" name="banner" id="banner-theme">
                          <div class="banner-size-error error">
                            <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 1250 x 400</p>
                          </div>
                          <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-12">
                          <label><input type="checkbox" name="active-contest" id="active-contest">&nbsp;Actif</label>
                        </div>
                      </div>

                      <div class="fields-error error">
                        <p>Vous devez renseigner tous les champs</p>
                      </div>

                      <input type="submit" class="btn btn-primary col-md-6" name="submit-contest">
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.form-content -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->




