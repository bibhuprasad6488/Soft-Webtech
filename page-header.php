<?php if ($currpage != 'index'): ?>
    <section class="page-header">
        <!-- Decorative Background -->
        <div class="page-header-glow page-header-glow-1"></div>
        <div class="page-header-glow page-header-glow-2"></div>

        <div class="page-header-grid"></div>

        <div class="container">
            <?php if ($currpage == 'about'): ?>
                <div class="page-header-content">

                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">

                                About

                            </li>

                        </ol>

                    </nav>


                    <h1 class="page-header-title">

                        About
                        <span>Us</span>

                    </h1>


                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven
                        strategies we use to help businesses grow their
                        online presence.

                    </p>

                </div>
            <?php elseif ($currpage == 'blogs'): ?>
                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Blogs

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->
                    <!-- <div class="page-header-eyebrow">

                                        <span></span>

                                        SEO & DIGITAL GROWTH

                                        <span></span>

                                    </div> -->
                    <!-- Title -->
                    <h1 class="page-header-title">
                        Blogs
                    </h1>

                    <!-- Description -->
                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>
            <?php elseif ($currpage == 'contact'): ?>

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

                            <li class="breadcrumb-item active" aria-current="page">
                                Contact Us
                            </li>
                        </ol>
                    </nav>

                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->

                    <!-- Title -->

                    <h1 class="page-header-title">Contact Us</h1>

                    <!-- Description -->

                    <p class="page-header-description">
                        Learn about our mission, team, and the SEO-driven strategies we
                        use to help businesses grow their online presence.
                    </p>
                </div>



            <?php elseif ($currpage == 'digital-marketing'): ?>

                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Digital Marketing

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>Digital Marketing</span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>



            <?php elseif ($currpage == 'google-ads'): ?>


                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Google ADs

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>Google ADs</span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>

            <?php elseif ($currpage == 'meta-ads'): ?>

                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Meta ADs

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>Meta ADs</span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>

            <?php elseif ($currpage == 'portfolio'): ?>

                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Portfolio

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">

                        Portfolio

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>

            <?php elseif ($currpage == 'pricing'): ?>


                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Pricing

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">

                        Pricing

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>


            <?php elseif ($currpage == 'seo'): ?>

                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                SEO

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>SEO</span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>

            <?php elseif ($currpage == 'website-design'): ?>

                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Website Design

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <!-- <div class="page-header-eyebrow">

                    <span></span>

                    SEO & DIGITAL GROWTH

                    <span></span>

                </div> -->


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>Website Design </span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>




                </div>

            <?php elseif ($currpage == 'website-development') : ?>


                <div class="page-header-content">

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="page-breadcrumb">

                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                <a href="<?= htmlspecialchars($base_url) ?>">
                                    <i class="bi bi-house-door"></i>
                                    Home
                                </a>
                            </li>



                            <li class="breadcrumb-item active" aria-current="page">

                                Website Development

                            </li>

                        </ol>

                    </nav>


                    <!-- Eyebrow -->

                    <div class="page-header-eyebrow">

                        <span></span>

                        SEO & DIGITAL GROWTH

                        <span></span>

                    </div>


                    <!-- Title -->

                    <h1 class="page-header-title">


                        <span>Website Development</span>

                    </h1>


                    <!-- Description -->

                    <p class="page-header-description">

                        Learn about our mission, team, and the SEO-driven strategies
                        we use to help businesses grow their online presence.

                    </p>

                </div>

            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>