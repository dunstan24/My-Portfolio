<?php
$title = htmlspecialchars($project['title'] . ' | Project Details', ENT_QUOTES);
$meta_description = htmlspecialchars($project['tagline'], ENT_QUOTES);
ob_start();
?>
    <!-- ===== PROJECT HERO HEADER ===== -->
    <header class="project-hero" style="background: <?= htmlspecialchars($project['gradient'], ENT_QUOTES) ?>;">
        <div class="container">
            <nav class="project-nav">
                <a href="<?= route('home') ?>" class="back-link">
                    <i class="fas fa-arrow-left"></i> Back to Portfolio
                </a>

            </nav>

            <div class="project-hero-content">
                <span class="project-badge"><i class="fas <?= htmlspecialchars($project['icon'], ENT_QUOTES) ?>"></i> <?= htmlspecialchars($project['category_label'], ENT_QUOTES) ?></span>
                <h1 class="project-hero-title"><?= htmlspecialchars($project['title'], ENT_QUOTES) ?></h1>
                <p class="project-hero-tagline"><?= htmlspecialchars($project['tagline'], ENT_QUOTES) ?></p>

                <div class="project-action-btns">
                    <a href="<?= htmlspecialchars($project['live_url'], ENT_QUOTES) ?>" target="_blank" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i> Live Preview
                    </a>
                    <a href="<?= htmlspecialchars($project['github_url'], ENT_QUOTES) ?>" target="_blank" class="btn btn-outline">
                        <i class="fab fa-github"></i> View Source Code
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- ===== PROJECT METRICS BAR ===== -->
    <section class="project-metrics-section">
        <div class="container">
            <div class="metrics-grid">
                <?php foreach($project['metrics'] as $metric): ?>
                    <div class="metric-card">
                        <span class="metric-value"><?= htmlspecialchars($metric['value'], ENT_QUOTES) ?></span>
                        <span class="metric-label"><?= htmlspecialchars($metric['label'], ENT_QUOTES) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== PROJECT DETAILS BODY ===== -->
    <section class="section project-body-section">
        <div class="container">
            <div class="project-grid-layout">
                <!-- Main Content -->
                <div class="project-main-content">
                    <div class="content-block">
                        <h2 class="block-title"><i class="fas fa-info-circle highlight"></i> Project Overview</h2>
                        <p class="project-description-text"><?= htmlspecialchars($project['description'], ENT_QUOTES) ?></p>
                    </div>

                    <div class="content-block">
                        <h2 class="block-title"><i class="fas fa-star highlight"></i> Key Features</h2>
                        <ul class="feature-list">
                            <?php foreach($project['features'] as $feature): ?>
                                <li>
                                    <div class="feature-check"><i class="fas fa-check"></i></div>
                                    <span><?= htmlspecialchars($feature, ENT_QUOTES) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Showcase Preview Card -->
                    <div class="content-block">
                        <h2 class="block-title"><i class="fas fa-desktop highlight"></i> Showcase Preview</h2>
                        <?php if (!empty($project['screenshot_url'])): ?>
                            <div class="showcase-img-box" style="border-radius: 16px; overflow: hidden; border: 1px solid var(--border-color); box-shadow: 0 15px 40px rgba(0,0,0,0.5); margin-top: 15px;">
                                <img src="<?= htmlspecialchars($project['screenshot_url'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($project['title'], ENT_QUOTES) ?> Screenshot" style="width: 100%; display: block; border-radius: 16px;">
                            </div>
                        <?php else: ?>
                            <div class="showcase-box" style="background: <?= htmlspecialchars($project['gradient'], ENT_QUOTES) ?>;">
                                <i class="fas <?= htmlspecialchars($project['icon'], ENT_QUOTES) ?> showcase-icon"></i>
                                <h3><?= htmlspecialchars($project['title'], ENT_QUOTES) ?> Showcase</h3>
                                <p><?= htmlspecialchars($project['tagline'], ENT_QUOTES) ?></p>
                                <a href="<?= htmlspecialchars($project['live_url'], ENT_QUOTES) ?>" target="_blank" class="btn btn-primary" style="margin-top: 15px;">Launch Application</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar Details -->
                <aside class="project-sidebar">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Technologies Used</h3>
                        <div class="tech-tags">
                            <?php foreach($project['tech_stack'] as $tech): ?>
                                <span class="tech-tag"><?= htmlspecialchars($tech, ENT_QUOTES) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Project Info</h3>
                        <ul class="sidebar-info-list">
                            <li>
                                <span class="info-label">Category</span>
                                <span class="info-val"><?= htmlspecialchars($project['category_label'], ENT_QUOTES) ?></span>
                            </li>
                            <li>
                                <span class="info-label">Role</span>
                                <span class="info-val">Lead Developer & UI Designer</span>
                            </li>
                            <li>
                                <span class="info-label">Client</span>
                                <span class="info-val">Confidential / Enterprise</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-card contact-cta-card">
                        <h3>Need a similar project?</h3>
                        <p>Let's discuss how I can build a solution tailored for your team.</p>
                        <a href="<?= route('home') ?>#contact" class="btn btn-primary" style="width: 100%; text-align: center;">Get in Touch</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- ===== RELATED PROJECTS ===== -->
    <section class="section related-projects-section">
        <div class="container">
            <h2 class="section-title">Other <span class="highlight">Projects</span></h2>
            <p class="section-subtitle">Explore more works from my portfolio</p>

            <div class="portfolio-grid">
                <?php foreach($relatedProjects as $rel): ?>
                    <a href="<?= route('projects.show', $rel['slug']) ?>" class="portfolio-card-link">
                        <div class="portfolio-item">
                            <div class="portfolio-img" style="background: <?= htmlspecialchars($rel['gradient'], ENT_QUOTES) ?>; display: flex; align-items: center; justify-content: center; flex-direction: column; color: white;">
                                <i class="fas <?= htmlspecialchars($rel['icon'], ENT_QUOTES) ?>" style="font-size: 2.5rem; margin-bottom: 10px;"></i>
                                <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;"><?= htmlspecialchars($rel['category_label'], ENT_QUOTES) ?></span>
                            </div>
                            <div class="portfolio-overlay">
                                <h4><?= htmlspecialchars($rel['title'], ENT_QUOTES) ?></h4>
                                <p><?= htmlspecialchars($rel['category_label'], ENT_QUOTES) ?></p>
                                <span class="portfolio-link-btn">
                                    <span>View Project</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();
include dirname(__DIR__) . '/layouts/app.php';
