<?php
require_once '../../views/partials/head.php';
require_once 'public.php';
?>

<div class="wrapper d-flex align-items-stretch">
  <?php
  require_once '../../views/partials/sidbar.php';
  ?>

  <div class=" container">
    <div class="d-grid gap-5 d-md-flex justify-content-md-end">
      <button class="btn btn-primary w-25 me-md-2 bit" type="button" data-toggle="modal" data-target="#loginModal" type="button">Add projet</button>
    </div>
    <!-- Bouton pour ouvrir le modal -->


    <!-- Modal -->
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header ">
            <h5 class="modal-title" id="loginModalLabel">Add a projet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
<!-- Vue pour la mise à jour d'un projet -->
<form action="projetController" method="post">
<input type="hidden" name="projet_id" value="<?php echo $proje['id']; ?>">

    <div class="input-container ic2">
              <input id="name" class="input" name="name" type="text" placeholder=" "  value="<?php echo $proje['name']; ?>" required />
              <div class="cut"></div>
              <label for="name" class="placeholder">Nom du projet</label>
            </div>
            <div class="input-container ic2">
              <textarea name="description" class="input" id="description" cols="90" rows="10" placeholder=" "  required><?= $proje['description']; ?></textarea>
              <div class="cut"></div>
              <label for="description" class="placeholder">Description</label>
            </div>
            <button type="text" name="editProjet" class="submit">Modifier</button>

</form>

          

      </div>
    </div>
  </div>
</div>
</div>


<style>
  .modal-content {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 360px;
    padding: 20px;
    width: 420px;
  }

  .title {
    color: aliceblue;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
    margin-top: 30px;
  }

  .subtitle {
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
  }

  .input-container {
    height: 50px;
    position: relative;
    width: 100%;
  }

  .ic1 {
    margin-top: 40px;
  }

  .ic2 {
    margin-top: 30px;
  }

  .input {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding: 4px 20px 0;
    width: 100%;
  }

  .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 20px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
  }

  .cut-short {
    width: 50px;
  }

  .input:focus~.cut,
  .input:not(:placeholder-shown)~.cut {
    transform: translateY(8px);
  }

  .placeholder {
    color: #65657b;
    font-family: sans-serif;
    left: 20px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
  }

  .input:focus~.placeholder,
  .input:not(:placeholder-shown)~.placeholder {
    transform: translateY(-30px) translateX(10px) scale(0.75);
  }

  .input:not(:placeholder-shown)~.placeholder {
    color: #808097;
  }

  .input:focus~.placeholder {
    color: #dc2f55;
  }

  .submit {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    margin-top: 38px;
    outline: 0;
    text-align: center;
    width: 100%;
  }

  .submit:active {
    background-color: #06b;
  }
</style>
<!-- Intégration de Bootstrap JS (optionnel si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->
<?php
require_once '../../views/partials/foot.php';
?>