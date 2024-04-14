<?php
require_once '../../views/partials/head.php';
?>
<?php
require_once '../../models/Tache.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];

  $results = new Tache();
  $tache = $results->read($id);
  $taches = $results->readAll();

?>
  <div class="wrapper d-flex align-items-stretch">
    <?php
    require_once '../../views/partials/sidbar.php';
    ?><div class="container">
          <?php
     require_once '../../views/partials/header.php';
 ?>
      <h1>Détails de la tâche</h1>
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"><?= $tache['name'] ?></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <p class="card-text"><strong>Projet:</strong> <?= $tache['project_name'] ?></p>
              <p class="card-text"><strong>Description :</strong> <?= $tache['description'] ?></p>
              <p class="card-text"><strong>Date d'échéance :</strong> <?= $tache['due_date'] ?></p>
            </div>
            <div class="col-md-6">
              <p class="card-text"><strong>Priorité :</strong> <?= $tache['priority'] ?></p>
              <p class="card-text"><strong>Statut :</strong> <?= $tache['status_name'] ?></p>
              <p class="card-text"><strong>Assigné à :</strong> <?= $tache['assigned_to_username'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="card-text"><strong>Date Created :</strong> <?= $tache['created_at'] ?></p>
            </div>
            <div class="col-md-6">
              <p class="card-text"><strong>Date Modified :</strong> <?= $tache['modified_at'] ?></p>
              <p class="card-text"><strong>Modifié Par :</strong> <?= $tache['modifier_username'] ?></p>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a href="detailProjet?id=<?= $tache['project_id'] ?>" class="btn btn-primary">Retourner à la liste des tâches</a>
        </div>
      </div>


    <?php } ?>

    </div>


  </div>
  </div>

  <?php


  require_once '../../views/partials/foot.php';
  ?>