

  <!-- Bouton pour ouvrir le modal -->


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulaire de connexion  id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATE,
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    status_id INT,
    assigned_to INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES status(id),
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL -->


        <form action="" method="post" class="form">
   
    <div class="input-container ic2">
        <input id="name" class="input" name="name" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="name" class="placeholder"> name</label>
    </div>
    <div class="input-container ic2">
        <input id="description" class="input" name="description" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="description" class="placeholder"> Description</label>
    </div>
    <div class="input-container ic2">
        <input id="due_date" class="input" name="due_date" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="due_date" class="placeholder"> due_date</label>
    </div>
    <div class="input-container ic2">
        <input id="description" class="input" name="description" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="description" class="placeholder"> Description</label>
    </div>
    <button type="text" name="addTache" class="submit">submit</button>
</div>
      </div>

    </div>
  </div>
</div>
</div>

<style>

 .modal-content{
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 800px;
    padding: 20px;
    width: 520px;
}

.title {
    color: #eee;
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
}</style>
 <!-- Intégration de Bootstrap JS (optionnel si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->
