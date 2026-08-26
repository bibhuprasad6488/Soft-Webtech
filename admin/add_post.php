<?php
include 'header.php';
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h2 class="fs-4">Add Post Details</h2>
                </div>
                <div class="card-body">

                    <form action="actions/store_post" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Post Information</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">
                                                Title <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="title" id="title"
                                                class="form-control"
                                                value="" placeholder="e.g. Modern Business"
                                                required>
                                        </div>

                                        <div class="mb-3">

                                            <label for="description" class="form-label">
                                                Short Description <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="short_desc" id="short_desc" rows="4"
                                                class="form-control " placeholder="Describe..." required></textarea>


                                        </div>
                                        <div class="mb-3">

                                            <label for="description" class="form-label">
                                                Description <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="long_desc" id="summernote" rows="7"
                                                class="form-control " placeholder="Describe your theme..." required></textarea>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Post Image</h5>
                                    </div>

                                    <div class="card-body">

                                        <label for="blog_img" class="form-label">
                                            Thumbnail
                                        </label>

                                        <input type="file" name="blog_img" id="thumbnail" class="form-control "
                                            accept="image/jpeg,image/png,image/webp" required
                                            onchange="previewThumbnailImage(event)">

                                        <div class="form-text">
                                            Upload thumbnail of your theme.
                                            JPG, PNG or WEBP.
                                        </div>

                                        <img src="" id="thumbnailImagePreview" alt="" class="img-fluid mb-2">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">SEO Information</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">
                                                Meta Title
                                            </label>

                                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="" placeholder="" required>
                                        </div>

                                        <div class="mb-3">

                                            <label for="meta_description" class="form-label">
                                                Meta Description
                                            </label>

                                            <textarea name="meta_desc" id="meta_desc" rows="3"
                                                class="form-control " placeholder=""></textarea>

                                        </div>
                                        <div class="mb-3">

                                            <label for="meta_key" class="form-label">
                                                Meta Keywords
                                            </label>
                                            <textarea name="meta_key" rows="2" class="form-control " placeholder="" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-cloud-upload"></i>
                                            Upload
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
            reader.onload = e => {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php include 'footer.php'; ?>