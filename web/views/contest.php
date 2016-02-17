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


    <!-- Galerie photos -->
    <?php foreach($participationBdd as $userParticipate) : ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 contribution">
            <?php echo '<img class="img-responsive" src="'.$userParticipate['image_link'].'">'; ?>
            <h3><?php echo $userParticipate['title']; ?></h3>
            <div class="item-contest">
                <div class="like"><?php echo '<a href="/updatelike/'.$userParticipate["id"].'/'.$userParticipate["nb_like"].'"><span>like</span></a> '; echo ''.$userParticipate["nb_like"];?></div>
            </div>
        </div>
    <?php endforeach; ?>
    
</div><!-- /.container -->
