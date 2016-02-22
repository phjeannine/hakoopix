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
                <?php echo '<img class="img-responsive" src="'.$userParticipate['image_link'].'">'; ?>
                <h3><center><?php echo $userParticipate['title']; ?></center></h3>
                <small><center><?php echo $userParticipate['description']; ?></center></small>
                <div class="item-contest">
                <?php
                  foreach ($listLikes as $obj) {
                    if($obj['id_member']==$_SESSION['idUser'] && $obj['id_contest']==$_SESSION['idContest'] && $obj['id_picture']==$userParticipate['id']){
                        $hasParticipate = true;
                        break;
                    }
                }
                    ?>
                    <div class="like"><?php if(!$hasParticipate) { echo '&nbsp;<a href="/contest/updatelike/'.$userParticipate["id"].'"><span>like</span></a> '; } echo ' &nbsp;&nbsp;<b style="color:green">&nbsp;votes : '.$userParticipate["nb_like"].'</b>';?></div>
                </div>
            </div>
        <?php } 
        endforeach; ?>
    </div><br>

</div><!-- /.container -->
