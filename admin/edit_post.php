<?php
include 'header.php';
include 'db/conn.php';

if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    header('Location: blogs');
    exit;
}

$id = (int) $_GET['post_id'];

$sql = "SELECT * FROM blogs WHERE id = ? LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $conn->close();

    header('Location: blogs');
    exit;
}

$blog = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h2 class="fs-4">Edit Post</h2>
                </div>

                <div class="card-body">

                    <form action="actions/update_post" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= (int) $blog['id'] ?>">

                        <div class="row">

                            <!-- LEFT SIDE -->
                            <div class="col-lg-8">

                                <div class="card mb-4">

                                    <div class="card-header">
                                        <h5 class="mb-0">Post Information</h5>
                                    </div>

                                    <div class="card-body">

                                        <!-- Title -->
                                        <div class="mb-3">

                                            <label for="title" class="form-label">
                                                Title
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="title" id="title" class="form-control"
                                                value="<?= htmlspecialchars($blog['title']) ?>" required>

                                        </div>

                                        <!-- Short Description -->
                                        <div class="mb-3">

                                            <label for="short_desc" class="form-label">
                                                Short Description
                                                <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="short_desc" id="short_desc" rows="4" class="form-control"
                                                required><?= htmlspecialchars($blog['short_desc']) ?></textarea>

                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">

                                            <label for="long_desc" class="form-label">
                                                Description
                                                <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="long_desc" id="summernote" rows="7" class="form-control"
                                                required><?= htmlspecialchars($blog['long_desc']) ?></textarea>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- RIGHT SIDE -->
                            <div class="col-lg-4">

                                <!-- IMAGE -->
                                <div class="card mb-4">

                                    <div class="card-header">
                                        <h5 class="mb-0">Post Image</h5>
                                    </div>

                                    <div class="card-body">

                                        <label for="blog_img" class="form-label">
                                            Thumbnail
                                        </label>

                                        <input type="file" name="blog_img" id="thumbnail" class="form-control"
                                            accept="image/jpeg,image/png,image/webp"
                                            onchange="previewThumbnailImage(event)">

                                        <div class="form-text mb-3">
                                            Upload a new thumbnail only if you want to
                                            replace the existing image.
                                            JPG, PNG or WEBP.
                                        </div>

                                        <?php if (!empty($blog['blog_img'])): ?>

                                        <img src="<?= htmlspecialchars($blog['blog_img']) ?>" id="thumbnailImagePreview"
                                            alt="<?= htmlspecialchars($blog['title']) ?>"
                                            class="img-fluid rounded mb-2">

                                        <?php else: ?>

                                        <img src="" id="thumbnailImagePreview" alt="" class="img-fluid rounded mb-2"
                                            style="display:none;">

                                        <?php endif; ?>

                                    </div>

                                </div>


                                <!-- SEO -->
                                <div class="card mb-4">

                                    <div class="card-header">
                                        <h5 class="mb-0">SEO Information</h5>
                                    </div>

                                    <div class="card-body">

                                        <!-- Meta Title -->
                                        <div class="mb-3">

                                            <label for="meta_title" class="form-label">
                                                Meta Title
                                            </label>

                                            <input type="text" name="meta_title" id="meta_title" class="form-control"
                                                value="<?= htmlspecialchars($blog['meta_title']) ?>">

                                        </div>


                                        <!-- Meta Description -->
                                        <div class="mb-3">

                                            <label for="meta_desc" class="form-label">
                                                Meta Description
                                            </label>

                                            <textarea name="meta_desc" id="meta_desc" rows="3"
                                                class="form-control"><?= htmlspecialchars($blog['meta_desc']) ?></textarea>

                                        </div>


                                        <!-- Meta Keywords -->
                                        <div class="mb-3">

                                            <label for="meta_key" class="form-label">
                                                Meta Keywords
                                            </label>

                                            <textarea name="meta_key" id="meta_key" rows="2"
                                                class="form-control"><?= htmlspecialchars($blog['meta_key']) ?></textarea>

                                        </div>

                                    </div>

                                </div>


                                <!-- UPDATE BUTTON -->
                                <div class="card">

                                    <div class="card-body">

                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-check-circle"></i>
                                            Update Post
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>


<script>
$(document).ready(function() {

    $('#summernote').summernote({
        placeholder: 'Add Content',
        tabsize: 2,
        height: 300
    });

});


function previewThumbnailImage(event) {

    const input = event.target;
    const preview = document.getElementById('thumbnailImagePreview');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;
            preview.style.display = 'block';

        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php include 'footer.php'; ?>