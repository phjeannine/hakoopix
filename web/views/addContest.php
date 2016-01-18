<?php include("headerAdmin.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Créer Concours
            <small></small>
          </h1>
          <br>
          <!-- general form elements -->
        </section>

        <!-- Main content -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" class="col-md-offset-1">
            <div class="box-body col-md-11">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title...">
              </div>
              <div class="form-group col-md-6">
                <label>Date debut :</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div><!-- /.input group -->
              </div>
              <div class="form-group col-md-6">
                <label>Date fin :</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div><!-- /.input group -->
              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputFile">LOGO :</label>
                <input type="file"  class="btn btn-default" id="exampleInputFile">
                <p class="help-block">choisissez votre image</p>
              </div>

            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label><input type="checkbox">&nbsp;Actif</label>
            </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary col-md-offset-4 col-md-3">Créer Concours</button>
            </div>
          </form>
        </div><!-- /.box -->

      </div><!-- /.content-wrapper -->
<?php include("footerAdmin.php"); ?>