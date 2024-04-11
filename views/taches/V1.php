<?php  
require_once '../../views/partials/head.php';
require_once '../../models/Tache.php';
$result = new Tache();
// Appeler la méthode readAll du contrôleur de tâches pour récupérer toutes les tâches
$tasks = $result->readAll();
?>

  <div class="wrapper d-flex align-items-stretch">
  <?php  
require_once '../../views/partials/sidbar.php';
?><div class=" container">
  <div class="d-grid gap-5 d-md-flex justify-content-md-end">
  <div id="content" class="p-4 p-md-5 pt-5">
  <div class=" container"><div class="accordion" id="accordionExample">
  

   <div id="accordionExample">
    <?php foreach ($tasks as $index => $task) { ?>
        <div class="card">
            <div class="card-header" id="heading<?= $index ?>">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                        <?= $task['name'] ?>
                    </button>
                </h2>
            </div>
            <div id="collapse<?= $index ?>" class="collapse" aria-labelledby="heading<?= $index ?>" data-parent="#accordionExample">
                <div class="card-body">
                    <?= $task['description'] ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</div>
    <section class="vh-100 gradient-custom-2">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-12 col-xl-10">
    
            <div class="card mask-custom">
              <div class="card-body p-4 text-white">
                <div class="text-center pt-3 pb-2">
                <button class="btn btn-primary w-25 me-md-2 bit"type="button" data-toggle="modal" data-target="#loginModal" type="button">Add Tache</button>

                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                    alt="Check" width="60">
                  <h2 class="my-4">Liste des tâches
</h2>
                </div>
               
                <table class="table text-white mb-0">
                  <thead>
                    <tr>
                      <th scope="col">Team Member</th>
                      <th scope="col">Task</th>
                      <th scope="col">Priority</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                
                    if ($tasks) {
                      // Afficher les tâches dans une liste
                     
                      foreach ($tasks as $task) {
                        $badgeClass = '';
    switch ($task['priority']) {
        case 'low':
            $badgeClass = 'bg-success';
            break;
        case 'medium':
            $badgeClass = 'bg-warning';
            break;
        case 'high':
            $badgeClass = 'bg-danger';
            break;
        default:
            $badgeClass = 'bg-secondary'; // Par défaut
            break;
    }
    switch ($task['status_name']) {
      case 'todo':
          $badgeStatu = 'bg-secondary';
          break;
      case 'in_progress':
          $badgeStatu = 'bg-warning';
          break;
      case 'completed':
          $badgeStatu = 'bg-success';
          break;
      default:
          $badgeStatu = 'bg-danger'; // Par défaut
          break;
  }
           
                   ?>
                    <tr class="fw-normal">
                      <th>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                          alt="avatar 1" style="width: 45px; height: auto;">
                        <span class="ms-2"><?=$task['assigned_to_username']?></span>
                      </th>
                      <td class="align-middle">
                        <span><a href="detailTache?id=<?= $task['id'] ?>"><?=$task['name']?></a></span>
                      </td>
                      <td class="align-middle">
                        <h6 class="mb-0"><span class="badge  <?php echo $badgeClass?>"><?=$task['priority']?></span></h6>
                      </td>
                      <td class="align-middle">
                        <h6 class="mb-0"><span class="badge <?php echo $badgeStatu?>"><?=$task['status_name']?></span></h6>
                      </td>
                      <td class="align-middle">
                        <a href="#!" data-mdb-tooltip-init title="Done" class="p-3"  data-toggle="modal" data-target="#statusModal" ><i
                            class="fas fa-check fa-lg text-success me-7"></i></a>
                            
                        <a href="#!" data-mdb-tooltip-init title="Remove"><i
                            class="fas fa-trash-alt fa-lg text-warning"></i></a>
                      </td>
                    </tr>
                  <?php }} else {
                        // Gérer le cas où aucune tâche n'a été récupérée
                        echo "Aucune tâche trouvée.";
                    }
                      ?>
                
                  </tbody>
                </table>
    
    
              </div>
            </div>
    
          </div>
        </div>
      </div>
    </section></div></div>
  <?php  
require_once 'create.php';
require_once 'status.php';
?>

</div>


 <?php  
require_once '../../views/partials/foot.php';
?>