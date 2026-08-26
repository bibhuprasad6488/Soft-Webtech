<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= $base_url ?>/dashboard">
            <span class="align-middle">Admin</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?php echo ($currpage == 'dashboard') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li
                class="sidebar-item <?php echo (isset($currpage) && ($currpage == 'blogs') || ($currpage == 'add_post') || ($currpage == 'edit_post')) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/blogs">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span class="align-middle">Blogs</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo (isset($currpage) && in_array($currpage, ['f-homepage', 'f-about-us', 'f-contact'])) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="#pagesMenu" data-bs-toggle="collapse"
                    aria-expanded="<?= (isset($currpage) && in_array($currpage, ['f-homepage', 'f-about-us', 'f-contact'])) ? 'true' : 'false'; ?>">
                    <i class="align-middle" data-feather="list"></i>
                    <span class="align-middle">
                        Cms Pages
                    </span>
                    <i class="align-middle ms-auto" data-feather="chevron-down"></i>
                </a>

                <ul id="pagesMenu" class="sidebar-dropdown list-unstyled collapse 
                <?php echo (isset($currpage) && in_array($currpage, ['f-homepage', 'f-about-us', 'f-contact'])) ? 'show' : ''; ?>">

                    <li class="sidebar-item <?php echo ($currpage == 'f-homepage') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="<?= $base_url ?>/f-homepage">
                            Home
                        </a>
                    </li>

                    <li class="sidebar-item <?php echo ($currpage == 'f-about-us') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="<?= $base_url ?>/f-about-us">
                            About
                        </a>
                    </li>
                </ul>
            </li>


            <!-- <li class="sidebar-item <?php echo (isset($currpage) && in_array($currpage, ['users', 'create-user', 'edit-user'])) ? 'active' : ''; ?>">

                <a class="sidebar-link" href="#usersMenu" data-bs-toggle="collapse"
                    aria-expanded="<?= (isset($currpage) && in_array($currpage, ['users', 'create-user', 'edit-user'])) ? 'true' : 'false'; ?>">

                    <i class="align-middle" data-feather="users"></i>

                    <span class="align-middle">
                        Users
                    </span>
                    <i class="align-middle ms-auto" data-feather="chevron-down"></i>
                </a>

                <ul id="usersMenu" class="sidebar-dropdown list-unstyled collapse 
                <?php echo (isset($currpage) && in_array($currpage, ['users', 'create-user', 'edit-user'])) ? 'show' : ''; ?>">

                    <li class="sidebar-item <?php echo ($currpage == 'users') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="<?= $base_url ?>/users">
                            All Users
                        </a>
                    </li>

                    <li class="sidebar-item <?php echo ($currpage == 'create-user') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="<?= $base_url ?>/create-user">
                            Create User
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>

        <!-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> -->
    </div>
</nav>