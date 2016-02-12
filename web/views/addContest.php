<?php 

include("dashboardHead.php");

?>

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
      <div class="col-lg-6">
        <div class="form-content">
          <form method="post" id="add-contest" action="/addContest/insert" class="col-md-offset-1" enctype="multipart/form-data">
            <div class="box-body col-md-11">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="title">Titre</label>
                  <input type="text" class="form-control" id="contest-title" name="title">
                </div>
                <div class="col-md-3 col-md-offset-3"></div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="date-begin">Date de début :</label>
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
                <div class="dates-control error">
                  <p><i class="fa fa-exclamation-triangle"></i> La date de départ ne doit pas être inférieur à la date de fin d'un concours</p>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label for="description">Description</label>
                  <textarea id="contest-description" class="form-control" name="description" rows="3"></textarea>
                  <span id="remain">200</span> caractères restants
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="color-theme">Couleur du thème</label>
                  <input class="jscolor {hash:true}" id="color-theme" name="color-theme">
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
                <p><i class="fa fa-exclamation-triangle"></i> Vous devez renseigner tous les champs</p>
              </div>


              <input type="submit" class="btn btn-primary col-md-6" name="submit-contest">
              <input type="button" class="btn btn-primary col-md-6 preview-contest" name="preview-contest" value="Prévisualiser">
            </div><!-- /.box-body -->
          </form>
        </div><!-- /.form-content -->
    </div><!-- /.colonne de gauche-->

    <div class="col-lg-6">
      <div class="box-body col-md-11">
        <div class="row">
          <p><b>Prévisualiser votre concours :</b></p>
          <div id="preview-content" style="border:3px dashed #eee; text-align: center;">
            <div class="previewColor" style="width: 100%; height: 30px; background-color: #317ab8;"></div>
            <div class="previewHeader" style="background-color: #eee; padding-top: 40px; padding-bottom: 40px;">
              <div class="previewTitle">Titre du concours</div>
              <div class="previewDescription" style="margin-top: 10px;">Description du concours</div>
              <!--<div class="fb-connect-button">
                <span>Envie de jouer le jeu ?</span>
                  <a href="#">Je participe</a>
                </div>-->
            </div>
            <div class="previewRules" style="padding-top: 30px; padding-bottom: 30px;">
              <p>Hakoopix</p>
              <div class="previewColorBarre barre" style="border-top: 2px solid #317ab8;"></div>
              <div class="col-lg-4 col-md-4 col-sm-4">
               <i class="fa fa-camera-retro previewFa"></i>
                <p>Ajoute une photo</p>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <i class="fa fa-thumbs-o-up previewFa"></i>
                <p>Récolte le plus de vote</p>
              </div><!-- /.rule 2 -->
              <div class="col-lg-4 col-md-4 col-sm-4">
                <i class="fa fa-gift previewFa"></i>
                <p>Gagne un ou plusieurs cadeaux !</p>
              </div><!-- /.rule 2 -->
            </div><!-- /. Preview Rules -->

            <div class="previewPrices" style="margin-top: 60px; padding-top: 30px; padding-bottom: 80px; background-color: #eee;">
              <p>Lots à gagner</p>
              <div class="previewColorBarre barre" style="border-top: 2px solid #317ab8;"></div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="previewPrice previewColorBarre" style="width: 100%; height: 60px; border:  3px solid #317ab8; margin-top: 10px;"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="previewPrice previewColorBarre" style="width: 100%; height: 60px; border:  3px solid #317ab8; margin-top: 10px;"></div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="previewPrice previewColorBarre" style="width: 100%; height: 60px; border:  3px solid #317ab8; margin-top: 10px;"></div>
              </div>
            </div><!--/. Preview Prices -->
          </div><!-- / Preview content -->
        </div><!-- / row -->
      </div><!-- /box -->
    </div><!-- / col lg 6 -->

    </div><!-- /.container-fluid -->
  </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->




