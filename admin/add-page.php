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
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>Add Page</h2>
            <form action="actions/page-store" method="POST" enctype="multipart/form-data" class="form-inline form-control">
                <div class="row p-2 mb-2">
                    <div class="col-md-10">
                        <div class="mb-3">
                            <label for="youtubeURL">Title:</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="youtubeURL">Slug:</label>
                            <input type="text" id="slug" name="slug" class="form-control"
                                placeholder="Slug" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="content" class="form-control" placeholder="Description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="meta title">
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" placeholder="Meta Keywords" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" placeholder="Meta Description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Google Ads</label>
                            <textarea name="google_ads" class="form-control" placeholder="Google Ads Code" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Og Title</label>
                            <input type="text" name="og_title" placeholder="Og title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Og Description</label>
                            <textarea name="og_description" class="form-control" placeholder="Og Description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Og Image</label>
                            <input type="file" name="og_image" class="form-control" id="og_image" accept=".jpg,.png,.jpeg">
                        </div>
                        <img src="" alt="Preview Image" id="ogImagePreview" width="100" class="img-fluid mt-3" style="display: none;">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success  btn-md mt-3">Save</butt>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //
    });
</script>
<?php include 'footer.php'; ?>