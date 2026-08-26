<?php
// $pageTitle = '';
// $metaDescription = '';
// $metaKeywords = '';
include 'header.php';
?>
<!-- =========================================================
     PREMIUM DIGITAL MARKETING HERO
========================================================== -->
<section class="premium-hero" id="home">
    <!-- Background decorations -->
    <div class="hero-grid"></div>
    <div class="hero-glow hero-glow-one"></div>
    <div class="hero-glow hero-glow-two"></div>
    <div class="hero-orbit orbit-one"></div>
    <div class="hero-orbit orbit-two"></div>

    <div class="container">
        <div class="row align-items-center g-5">
            <!-- =================================================
                 RIGHT DASHBOARD
            ================================================== -->
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s"
                    src="img/pexels-photo-31525131.jpg" />

                <div class="hero-visual d-none">
                    <!-- Main Dashboard -->
                    <div class="growth-dashboard">
                        <!-- Dashboard Header -->
                        <div class="dashboard-header">
                            <div>
                                <span class="dashboard-label"> Growth Overview </span>

                                <h3>
                                    Performance
                                    <span>+84.6%</span>
                                </h3>
                            </div>

                            <div class="dashboard-period">
                                <i class="bi bi-calendar3"></i>
                                Last 12 Months
                            </div>
                        </div>

                        <!-- Main Growth Chart -->
                        <div class="growth-chart">
                            <div class="chart-grid">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <svg class="growth-svg" viewBox="0 0 600 230" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#2563eb" stop-opacity="0.25" />

                                        <stop offset="100%" stop-color="#2563eb" stop-opacity="0" />
                                    </linearGradient>
                                </defs>

                                <!-- Area -->
                                <path class="chart-area" d="
                                    M0 190
                                    C45 180,
                                    70 175,
                                    105 165

                                    C140 153,
                                    165 170,
                                    205 145

                                    C245 120,
                                    270 135,
                                    310 105

                                    C350 75,
                                    375 105,
                                    410 80

                                    C450 52,
                                    470 70,
                                    505 42

                                    C540 20,
                                    570 35,
                                    600 10

                                    L600 230
                                    L0 230
                                    Z
                                    "></path>

                                <!-- Growth Line -->
                                <path class="chart-line" d="
                                    M0 190
                                    C45 180,
                                    70 175,
                                    105 165

                                    C140 153,
                                    165 170,
                                    205 145

                                    C245 120,
                                    270 135,
                                    310 105

                                    C350 75,
                                    375 105,
                                    410 80

                                    C450 52,
                                    470 70,
                                    505 42

                                    C540 20,
                                    570 35,
                                    600 10
                                    "></path>

                                <!-- End Point -->
                                <circle class="chart-point" cx="600" cy="10" r="6" />
                            </svg>

                            <div class="chart-months">
                                <span>Jan</span>
                                <span>Mar</span>
                                <span>May</span>
                                <span>Jul</span>
                                <span>Sep</span>
                                <span>Nov</span>
                            </div>
                        </div>

                        <!-- Metrics -->
                        <div class="dashboard-metrics">
                            <!-- Traffic -->
                            <div class="metric-card">
                                <div class="metric-icon traffic-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>

                                <div>
                                    <span> Traffic </span>

                                    <strong data-count="+248" data-suffix="%">
                                        +0%
                                    </strong>
                                </div>
                            </div>

                            <!-- Leads -->
                            <div class="metric-card">
                                <div class="metric-icon leads-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div>
                                    <span> Leads </span>

                                    <strong data-count="+137" data-suffix="%">
                                        +0%
                                    </strong>
                                </div>
                            </div>

                            <!-- ROAS -->
                            <div class="metric-card">
                                <div class="metric-icon ads-icon">
                                    <i class="bi bi-megaphone"></i>
                                </div>

                                <div>
                                    <span> ROAS </span>

                                    <strong data-count="4.8" data-suffix="x" data-decimal="true">
                                        0x
                                    </strong>
                                </div>
                            </div>

                            <!-- Conversion -->
                            <div class="metric-card">
                                <div class="metric-icon conversion-icon">
                                    <i class="bi bi-bullseye"></i>
                                </div>

                                <div>
                                    <span> Conversion </span>

                                    <strong data-count="+82" data-suffix="%">
                                        +0%
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- =================================================
                         FLOATING CARD - SEO
                    ================================================== -->
                    <div class="floating-card floating-seo">
                        <div class="floating-icon seo-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>
                            <span>SEO</span>

                            <strong> â†‘ 86% </strong>
                        </div>
                    </div>

                    <!-- =================================================
                         FLOATING CARD - GOOGLE ADS
                    ================================================== -->
                    <div class="floating-card floating-ads">
                        <div class="floating-icon google-icon">
                            <i class="bi bi-google"></i>
                        </div>

                        <div>
                            <span>Google Ads</span>

                            <strong> 4.8x ROAS </strong>
                        </div>
                    </div>

                    <!-- =================================================
                         FLOATING CARD - LEADS
                    ================================================== -->
                    <div class="floating-card floating-leads">
                        <div class="floating-icon leads-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>

                        <div>
                            <span>Leads</span>

                            <strong> +137% </strong>
                        </div>
                    </div>

                    <!-- =================================================
                         FLOATING CARD - CONVERSION
                    ================================================== -->
                    <div class="floating-card floating-conversion">
                        <div class="floating-icon conversion-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>
                            <span>Conversion</span>

                            <strong> â†‘ 42% </strong>
                        </div>
                    </div>

                    <!-- Decorative floating dot -->
                    <div class="dashboard-dot dot-one"></div>
                    <div class="dashboard-dot dot-two"></div>
                    <div class="dashboard-dot dot-three"></div>
                </div>
            </div>
            <!-- =================================================
                 LEFT CONTENT
            ================================================== -->
            <div class="col-lg-6">
                <div class="hero-content">
                    <!-- Badge -->
                    <div class="hero-badge reveal-item">
                        <span class="badge-sparkle">âœ¦</span>
                        Results-Driven Digital Growth Agency
                    </div>

                    <!-- Headline -->
                    <h1 class="hero-title reveal-item">
                        <span class="title-line"> Grow Your Business </span>

                        <span class="title-line">
                            with
                            <span class="gradient-text"> Results-Driven </span>
                        </span>

                        <span class="title-line"> Digital Marketing. </span>
                    </h1>

                    <!-- Description -->
                    <p class="hero-description reveal-item">
                        We build high-converting websites, generate qualified leads
                        and scale brands with powerful SEO, Google Ads, Meta Ads and
                        digital marketing strategies.
                    </p>

                    <!-- CTA -->
                    <div class="hero-actions reveal-item">
                        <a href="#contact" class="hero-primary-btn">
                            Get Free Consultation

                            <span class="btn-arrow">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                        </a>

                        <a href="#portfolio" class="hero-secondary-btn">
                            View Our Work

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Trust -->
                    <div class="hero-trust reveal-item">
                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            Strategy
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            Performance
                        </span>

                        <span>
                            <i class="bi bi-check-circle-fill"></i>
                            Transparency
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-primary ps-4">About Us</h6>
                    <h2 class="mt-2">
                        The best SEO solution with 10 years of experience
                    </h2>
                </div>
                <p class="mb-4">
                    SoftWebTechs is a technology and digital growth company
                    focused on helping businesses establish a strong, professional
                    and results-driven online presence. We specialize in SEO,
                    digital marketing, website design, web development, social
                    media marketing and local SEO, delivering customized solutions
                    based on each client's business goals. Our approach combines
                    creative design, modern technology, search engine optimization
                    and digital strategy to create websites and marketing
                    campaigns that don't just look good—they are built to attract
                    visitors, generate leads and support long-term business
                    growth.
                </p>
                <!-- <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                            </div>
                        </div> -->
                <div class="d-flex align-items-center mt-4">
                    <a class="btn btn-primary rounded-pill px-4 me-3" href="#">Read More</a>
                    <a class="btn btn-outline-primary btn-square me-3" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square me-3" href="#"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s"
                    src="img/pexels-photo-5918384.jpg" />
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-fluid py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
            data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">
                Our Services
            </h6>
            <h2 class="mt-2">What Solutions We Provide</h2>
        </div>
        <div class="row g-4">
            <!-- Digital Marketing -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-bullhorn fa-2x"></i>
                    </div>

                    <h5 class="mb-3">Digital Marketing</h5>

                    <p>
                        Build a stronger digital presence with integrated marketing
                        strategies designed to increase visibility, traffic, leads
                        and business growth.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="digital-marketing.html">
                        Read More
                    </a>
                </div>
            </div>

            <!-- SEO -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-chart-line fa-2x"></i>
                    </div>

                    <h5 class="mb-3">SEO</h5>

                    <p>
                        Improve your search visibility, attract qualified organic
                        traffic and build sustainable growth with data-driven SEO
                        strategies.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="seo.html">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Google Ads -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="bi bi-google fa-2x"></i>
                    </div>

                    <h5 class="mb-3">Google Ads</h5>

                    <p>
                        Reach high-intent customers with targeted Google Ads
                        campaigns focused on qualified traffic, conversions and
                        measurable ROI.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="google-ads.html">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Meta Ads -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="bi bi-facebook fa-2x"></i>
                    </div>

                    <h5 class="mb-3">Meta Ads</h5>

                    <p>
                        Connect with the right audience across Facebook and
                        Instagram through creative, targeted and conversion- focused
                        advertising campaigns.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="meta-ads.html">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Website Design -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-paint-brush fa-2x"></i>
                    </div>

                    <h5 class="mb-3">Website Design</h5>

                    <p>
                        Create modern, responsive and conversion-focused websites
                        that deliver a premium user experience across every device.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="website-design.html">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Website Development -->
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-laptop-code fa-2x"></i>
                    </div>

                    <h5 class="mb-3">Website Development</h5>

                    <p>
                        Develop fast, secure and scalable websites with clean code,
                        responsive layouts and performance-focused functionality.
                    </p>

                    <a class="btn px-3 mt-auto mx-auto" href="website-development.html">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- =========================================================
     PORTFOLIO / CASE STUDIES
