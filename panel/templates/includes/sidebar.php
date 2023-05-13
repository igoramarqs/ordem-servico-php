<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $CONFIGURATION['site_url']; ?>">
        <i class="fas fa-wrench"></i>
        <div class="sidebar-brand-text mx-2"><?= $CONFIGURATION['site_name']; ?></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= actuallyPage('index.php'); ?>">
        <a class="nav-link" href="<?= $CONFIGURATION['site_url']; ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Início</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        GERENCIAMENTO
    </div>

    <li class="nav-item <?= actuallyPage('user.php') || actuallyPage('list-users.php') || actuallyPage('add-user.php'); ?>">
        <a class="nav-link" href="<?=$CONFIGURATION['site_url'] . 'panel/users/list-users';?>">
            <i class="fas fa-fw fa-user-check"></i>
            <span>Usuários</span></a>
    </li>

    <li class="nav-item <?= actuallyPage('customer.php') || actuallyPage('list-customers.php') || actuallyPage('add-customer.php'); ?>">
        <a class="nav-link" href="<?=$CONFIGURATION['site_url'] . 'panel/customers/list-customers';?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span></a>
    </li>

    <li class="nav-item <?= actuallyPage('order.php') || actuallyPage('list-orders.php') || actuallyPage('add-order.php') || actuallyPage('view-order.php'); ?>">
        <a class="nav-link" href="<?=$CONFIGURATION['site_url'] . 'panel/orders/list-orders';?>">
            <i class="fas fa-paste"></i>
            <span>Ordens de serviço</span></a>
    </li>

    <li class="nav-item <?= actuallyPage('princing.php') || actuallyPage('list-princings.php') || actuallyPage('add-princing.php'); ?>">
        <a class="nav-link" href="<?=$CONFIGURATION['site_url'] . 'panel/princings/list-princings';?>">
            <i class="fas fa-dollar-sign"></i>
            <span>Precificação</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>