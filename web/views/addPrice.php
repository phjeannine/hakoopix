<?php

include("dashboardHead.php");

$contestListObj = new contestModel();
$contests = $contestListObj->getAllContest();

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter un lot de prix</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Ajouter un lot de prix</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="form-content">
                <form method="post" class="search-contest col-md-6">
                    <div class="box-body">

                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.form-content -->
            <div class="form-content">
                <form role="form" method="POST" action="/addPrice/insert" id="add-prices" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-12">
                            <label>Sélectionnez l'application afin d'ajouter un lot de prix</label>
                            <select id="select-contest-name" name="id_cont">
                                <option value="no-value"></option>
                                <?php foreach ($contests as $contest) {
                                    echo "<option value='" . $contest['id'] . "'>" . $contest['title'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="price-form col-md-4">
                            <label for="first-price">Premier prix</label>

                            <div class="row">
                                <div class="form-group">
                                    <label for="title-price">Nom du prix</label>
                                    <input type="text" class="form-control" name="first-price-title">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <input type="file" name="first-price-img" id="first-price-img">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <textarea name="first-price-desc" placeholder="Description du prix"
                                              class="max-char"></textarea>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->

                        <div class="price-form col-md-4">
                            <label for="second-price">Deuxième prix</label>

                            <div class="row">
                                <div class="form-group">
                                    <label for="title-price">Nom du prix</label>
                                    <input type="text" class="form-control" name="second-price-title">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <input type="file" name="second-price-img" id="second-price-img">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <textarea name="second-price-desc" placeholder="Description du prix"
                                              class="max-char"></textarea>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->

                        <div class="price-form col-md-4">
                            <label for="third-price">Troisième prix</label>

                            <div class="row">
                                <div class="form-group">
                                    <label for="title-price">Nom du prix</label>
                                    <input type="text" class="form-control" name="third-price-title">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <input type="file" name="third-price-img" id="third-price-img">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="form-group">
                                    <textarea name="third-price-desc" placeholder="Description du prix"
                                              class="max-char"></textarea>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->


                    </div><!-- /.box-body -->
                    <input type="submit" name="submit-prices" id="submit-prices" class="btn btn-primary col-md-6"
                           value="Envoyer"/>
                </form>
            </div><!-- /.form-content -->

        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('first-price-desc');
    CKEDITOR.replace('second-price-desc');
    CKEDITOR.replace('third-price-desc');
</script>