========================================================= -->

<section class="seo-portfolio-section" id="case-studies">
    <div class="container">
        <!-- Section Header -->
        <div class="row align-items-end g-4 mb-5">
            <div class="col-lg-7">
                <div class="portfolio-eyebrow">
                    <span></span>
                    Selected Case Studies
                </div>

                <h2 class="portfolio-heading">
                    Real strategies.
                    <span>Measurable growth.</span>
                </h2>
            </div>

            <div class="col-lg-5">
                <p class="portfolio-intro">
                    Explore how we combine technical SEO, content strategy,
                    authority building and conversion optimisation to turn organic
                    search into a predictable growth channel.
                </p>
            </div>
        </div>

        <!-- Filter -->
        <div class="portfolio-filters mb-5">
            <button class="portfolio-filter active" data-filter="all">
                All Projects
            </button>

            <button class="portfolio-filter" data-filter="ecommerce">
                E-commerce
            </button>

            <button class="portfolio-filter" data-filter="saas">SaaS</button>

            <button class="portfolio-filter" data-filter="local">
                Local SEO
            </button>

            <button class="portfolio-filter" data-filter="healthcare">
                Healthcare
            </button>
        </div>

        <!-- =====================================================
             FEATURED CASE STUDY
        ====================================================== -->

        <div class="featured-case reveal-portfolio" data-category="ecommerce">
            <div class="row g-0 align-items-stretch">
                <!-- Image -->
                <div class="col-lg-7">
                    <div class="featured-case-image">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&amp;w=2070&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.1.0&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="E-commerce SEO case study" />

                        <div class="featured-image-overlay"></div>

                        <div class="featured-badge">Featured Case Study</div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-5">
                    <div class="featured-case-content">
                        <div class="case-category">E-commerce SEO</div>

                        <h3>
                            Scaling organic revenue for a fashion e-commerce brand.
                        </h3>

                        <p>
                            We rebuilt the site's technical foundation, redesigned the
                            category architecture and created a commercial content
                            strategy focused on high-intent search terms.
                        </p>

                        <!-- Results -->

                        <div class="case-results">
                            <div class="case-result">
                                <strong>+286%</strong>

                                <span> Organic Traffic </span>
                            </div>

                            <div class="case-result">
                                <strong>+164%</strong>

                                <span> Organic Revenue </span>
                            </div>

                            <div class="case-result">
                                <strong>+421</strong>

                                <span> Ranking Keywords </span>
                            </div>
                        </div>

                        <a href="#" class="case-study-link">
                            View Case Study

                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- =====================================================
             CASE STUDY GRID
        ====================================================== -->

        <div class="row g-4 mt-4">
            <!-- CASE STUDY 01 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="saas">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="SaaS SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View SaaS case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">SaaS</div>

                        <h3>B2B software organic growth</h3>

                        <p>
                            Building a scalable content engine for a competitive SaaS
                            market.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+342%</strong>
                                <span>Traffic</span>
                            </div>

                            <div>
                                <strong>+218%</strong>
                                <span>Leads</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- CASE STUDY 02 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="local">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Local SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View local SEO case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">Local SEO</div>

                        <h3>Dominating local search</h3>

                        <p>
                            Increasing Google Maps visibility and qualified local
                            enquiries.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+267%</strong>
                                <span>Maps Visibility</span>
                            </div>

                            <div>
                                <strong>+194%</strong>
                                <span>Calls</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- CASE STUDY 03 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="healthcare">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Healthcare SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View healthcare SEO case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">Healthcare</div>

                        <h3>Growing healthcare visibility</h3>

                        <p>
                            Building topical authority and increasing qualified
                            organic enquiries.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+221%</strong>
                                <span>Traffic</span>
                            </div>

                            <div>
                                <strong>+178%</strong>
                                <span>Leads</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- CASE STUDY 04 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="ecommerce">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Retail SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View retail SEO case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">E-commerce</div>

                        <h3>Turning category pages into revenue</h3>

                        <p>
                            Restructuring product architecture and targeting
                            high-converting search demand.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+198%</strong>
                                <span>Revenue</span>
                            </div>

                            <div>
                                <strong>+312%</strong>
                                <span>Traffic</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- CASE STUDY 05 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="saas">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="B2B SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View B2B SEO case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">B2B SEO</div>

                        <h3>Building a scalable acquisition channel</h3>

                        <p>
                            Creating topic clusters around high-value commercial
                            search opportunities.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+274%</strong>
                                <span>Traffic</span>
                            </div>

                            <div>
                                <strong>+191%</strong>
                                <span>Demo Leads</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- CASE STUDY 06 -->

            <div class="col-lg-4 col-md-6 portfolio-item" data-category="local">
                <article class="case-card">
                    <div class="case-card-image">
                        <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Business local SEO case study" />

                        <div class="case-card-overlay">
                            <a href="#" aria-label="View local SEO case study">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="case-card-body">
                        <div class="case-category">Local SEO</div>

                        <h3>From invisible to local market leader</h3>

                        <p>
                            Improving local rankings, reviews and location-based
                            landing pages.
                        </p>

                        <div class="mini-results">
                            <div>
                                <strong>+310%</strong>
                                <span>Visibility</span>
                            </div>

                            <div>
                                <strong>+153%</strong>
                                <span>Leads</span>
                            </div>
                        </div>

                        <a href="#" class="text-link">
                            Read Case Study
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>

        <!-- Bottom CTA -->

        <div class="portfolio-bottom reveal-portfolio">
            <div>
                <span> Want results like these? </span>

                <strong> Let's build your next growth story. </strong>
            </div>

            <a href="#contact" class="portfolio-cta">
                Start a Project

                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- =========================================================
     TESTIMONIALS
