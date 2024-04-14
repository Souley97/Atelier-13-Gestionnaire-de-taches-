<header class="masthead">

<div class="boards-menu">

  <!-- <button class="boards-btn btn"><i class="fab fa-trello boards-btn-icon"></i>Boards</button>

  <div class="board-search">
    <input type="search" class="board-search-input" aria-label="Board Search">
    <i class="fas fa-search search-icon" aria-hidden="true"></i>
  </div> -->

</div>

<div class="logo">

  <h1 class=" text-white "><i class=" text-white fab fa-simplon logo-icon" aria-hidden="true"></i>P7 Simplon</h1>

</div>

<div class="user-settings">

  <button class="user-settings-btn btn" data-toggle="modal" data-target="#inviteModal" aria-label="Create">
    <i class="fas fa-plus" aria-hidden="true"></i>
  </button>
  <button class="user-settings-btn btn" aria-label="User Settings">
    <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle" aria-hidden="true"></i>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php foreach ($pusers as $user) : ?>
        <a class="dropdown-item" href="#"><?php echo $user['username']; ?></a>
      <?php endforeach; ?>

    </div>
  </button>
  <!-- Bouton pour ouvrir le popup -->

  <button class="user-settings-btn btn" aria-label="Information">
    <i class="fas fa-info-circle" aria-hidden="true"></i>
  </button>

  <button class="user-settings-btn btn" aria-label="Notifications">
    <i class="fas fa-bell" aria-hidden="true"></i>
  </button>

 
</div>

</header>