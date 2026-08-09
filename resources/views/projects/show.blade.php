@extends('layouts.app')

@section('title', $project['title'] . ' | Project Details')
@section('meta_description', $project['tagline'])

@section('content')
    <!-- ===== PROJECT HERO HEADER ===== -->
    <header class="project-hero" style="background: {{ $project['gradient'] }};">
        <div class="container">
            <nav class="project-nav">
                <a href="{{ route('home') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Back to Portfolio
                </a>

            </nav>

            <div class="project-hero-content">
                <span class="project-badge"><i class="fas {{ $project['icon'] }}"></i> {{ $project['category_label'] }}</span>
                <h1 class="project-hero-title">{{ $project['title'] }}</h1>
                <p class="project-hero-tagline">{{ $project['tagline'] }}</p>

                <div class="project-action-btns">
                    <a href="{{ $project['live_url'] }}" target="_blank" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i> Live Preview
                    </a>
                    <a href="{{ $project['github_url'] }}" target="_blank" class="btn btn-outline">
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
                @foreach($project['metrics'] as $metric)
                    <div class="metric-card">
                        <span class="metric-value">{{ $metric['value'] }}</span>
                        <span class="metric-label">{{ $metric['label'] }}</span>
                    </div>
                @endforeach
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
                        <p class="project-description-text">{{ $project['description'] }}</p>
                    </div>

                    <div class="content-block">
                        <h2 class="block-title"><i class="fas fa-star highlight"></i> Key Features</h2>
                        <ul class="feature-list">
                            @foreach($project['features'] as $feature)
                                <li>
                                    <div class="feature-check"><i class="fas fa-check"></i></div>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Showcase Preview Card -->
                    <div class="content-block">
                        <h2 class="block-title"><i class="fas fa-desktop highlight"></i> Showcase Preview</h2>
                        <div class="showcase-box" style="background: {{ $project['gradient'] }};">
                            <i class="fas {{ $project['icon'] }} showcase-icon"></i>
                            <h3>{{ $project['title'] }} Showcase</h3>
                            <p>{{ $project['tagline'] }}</p>
                            <a href="{{ $project['live_url'] }}" target="_blank" class="btn btn-primary" style="margin-top: 15px;">Launch Application</a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Details -->
                <aside class="project-sidebar">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Technologies Used</h3>
                        <div class="tech-tags">
                            @foreach($project['tech_stack'] as $tech)
                                <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Project Info</h3>
                        <ul class="sidebar-info-list">
                            <li>
                                <span class="info-label">Category</span>
                                <span class="info-val">{{ $project['category_label'] }}</span>
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
                        <a href="{{ route('home') }}#contact" class="btn btn-primary" style="width: 100%; text-align: center;">Get in Touch</a>
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
                @foreach($relatedProjects as $rel)
                    <a href="{{ route('projects.show', $rel['slug']) }}" class="portfolio-card-link">
                        <div class="portfolio-item">
                            <div class="portfolio-img" style="background: {{ $rel['gradient'] }}; display: flex; align-items: center; justify-content: center; flex-direction: column; color: white;">
                                <i class="fas {{ $rel['icon'] }}" style="font-size: 2.5rem; margin-bottom: 10px;"></i>
                                <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;">{{ $rel['category_label'] }}</span>
                            </div>
                            <div class="portfolio-overlay">
                                <h4>{{ $rel['title'] }}</h4>
                                <p>{{ $rel['category_label'] }}</p>
                                <span class="portfolio-link-btn">
                                    <span>View Project</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
