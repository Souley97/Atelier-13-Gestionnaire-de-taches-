<div class="form-group">
                                    <label for="etat">Etat :</label>
                                    <select class="form-control" id="etat" name="etat" required>
                                        <option value="actif" <?= $membre['etat'] == 'actif' ? 'selected' : '' ?>>Actif</option>
                                        <option value="retraite" <?= $membre['etat'] == 'retraite' ? 'selected' : '' ?>>Retraite
                                        </option>
                                        <option value="chomeur" <?= $membre['etat'] == 'chomeur' ? 'selected' : '' ?>>Chomeur
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idStatut">Statut :</label>
                                    <select class="form-control" id="idStatut" name="idStatut" required>
                                        <!-- Options dynamiques chargées à partir de la base de données -->
                                        <?php
                                        require_once '../../models/MembreDB.php';
                                        $results = new MembreDB($connexion);
                                        $statuts = $results->getStatuts();
                                        foreach ($statuts as $statut): ?>
                                            <option value="<?= $statut['id'] ?>">
                                                <?= $statut['libelle'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>