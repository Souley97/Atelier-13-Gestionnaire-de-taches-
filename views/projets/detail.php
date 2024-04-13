<?php

require_once '../../views/partials/head.php';
?>

<div class="wrapper d-flex align-items-stretch">
  <?php
  require_once '../../views/partials/sidbar.php';
  require_once "public.php";

  ?>

  <div class=" container">
    <!-- Masthead -->
    <header class="masthead">

      <div class="boards-menu">

        <button class="boards-btn btn"><i class="fab fa-trello boards-btn-icon"></i>Boards</button>

        <div class="board-search">
          <input type="search" class="board-search-input" aria-label="Board Search">
          <i class="fas fa-search search-icon" aria-hidden="true"></i>
        </div>

      </div>

      <div class="logo">

        <h1><i class="fab fa-trello logo-icon" aria-hidden="true"></i>Trello</h1>

      </div>

      <div class="user-settings">

        <button class="user-settings-btn btn" aria-label="Create">
          <i class="fas fa-plus" aria-hidden="true"></i>
        </button>

        <button class="user-settings-btn btn" aria-label="Information">
          <i class="fas fa-info-circle" aria-hidden="true"></i>
        </button>

        <button class="user-settings-btn btn" aria-label="Notifications">
          <i class="fas fa-bell" aria-hidden="true"></i>
        </button>

        <button class="user-settings-btn btn" aria-label="User Settings">
          <i class="fas fa-user-circle" aria-hidden="true"></i>
        </button>

      </div>

    </header>
    <!-- End of masthead -->


    <!-- Board info bar -->
    <section class="board-info-bar">

      <div class="board-controls">

        <button class="board-title btn">
          <h2> <?= $proje['name']  ?></h2>
        </button>

        <button class="star-btn btn" aria-label="Star Board">
          <i class="far fa-star" aria-hidden="true"></i>
        </button>

        <button class="personal-btn btn">Personal</button>

        <button class="private-btn btn"><i class="fas fa-briefcase private-btn-icon" aria-hidden="true"></i>Private</button>

      </div>

      <button class="menu-btn btn"><i class="fas fa-ellipsis-h menu-btn-icon" aria-hidden="true"></i>Show Menu</button>

    </section>
    <!-- End of board info bar -->

    <!-- Lists container -->
    <section class="lists-container">

      <!-- LISTS TOUT LES TACHES TACHES -->


      <!--FIN LISTS TOUT LES TACHES -->

      <!-- LISTS DES TACHES TODO -->

      <div class="list">

        <h3 class="list-title">Tasks to Do</h3>

        <ul class="list-items" id="accordionExample">
          <?php foreach ($todos as $index => $tache) { ?>
            <?php
            $badgeClass = '';
            switch ($tache['priority']) {
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
            } ?>



            <ul class="list-items">
              <li id="heading<?= $index ?>">
                <h6 class="mb-0"><span class=" text-light badge <?php echo $badgeClass ?>"><?= $tache['priority'] ?></span></h6>
                <input value=" <?= $tache['name'] ?>" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>">
                <span><a href="detailTache?id=<?= $tache['id']  ?>" class="fa fa-eye font-italic text-success me-7" aria-hidden="true"></a></span>
                <a href="modifieTache?id=<?= $tache['id'] ?>" class="fas fa-edit fa-lg text-warning me-6 float-lg-right font-size" data-mdb-tooltip="Update" data-mdb-placement="top"></a>


              </li>

              <div id="collapse<?= $index ?>" class="collapse" aria-labelledby="heading<?= $index ?>" data-parent="#accordionExample">
                <div class="card-body">
                  <h6>Date d'échéance :</h6>
                  <p><?= $tache['due_date'] ?></p>

                  <h6>Assigné à :</h6>
                  <p><?= $tache['assigned_to_username'] ?></p>

                  <div class="btn-group block">
                    <a href="tacheController?action=update_status&status=completed&id=<?= $tache['id'] ?>" class="btn-success">
                      <i class="fas fa-check-circle"></i> Terminé
                    </a>

                    <a href="tacheController?action=update_status&status=in_progress&id=<?= $tache['id'] ?>" class="btn-warning m-0">
                      <i class="fas fa-spinner"></i> En cours
                    </a>

                    <a href="tacheController?action=update_status&status=todo&id=<?= $tache['id'] ?>" class="btn-info">
                      <i class="fas fa-tasks"></i> À Faire
                    </a>

                  </div>
                  <a class="btn btn-light mt-5" href="tacheController?id=<?= $tache['id'] ?>" data-mdb-tooltip-init title="Remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tache ?')"><i class="    fas fa-trash-alt fa-lg text-danger"></i></a>

                  <!-- <a href="tacheController?id=<?= $tache['id'] ?>" class="btn btn-danger mt-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</a> -->
                </div>
              </div>
            </ul>
          <?php } ?>

        </ul>

        <button class="add-card-btn btn" type="button" data-toggle="modal" data-target="#tacheModal">Add a card</button>

      </div>
      <!--FIN LISTS DES TACHES TODO -->

      <!-- LISTS DES TACHES IN PROGRESS -->

      <div class="list">

        <h3 class="list-title">Tasks Progress</h3>

        <ul class="list-items" id="accordionExample">
          <?php foreach ($progress as $index1 => $tache) { ?>
            <?php
            $badgeClass = '';
            switch ($tache['priority']) {
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
            } ?>


            <ul class="list-items">
              <li id="heading<?= $index1 ?>">
                <h6 class="mb-0"><span class="  text-light badge <?php echo $badgeClass ?>"><?= $tache['priority'] ?></span></h6>
                <input value=" <?= $tache['name'] ?>" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1<?= $index1 ?>" aria-expanded="false" aria-controls="collapse<?= $index1 ?>">
                <span><a href="detailTache?id=<?= $tache['id']  ?>" class="fa fa-eye font-italic text-success me-7" aria-hidden="true"></a></span>
                <a href="modifieTache?id=<?= $tache['id'] ?>" class="fas fa-edit fa-lg text-warning me-6 float-lg-right font-size" data-mdb-tooltip="Update" data-mdb-placement="top"></a>


              </li>

              <div id="collapse1<?= $index1 ?>" class="collapse" aria-labelledby="heading<?= $index1 ?>" data-parent="#accordionExample">
                <div class="card-body">
                  <h6>Date d'échéance :</h6>
                  <p><?= $tache['due_date'] ?></p>

                  <h6>Assigné à :</h6>
                  <p><?= $tache['assigned_to_username'] ?></p>

                  <div class="btn-group block">
                    <a href="tacheController?action=update_status&status=completed&id=<?= $tache['id'] ?>" class="btn-success">
                      <i class="fas fa-check-circle"></i> Terminé
                    </a>

                    <a href="tacheController?action=update_status&status=in_progress&id=<?= $tache['id'] ?>" class="btn-warning m-0">
                      <i class="fas fa-spinner"></i> En cours
                    </a>

                    <a href="tacheController?action=update_status&status=todo&id=<?= $tache['id'] ?>" class="btn-info">
                      <i class="fas fa-tasks"></i> À Faire
                    </a>

                  </div>
                  <a class="btn btn-light mt-5" href="tacheController?id=<?= $tache['id'] ?>" data-mdb-tooltip-init title="Remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tache ?')"><i class="    fas fa-trash-alt fa-lg text-danger"></i></a>

                  <!-- <a href="tacheController?id=<?= $tache['id'] ?>" class="btn btn-danger mt-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</a> -->
                </div>
              </div>
            </ul>
          <?php } ?>

        </ul>

        <button class="add-card-btn btn" type="button" data-toggle="modal" data-target="#tacheModal"">Add a card</button>

      </div>

      <!--FIN LISTS DES TACHES IN PROGRESS -->
      <!-- LISTS DES TACHES IN COMPLETED -->

      <div class=" list">

          <h3 class="list-title"> Tasks Completed</h3>

          <ul class="list-items" id="accordionExample">
            <?php foreach ($completes as $index2 => $tache) { ?>
              <?php
              $badgeClass = '';
              switch ($tache['priority']) {
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
              } ?>



              <ul class="list-items">
                <li id="heading<?= $index2 ?>">
                  <h6 class="mb-0"><span class=" font-weight-bold text-light badge <?php echo $badgeClass ?>"><?= $tache['priority'] ?></span></h6>
                  <input value=" <?= $tache['name'] ?>" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2<?= $index2 ?>" aria-expanded="false" aria-controls="collapse<?= $index2 ?>">
                  <span><a href="detailTache?id=<?= $tache['id']  ?>" class="fa fa-eye font-italic text-success me-7" aria-hidden="true"></a></span>
                  <a href="modifieTache?id=<?= $tache['id'] ?>" class="fas fa-edit fa-lg text-warning me-6 float-lg-right font-size" data-mdb-tooltip="Update" data-mdb-placement="top"></a>


                </li>

                <div id="collapse2<?= $index2 ?>" class="collapse" aria-labelledby="heading<?= $index2 ?>" data-parent="#accordionExample">
                  <div class="card-body">
                    <h6>Date d'échéance :</h6>
                    <p><?= $tache['due_date'] ?></p>

                    <h6>Assigné à :</h6>
                    <p><?= $tache['assigned_to_username'] ?></p>

                    <div class="btn-group block">
                      <a href="tacheController?action=update_status&status=completed&id=<?= $tache['id'] ?>" class="btn-success">
                        <i class="fas fa-check-circle"></i> Terminé
                      </a>

                      <a href="tacheController?action=update_status&status=in_progress&id=<?= $tache['id'] ?>" class="btn-warning m-0">
                        <i class="fas fa-spinner"></i> En cours
                      </a>

                      <a href="tacheController?action=update_status&status=todo&id=<?= $tache['id'] ?>" class="btn-info">
                        <i class="fas fa-tasks"></i> À Faire
                      </a>

                    </div>
                    <a class="btn btn-light mt-5" href="tacheController?id=<?= $tache['id'] ?>" data-mdb-tooltip-init title="Remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tache ?')"><i class="    fas fa-trash-alt fa-lg text-danger"></i></a>

                    <!-- <a href="tacheController?id=<?= $tache['id'] ?>" class="btn btn-danger mt-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</a> -->
                  </div>
                </div>
              </ul>

            <?php } ?>

          </ul>

          <button class="add-card-btn btn" type="button" data-toggle="modal" data-target="#tacheModal">Add a card</button>

      </div>
      <!-- FIN LISTS DES TACHES COMPLETED -->

      <!-- <div class="list">

  <h3 class="list-title">Completed progress</h3>

  <ul class="list-items">

  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div> -->

      <button class="add-list-btn btn">Add a list</button>

    </section>
    <!-- End of lists container -->
    <!-- Bouton pour ouvrir le modal -->


    <!-- Intégration de Bootstrap JS (optionnel si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->
    <?php
    require_once "../taches/create.php";
    // require_once "../taches/update.php";

    require_once '../../views/partials/foot.php';
    ?><style>
      /*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 320). 
            
The 'supports' rule will only run if your browser supports CSS grid.

Flexbox is used as a fallback so that browsers which don't support grid will still recieve an identical layout.

*/

      /* Base styles */

      :root {
        font-size: 10px;
      }

      *,
      *::before,
      *::after {
        box-sizing: border-box;
      }

      .components {
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #333;

        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        /* From https://css.glass */
        /* From https://css.glass */
        background: rgba(55, 52, 52, 0.791);
        border-bottom-right-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.061);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(55, 52, 52, 0.39);
      }

      li a {
        color: #333;

      }

      .btn {
        display: flex;
        justify-content: center;
        align-items: center;
        font: inherit;
        background: none;
        border: none;
        color: inherit;
        padding: 0;
        cursor: pointer;
      }

      :focus {
        outline-color: #fa0;
      }

      /* Masthead */

      .masthead {
        flex-basis: 4rem;
        display: flex;
        align-items: center;
        padding: 0 0.8rem;
        background: rgba(55, 52, 52, 0.791);
        background: rgba(55, 52, 52, 0.791);
        border-bottom-right-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.061);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        /* background-color: #0067a3; */
        box-shadow: 0 0.1rem 0.1rem rgba(0, 0, 0, 0.1);
      }

      body {

        background-color: #cdd2d4;
      }

      .masthead .btn {
        background-color: #4c94be;
        border-radius: 0.3rem;
        transition: background-color 150ms;
      }

      .masthead .btn:hover {
        background-color: #3385b5;
      }

      .boards-menu {
        display: flex;
        flex-shrink: 0;
      }

      .boards-btn {
        flex-basis: 9rem;
        font-size: 1.4rem;
        font-weight: 700;
        color: #fff;
        margin-right: 0.8rem;
        padding: 0.6rem 0.8rem;
      }

      .boards-btn-icon {
        font-size: 1.7rem;
        padding-right: 1.2rem;
      }

      .board-search {
        flex-basis: 18rem;
        position: relative;
      }

      .board-search-input {
        height: 3rem;
        border: none;
        border-radius: 0.3rem;
        background-color: #4c94be;
        width: 100%;
        padding: 0 3rem 0 1rem;
        color: #fff;
      }

      .board-search-input:hover {
        background-color: #66a4c8;
      }

      .search-icon {
        font-size: 1.5rem;
        position: absolute;
        top: 50%;
        right: 0.8rem;
        transform: translateY(-50%) rotate(90deg);
        color: #fff;
      }

      .logo {
        flex: 1;
        font-family: "Courgette", cursive;
        font-size: 2.2rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.5);
        margin: 0 2rem;
        transition: color 150ms;
        text-align: center;
        white-space: nowrap;
        cursor: pointer;
      }

      .logo:hover {
        color: rgba(255, 255, 255, 0.8);
      }

      .logo-icon {
        padding-right: 0.4rem;
      }

      .user-settings {
        display: flex;
        height: 3rem;
        color: #fff;
      }

      .user-settings-btn {
        font-size: 1.5rem;
        width: 3rem;
        margin-right: 0.8rem;
      }

      .user-settings-btn:last-of-type {
        margin-right: 0;
      }

      /* Board info bar */

      .board-info-bar {
        flex-basis: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 0.8rem 0;
        padding: 0 1rem;
        color: #f6f6f6;
      }

      .board-controls {
        display: flex;

      }

      .board-controls .btn {
        margin-right: 1rem;
      }

      .board-controls .btn:last-of-type {
        margin-right: 0;
      }

      .board-info-bar .btn {
        font-size: 1.4rem;
        font-weight: 400;
        transition: background-color 150ms;
        padding: 0 0.6rem;
        border-radius: 0.3rem;
        height: 3rem;
      }

      .board-info-bar .btn:hover {
        background-color: #006aa8;
      }

      .private-btn-icon,
      .menu-btn-icon {
        padding-right: 0.6rem;
        white-space: nowrap;
      }

      .board-title h2 {
        font-size: 1.8rem;
        font-weight: 700;
        white-space: nowrap;
      }

      /* Lists */

      .lists-container::-webkit-scrollbar {
        height: 2.4rem;
      }

      .lists-container::-webkit-scrollbar-thumb {
        background-color: #66a3c7;
        border: 0.8rem solid #0079bf;
        border-top-width: 0;

      }

      .lists-container {
        display: flex;
        align-items: start;
        padding: 0 0.8rem 0.8rem;
        overflow-x: auto;
        height: calc(100vh - 8.6rem);
      }

      .list {
        flex: 0 0 27rem;
        display: flex;
        flex-direction: column;
        background-color: #e2e4e6;
        border-radius: 0.3rem;
        margin-right: 1rem;
        /* From https://css.glass */
        /* From https://css.glass */
        background: rgba(255, 255, 255, 0.79);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(11.6px);
        -webkit-backdrop-filter: blur(11.6px);
        border: 1px solid rgba(255, 255, 255, 0.25);
      }

      .list:last-of-type {
        margin-right: 0;
      }

      .list-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #333;
        padding: 1rem;
      }

      .list-items {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-content: start;
        padding: 0 0.6rem 0.5rem;
        overflow-y: auto;
      }

      .list-items::-webkit-scrollbar {
        width: 1.6rem;
      }

      /* .list-items::-webkit-scrollbar-thumb {
        background-color: #c4c9cc;
        border-right: 0.6rem solid #e2e4e6;
      } */

      .list-items li {
        font-size: 1.4rem;
        font-weight: 400;
        line-height: 1.3;
        background-color: #fff;
        padding: 0.65rem 0.6rem;
        color: #4d4d4d;
        border-bottom: 0.1rem solid #ccc;
        border-radius: 0.3rem;
        margin-bottom: 0.6rem;
        word-wrap: break-word;
        cursor: pointer;
        border-bottom-right-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.061);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
      }

      .list-items li input {
        font-size: 1.4rem;
        font-weight: 400;
        line-height: 1.3;
        text-align: center;

      }


      .list-items li:last-of-type {
        margin-bottom: 0;
      }

      .list-items li:hover {
        background-color: #eee;
      }

      .add-card-btn {
        display: block;
        font-size: 1.4rem;
        font-weight: 400;
        color: #838c91;
        padding: 1rem;
        text-align: left;
        cursor: pointer;
      }

      .add-card-btn:hover {
        background-color: #cdd2d4;
        color: #4d4d4d;
        text-decoration: underline;
      }

      .add-list-btn {
        flex: 0 0 27rem;
        display: block;
        font-size: 1.4rem;
        font-weight: 400;
        background-color: #006aa7;
        color: #a5cae0;
        padding: 1rem;
        border-radius: 0.3rem;
        cursor: pointer;
        transition: background-color 150ms;
        text-align: left;
      }

      .add-list-btn:hover {
        background-color: #005485;
      }

      .add-card-btn::after,
      .add-list-btn::after {
        content: '...';
      }

      /*

The following rule will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

*/

      @supports (display: grid) {
        body {
          display: grid;
          grid-template-rows: 4rem 3rem auto;
          grid-row-gap: 0.8rem;
        }

        .masthead {
          display: grid;
          grid-template-columns: auto 1fr auto;
          grid-column-gap: 2rem;
        }

        .boards-menu {
          display: grid;
          grid-template-columns: 9rem 18rem;
          grid-column-gap: 0.8rem;
        }

        .user-settings {
          display: grid;
          grid-template-columns: repeat(4, auto);
          grid-column-gap: 0.8rem;
        }

        .board-controls {
          display: grid;
          grid-auto-flow: column;
          grid-column-gap: 1rem;
        }

        .lists-container {
          display: grid;
          grid-auto-columns: 27rem;
          grid-auto-flow: column;
          grid-column-gap: 1rem;
        }

        .list {
          display: grid;
          grid-template-rows: auto minmax(auto, 1fr) auto;
        }

        .list-items {
          display: grid;
          grid-row-gap: 0.6rem;
        }

        .logo,
        .list,
        .list-items li,
        .boards-btn,
        .board-info-bar,
        .board-controls .btn,
        .user-settings-btn {
          margin: 0;
        }
      }
    </style>