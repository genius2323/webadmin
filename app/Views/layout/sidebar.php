<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <?php $departmentId = session()->get('department_id'); ?>
                <?php if ($departmentId == 1): // POS ?>
                    <?php $uri = service('uri'); ?>
                    <li class="app-sidebar__heading">POS Menu</li>
                    <li>
                        <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard POS
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('pos/transaksi') ?>" class="<?= $uri->getSegment(1) == 'pos' && $uri->getSegment(2) == 'transaksi' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-cash"></i>
                            Transaksi
                        </a>
                    </li>
                <?php elseif ($departmentId == 2): // Backoffice ?>
                    <?php $uri = service('uri'); ?>
                    <li class="app-sidebar__heading">Backoffice Menu</li>
                    <li>
                        <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard Backoffice
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('backoffice/laporan') ?>" class="<?= $uri->getSegment(1) == 'backoffice' && $uri->getSegment(2) == 'laporan' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-graph"></i>
                            Laporan
                        </a>
                    </li>
                <?php elseif ($departmentId == 3): // General ?>
                    <?php $uri = service('uri'); ?>
                    <li class="app-sidebar__heading">General Menu</li>
                    <li>
                        <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard General
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Master</li>
                    <li>
                        <a href="#" class="<?= $uri->getSegment(1) == 'user' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-users"></i>
                            Manajemen User
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?= site_url('user') ?>" class="<?= $uri->getSegment(1) == 'user' ? 'mm-active' : '' ?>">
                                    <i class="metismenu-icon pe-7s-id"></i>
                                    Data User
                                </a>
                            </li>
                        </ul>
                    </li>                    
                    
                <?php else: // Default ?>
                    <?php $uri = service('uri'); ?>
                    <li class="app-sidebar__heading">Menu</li>
                    <li>
                        <a href="<?= site_url('/') ?>" class="<?= $uri->getSegment(1) == '' ? 'mm-active' : '' ?>">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                <?php endif; ?>
            </ul>                
        </div>
    </div>
</div>
