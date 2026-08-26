<?php

/*
|--------------------------------------------------------------------------
| Include Header
|--------------------------------------------------------------------------
*/

include 'header.php';


$slug = trim($_GET['slug'] ?? '');

if (empty($slug)) {
    http_response_code(404);
    die('Blog not found.');
}


/*
|--------------------------------------------------------------------------
| Fetch Blog
|--------------------------------------------------------------------------
*/

$sql = "SELECT *
        FROM blogs
        WHERE slug = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die('Database query failed: ' . $conn->error);
}

$stmt->bind_param("s", $slug);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {

    $stmt->close();
    $conn->close();

    http_response_code(404);
    die('Blog not found.');
}

$blog = $result->fetch_assoc();

$stmt->close();
$conn->close();


/*
|--------------------------------------------------------------------------
| Blog Data
|--------------------------------------------------------------------------
*/

$title = $blog['title'];

$shortDescription = $blog['short_desc'];

$description = $blog['long_desc'];

$blogImage = $blog['blog_img'];

$metaTitle = !empty($blog['meta_title'])
    ? $blog['meta_title']
    : $title;

$metaDescription = !empty($blog['meta_desc'])
    ? $blog['meta_desc']
    : $shortDescription;

$metaKeywords = $blog['meta_key'] ?? '';

/*
|--------------------------------------------------------------------------
| Image URL
|--------------------------------------------------------------------------
*/

$blogImageUrl = '';

if (!empty($blogImage)) {

    $blogImageUrl = $base_url
        . '/admin/'
        . ltrim($blogImage, '/');
}

/*
|--------------------------------------------------------------------------
| Canonical URL
|--------------------------------------------------------------------------
*/

$canonicalUrl = $base_url
    . '/blog/'
    . rawurlencode($slug);


/*
|--------------------------------------------------------------------------
| Date
|--------------------------------------------------------------------------
*/

$publishedDate = '';

if (!empty($blog['created_at'])) {

    $publishedDate = date(
        'F d, Y',
        strtotime($blog['created_at'])
    );
}
?>

<style>
    .blog-detail-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .blog-detail-container {
        max-width: 1000px;
        margin: auto;
    }

    .blog-detail-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    .blog-detail-image-wrapper {
        width: 100%;
        max-height: 550px;
        overflow: hidden;
    }

    .blog-detail-image {
        width: 100%;
        height: 550px;
        object-fit: cover;
        display: block;
    }

    .blog-detail-content {
        padding: 50px;
    }

    .blog-detail-category {
        display: inline-block;
        padding: 7px 14px;
        border-radius: 50px;
        background: #eef4ff;
        color: #0d6efd;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .blog-detail-title {
        font-size: 48px;
        line-height: 1.2;
        font-weight: 700;
        margin-bottom: 20px;
        color: #111827;
    }

    .blog-detail-short-description {
        font-size: 20px;
        line-height: 1.7;
        color: #6b7280;
        margin-bottom: 25px;
    }

    .blog-detail-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        color: #6b7280;
        font-size: 14px;
        padding-bottom: 30px;
        border-bottom: 1px solid #eeeeee;
    }

    .blog-detail-meta span {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .blog-detail-body {
        padding-top: 35px;
        font-size: 18px;
        line-height: 1.85;
        color: #333333;
    }

    .blog-detail-body h1,
    .blog-detail-body h2,
    .blog-detail-body h3,
    .blog-detail-body h4 {
        margin-top: 35px;
        margin-bottom: 15px;
        color: #111827;
    }

    .blog-detail-body p {
        margin-bottom: 20px;
    }

    .blog-detail-body img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 25px auto;
        border-radius: 10px;
    }

    .blog-detail-body iframe {
        max-width: 100%;
    }

    .blog-detail-body ul,
    .blog-detail-body ol {
        margin-bottom: 25px;
    }

    .blog-detail-body blockquote {
        padding: 20px 25px;
        margin: 30px 0;
        border-left: 4px solid #0d6efd;
        background: #f8f9fa;
    }

    .blog-back {
        margin-top: 30px;
    }

    @media (max-width: 768px) {

        .blog-detail-section {
            padding: 40px 0;
        }

        .blog-detail-image {
            height: 280px;
        }

        .blog-detail-content {
            padding: 25px;
        }

        .blog-detail-title {
            font-size: 32px;
        }

        .blog-detail-short-description {
            font-size: 17px;
        }

        .blog-detail-meta {
            flex-wrap: wrap;
            gap: 10px;
        }

        .blog-detail-body {
            font-size: 16px;
        }

    }
</style>
<section class="page-header">

    <!-- Decorative Background -->
    <div class="page-header-glow page-header-glow-1"></div>
    <div class="page-header-glow page-header-glow-2"></div>

    <div class="page-header-grid"></div>

    <div class="container">

        <div class="page-header-content">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="page-breadcrumb">

                <ol class="breadcrumb mb-0">

                    <li class="breadcrumb-item">
                        <a href="<?= $base_url ?>">
                            <i class="bi bi-house-door"></i>
                            Home
                        </a>
                    </li>


                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?= $base_url ?>/blogs">

                            Blogs
                        </a>

                    </li>
                    <li class="breadcrumb-item active" aria-current="page">

                        <?= $title ?>

                    </li>

                </ol>

            </nav>


            <!-- Eyebrow -->

            <!-- <div class="page-header-eyebrow">

                <span></span>

                SEO & DIGITAL GROWTH

                <span></span>

            </div> -->

        </div>

    </div>

</section>



<section class="blog-detail-section">

    <div class="container">

        <div class="blog-detail-container">

            <article class="blog-detail-card">


                <!-- Blog Image -->

                <?php if (!empty($blogImageUrl)): ?>

                    <div class="blog-detail-image-wrapper">

                        <img src="<?= htmlspecialchars($blogImageUrl) ?>" alt="<?= htmlspecialchars($title) ?>"
                            class="blog-detail-image">

                    </div>

                <?php endif; ?>


                <!-- Blog Content -->

                <div class="blog-detail-content">


                    <!-- Category -->

                    <!-- <div class="blog-detail-category">

                        SEO Insights

                    </div> -->


                    <!-- Title -->

                    <h1 class="blog-detail-title">

                        <?= htmlspecialchars($title) ?>

                    </h1>


                    <!-- Short Description -->

                    <?php if (!empty($shortDescription)): ?>

                        <div class="blog-detail-short-description">

                            <?= htmlspecialchars($shortDescription) ?>

                        </div>

                    <?php endif; ?>


                    <!-- Meta -->

                    <div class="blog-detail-meta">

                        <?php if (!empty($publishedDate)): ?>

                            <span>

                                <i class="bi bi-calendar3"></i>

                                <?= htmlspecialchars($publishedDate) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-detail-body">
                        <?= $description ?>
                    </div>
                </div>
            </article>
            <!-- Back -->
            <div class="blog-back">
                <a href="<?= htmlspecialchars($base_url) ?>/blogs" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i>
                    Back to Blogs
                </a>
            </div>
        </div>
    </div>
</section>


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",

        "headline": <?= json_encode($title) ?>,

        "description": <?= json_encode($metaDescription) ?>,

        "image": <?= json_encode($blogImageUrl) ?>,

        "url": <?= json_encode($canonicalUrl) ?>,

        "datePublished": <?= json_encode($blog['created_at']) ?>,

        "dateModified": <?= json_encode($blog['updated_at']) ?>
    }
</script>


<?php include 'footer.php'; ?>