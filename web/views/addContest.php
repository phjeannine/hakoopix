<?php include("headerAdmin.php"); ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>Créer un concours <small></small></h1>
        </section>

        <!-- Main content -->
        <div class="form-content">
        
          <form method="post" id="contest-form" action="../public/traitementContest.php" class="col-md-offset-1">
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
                  <label>Date debut :</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="date-first form-control" name="begin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                  </div><!-- /.input group -->
                </div>
                <div class="form-group col-md-6">
                  <label>Date fin :</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="date-end form-control" name="ending" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                  </div><!-- /.input group -->
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label><input type="checkbox">&nbsp;Actif</label>
                </div>
              </div>

              <input type="submit" class="btn btn-primary col-md-6">
            </div><!-- /.box-body -->
          </form>
        </div><!-- /.form-content -->

      </div><!-- /.content-wrapper -->
<?php include("footerAdmin.php"); ?>