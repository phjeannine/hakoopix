<!-- Page Content -->
<div class="container" id="contest">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contributions</h1>
            <div class="barre"></div>
        </div>
    </div><!-- /.row -->

    <?php
        $participationBdd = new pictureModel();
        $participationBdd->getAll(true);

        $listLikes = new voteModel();
        $listLikes->getAll(true);

        $hasParticipate = false;


    ?>

    <div class="row">
         <!-- Galerie photos -->
        <?php foreach($participationBdd as $userParticipate) : 
          if($userParticipate['id_contest'] == $_SESSION['idContest']) { ?>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 contribution">
                <div class="img_contest">
                    <?php echo '<img id="img-popup" class="img-responsive" src="'.$userParticipate['image_link'].'" data-toggle="modal" data-target="#myModal" data-src="'.$userParticipate['image_link'].'" data-title="'.$userParticipate["title"].'">'; ?>
                </div>
                <div class="txt_contest">
                    <h3><center><?php echo $userParticipate['title']; ?></center></h3>
                    <small><center><?php echo $userParticipate['description']; ?></center></small>
                    <div class="item-contest">
                        <div class="like"><?php if(!$hasParticipate) { echo '&nbsp;<a href="/contest/updatelike/'.$userParticipate["id"].'"><span>like</span></a> '; } echo ' &nbsp;&nbsp;<b style="color:green">&nbsp;votes : '.$userParticipate["nb_like"].'</b>';?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
        endforeach; ?>
    </div>

     <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){

        $('img#img-popup').on('click', function(e){
            e.preventDefault();

            popupimg = $(this).data('src');
            popuptitle = $(this).data('title');
            msg = '<img src="'+popupimg+'" class="popupimg">';
            
            $('div.modal-body').html(msg);
            $('div.modal-header').html(popuptitle);
            
        });
    });
  </script>

</div><!-- /.container -->
