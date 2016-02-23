<?php

include("dashboardHead.php");

$contestListObj = new contestModel();
$contests = $contestListObj->getAllContest();

$pricesListObj = new priceModel();
$pricesListObj->getAll(true);

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
                            <?php foreach($contests as $contest) : ?>
                                <option value="<?php echo $contest['title']; ?>"><?php echo $contest['title'] ?><div id="select-contest-id"></div></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" name="choose-contest-name" class="choose-contest-name" value="Rechercher" />
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.form-content -->

            <?php
            if(isset($_POST['choose-contest-name'])) {
                $selected_contest = $_POST['contest-name'];


                $contestObj = new contestModel();
                $contestResult = $contestObj->getOneContest($selected_contest);


            }
            ?>

            <!-- Main content -->
            <?php if(isset($_POST['choose-contest-name'])) { ?>

                      


                <div class="form-content" style="margin-top: 50px;">
                    <form method="post" id="update-contest" action="updateContest/update/<?php echo $contestResult['id']?>" enctype="multipart/form-data">
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
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="banner">Bannière</label>
                                    <input type="file" name="update-banner" id="banner-theme">
                                    <div class="banner-size-error error">
                                        <p><i class="fa fa-exclamation-triangle"></i> Votre image doit faire 1250 x 400</p>
                                    </div>
<!--                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">-->
                                </div>
                            </div>
                            <?php foreach($pricesListObj as $prices) {
                    if(isset($prices['id'])) {
                        if($prices['id_contest'] == $contestResult['id']) {
                            echo '
                            <div class="price-form col-md-4">
                            <div class="row">
                                <div class="form-group">
                                <label for="price">Prix</label>
                                <p>'.$prices['title'].'</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                <label for="description">Description</label>
                                <p>'.$prices['description'].'</p> 
                                
                                </div>
                            </div></div>';
                        }

                    }
                }
            ?>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label><input type="checkbox" name="active-contest" id="active-contest"
                                    <?php if (isset($contestResult['is_active']) && $contestResult['is_active'] == TRUE)
                                    echo "checked"; ?>>&nbsp;Actif</label>
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

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'update-description');
</script>