========================================================= -->

<section class="seo-testimonials-section" id="testimonials">
    <div class="container">
        <!-- Header -->
        <div class="row align-items-end g-4 mb-5">
            <div class="col-lg-7">
                <div class="testimonial-eyebrow">
                    <span></span>
                    Client Stories
                </div>

                <h2 class="testimonial-heading">
                    Trusted by teams
                    <span>that want to grow.</span>
                </h2>
            </div>

            <div class="col-lg-5">
                <p class="testimonial-intro">
                    We don't just improve rankings. We help businesses turn search
                    visibility into qualified traffic, leads and revenue.
                </p>
            </div>
        </div>

        <!-- Testimonials Grid -->
        <div class="row g-4">
            <!-- Featured Testimonial -->
            <div class="col-lg-7">
                <div class="testimonial-featured">
                    <div class="testimonial-quote-icon">
                        <i class="bi bi-quote"></i>
                    </div>

                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <blockquote>
                        "Rankora completely changed the way we think about SEO.
                        Within six months, organic search became one of our
                        strongest sources of qualified leads."
                    </blockquote>

                    <div class="testimonial-author">
                        <div class="testimonial-avatar">AK</div>

                        <div>
                            <strong> Arjun Kapoor </strong>

                            <span> Founder, Nova Commerce </span>
                        </div>
                    </div>

                    <div class="testimonial-result">
                        <div>
                            <strong>+286%</strong>
                            <span>Organic Traffic</span>
                        </div>

                        <div>
                            <strong>+164%</strong>
                            <span>Revenue</span>
                        </div>

                        <div>
                            <strong>6 Months</strong>
                            <span>Campaign</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Small Testimonial -->
            <div class="col-lg-5">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <blockquote>
                        "Their technical SEO work completely transformed our
                        website. We went from struggling to get visibility to
                        ranking for highly competitive commercial keywords."
                    </blockquote>

                    <div class="testimonial-author">
                        <div class="testimonial-avatar">SM</div>

                        <div>
                            <strong> Sarah Mitchell </strong>

                            <span> Marketing Director, Vertex </span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card testimonial-card-dark">
                    <div class="testimonial-stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>

                    <blockquote>
                        "The biggest difference is transparency. We always know what
                        is being worked on, why it matters and how it impacts
                        growth."
                    </blockquote>

                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RJ</div>

                        <div>
                            <strong> Rahul Joshi </strong>

                            <span> CEO, Nexora Technologies </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Metrics -->

        <div class="testimonial-trust">
            <div class="trust-metric">
                <strong>96%</strong>

                <span> Client Retention </span>
            </div>

            <div class="trust-metric">
                <strong>4.9/5</strong>

                <span> Average Rating </span>
            </div>

            <div class="trust-metric">
                <strong>180+</strong>

                <span> Projects Delivered </span>
            </div>

            <div class="trust-metric">
                <strong>12+</strong>

                <span> Industries Served </span>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     BLOG / INSIGHTS
