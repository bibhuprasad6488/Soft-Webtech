<?php
include 'header.php';

if (isset($_SESSION['message'])) {
    $toastType = $_SESSION['status'] == "success" ? "success" : "error";
    echo "<script>
            toastr.{$toastType}('{$_SESSION['message']}');
            </script>";

    // Clear session message after displaying it
    unset($_SESSION['message']);
    unset($_SESSION['status']);
}

$res = $conn->query("SELECT * FROM videos ORDER BY uploaded_at DESC");

// while ($row = $res->fetch_assoc()) {
//     echo "<h4>{$row['title']}</h4>";
//     echo "<video src='{$row['file_path']}' width='400' controls></video><br><hr>";
// }
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <h2>Upload Video</h2>
            <div class="card">
                <div class="card-body">
                    <form id="uploadForm" enctype="multipart/form-data">

                        <label>Choose Video:</label>
                        <input type="file" name="video" class="form-control" id="video" accept=".mp4,.mov,.avi,.mkv" required><br><br>

                        <label>Movie Name:</label>
                        <input type="text" name="title" class="form-control" placeholder="Movie title" id="title" required><br><br>

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                    <br/>
                    <div id="progress"></div>
                    <div id="message"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-white border py-2 mt-4">
            <table id="dataTable" class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Title</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res->num_rows > 0) {
                        $sl = 1;
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$sl}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['uploaded_at']}</td>
                                    <td>
                                        <form method='POST' action='actions/delete_video'>
                                            <input type='hidden' name='action' value='delete'>
                                            <input type='hidden' name='video_id' value='{$row['id']}'> 
                                            <button type='submit' class='btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete?\")'><i class='fa fa-trash'></i></button>
                                            <a href='{$row['file_path']}' class='btn btn-outline-success' download> <i class='fa fa-download'></i></a>
                                        </form>

                                    </td>
                                </tr>";
                            $sl++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // grabs both title and file

            $.ajax({
                url: 'actions/upload',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();

                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            var percent = Math.round((e.loaded / e.total) * 100);
                            $('#progress').text('Uploading: ' + percent + '%');
                        }
                    }, false);

                    return xhr;
                },
                success: function(response) {
                    console.log(response);

                    $('#message').html(response);
                },
                error: function(xhr, status, error) {
                    $('#message').html('Upload failed: ' + error);
                }
            });
        });
    });

    document.getElementById('video').addEventListener('change', function() {
        const fileInput = this;
        const titleInput = document.getElementById('title');

        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            const baseName = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;

            // Replace underscores, hyphens, and dots with spaces
            titleInput.value = baseName.replace(/[_\-.\+]/g, ' ').trim();
            // titleInput.value = baseName.replace(/[_\-]/g, ' ').trim(); // Optional: make it prettier
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
        $("#fetchData").on("click", function() {
            let url = $("#youtubeURL").val().trim();
            let videoId = extractVideoId(url);

            if (!videoId) {
                alert("Invalid YouTube URL!");
                return;
            }

            $("#loader").removeClass("hidden");
            $("#videoInfo").addClass("hidden");

            fetchVideoDetails(videoId);
        });

        function extractVideoId(url) {
            let match = url.match(
                /(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/|live\/))([\w-]{11})/
            );
            return match ? match[1] : null;
        }

        function fetchVideoDetails(videoId) {
            let apiKey = "AIzaSyDDsAOov2YBkP2wg196-vzp_CNa5U_va54"; // Replace with your API Key
            let apiUrl =
                `https://www.googleapis.com/youtube/v3/videos?id=${videoId}&part=snippet,statistics&key=${apiKey}`;

            $.getJSON(apiUrl, function(data) {
                // console.log(data);

                if (data.items.length === 0) {
                    alert("Video not found.");
                    $("#loader").addClass("hidden");
                    return;
                }

                let video = data.items[0].snippet;
                let title = video.title;
                let uploader = video.channelTitle;
                let uploadDate = video.publishedAt.split("T")[0]; // Format date
                let description = video.description;
                let tags = video.tags ? video.tags.join(", ") : "No tags available";
                let thumbnailUrl =
                    video.thumbnails?.maxres?.url ||
                    video.thumbnails?.high?.url ||
                    video.thumbnails?.medium?.url ||
                    video.thumbnails?.standard?.url ||
                    video.thumbnails?.default?.url ||
                    'img/photos/no-image.png'; // Provide a default fallback image
                // let thumbnailUrl = video.thumbnails.high.url;

                let viewCount = formatNumber(data.items[0].statistics.viewCount);
                let likeCount = formatNumber(data.items[0].statistics.likeCount);
                let commentCount = formatNumber(data.items[0].statistics.commentCount);

                $("#likeCount").text(likeCount);
                $("#cCount").text(commentCount);
                $("#viewsCount").text(viewCount);

                $("#videoTitle").text(title);
                $("#videoTitleInput").val(title);
                $("#thumbnail").attr("src", thumbnailUrl);
                $("#thumbnailUrl").val(thumbnailUrl);
                $("#uploader").text(uploader);
                $("#uploaderName").val(uploader);
                $("#uploadDate").text(uploadDate);
                $("#uploadDates").val(uploadDate);
                $("#tags").text(tags);
                $("#description").text(description);
                $("#tagsArea").val(tags);
                $("#descriptionArea").val(description);

                $("#videoInfo").removeClass("hidden");
                $("#loader").addClass("hidden");
                $(".saveBtn").removeClass("d-none");
            }).fail(function() {
                alert("Error fetching video data.");
                $("#loader").addClass("hidden");
            });
        }

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    });
</script>

<?php include 'footer.php'; ?>