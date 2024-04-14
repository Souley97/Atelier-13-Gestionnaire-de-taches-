<!-- Bouton pour ouvrir le modal -->


<!-- Modal -->
<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content float-xl-right" style="height: 310px;padding: 0px; width: 270px;">
            <!-- <div class="modal-header "> Projet :
                <input class="input" type="text" value="<?php echo $proje['name']; ?>" disabled="disabled">


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <h5 class="modal-title text-white" id="loginModalLabel">Invitation</h5>


                <form action="userProjetController" method="post">
                    <select name="project_id" id="project_id " style="display:none;">
                        <!-- Options pour les projets -->
                        <option value="<?php echo $proje['id']; ?>"><?php echo $proje['name']; ?></option>
                    </select><br>
                    <label for="user_id">Utilisateur :</label>
                    <select name="user_id" id="user_id" class="input">
                        <!-- Options pour les utilisateurs -->
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                        <?php endforeach; ?>
                    </select><br>



                    <button type="submit" name="invite_user" class="submit">Inviter Utilisateur</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Intégration de Bootstrap JS (optionnel si vous n'utilisez pas de fonctionnalités JavaScript de Bootstrap) -->