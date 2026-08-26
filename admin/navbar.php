<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">

			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block " href="#" data-bs-toggle="dropdown">
					<!-- <i class="align-middle" data-feather="settings"></i> -->
					<p style="font-size: 10px;" id="ind-time"></p>
				</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<img src="img/avatars/profile.png" class="avatar img-fluid rounded me-1" alt="Admin" /> <span
						class="text-dark"><?php echo $user_name; ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="<?= $base_url ?>/profile"><i class="align-middle me-1"
							data-feather="user"></i> Profile</a>
					<!--<a class="dropdown-item" href="#"><i class="align-middle me-1"
										data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1"
										data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1"
										data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div> -->
					<a class="dropdown-item" href="<?= $base_url; ?>/logout"><i class="align-middle me-1"
							data-feather="log-out"></i> Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>