<!doctype html>
<?php
include 'db/conn.php';
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://$_SERVER[HTTP_HOST]"
    . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
// echo $_SERVER['HTTPS'];

$currpage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

$canonicalUrl = '';
if ($currpage == 'index') {
    $canonicalUrl = $base_url . '/';
} else {
    $canonicalUrl = $base_url . '/' . $currpage;
}

// Default SEO values
$pageTitle = $pageTitle ?? 'SoftWebTechs | SEO, Digital Marketing & Web Development Company';

$metaDescription = $metaDescription ?? 'SoftWebTechs provides SEO, digital marketing, web design and development, social media marketing, local SEO and online growth solutions for businesses.';

$metaKeywords = $metaKeywords ?? 'SEO company, digital marketing company, SEO services, web development company, website design, social media marketing, local SEO, search engine optimization';

$canonicalUrl = $canonicalUrl ?? '';
$ogTitle = $ogTitle ?? $pageTitle;
$ogDescription = $ogDescription ?? $metaDescription;
$ogImage = $ogImage ?? $base_url . '/img/og-image.jpg';
?>
<html lang="en">
<!-- <meta http-equiv="content-type" content="text/html;charset=utf-8" /> -->

<head>
    <meta charset="utf-8" />

    <title> <?= htmlspecialchars($pageTitle) ?></title>
    <!-- Meta Description -->
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
    <!-- Meta Keywords -->
    <?php if (!empty($metaKeywords)): ?>
        <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">
    <?php endif; ?>
    <!-- Canonical -->
    <?php if (!empty($canonicalUrl)): ?>
        <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
    <?php endif; ?>

    <meta name="author" content="SoftWebTechs" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <!-- ============================= -->
    <!-- THEME / MOBILE -->
    <!-- ============================= -->
    <meta name="theme-color" content="#0d6efd" />
    <meta name="msapplication-TileColor" content="#0d6efd" />
    <!-- ============================= -->
    <!-- OPEN GRAPH / FACEBOOK -->
    <!-- ============================= -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($ogDescription) ?>">
    <?php if (!empty($ogImage)): ?>
        <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
    <?php endif; ?>
    <meta property="og:url" content="<?= $base_url ?>" />
    <meta property="og:site_name" content="SoftWebTechs" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="SoftWebTechs - SEO and Digital Marketing Company" />

    <!-- ============================= -->
    <!-- TWITTER / X -->
    <!-- ============================= -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="SoftWebTechs | SEO & Digital Marketing Company" />
    <meta name="twitter:description"
        content="Professional SEO, digital marketing, web design and development solutions for business growth." />

    <meta name="twitter:image" content="img/og-image.jpg" />
    <!-- GOOGLE WEB FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet" />

    <link rel="icon" type="image/png" sizes="32x32" href="<?= $base_url ?>/img/favicon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $base_url ?>/img/favicon.png" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $base_url ?>/img/favicon.png" />

    <!-- ICONS -->
    <link href="<?= $base_url ?>/css/all.min.css" rel="stylesheet" />
    <link href="<?= $base_url ?>/css/bootstrap-icons.css" rel="stylesheet" />
    <!-- ANIMATION -->
    <link href="<?= $base_url ?>/lib/animate/animate.min.css" rel="stylesheet" />

    <!-- BOOTSTRAP -->
    <link href="<?= $base_url ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- CUSTOM CSS -->
    <link href="<?= $base_url ?>/css/style.css" rel="stylesheet" />


    <meta name="google-site-verification" content="Dw5Y5VbRrnbJhIvZpZb-AdT9bMcsLKh6zQM4aojrmDM" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KRF9M4XNBN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-KRF9M4XNBN");
    </script>
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <!-- LOGO -->
            <a href="<?= $base_url ?>" class="brand-logo" aria-label="Agency Home">
                <img class="img-fluid site-logo" src="img/logo.png" alt="Logo" />
            </a>
        </div>
        <!-- Spinner End -->

        <header>
            <div class="navbar-wrapper">
                <nav class="navbar-custom" id="mainNavbar" aria-label="Main navigation">
                    <div class="navbar-inner">
                        <!-- LOGO -->
                        <a href="<?= $base_url ?>" class="brand-logo" aria-label="Agency Home">
                            <img class="img-fluid site-logo" src="img/logo.png" alt="Logo" />
                        </a>

                        <!-- DESKTOP NAVIGATION -->
                        <div class="desktop-navigation">
                            <a href="<?= $base_url ?>"
                                class="nav-link-custom <?= ($currpage == 'index') ? 'active' : ''; ?>"> Home </a>

                            <a href="<?= $base_url ?>/about"
                                class="nav-link-custom <?= ($currpage == 'about') ? 'active' : ''; ?>"> About </a>

                            <!-- SERVICES -->
                            <div class="dropdown">
                                <a href="#services" class="nav-link-custom services-link dropdown-toggle"
                                    id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Services
                                </a>

                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="servicesDropdown">
                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/digital-marketing">
                                            Digital Marketing
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/seo"> SEO </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/google-ads">
                                            Google Ads
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/meta-ads">
                                            Meta Ads
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/website-design">
                                            Website Design
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url ?>/website-development">
                                            Website Development
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <a href="<?= $base_url ?>/pricing"
                                class="nav-link-custom <?= ($currpage == 'pricing') ? 'active' : ''; ?>"> Pricing </a>

                            <a href="<?= $base_url ?>/portfolio"
                                class="nav-link-custom <?= ($currpage == 'portfolio') ? 'active' : ''; ?>"> Portfolio
                            </a>

                            <a href="<?= $base_url ?>/blogs"
                                class="nav-link-custom <?= ($currpage == 'blogs') ? 'active' : ''; ?>"> Blogs </a>

                            <a href="<?= $base_url ?>/contact"
                                class="nav-link-custom <?= ($currpage == 'contact') ? 'active' : ''; ?>"> Contact </a>
                        </div>

                        <!-- DESKTOP CTA -->
                        <div class="desktop-cta">
                            <a href="#contact" class="btn-consultation">
                                Get Free Consultation

                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>

                        <!-- MOBILE BUTTON -->
                        <button type="button" class="mobile-menu-toggle" id="mobileMenuToggle"
                            aria-label="Open navigation" aria-expanded="false" aria-controls="mobileMenu">
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                            <span class="hamburger-line"></span>
                        </button>
                    </div>
                </nav>
            </div>

            <!-- MOBILE OVERLAY -->
            <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

            <!-- MOBILE MENU -->
            <aside class="mobile-menu" id="mobileMenu" aria-hidden="true">
                <!-- HEADER -->
                <div class="mobile-menu-header">
                    <a href="<?= $base_url ?>" class="brand-logo mobile-logo">
                        <span class="logo-icon">
                            <i class="bi bi-bar-chart-fill"></i>
                        </span>

                        <span class="logo-text"> Growth<span>Lab</span> </span>
                    </a>

                    <button type="button" class="mobile-menu-close" id="mobileMenuClose" aria-label="Close navigation">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <!-- MOBILE NAVIGATION -->
                <div class="mobile-navigation">
                    <a href="<?= $base_url ?>" class="mobile-nav-link"> Home </a>

                    <a href="<?= $base_url ?>/about" class="mobile-nav-link"> About </a>

                    <!-- MOBILE SERVICES -->
                    <div>
                        <button type="button" class="mobile-services-toggle" id="mobileServicesToggle"
                            aria-expanded="false">
                            <span>Services</span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="mobile-services-list" id="mobileServicesList">
                            <a href="<?= $base_url ?>/digital-marketing" class="mobile-service-link">
                                Digital Marketing
                            </a>

                            <a href="<?= $base_url ?>/seo" class="mobile-service-link"> SEO </a>

                            <a href="<?= $base_url ?>/google-ads" class="mobile-service-link">
                                Google Ads
                            </a>

                            <a href="<?= $base_url ?>/meta-ads" class="mobile-service-link">
                                Meta Ads
                            </a>

                            <a href="<?= $base_url ?>/website-design" class="mobile-service-link">
                                Website Design
                            </a>

                            <a href="<?= $base_url ?>/website-development" class="mobile-service-link">
                                Website Development
                            </a>
                        </div>
                    </div>

                    <a href="<?= $base_url ?>/pricing" class="mobile-nav-link"> Pricing </a>

                    <a href="<?= $base_url ?>/portfolio" class="mobile-nav-link"> Portfolio </a>

                    <a href="<?= $base_url ?>/blogs" class="mobile-nav-link"> Blogs </a>

                    <a href="<?= $base_url ?>/contact" class="mobile-nav-link"> Contact </a>
                </div>

                <!-- MOBILE CTA -->
                <div class="mobile-cta">
                    <a href="#contact" class="btn-consultation">
                        Get Free Consultation

                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
            </aside>
        </header>

        <main>
            <?php include 'page-header.php' ?>