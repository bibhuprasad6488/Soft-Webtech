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


// Fetch data from the database
$sql = "SELECT * FROM `cms_pages`";
$result = $conn->query($sql);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h2>Manage Pages</h2>
        </div>
        <div class="col-md-6  ">
            <a href="<?= $base_url ?>/add-page" class="btn btn-primary" style="float: right;">Add</a>
        </div>
        <div class="col-md-12 bg-white border py-2 mt-4">
            <table id="dataTable" class="table table-bordered table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Title</th>
                        <th>Meta Title</th>
                        <th>Og Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <form method='POST' action='actions/page-delete'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='hidden' name='page_id' value='{$row['id']}'> 
                    <button type='submit' class='btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete?\")'><i class='fa fa-trash'></i></button>
                </form> -->
                    <?php
                    if ($result->num_rows > 0) {
                        $sl = 1;
                        while ($row = $result->fetch_assoc()) {
                            // Sanitize output to prevent XSS attacks
                            $id = htmlspecialchars($row['id']);
                            $title = htmlspecialchars($row['title']);
                            $metaTitle = htmlspecialchars($row['meta_title']);
                            $ogImage = htmlspecialchars($row['og_image']);

                            // Handle missing images gracefully
                            $ogImagePath = !empty($ogImage) ? "uploads/{$ogImage}" : "img/photos/no-image.png";
                            echo "<tr>
                                    <td>{$sl}</td>
                                    <td>{$title}</td>
                                    <td>{$metaTitle}</td>
                                    <td><img src='{$ogImagePath}' alt='Thumbnail' width='80' class='img-fluid'></td>
                                    <td>
                                        <a href='edit-page?page_id={$id}' class='btn btn-outline-primary'>
                                            <i class='fa fa-pencil-square-o'></i>
                                        </a>
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
                let thumbnailUrl = video.thumbnails.high.url;

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
    });
</script>
<?php include 'footer.php'; ?>