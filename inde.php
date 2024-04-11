<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&family=Nunito:wght@400;600&display=swap">
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>
<style>.gradient-custom-2 {
  /* fallback for old browsers */
  background: #7e40f6;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(
    to right,
    rgba(126, 64, 246, 1),
    rgba(80, 139, 252, 1)
  );

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(
    to right,
    rgba(126, 64, 246, 1),
    rgba(80, 139, 252, 1)
  );
}

.mask-custom {
  background: rgba(24, 24, 16, 0.2);
  border-radius: 2em;
  backdrop-filter: blur(25px);
  border: 2px solid rgba(255, 255, 255, 0.05);
  background-clip: padding-box;
  box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}</style>
<body>
<section class="vh-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">

        <div class="card mask-custom">
          <div class="card-body p-4 text-white">

            <div class="text-center pt-3 pb-2">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                alt="Check" width="60">
              <h2 class="my-4">Task List</h2>
            </div>

            <table class="table text-white mb-0">
              <thead>
                <tr>
                  <th scope="col">Team Member</th>
                  <th scope="col">Task</th>
                  <th scope="col">Priority</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">Alice Mayer</span>
                  </th>
                  <td class="align-middle">
                    <span>Call Sam For payments</span>
                  </td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-danger">High priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-tooltip-init title="Done"><i
                        class="fas fa-check fa-lg text-success me-3"></i></a>
                    <a href="#!" data-mdb-tooltip-init title="Remove"><i
                        class="fas fa-trash-alt fa-lg text-warning"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">Kate Moss</span>
                  </th>
                  <td class="align-middle">Make payment to Bluedart</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-success">Low priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-tooltip-init title="Done"><i
                        class="fas fa-check fa-lg text-success me-3"></i></a>
                    <a href="#!" data-mdb-tooltip-init title="Remove"><i
                        class="fas fa-trash-alt fa-lg text-warning"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">Danny McChain</span>
                  </th>
                  <td class="align-middle">Office rent</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-warning">Middle priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-tooltip-init title="Done"><i
                        class="fas fa-check fa-lg text-success me-3"></i></a>
                    <a href="#!" data-mdb-tooltip-init title="Remove"><i
                        class="fas fa-trash-alt fa-lg text-warning"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">Alexa Chung</span>
                  </th>
                  <td class="align-middle">Office grocery shopping</td>
                  <td class="align-middle">
                    <h6 class="mb-0"><span class="badge bg-danger">High priority</span></h6>
                  </td>
                  <td class="align-middle">
                    <a href="#!" data-mdb-tooltip-init title="Done"><i
                        class="fas fa-check fa-lg text-success me-3"></i></a>
                    <a href="#!" data-mdb-tooltip-init title="Remove"><i
                        class="fas fa-trash-alt fa-lg text-warning"></i></a>
                  </td>
                </tr>
                <tr class="fw-normal">
                  <th class="border-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                      alt="avatar 1" style="width: 45px; height: auto;">
                    <span class="ms-2">Ben Smith</span>
                  </th>
                  <td class="border-0 align-middle">Ask for Lunch to Clients</td>
                  <td class="border-0 align-middle">
                    <h6 class="mb-0"><span class="badge bg-success">Low priority</span></h6>
                  </td>
                  <td class="border-0 align-middle">
                    <a href="#!" data-mdb-tooltip-init title="Done"><i
                        class="fas fa-check fa-lg text-success me-3"></i></a>
                    <a href="#!" data-mdb-tooltip-init title="Remove"><i
                        class="fas fa-trash-alt fa-lg text-warning"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>


          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</body>
</html>