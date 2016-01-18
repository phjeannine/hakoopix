<?php include("headerAdmin.php"); ?>

<!-- fin du code script -->


 <div class="content-wrapper addAdmin">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Ajouter un administrateur</h1>
          <br>
          <!-- general form elements -->
        </section>
		<?php

		$response = $fb->get('959119600818575/roles', "959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE");
		print_r($response);

		?>

        <!-- Main content -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" class="col-md-offset-1">
            <div class="box-body col-md-11">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Entrer son adresse mail ou son nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer son adresse mail ou son nom">
              </div>
              

            
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary col-md-offset-4 col-md-3"><i class="fa fa-user-plus"></i> Ajouter en tant qu'administrateur</button>
            </div>
          </form>
        </div><!-- /.box -->
<?php include("footerAdmin.php"); ?>