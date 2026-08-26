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
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <!-- <li class="sidebar-item <?php echo ($currpage == 'yt-content-fetch') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/yt-content-fetch">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <span class="align-middle">Yt Content Download</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo ($currpage == 'all-youtube-videos') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/all-youtube-videos">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <span class="align-middle">All YouTube Videos</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo (isset($currpage) && ($currpage == 'manage-pages' || $currpage == 'add-page')) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/manage-pages">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <span class="align-middle">Manage Pages</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo (isset($currpage) && ($currpage == 'upload-video')) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/upload-video">
                    <i class="fa fa-file-video-o" aria-hidden="true"></i>
                    <span class="align-middle">Upload Video</span>
                </a>
            </li> -->
            <li class="sidebar-item <?php echo (isset($currpage) && ($currpage == 'blogs') || ($currpage == 'add_post') || ($currpage == 'edit_post')) ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= $base_url ?>/blogs">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span class="align-middle">Blogs</span>
                </a>
            </li>


            <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
                        Up</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i> <span
                        class="align-middle">Forms</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-typography.html">
                    <i class="align-middle" data-feather="align-left"></i> <span
                        class="align-middle">Typography</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span
                        class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
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