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

        //var_dump($participationBdd);

        ?>



        <?php foreach($participationBdd as $userParticipate) : ?>
            <div class="col-lg-4">
                <?php echo '<img class="img-responsive" src="'.$userParticipate['image_link'].'">'; 

                echo $userParticipate['title'];
                ?>
                <div class="item-contest">
                <div class="col-md-9"><?php echo '<a href="/updatelike/'.$userParticipate["id"].'/'.$userParticipate["nb_like"].'" class="like item-contest-icon"> <span>like</span></a> '; echo ''.$userParticipate["nb_like"];?></div>
                <div class="share item-contest-icon col-md-3"><span>Partager</span></div>
            </div>
            </div>
        <?php endforeach; ?>
    <!-- Projects Row -->
    <div class="row">
        <!-- Portfolio Item -->
      <!-- <?php  
            $results = $db->query("SELECT * FROM picture WHERE id_contest='".$_SESSION['idContest']."' ORDER BY id_picture");
            $tabResults = $results->fetchAll();

            foreach ($tabResults as $res) {
        ?>
        <div class="col-md-4 col-sm-4 portfolio-item">
            <a href="#"><?php echo '<img class="img-responsive" src="../public/images/participation/'.$res["image_link"].'" alt="">'; ?></a>
            <div class="item-contest">
                <div class="col-md-9"><?php echo '<a href="../public/data/updateLike.php?image='.$res["id_picture"].'&nbLike='.$res["nb_like"].'" class="like item-contest-icon"> <span>like</span></a> '; echo ''.$res["nb_like"];?></div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74"> <?php echo $res['title']; ?></h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description"><?php echo $res['description']; ?></p>
        </div>
        <?php  
            }; 
        ?>-->



    </div><!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div><!-- /.row -->
    
</div><!-- /.container -->
