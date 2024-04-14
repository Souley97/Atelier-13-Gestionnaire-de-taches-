<?php  
require_once '../../views/partials/head.php';
?>
 
  <div class="wrapper d-flex align-items-stretch">
  <?php  
require_once '../../views/partials/sidbar.php';
?>
<section class="vh-100 container" style="background-color: #e2d5de;"> 
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5">

            <h6 class="mb-3">Status des tachs</h6>
           
</div>

            <form method="post" action="" class="d-flex justify-content-center align-items-center mb-4">
              <div data-mdb-input-init class="form-outline flex-fill">

                <input type="text" id="form3" class=" input form-control-lg" placeholder="add status"/>
                <div class="cut"></div>

              </div>
              <button type="submit" name="addStatus" class="btn btn-primary  ms-6">Add</button>
            </form>

            <ul class="list-group mb-0">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                <div class="d-flex align-items-center">
                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                  Cras justo odio
                </div>
                <a href="#!" data-mdb-tooltip-init title="Remove item">
                  <i class="fas fa-times text-primary"></i>
                </a>
              </li>
              
            </ul>

          </div>
        </div>

      </div>
    </div>
  </div>
</section> <?php  
require_once '../../views/partials/foot.php';
?>