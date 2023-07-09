<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Inscription</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">Inscription</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2"></h4>

              <form id="formAuthentication" class="mb-3" action="<?= base_url('auth/create'); ?>" method="POST" autocomplete="off"  enctype="multipart/form-data">
              
                <?php $validation = \Config\Services::validation(); 
                    helper('Form_helper');
                ?>
           
                <?= csrf_field(); ?>
                <?php if( !empty( session()->getFlashdata('fail') ) ) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if( !empty( session()->getFlashdata('success') ) ) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>


                <div class="mb-3">
                    <label for="username" class="form-label">Nom</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="nom"
                        placeholder="Entrer le nom de votre entreprise"
                        autofocus
                        value="<?= set_value('nom') ?>"
                    />
                    <?php if(session('validation') && session('validation')->hasError('nom')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('nom'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input class="form-control" type="file" name="logo" id="logo" value="<?= set_value('logo') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('logo')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('logo'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Entrer votre email"  value="<?= set_value('email') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('email')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('email'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Entrer votre numero telephone"  value="<?= set_value('telephone') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('telephone')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('telephone'); ?></small>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="telecopie" class="form-label">Telecopie</label>
                    <input type="text" class="form-control" id="telecopie" name="telecopie" placeholder="Entrer votre numero telecopie"  value="<?= set_value('telephone') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('telecopie')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('telecopie'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="objet" class="form-label">Objet</label>
                    <input type="text" class="form-control" id="objet" name="objet" placeholder="Entrer votre objet"  value="<?= set_value('objet') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('objet')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('objet'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="siege" class="form-label">Siege</label>
                  <input type="text" class="form-control" id="siege" name="siege" placeholder="Entrer votre siege"  value="<?= set_value('siege') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('siege')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('siege'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="creation" class="form-label">Date de creation</label>
                  <input type="date" class="form-control" id="creation" name="creation" placeholder="Entrer la date de creation de votre entreprise"  value="<?= set_value('creation') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('creation')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('creation'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="num_registre_commerce" class="form-label">Numero de registre du commerce</label>
                  <input type="text" class="form-control" id="num_registre_commerce" name="num_registre_commerce" placeholder="Entrer votre numero de registre"  value="<?= set_value('numero_registre') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('num_registre_commerce')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('num_registre_commerce'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="nif" class="form-label">NIF</label>
                    <input class="form-control" type="file" name="nif" id="nif" value="<?= set_value('nif') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('nif')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('nif'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="stat" class="form-label">STAT</label>
                  <input type="file" class="form-control" id="stat" name="stat" placeholder="Entrer votre numero STAT"  value="<?= set_value('stat') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('stat')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('stat'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="statut" class="form-label">Statut</label>
                  <input type="text" class="form-control" id="statut" name="statut" placeholder="Entrer votre statut"  value="<?= set_value('statut') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('statut')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('statut'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="debut_exercice" class="form-label">Date de debut d'exercice</label>
                  <input type="date" class="form-control" id="debut_exercice" name="debut_exercice" placeholder="Entrer la date du debut de votre exercice"  value="<?= set_value('debut_exercice') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('debut_exercice')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('debut_exercice'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="taux_tva" class="form-label">Taux TVA</label>
                  <input type="number" class="form-control" id="taux_tva" name="taux_tva" placeholder="Entrer le taux du TVA(par defaut 20%)"  value="<?= set_value('taux_tva') ?>"/>
                    <?php if(session('validation') && session('validation')->hasError('taux_tva')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('taux_tva'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="devise" class="form-label">Devise de tenue de compte</label>
                    <select class="form-select" name="devise" id="devise"  aria-label="Default select example">
                        <?php foreach ($devises as $devise) : ?>
                            <option value="<?php echo $devise['id_devise']; ?>"><?php echo $devise['nom_devise']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Mot de passe</label>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="mdp"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        value="<?= set_value('mdp') ?>"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <?php if(session('validation') && session('validation')->hasError('mdp')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('mdp'); ?></small>
                    <?php endif; ?>
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Confirmer votre mot de passe</label>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="cmdp"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <?php if(session('validation') && session('validation')->hasError('cmdp')): ?>
                        <small class="text-danger"><?php echo session('validation')->getError('cmdp'); ?></small>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                </div>
                <button class="btn btn-primary d-grid w-100" type="submit">S'inscrire</button>
              </form>

              <p class="text-center">
                <span>Vous avez déjà un compte?</span>
                <a href="<?= base_url('auth/login') ?>">
                  <span>Se connecter à votre compte</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
