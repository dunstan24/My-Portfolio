<?php
$title = "Dunstan Devon | Web Developer Portfolio";
$meta_description = "Portfolio of Dunstan Devon - Web Developer specializing in high-performance web applications.";
ob_start();
?>
    <!-- ===== HERO SECTION ===== -->
    <section id="home" class="hero">
        <div class="hero-card">
            <!-- Navigation -->
            <nav class="navbar" id="navbar">

                <ul class="nav-links" id="nav-links">
                    <li><a href="#home"      class="nav-link active" data-section="home">Home</a></li>
                    <li><a href="#about"     class="nav-link" data-section="about">About</a></li>
                    <li><a href="#services"  class="nav-link" data-section="services">Services</a></li>
                    <li><a href="#portfolio" class="nav-link" data-section="portfolio">Portfolio</a></li>
                    <li><a href="#contact"   class="nav-link" data-section="contact">Contact</a></li>
                </ul>
                <button class="hamburger" id="hamburger" aria-label="Toggle navigation">
                    <span></span><span></span><span></span>
                </button>
            </nav>

            <!-- Hero Content -->
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-intro-badge">
                        <span class="dot"></span>
                        Available for work
                    </div>
                    <h1 class="hero-title">
                        <span class="greeting">Hi there, I'm</span>
                        Dunstan Devon
                    </h1>
                    <h2 class="hero-subtitle">Web Developer</h2>
                    <p class="hero-description">
                        Passionate about crafting intuitive, accessible, and high-performance digital experiences.
                        Specializing in modern JavaScript frameworks, responsive UI architecture, and elegant design systems.
                    </p>
                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-primary" id="hire-me-btn">
                            <i class="fas fa-paper-plane"></i> Hire Me
                        </a>
                        <a href="#portfolio" class="btn btn-outline" id="view-work-btn">
                            <i class="fas fa-briefcase"></i> View Work
                        </a>
                    </div>
                </div>

                <div class="hero-image">
                    <div class="image-frame">
                        <div class="image-wrapper">
                            <img src="portrait.png" alt="Dunstan Devon - Web Developer" id="hero-portrait">
                        </div>
                        <div class="image-glow"></div>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <div class="hero-bottom-glow"></div>
    </section>

    <!-- ===== ABOUT SECTION ===== -->
    <section id="about" class="section about-section">
        <div class="container">
            <div style="text-align:center; margin-bottom:56px;">
                <span class="section-badge">Who I Am</span>
                <h2 class="section-title">About <span class="highlight">Me</span></h2>
                <p class="section-subtitle">Adaptive, meticulous, and driven to deliver effective solutions</p>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <div class="about-img-wrapper">
                        <img src="portrait.png" alt="About Dunstan Devon">
                    </div>
                </div>
                <div class="about-text">
                    <h3>I'm a <span class="highlight">Meticulous Problem Solver</span></h3>
                    <p>
                        I am an adaptive and meticulous individual, accustomed to working in a structured manner to resolve
                        various challenges efficiently. I possess strong analytical skills that enable me to understand
                        requirements and translate them into effective solutions, supported by strong teamwork and collaboration
                        abilities.
                    </p>
                    <p>
                        I have solid public speaking skills and am able to communicate effectively in English,
                        both verbally and in writing. As an added value, I have equipped myself with technical proficiency in
                        Web Development and Microsoft Excel to support work productivity.
                    </p>

                    <p style="font-size:.75rem; font-weight:700; color:var(--clr-text-2); letter-spacing:.12em; text-transform:uppercase; margin-bottom:14px; margin-top:8px;">Strengths &amp; Expertise</p>
                    <div class="skill-tags">
                        <span class="skill-tag"><i class="fas fa-code" style="margin-right:5px;font-size:.7rem;"></i>Front-End Development</span>
                        <span class="skill-tag"><i class="fas fa-server" style="margin-right:5px;font-size:.7rem;"></i>Back-End Development</span>
                        <span class="skill-tag"><i class="fas fa-database" style="margin-right:5px;font-size:.7rem;"></i>Database Management</span>
                        <span class="skill-tag"><i class="fas fa-users" style="margin-right:5px;font-size:.7rem;"></i>Team Leadership</span>
                        <span class="skill-tag"><i class="fas fa-comments" style="margin-right:5px;font-size:.7rem;"></i>Communication</span>
                        <span class="skill-tag"><i class="fas fa-cogs" style="margin-right:5px;font-size:.7rem;"></i>Operational Management</span>
                        <span class="skill-tag"><i class="fas fa-file-excel" style="margin-right:5px;font-size:.7rem;"></i>Microsoft Excel</span>
                        <span class="skill-tag"><i class="fas fa-magic" style="margin-right:5px;font-size:.7rem;"></i>Spreadsheet Automation</span>
                        <span class="skill-tag"><i class="fas fa-chart-bar" style="margin-right:5px;font-size:.7rem;"></i>Data Visualization</span>
                    </div>

                    <a href="<?= route('cv') ?>?download=1" target="_blank" class="btn btn-primary" style="margin-top:24px;">
                        <i class="fas fa-download"></i> Download CV
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES SECTION ===== -->
    <section id="services" class="section services-section">
        <div class="container">
            <div style="text-align:center; margin-bottom:56px;">
                <span class="section-badge">What I Do</span>
                <h2 class="section-title">My <span class="highlight">Services</span></h2>
                <p class="section-subtitle">Comprehensive solutions to bring your ideas to life</p>
            </div>
            <div class="services-grid">
                <div class="service-card" id="service-web-design">
                    <div class="service-icon"><i class="fas fa-palette"></i></div>
                    <h3>Web Design</h3>
                    <p>Creating visually stunning and user-friendly website designs that captivate your audience and elevate your brand identity.</p>
                </div>
                <div class="service-card" id="service-web-dev">
                    <div class="service-icon"><i class="fas fa-code"></i></div>
                    <h3>Web Development</h3>
                    <p>Building responsive, high-performance websites using modern technologies, clean architecture, and best practices.</p>
                </div>
                <div class="service-card" id="service-ui-ux">
                    <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
                    <h3>UI / UX Design</h3>
                    <p>Designing intuitive user interfaces and seamless user experiences that keep your users engaged and converting.</p>
                </div>
                <div class="service-card" id="service-backend">
                    <div class="service-icon"><i class="fas fa-server"></i></div>
                    <h3>Backend Development</h3>
                    <p>Designing robust server-side architecture, RESTful APIs, database systems, and high-performance backend solutions.</p>
                </div>
                <div class="service-card" id="service-maintenance">
                    <div class="service-icon"><i class="fas fa-tools"></i></div>
                    <h3>Maintenance</h3>
                    <p>Providing ongoing website maintenance, updates, and support to ensure your site runs smoothly and securely.</p>
                </div>
                <div class="service-card" id="service-consulting">
                    <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Consulting</h3>
                    <p>Offering expert technical advice and strategic guidance to help you achieve your digital objectives effectively.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PORTFOLIO SECTION ===== -->
    <section id="portfolio" class="section portfolio-section">
        <div class="portfolio-header container">
            <div style="text-align:center; margin-bottom:40px;">
                <span class="section-badge">My Work</span>
                <h2 class="section-title">My <span class="highlight">Portfolio</span></h2>
                <p class="section-subtitle">Recent projects I've worked on — these are just demos showing how each website looks and functions.</p>
            </div>
        </div>

        <!-- Horizontal scroll track -->
        <div class="portfolio-scroll-wrapper">
            <div class="portfolio-track" id="portfolio-grid">
                <?php foreach($projects as $proj): ?>
                    <a href="<?= htmlspecialchars($proj['live_url'], ENT_QUOTES) ?>"
                       target="_blank" rel="noopener"
                       class="pcard"
                       data-category="<?= htmlspecialchars($proj['category'], ENT_QUOTES) ?>">

                        <div class="pcard-preview" style="background: <?= htmlspecialchars($proj['gradient'], ENT_QUOTES) ?>;">
                            <?php if (!empty($proj['screenshot_url'])): ?>
                                <img src="<?= htmlspecialchars($proj['screenshot_url'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($proj['title'], ENT_QUOTES) ?>" class="pcard-screenshot">
                            <?php elseif (!empty($proj['icon'])): ?>
                                <div class="pcard-icon-wrap">
                                    <i class="fas <?= htmlspecialchars($proj['icon'], ENT_QUOTES) ?>"></i>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($proj['is_live'])): ?>
                                <div class="pcard-badge"><i class="fas fa-star"></i> Live</div>
                            <?php endif; ?>
                        </div>

                        <div class="pcard-body">
                            <span class="pcard-cat"><?= htmlspecialchars($proj['category_label'], ENT_QUOTES) ?></span>
                            <h4 class="pcard-title"><?= htmlspecialchars($proj['title'], ENT_QUOTES) ?></h4>
                            <p class="pcard-desc"><?= htmlspecialchars($proj['description'] ?? 'A carefully crafted project built with modern web technologies.', ENT_QUOTES) ?></p>
                            <?php if (!empty($proj['tags'])): ?>
                            <div class="pcard-tags">
                                <?php foreach($proj['tags'] as $tag): ?>
                                    <span><?= htmlspecialchars($tag, ENT_QUOTES) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <span class="pcard-btn"><i class="fas fa-external-link-alt"></i> Live Demo</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <button class="scroll-arrow scroll-arrow-left"  id="scroll-left"  aria-label="Scroll left"><i class="fas fa-chevron-left"></i></button>
            <button class="scroll-arrow scroll-arrow-right" id="scroll-right" aria-label="Scroll right"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>


    <!-- ===== CONTACT SECTION ===== -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <div style="text-align:center; margin-bottom:56px;">
                <span class="section-badge">Get In Touch</span>
                <h2 class="section-title">Contact <span class="highlight">Me</span></h2>
                <p class="section-subtitle">Let's work together to build something amazing</p>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <a href="mailto:dunstandevon2@gmail.com" class="contact-item" id="contact-email" style="text-decoration: none; color: inherit; display: flex; transition: transform 0.2s ease;">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email</h4>
                            <p style="color: var(--primary, #06b6d4);">dunstandevon2@gmail.com</p>
                        </div>
                    </a>
                    <a href="https://wa.me/62895630478594" target="_blank" rel="noopener" class="contact-item" id="contact-phone" style="text-decoration: none; color: inherit; display: flex; transition: transform 0.2s ease;">
                        <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <h4>WhatsApp / Phone</h4>
                            <p style="color: var(--primary, #06b6d4);">+62 895 6304 78594</p>
                        </div>
                    </a>
                </div>
                <form class="contact-form" id="contact-form">
                    <div id="form-feedback" style="margin-bottom: 15px;"></div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="form-name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="form-email" name="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="form-subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea id="form-message" name="message" placeholder="Your Message" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="form-submit">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/app.php';
