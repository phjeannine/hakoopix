<?php

include("dashboardHead.php");

$selectContest = "SELECT * FROM contest"; 
$result = $db->prepare($selectContest); 
$result->execute(); 
$contestResult = $result->fetchAll();

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ajouter un lot de prix</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                            <li class="active"><i class="fa fa-edit"></i> Ajouter un lot de prix</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="form-content">
                  <form method="post" id="search-contest" class="col-md-6">
                    <div class="box-body">
                        <label>Sélectionnez l'application afin d'ajouter un lot de prix</label>
                        <select name="select">
                            <option value="no-value"></option>
                            <?php foreach($contestResult as $contest) : ?>
                                <option value="<?php echo $contest['title'] ?>"><?php echo $contest['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.form-content -->

                <div class="form-content">
                  <form method="post" id="add-prices" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="price-form col-md-4">
                            <label for="first-price">Premier prix</label>
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first-price-title" value="Premier prix" readonly>
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
                                    <textarea name="first-price-desc" placeholder="Description du prix" class="max-char"></textarea>
                                    <p class="char-remain"><span class="remain-first">100</span> caractères restants</p>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->

                        <div class="price-form col-md-4">
                            <label for="second-price">Deuxième prix</label>
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="second-price-title" value="Deuxième prix" readonly>
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
                                    <textarea name="second-price-desc" placeholder="Description du prix" class="max-char"></textarea>
                                    <p class="char-remain"><span class="remain-second">100</span> caractères restants</p>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->

                        <div class="price-form col-md-4">
                            <label for="third-price">Troisième prix</label>
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="third-price-title" value="Troisième prix" readonly>
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
                                    <textarea name="third-price-desc" placeholder="Description du prix" class="max-char"></textarea>
                                    <p class="char-remain"><span class="remain-third">100</span> caractères restants</p>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.price-form -->
                    </div><!-- /.box-body -->
                  </form>
                </div><!-- /.form-content -->

        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->