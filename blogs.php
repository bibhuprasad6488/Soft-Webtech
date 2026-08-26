<?php include 'header.php';



// Fetch data from the database
$sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";
$result = $conn->query($sql);
?>

<section class="seo-blog-section" id="blog">

    <div class="container">

        <!-- Header -->
        <div class="row align-items-end g-4 mb-5">

            <div class="col-lg-7">

                <div class="blog-eyebrow">
                    <span></span>
                    SEO Insights
                </div>

                <h2 class="blog-heading">
                    Ideas that help you
                    <span>grow smarter.</span>
                </h2>

            </div>

            <div class="col-lg-5">

                <div class="blog-header-right">

                    <p>
                        Practical insights, strategies and trends
                        from our SEO and digital growth team.
                    </p>

                    <!-- <a href="#"
                        class="blog-all-link">

                        View All Articles

                        <i class="bi bi-arrow-up-right"></i>

                    </a> -->

                </div>

            </div>

        </div>


        <!-- Featured Blog -->

        <?php

        /*
        |--------------------------------------------------------------------------
        | Get Featured Blog
        |--------------------------------------------------------------------------
        */

        $featuredSql = "
            SELECT *
            FROM blogs
            ORDER BY id DESC
            LIMIT 1
        ";

        $featuredResult = $conn->query($featuredSql);

        if ($featuredResult && $featuredResult->num_rows > 0):

            $featured = $featuredResult->fetch_assoc();

            $featuredImage = $base_url
                . '/admin/'
                . $featured['blog_img'];

        ?>

            <div class="featured-blog reveal-blog">

                <div class="row g-0 align-items-stretch">

                    <div class="col-lg-7">

                        <div class="featured-blog-image">

                            <img
                                src="<?= htmlspecialchars($featuredImage) ?>"
                                alt="<?= htmlspecialchars($featured['title']) ?>">

                            <div class="featured-blog-overlay"></div>

                            <span class="featured-blog-label">
                                Featured Article
                            </span>

                        </div>

                    </div>


                    <div class="col-lg-5">

                        <div class="featured-blog-content">

                            <div class="blog-category">
                                SEO Strategy
                            </div>

                            <h3>
                                <?= htmlspecialchars($featured['title']) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($featured['short_desc']) ?>
                            </p>

                            <div class="blog-meta">

                                <span>

                                    <i class="bi bi-calendar3"></i>

                                    <?= date(
                                        'M d, Y',
                                        strtotime($featured['created_at'])
                                    ) ?>

                                </span>

                                <!-- <span>

                                    <i class="bi bi-clock"></i>

                                    7 min read

                                </span> -->

                            </div>

                            <a
                                href="blog?slug=<?= urlencode($featured['slug']) ?>"
                                class="blog-read-link">

                                Read Article

                                <i class="bi bi-arrow-up-right"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php endif; ?>




        <!-- Blog Grid -->

        <div class="row g-4 mt-4">


            <!-- Blog 01 -->
            <?php if ($result->num_rows > 0): ?>

                <?php $sl = 1; ?>

                <?php while ($row = $result->fetch_assoc()):
                    $imageURL = $base_url . '/admin/' . htmlspecialchars($row['blog_img']);
                ?>

                    <div class="col-lg-4 col-md-6">

                        <article class="blog-card reveal-blog">

                            <div class="blog-card-image">

                                <img
                                    src="<?= $imageURL ?>"
                                    alt="<?= htmlspecialchars($row['title']) ?>">

                                <!-- <div class="blog-card-category">
                                    SEO
                                </div> -->

                            </div>

                            <div class="blog-card-content">

                                <!-- <div class="blog-small-meta">
                                    7 min read · SEO
                                </div> -->

                                <h3>
                                    <?= htmlspecialchars($row['title']) ?>
                                </h3>

                                <p>
                                    <?= htmlspecialchars($row['short_desc']) ?>
                                </p>

                                <a
                                    href="blog?slug=<?= urlencode($row['slug']) ?>"
                                    class="blog-card-link">
                                    Read Article
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                    <?php $sl++; ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>


        <!-- Newsletter CTA -->

        <div class="blog-newsletter reveal-blog">

            <div>

                <div class="newsletter-label">
                    SEO INSIGHTS
                </div>

                <h3>
                    Get smarter about search.
                </h3>

                <p>
                    One useful SEO insight every week.
                    No spam. Just practical strategies.
                </p>

            </div>

            <form class="newsletter-form">

                <input type="email" placeholder="Your email address" aria-label="Your email address" required>

                <button type="submit">

                    Subscribe

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>

        </div>

    </div>

</section>

<?php include 'footer.php' ?>