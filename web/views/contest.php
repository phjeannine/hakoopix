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
    ?>

    <div class="row">
        <!-- Galerie photos -->
        <?php foreach($participationBdd as $userParticipate) : ?>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 contribution">
                <?php echo '<img class="img-responsive" src="'.$userParticipate['image_link'].'">'; ?>
                <h3><center><?php echo $userParticipate['title']; ?></center></h3>
                <small><center><?php echo $userParticipate['description']; ?></center></small>
                <div class="item-contest">
                    <div class="like"><?php echo '&nbsp;<a href="/updatelike/'.$userParticipate["id"].'/'.$userParticipate["nb_like"].'"><span>like</span></a> '; echo ''.$userParticipate["nb_like"];?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div><br>
</div><!-- /.container -->
