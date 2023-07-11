<?php require 'layouts/header.php'; ?>               
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class=" container-xxl flex-grow-1 container-p-y">
            <div class="d-flex flex-column justify-content-start align-items-center h-100">
                <div class="d-flex justify-content-between w-100 mb-4">
                    <h4 class="fw-bold">Votre solde</h4>
                
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
