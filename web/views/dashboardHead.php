<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="/dashboard">Administration</a>
    </div>

    <!-- Sidebar Menu Items -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <a href="/contest" class="view-app">Voir mon concours actif <i class="fa fa-star"></i></a>
        <ul class="nav navbar-nav side-nav">
            <div id="admin-bar">
                <img src="<?php echo $_SESSION['photo']; ?>" class="user-picture-profile" alt="Photo profil"/>

                <p class="admin-name"><?php echo $_SESSION["name"]; ?></p>

                <p class="admin-role">Administrateur</p>
            </div>
            <li><a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/contestList"><i class="fa fa-fw fa-trophy"></i> Mes concours</a></li>
            <li><a href="/addContest"><i class="fa fa-fw fa-table"></i> Créer un concours</a></li>
            <li><a href="/updateContest"><i class="fa fa-fw fa-pencil"></i> Modifier un concours</a></li>
            <li><a href="/addPrice"><i class="fa fa-fw fa-gift"></i> Ajouter des prix</a></li>
            <li><a href="/userList"><i class="fa fa-fw fa-user"></i> Utilisateurs</a></li>
            <li><a href="/"><i class="fa fa-star"></i> Voir mon concours</a></li>
            <li><a href="/contest"><i class="fa fa-camera-retro"></i> Voir les participations</a></li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>