========================================================= -->

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
                        Practical insights, strategies and trends from our SEO and
                        digital growth team.
                    </p>

                    <a href="#" class="blog-all-link">
                        View All Articles

                        <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Blog -->

        <div class="featured-blog reveal-blog">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-7">
                    <div class="featured-blog-image">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&amp;fit=crop&amp;w=1400&amp;q=85"
                            alt="SEO analytics and strategy" />

                        <div class="featured-blog-overlay"></div>

                        <span class="featured-blog-label"> Featured Article </span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="featured-blog-content">
                        <div class="blog-category">SEO Strategy</div>

                        <h3>
                            How to build an SEO strategy that actually drives revenue
                        </h3>

                        <p>
                            Rankings are only one part of the equation. Discover how
                            to connect keyword research, content, technical SEO and
                            conversion optimisation to real business outcomes.
                        </p>

                        <div class="blog-meta">
                            <span>
                                <i class="bi bi-calendar3"></i>
                                Aug 12, 2026
                            </span>

                            <span>
                                <i class="bi bi-clock"></i>
                                8 min read
                            </span>
                        </div>

                        <a href="#" class="blog-read-link">
                            Read Article

                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Grid -->

        <div class="row g-4 mt-4">
            <!-- Blog 01 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Keyword research" />

                        <div class="blog-card-category">Keyword Research</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">7 min read · SEO</div>

                        <h3>The complete guide to commercial keyword research</h3>

                        <p>
                            Find search terms that attract people who are actually
                            ready to buy.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 02 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Technical SEO" />

                        <div class="blog-card-category">Technical SEO</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">9 min read · SEO</div>

                        <h3>
                            12 technical SEO issues silently hurting your website
                        </h3>

                        <p>
                            A practical checklist for finding the technical problems
                            limiting organic growth.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 03 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Content marketing" />

                        <div class="blog-card-category">Content Marketing</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">6 min read · Content</div>

                        <h3>
                            How topic clusters can build long-term search authority
                        </h3>

                        <p>
                            Learn how to organise content around topics instead of
                            isolated keywords.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 04 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="Google analytics" />

                        <div class="blog-card-category">Analytics</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">5 min read · Analytics</div>

                        <h3>
                            SEO metrics that actually matter to business leaders
                        </h3>

                        <p>
                            Stop reporting vanity metrics and focus on numbers
                            connected to business growth.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 05 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="E-commerce SEO" />

                        <div class="blog-card-category">E-commerce SEO</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">8 min read · E-commerce</div>

                        <h3>E-commerce SEO: category pages vs product pages</h3>

                        <p>
                            Learn where to focus your SEO efforts to increase product
                            discovery and revenue.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 06 -->

            <div class="col-lg-4 col-md-6">
                <article class="blog-card reveal-blog">
                    <div class="blog-card-image">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&amp;fit=crop&amp;w=1000&amp;q=85"
                            alt="SEO team strategy" />

                        <div class="blog-card-category">Digital Growth</div>
                    </div>

                    <div class="blog-card-content">
                        <div class="blog-small-meta">7 min read · Growth</div>

                        <h3>Building an SEO roadmap for the next 12 months</h3>

                        <p>
                            A framework for prioritising SEO work based on impact,
                            effort and opportunity.
                        </p>

                        <a href="#" class="blog-card-link">
                            Read Article

                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>

        <!-- Newsletter CTA -->

        <div class="blog-newsletter reveal-blog">
            <div>
                <div class="newsletter-label">SEO INSIGHTS</div>

                <h3>Get smarter about search.</h3>

                <p>
                    One useful SEO insight every week. No spam. Just practical
                    strategies.
                </p>
            </div>

            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" aria-label="Your email address"
                    required />

                <button type="submit">
                    Subscribe

                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</section>
<!-- Portfolio Start -->
<div class="container-fluid py-5 d-none">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
            data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">
                Our Projects
            </h6>
            <h2 class="mt-2">Recently Launched Projects</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-1.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.3s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-2.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-2.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.6s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-3.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-3.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-4.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-4.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.3s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-5.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-5.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item wow zoomIn" data-wow-delay="0.6s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-6.jpg" alt="" />
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-6.jpg"><i
                                class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="#">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio End -->

<!-- Contact Start -->
<div class="container-fluid py-5 d-none">
    <div class="container px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
                    data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">
                        Contact Us
                    </h6>
                    <h2 class="mt-2">Contact For Any Query</h2>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="text-center mb-4">
                        Receive messages instantly with our PHP and Ajax contact
                        form - available in the
                        <a href="https://htmlcodex.com/downloading/?item=2059">Pro Version</a>
                        only.
                    </h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Your Name" />
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Your Email" />
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject"
                                        placeholder="Subject" />
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here"
                                        id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php include 'footer.php' ?>