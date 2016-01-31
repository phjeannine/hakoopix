<!-- Page Content -->
<div class="container participate">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Participez au concours !</h1>
        </div>
    </div><!-- /.row -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" class="col-md-offset-1" method="POST" action="../public/traitementParticipate.php">
            <div class="box-body col-md-11">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title..." name="title">
              </div>
              
              <div class="form-group">
                  <div class="col-md-6">
                    <label for="exampleInputFile">Votre image</label>
                    <input type="file"  class="btn btn-default" id="inputImage" name="mon_fichier">
                    <p class="help-block">Importer une image ou sélectionnez-la parmi vos photos</p>
                  </div>

                  <div class="col-md-6">
                    <div class="uploaded_img"><img id="blah" src="#" alt="image"></div>
                  </div>
                </div>

            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Description</label>
              <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success col-md-offset-4 col-md-3">Participer</button>
            </div>
          </form>
        </div><!-- /.box -->

      </div><!-- /.content-wrapper -->


</div><!-- /container -->

<script type="text/javascript">
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#inputImage").change(function(){
        readURL(this);
    });
</script>
