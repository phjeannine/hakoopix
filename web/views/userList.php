<?php

include("dashboardHead.php");

$memberObj = new memberModel();
$memberObj->getAll(true);

?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des utilisateurs</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="/dashboard">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Gestion des utilisateurs</li>
                    </ol>
                </div>
            </div><!-- /.row -->

            <div id="user-list" class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Suppression</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($memberObj as $member) : ?>
                            <tr>
                                <td><?php echo $member['lastname']; ?></td>
                                <td><?php echo $member['firstname']; ?></td>
                                <td><a href="javascript:void(0);" title="Supprimer un utilisateur">Supprimer</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /#contest_list -->
                
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->



