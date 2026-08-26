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
$sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";
$result = $conn->query($sql);
?>

<div class="container-fluid">
    

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 ">
        <div>
            <h3 class="fw-bold mb-3 d-none">Home Page</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="add_post" class="btn btn-primary">Add Theme</a>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 bg-white border py-2 mt-4">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $sl = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$sl}</td>
                                    <td><img src='{$row['blog_img']}' alt='Thumbnail' width='80'></td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['created_at']}</td>
                                    <td>
                                        <a href='edit_post?post_id={$row['id']}' class='btn btn-outline-success'><i class='fa fa-pencil'></i></a>
                                        <form method='POST' action='actions/delete_post' style='display: inline-block;'>
                                            <input type='hidden' name='action' value='delete'>
                                            <input type='hidden' name='post_id' value='{$row['id']}'> 
                                            <button type='submit' class='btn btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete?\")'><i class='fa fa-trash'></i></button>
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