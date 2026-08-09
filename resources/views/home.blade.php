@extends('layouts.app')

@section('title', 'Dunstan Devon | Web Developer Portfolio')
@section('meta_description', 'Portfolio of Dunstan Devon - Web Developer specializing in high-performance web applications.')

@section('content')
    <!-- ===== HERO SECTION ===== -->
    <section id="home" class="hero">
        <div class="hero-card">
            <!-- Navigation -->
            <nav class="navbar" id="navbar">

                <ul class="nav-links" id="nav-links">
                    <li><a href="#home" class="nav-link active" data-section="home">Home</a></li>
                    <li><a href="#about" class="nav-link" data-section="about">About</a></li>
                    <li><a href="#services" class="nav-link" data-section="services">Services</a></li>
                    <li><a href="#portfolio" class="nav-link" data-section="portfolio">Portfolio</a></li>
                    <li><a href="#contact" class="nav-link" data-section="contact">Contact</a></li>
                </ul>
                <button class="hamburger" id="hamburger" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </nav>

            <!-- Hero Content -->
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="greeting">Hi, I'm</span> Dunstan Devon
                    </h1>
                    <h2 class="hero-subtitle">Web Developer</h2>
                    <p class="hero-description">
                        Passionate about crafting intuitive, accessible, and high-performance digital experiences. Specializing in modern JavaScript frameworks, responsive UI architecture, and elegant design systems.
                    </p>
                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-primary" id="hire-me-btn">Hire Me</a>
                        <a href="#contact" class="btn btn-outline" id="lets-talk-btn">Let's Talk</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="image-wrapper">
                        <img src="portrait.png" alt="Dunstan Devon - Web Developer" id="hero-portrait">
                        <div class="image-glow"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Bottom Glow -->
        <div class="hero-bottom-glow"></div>
    </section>

    <!-- ===== ABOUT SECTION ===== -->
    <section id="about" class="section about-section">
        <div class="container">
            <h2 class="section-title">About <span class="highlight">Me</span></h2>
            <div class="about-content">
                <div class="about-image">
                    <div class="about-img-wrapper">
                        <img src="portrait.png" alt="About Dunstan Devon">
                        <div class="about-img-border"></div>
                    </div>
                </div>
                <div class="about-text">
                    <h3>I'm a passionate <span class="highlight">Web Developer</span></h3>
                    <p>
                        With over 5 years of hands-on experience in web development, I transform ideas into slick, user-centric web applications. I focus on writing clean, maintainable code and delivering pixel-perfect user interfaces.
                    </p>
                    <p>
                        Whether designing scalable component libraries or engineering fast single-page applications, I thrive on bringing complex visual concepts to life.
                    </p>
                    <a href="/cv?download=1" target="_blank" class="btn btn-primary" style="margin-top:20px;"><i class="fas fa-download"></i> Download CV</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES SECTION ===== -->
    <section id="services" class="section services-section">
        <div class="container">
            <h2 class="section-title">My <span class="highlight">Services</span></h2>
            <p class="section-subtitle">What I offer to bring your ideas to life</p>
            <div class="services-grid">
                <div class="service-card" id="service-web-design">
                    <div class="service-icon"><i class="fas fa-palette"></i></div>
                    <h3>Web Design</h3>
                    <p>Creating visually stunning and user-friendly website designs that captivate your audience and elevate your brand.</p>
                </div>
                <div class="service-card" id="service-web-dev">
                    <div class="service-icon"><i class="fas fa-code"></i></div>
                    <h3>Web Development</h3>
                    <p>Building responsive, high-performance websites using modern technologies and best practices.</p>
                </div>
                <div class="service-card" id="service-ui-ux">
                    <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
                    <h3>UI/UX Design</h3>
                    <p>Designing intuitive user interfaces and seamless user experiences that keep your users engaged.</p>
                </div>
                <div class="service-card" id="service-backend">
                    <div class="service-icon"><i class="fas fa-server"></i></div>
                    <h3>Backend Development</h3>
                    <p>Designing robust server-side architecture, RESTful APIs, database systems, and high-performance backend solutions.</p>
                </div>
                <div class="service-card" id="service-maintenance">
                    <div class="service-icon"><i class="fas fa-tools"></i></div>
                    <h3>Maintenance</h3>
                    <p>Providing ongoing website maintenance and support to ensure your site runs smoothly and securely.</p>
                </div>
                <div class="service-card" id="service-consulting">
                    <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Consulting</h3>
                    <p>Offering expert advice and strategic guidance to help you achieve your digital goals effectively.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PORTFOLIO SECTION ===== -->
    <section id="portfolio" class="section portfolio-section">
        <div class="container">
            <h2 class="section-title">My <span class="highlight">Portfolio</span></h2>
            <p class="section-subtitle">Recent projects I've worked on — these are just demos showing how each website looks and functions.</p>

            <div class="portfolio-grid" id="portfolio-grid">
                @foreach($projects as $proj)
                    <a href="{{ $proj['live_url'] }}" target="_blank" rel="noopener" class="portfolio-card-link" aria-label="View {{ $proj['title'] }}">
                        <div class="portfolio-item" data-category="{{ $proj['category'] }}">
                            <div class="portfolio-img" style="background: {{ $proj['gradient'] }}; display: flex; align-items: center; justify-content: center; flex-direction: column; color: white;">
                                <i class="fas {{ $proj['icon'] }}" style="font-size: 2.8rem; margin-bottom: 12px; opacity: 0.85;"></i>
                                <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; opacity: 0.7;">{{ $proj['category_label'] }}</span>
                            </div>
                            <div class="portfolio-overlay">
                                <h4>{{ $proj['title'] }}</h4>
                                <p>{{ $proj['category_label'] }}</p>
                                <span class="portfolio-link-btn">
                                    <span>View Live Demo</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <h2 class="section-title">Contact <span class="highlight">Me</span></h2>
            <p class="section-subtitle">Let's work together on your next project</p>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item" id="contact-email">
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
@endsection
