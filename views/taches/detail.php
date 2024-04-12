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
?>
  <div class="container">
        <h1>Détails de la tâche</h1>
        <div class="task-details">
        <h2>Nom de la tâche :</h2>
            <p><?= $tache['name'] ?></p><h2>Projet:</h2>
            <p><?= $tache['project_name'] ?></p>
            <h2>Description :</h2>
            <p><?= $tache['description'] ?></p>
            <h2>Date d'échéance :</h2>
            <p><?= $tache['due_date'] ?></p>
            <h2>Priorité :</h2>
            <p><?= $tache['priority'] ?></p>
            <h2>Statut :</h2>
            <p><?= $tache['status_name'] ?></p>
            <h2>Assigné à :</h2>
            <p><?= $tache['assigned_to_username'] ?></p>
        </div>
        <?php } ?>
        <a href="listeTaches" class="back-link">Retourner à la liste des tâches</a>
    </div><div class=" container"><div class="accordion" id="accordionExample">
  <div class="card">
  <?php                        foreach ($taches as $task) {
 ?>
   

  <?php }?>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<?= $task['name'] ?>        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <?= $task['description'] ?>      </div>
    </div>
  </div>
 
</div>
</div>

 <?php  
       require_once "create.php";
       require_once "update.php";

require_once '../../views/partials/foot.php';
?>