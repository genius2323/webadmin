<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- Anda bisa mengubah judul halaman secara dinamis dari controller -->
    <title><?= esc($title ?? 'Default Title') ?> | Web Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->

    <!-- Memuat file CSS utama dari folder /public -->
    <link href="<?= base_url('assets/css/base.css') ?>" rel="stylesheet">
    <link href="<?= base_url('desain/assets/css/fa-bold-icons.css') ?>" rel="stylesheet">
    <style>
        .app-sidebar.sidebar-shadow .scrollbar-sidebar {
            height: calc(100vh - 80px); /* Sesuaikan 80px dengan tinggi header Anda jika perlu */
            overflow-y: auto;
        }
        /* Fix modal always on top */
        .modal,
        .modal.show {
            z-index: 21000 !important;
        }
        .modal-backdrop, .blockOverlay {
            z-index: 10000 !important;
        }
        /* Prevent parent overflow from hiding modal */
        .app-main__outer, .main-content, .app-main__inner, .app-content, .main-card, .card-body {
            overflow: visible !important;
        }
        /* Footer tidak menindih modal */
        .app-footer {
            z-index: 100 !important;
        }
        body.modal-open .app-footer {
            z-index: 1 !important;
        }
    </style>

    <!-- JQuery dan vendor JS -->
    <script src="<?= base_url('assets/js/vendors/jquery-3.4.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/vendors/metismenu.js') ?>"></script>
    <script>
    $(document).ready(function() {
        // Hamburger sidebar collapse/minified
        $('.close-sidebar-btn').on('click', function() {
            $('.app-container').toggleClass('closed-sidebar');
            $(this).toggleClass('is-active');
            // Hide logo when sidebar is minified
            if ($('.app-container').hasClass('closed-sidebar')) {
                $('#adminPanelLogo').css('opacity', '0');
            } else {
                $('#adminPanelLogo').css('opacity', '1');
            }
        });
        // Hamburger mobile sidebar
        $('.mobile-toggle-nav').on('click', function() {
            $('.app-container').toggleClass('sidebar-mobile-open');
            $(this).toggleClass('is-active');
        });
    });
    </script>
    <script src="<?= base_url('assets/js/scripts-init/app.min.js') ?>"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
        <!-- Menyisipkan Header -->
        <?= $this->include('layout/header') ?>

        <div class="app-main">
            <!-- Menyisipkan Sidebar -->
            <?= $this->include('layout/sidebar') ?>

            <div class="app-main__outer">
                <div class="main-content">
                    <div class="app-main__inner app-content">
                        <!-- KONTEN UTAMA HALAMAN DIMUAT DI SINI -->
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>                
            </div>
        </div>
        <!-- Menyisipkan Footer -->
                <?= $this->include('layout/footer') ?>
    </div>


    <!-- Memuat Bootstrap JS agar modal bisa berjalan -->
    <script src="<?= base_url('assets/js/vendors/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/scripts-init/app.js') ?>"></script>
</body>

    <?php if (isset($modalSalesHtml)) echo $modalSalesHtml; ?>
</html>
