<?php
require_once 'public.php';


require_once '../../views/partials/head.php';
?>

<div class="wrapper d-flex align-items-stretch">
  <?php
  require_once '../../views/partials/sidbar.php';
  ?>
  <div class=" container">
    <!-- Masthead -->
    <!-- <header class="masthead">

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

    </header> -->
    <!-- End of masthead -->


    <!-- Board info bar -->
    <section class="board-info-bar">

      <div class="board-controls">

        <button class="board-title btn">
          <h2>Web Development</h2>
        </button>

        <button class="star-btn btn" aria-label="Star Board">
          <i class="far fa-star" aria-hidden="true"></i>
        </button>

        <button class="personal-btn btn">Personal</button>

        <button class="private-btn btn"><i class="fas fa-briefcase private-btn-icon" aria-hidden="true"></i>Private</button>

      </div>

      <button class="menu-btn btn"><i class="fas fa-ellipsis-h menu-btn-icon" aria-hidden="true"></i>Show Menu</button>

    </section>


    <!-- btn ajouter -->

    <!-- LISTS TOUT LES TACHES TACHES -->
    <div class="container mt-5 mb-3">
      <button class="card p-3 mb-2 add-card-btn btn-outline-primary" type="button" data-toggle="modal" data-target="#projetModal">Add a projet</button>


      <div class="row">
        <?php foreach ($projets  as $projet) { ?>

          <div class="col-md-4 radio   mb-4 ">
            <div class="card p-3 mb-2 box">
              <div  class=" badge-dark mb-3 btn-lg d-flex justify-content-between" type="button" data-toggle="modal" data-target="#updateprojetModal">
                <a class="d-flex flex-row align-items-center" href="modifieProjet?id=<?= $projet['id'] ?>" data-mdb-tooltip-init title="update"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
                <a class="" href="projetController?id=<?= $projet['id'] ?>" data-mdb-tooltip-init title="Remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')"><i class="fas fa-trash-alt fa-lg text-warning"></i></a>
                <!-- <a class="" href="projetController?action=delete&id=<?= $projet['id'] ?>" data-mdb-tooltip-init title="Remove" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')"><i class="fas fa-trash-alt fa-lg text-warning"></i></a> -->

              </div>
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                  <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                  <div class="ms-2 c-details">
                    <h6 class="mb-0"><?= $projet['user_name']  ?></h6> <span><?= $projet['email']  ?></span>
                  </div>
                </div>
                <div class="badge"> <span><?= $projet['date_projet']  ?></span> </div>
              </div>

              <div class="mt-1">
                <h3 class="heading  "><?= $projet['project_name']  ?></h3>
                <div class="mt-2">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0.9%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="mt-0 text1"> Description : <span class=" heading"><?= $projet['description']  ?></span> 
                  </div>
                </div>
              </div>
            </div>
          </div> <?php } ?>


      </div>
    </div>
    </section>
    <!-- End of lists container -->
    <!-- Bouton pour ouvrir le modal -->


    <!-- Intégration de Bootstrap JS (optionnel si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->
    <?php
    require_once 'create.php';
    // require_once 'update.php';

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

      .box {
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #333;

        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        /* From https://css.glass */
        /* From https://css.glass */
        border-radius: 16px;
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
        max-height: calc(100vh - 11.8rem);
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

      .list-items::-webkit-scrollbar-thumb {
        background-color: #c4c9cc;
        border-right: 0.6rem solid #e2e4e6;
      }

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