<?php
include 'header.php';

// Show toastr notifications
if (isset($_SESSION['message'])) {
    $toastType = $_SESSION['status'] == "success" ? "success" : "error";
    echo "<script>toastr.{$toastType}('{$_SESSION['message']}');</script>";

    // Clear session messages after displaying
    unset($_SESSION['message'], $_SESSION['status']);
}

// Fetch page details if editing
$page = null;
if (isset($_GET['page_id']) && is_numeric($_GET['page_id'])) {
    $pageId = intval($_GET['page_id']);
    $sql = "SELECT * FROM `cms_pages` WHERE id = $pageId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $page = $result->fetch_assoc();
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2><?= $page ? "Edit Page" : "Add Page" ?></h2>
            <form action="actions/page-update" method="POST" enctype="multipart/form-data" class="form-inline form-control">
                <input type="hidden" name="page_id" value="<?= $page['id'] ?? '' ?>">

                <div class="row p-2 mb-2">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="<?= htmlspecialchars($page['title'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug:</label>
                            <input type="text" id="slug" name="slug" class="form-control"
                                value="<?= htmlspecialchars($page['slug'] ?? '') ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="content">Description</label>
                            <textarea name="content" class="form-control" placeholder="Description" rows="4"><?= htmlspecialchars($page['content'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Meta title"
                                value="<?= htmlspecialchars($page['meta_title'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" placeholder="Meta Keywords" rows="4"><?= htmlspecialchars($page['meta_keywords'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" placeholder="Meta Description" rows="4"><?= htmlspecialchars($page['meta_description'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="google_ads">Google Ads</label>
                            <textarea name="google_ads" class="form-control" placeholder="Google Ads Code" rows="4"><?= htmlspecialchars($page['google_ads'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="og_title">OG Title</label>
                            <input type="text" name="og_title" placeholder="OG title" class="form-control"
                                value="<?= htmlspecialchars($page['og_title'] ?? '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="og_description">OG Description</label>
                            <textarea name="og_description" class="form-control" placeholder="OG Description" rows="4"><?= htmlspecialchars($page['og_description'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="og_image">OG Image</label>
                            <input type="file" name="og_image" class="form-control" id="og_image" accept=".jpg,.png,.jpeg">
                        </div>
                        <img src="<?= isset($page['og_image']) ? 'uploads/' . htmlspecialchars($page['og_image']) : '' ?>"
                            alt="Preview Image" id="ogImagePreview" width="100" class="img-fluid mt-3"
                            style="<?= isset($page['og_image']) ? '' : 'display: none;' ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-md mt-3"><?= $page ? "Update" : "Save" ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById("title").addEventListener("input", function() {
        let slug = this.value.trim().toLowerCase()
            .replace(/[^\w\s-]/g, '') // Remove special characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/--+/g, '-'); // Replace multiple hyphens with single
        document.getElementById("slug").value = slug;
    });

    // Preview OG Image
    document.getElementById("og_image").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById("ogImagePreview");
            preview.src = e.target.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

<?php include 'footer.php'; ?>