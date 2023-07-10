<?php require 'layouts/header.php'; ?>               
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class=" container-xxl flex-grow-1 container-p-y">
            <div class="d-flex flex-column justify-content-start align-items-center h-100">
                <div class="d-flex justify-content-between w-100 mb-4">
                    <h4 class="fw-bold">Votre solde: <?php echo $_SESSION['wallet'].' Ar'?></h4>
                </div>

                <div class="card w-50 d-flex justify-content-center align-items-center mb-4">
                    <div class="table-responsive text-nowrap d-flex flex-column"><div class="card-body">
                        <form action="<?= base_url('/user/validation_user')?>" method="POST">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Code</label>
                                <input type="text" class="form-control" name="code" placeholder="Entrer un code valide" >
                                <button type="submit" class="btn btn-primary">
                                    <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Valider
                                </button>
                            </div>
                        </form>
                      
                    </div>
                    </div>
                </div>
                <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Codes</th>
                            <th>Valeur</th>
                            <th>Statut</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php for($i = 0; $i < count($code); $i++){ ?>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $code[$i]?></strong></td>
                                    <td><?= $valeur[$i] ?></td>
                                    <td><span class="badge bg-label-primary me-1"><?php echo ($is_valide[$i] == 1) ? 'Valide' : 'Non valide' ?></span></td>
                                
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'layouts/footer.php'; ?>
