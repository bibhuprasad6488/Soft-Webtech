</main>

<footer class="footer">
	<div class="container-fluid">
		<div class="row text-muted">
			<div class="col-6 text-start">
				<p class="mb-0">
					<a class="text-muted" href="javascript:;" target="_blank"><strong>YT Admin</strong></a> &copy;
					<?= date('Y'); ?>
				</p>
			</div>
			<div class="col-6 text-end">
				<!-- <ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="javascript:;" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="javascript:;" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="javascript:;" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="javascript:;" target="_blank">Terms</a>
								</li>
							</ul> -->
			</div>
		</div>
	</div>
</footer>
</div>
</div>

<script src="js/app.js"></script>
<script>
	function updateUKTime() {
		const now = new Date();
		const ukTime = now.toLocaleTimeString('en-GB', {
			timeZone: "Asia/Kolkata",
			// weekday: 'long',
			year: 'numeric',
			month: 'short',
			day: 'numeric',
			hour: '2-digit',
			minute: '2-digit',
			second: '2-digit',
			// timeZoneName: 'short'
		});
		$('#ind-time').html(ukTime);
	}

	setInterval(updateUKTime, 1000);
	updateUKTime();
</script>
<script>
	toastr.options = {
		"closeButton": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"timeOut": "5000"
	};
</script>

<script>
	let inactivityTime = function() {
		let timeout;

		function logout() {
			alert("Session expired. Redirecting to login...");
			window.location.href = "logout.php"; // Redirect to logout page
		}

		function resetTimer() {
			clearTimeout(timeout);
			timeout = setTimeout(logout, 900000); // 15 minutes = 900000ms
		}

		document.onload = resetTimer;
		document.onmousemove = resetTimer;
		document.onkeypress = resetTimer;
		document.onclick = resetTimer;
		document.onscroll = resetTimer;
	};

	inactivityTime(); // Start the inactivity timer
</script>
<script>
	$('#title').on('input', function() {
		let title = $(this).val();
		let slug = title
			.toLowerCase()
			.replace(/[^\w\s-]/g, '') // Remove non-word characters
			.replace(/\s+/g, '-') // Replace spaces with hyphens
			.replace(/^-+|-+$/g, ''); // Remove leading/trailing hyphens

		$('#slug').val(slug);
	});
	$("#og_image").change(function() {
		previewImage(this, "#ogImagePreview");
	});
	// Preview image when selecting a file global Function
	function previewImage(input, previewSelector) {
		if (input.files && input.files[0]) {
			let file = input.files[0];
			let fileName = file.name; // Get the file name

			// Check file size (2MB = 2 * 1024 * 1024)
			if (file.size > 2 * 1024 * 1024) {
				alert("The file '" + fileName + "' exceeds the 2MB size limit.");
				input.value = ""; // Clear the file input
				$(previewSelector).hide(); // Hide the preview
				return;
			}

			let reader = new FileReader();
			reader.onload = function(e) {
				$(previewSelector).attr("src", e.target.result).show();
			};
			reader.readAsDataURL(file);
		}
	}
</script>
<!-- <script>
		document.addEventListener("DOMContentLoaded", function () {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var markers = [{
				coords: [31.230391, 121.473701],
				name: "Shanghai"
			},
			{
				coords: [28.704060, 77.102493],
				name: "Delhi"
			},
			{
				coords: [6.524379, 3.379206],
				name: "Lagos"
			},
			{
				coords: [35.689487, 139.691711],
				name: "Tokyo"
			},
			{
				coords: [23.129110, 113.264381],
				name: "Guangzhou"
			},
			{
				coords: [40.7127837, -74.0059413],
				name: "New York"
			},
			{
				coords: [34.052235, -118.243683],
				name: "Los Angeles"
			},
			{
				coords: [41.878113, -87.629799],
				name: "Chicago"
			},
			{
				coords: [51.507351, -0.127758],
				name: "London"
			},
			{
				coords: [40.416775, -3.703790],
				name: "Madrid "
			}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script> -->

</body>

</html>