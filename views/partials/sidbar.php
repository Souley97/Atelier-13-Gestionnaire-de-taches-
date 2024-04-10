<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['user'])) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login");
    exit;
}
// Récupérer les informations de l'utilisateur depuis la session
$user = $_SESSION['user'];



?>
<nav id="sidebar" class="fix">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(public/images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(public/images/BMB.png);"></div>
	  				<h3><?php echo $user['username']; ?>
	  				<h3><?php echo $user['email']; ?>
</h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="dashboard"><span class="fa fa-home mr-3"></span> Dashboard</a>
          </li>
          <li>
            <a href="listeProjets"><span class="fa fa-trophy mr-3"></span> Projets</a>
          </li>
          <li>
            <a href="listeTaches"><span class="fa fa-cog mr-3"></span> Taches</a>
          </li>
          <li>
              <a href="listeUsers"><span class="fa fa-download mr  -3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Utilisateurs</a>
          </li>
          <li>
            <a href="listeStatus"><span class="fa fa-gift mr-3"></span> Status</a>
          </li>
          <li>
            <a href="login"><span class="fa fa-support mr-3"></span> login</a>
          </li>
          <li>
            <a href="logout"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>