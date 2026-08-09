<?php

namespace App\Http\Controllers;

use Exception;

class ProjectController
{
    /**
     * Get all portfolio projects dataset.
     */
    public function getProjects()
    {
        return [
            'migration-dashboard' => [
                'id'             => 1,
                'slug'           => 'migration-dashboard',
                'title'          => 'Migration Dashboard',
                'category'       => 'web',
                'category_label' => 'Web Development',
                'gradient'       => 'linear-gradient(135deg, #0b0f19 0%, #172554 50%, #3b82f6 100%)',
                'screenshot_url' => '/migration_dashboard.png',
                'is_live'        => true,
                'icon'           => 'fa-chart-line',
                'tags'           => ['Next.js', 'React', 'Tailwind CSS', 'Recharts', 'Analytics AI'],
                'tagline'        => 'Australian SkillSelect EOI & Migration Data Analytics Dashboard.',
                'description'    => 'An advanced data analytics platform for tracking Australian SkillSelect EOI (Expression of Interest) data, visa quota allocations (Visa 190 & 491), state nomination quotas, occupation shortage risk trends, and predictive AI modeling (Pathway Predictor, Approval Predictor, Volume Forecaster).',
                'tech_stack'     => ['Next.js', 'React', 'Tailwind CSS', 'Recharts', 'TypeScript', 'Vercel'],
                'features'       => [
                    'SkillSelect EOI Analytics tracking monthly EOI pool changes and active invitations',
                    'Interactive State Nomination Quota visualizations comparing Visa 190 and 491 allocations',
                    'Statistical Model & AI Tools: Pathway Predictor, Approval Predictor & Volume Forecaster',
                    'National Occupation Shortage Trend map and Machine Learning Shortage Risk rankings',
                    'Integrated Chat Advisor & automated report generator'
                ],
                'metrics' => [
                    ['label' => 'Latest EOIs', 'value' => '1.20M+'],
                    ['label' => 'Active Invites', 'value' => '13,180'],
                    ['label' => 'Live Demo', 'value' => 'Vercel']
                ],
                'live_url'   => 'https://migration-flame.vercel.app/dashboard',
                'github_url' => '#'
            ],
            'job-scraper-dashboard' => [
                'id'             => 2,
                'slug'           => 'job-scraper-dashboard',
                'title'          => 'Job Scraper Dashboard',
                'category'       => 'web',
                'category_label' => 'Web Development',
                'gradient'       => 'linear-gradient(135deg, #0b0f19, #1e1b4b)',
                'screenshot_url' => '/job_scraper_dashboard.png',
                'is_live'        => true,
                'icon'           => 'fa-database',
                'tags'           => ['PHP', 'JavaScript', 'Python', 'Web Scraping', 'REST API'],
                'tagline'        => 'Automated multi-platform job board scraper & lead generation dashboard.',
                'description'    => 'A comprehensive automated web scraper and lead extraction dashboard built for Australian job portals (Jora, Seek, Indeed, CareerOne, Adzuna, Workforce). Enables targeted keyword filtering, state/region queries, real-time extraction logs, and direct data exports in CSV and GoHighLevel (GHL) formats.',
                'tech_stack'     => ['PHP', 'JavaScript', 'Python', 'CSS3', 'REST API', 'MySQL'],
                'features'       => [
                    'Multi-platform automated scraper supporting 6 major portals (Jora, Seek, Indeed, CareerOne, Adzuna, Workforce)',
                    'Granular filtering options by keywords, sub-majors, state/region (e.g. NSW), date listed, and page limit',
                    'Interactive real-time data table displaying job titles, employer company names, locations, salaries, and phone numbers',
                    'One-click export capabilities to standard CSV format and GoHighLevel (GHL) CRM import format',
                    'Real-time task monitor sidebar tracking background scraper runs with status indicators (Done, Cancelled, Error)'
                ],
                'metrics' => [
                    ['label' => 'Extracted Jobs', 'value' => '100k+'],
                    ['label' => 'Supported Portals', 'value' => '6 Platforms'],
                    ['label' => 'Export Formats', 'value' => 'CSV / GHL']
                ],
                'live_url'   => 'https://scraper-psi-five.vercel.app/',
                'github_url' => '#'
            ],
            'browser-supply-clone' => [
                'id'             => 3,
                'slug'           => 'browser-supply-clone',
                'title'          => 'Browser Supply Clone',
                'category'       => 'design',
                'category_label' => 'Web Design',
                'gradient'       => 'linear-gradient(135deg, #0a0a0f, #0d1b2a)',
                'screenshot_url' => '/browser_supply_preview.png',
                'is_live'        => true,
                'icon'           => '',
                'tags'           => ['HTML5', 'CSS3', 'JavaScript', 'Framer'],
                'tagline'        => 'Clone of the Browser.supply Framer template marketplace.',
                'description'    => 'A pixel-perfect clone of the Browser.supply website — a premium Framer template marketplace. Showcases modern dark UI, animated template gallery, and clean typography.',
                'tech_stack'     => ['HTML5', 'CSS3', 'JavaScript', 'Framer'],
                'features'       => [
                    'Modern dark UI with smooth scroll animations',
                    'Animated template gallery grid',
                    'Clean typography and premium design aesthetics',
                    'Fully responsive layout'
                ],
                'metrics' => [
                    ['label' => 'Design Fidelity', 'value' => '100%'],
                    ['label' => 'Responsive',       'value' => 'Yes'],
                    ['label' => 'Performance',       'value' => '98/100']
                ],
                'live_url'   => 'https://browser-supply-clone-7c1b.vercel.app/',
                'github_url' => ''
            ],
            'date-planner' => [
                'id'             => 4,
                'slug'           => 'date-planner',
                'title'          => 'Date Planner',
                'category'       => 'web',
                'category_label' => 'Web Application',
                'gradient'       => 'linear-gradient(135deg, #0d0914 0%, #2a1228 50%, #e11d48 100%)',
                'screenshot_url' => '/date_planner_dashboard.png',
                'is_live'        => true,
                'icon'           => 'fa-calendar-alt',
                'tags'           => ['Next.js', 'React', 'Tailwind CSS', 'Vercel'],
                'tagline'        => 'Interactive date & vacation planner for couples — a small project done for fun.',
                'description'    => 'An aesthetic date and vacation planning web app for couples to organize weekly dates, track plans, and share schedules with custom room codes. Created as a small project done for fun.',
                'tech_stack'     => ['Next.js', 'React', 'Tailwind CSS', 'Vercel'],
                'features'       => [
                    'Interactive weekly planner grid for setting up daily date plans',
                    'Dark mode aesthetic with floating micro-animations',
                    'Room code system (e.g. Kode: RZN44P) for collaborative schedule planning',
                    'Responsive mobile and desktop views designed for quick date updates'
                ],
                'metrics' => [
                    ['label' => 'Project Type', 'value' => 'Fun Side Project'],
                    ['label' => 'Deployment',   'value' => 'Vercel'],
                    ['label' => 'Status',       'value' => 'Live Demo']
                ],
                'live_url'   => 'https://dpplan.vercel.app/',
                'github_url' => '#'
            ]
        ];
    }

    /**
     * Display portfolio homepage.
     */
    public function index()
    {
        $projects = $this->getProjects();
        return [
            'view' => 'home',
            'data' => compact('projects')
        ];
    }

    /**
     * Display a specific project detail page.
     */
    public function show($slug)
    {
        $projects = $this->getProjects();

        if (!isset($projects[$slug])) {
            throw new Exception('Project not found');
        }

        $project = $projects[$slug];

        $relatedProjects = array_slice(array_values(array_filter($projects, function ($p) use ($slug) {
            return $p['slug'] !== $slug;
        })), 0, 3);

        return [
            'view' => 'projects.show',
            'data' => compact('project', 'relatedProjects')
        ];
    }
}
