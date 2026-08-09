<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dunstan Devon - Curriculum Vitae</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #000000;
            --text-dark: #000000;
            --text-muted: #333333;
            --border-color: #000000;
            --bg-body: #e2e8f0;
            --bg-paper: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-body);
            color: #000000;
            line-height: 1.5;
            padding: 40px 20px;
        }

        /* Action Toolbar */
        .toolbar {
            max-width: 850px;
            margin: 0 auto 24px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 14px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }

        .toolbar .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary {
            background: #2563eb;
            color: #ffffff;
        }
        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-outline {
            background: transparent;
            color: #0f172a;
            border: 1px solid #cbd5e1;
        }
        .btn-outline:hover {
            background: #f8fafc;
        }

        /* CV Paper Container */
        .cv-paper {
            max-width: 850px;
            margin: 0 auto;
            background: var(--bg-paper);
            padding: 50px 60px;
            border-radius: 2px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
        }

        /* Header Section */
        .cv-header {
            display: flex;
            align-items: center;
            gap: 36px;
            margin-bottom: 20px;
        }

        .cv-photo {
            width: 135px;
            height: 162px;
            object-fit: cover;
            border-radius: 2px;
            flex-shrink: 0;
        }

        .header-text {
            flex-grow: 1;
            text-align: center;
        }

        .cv-name {
            font-size: 2.4rem;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #000000;
            margin-bottom: 10px;
            line-height: 1.1;
        }

        .cv-contact {
            font-size: 0.95rem;
            color: #000000;
            line-height: 1.6;
            font-weight: 500;
        }

        .divider {
            height: 2.5px;
            background: #000000;
            margin: 20px 0;
        }

        .section-heading {
            text-align: center;
            font-size: 1.12rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #000000;
            margin-bottom: 14px;
        }

        .section-line {
            height: 1.5px;
            background: #000000;
            margin: 20px 0;
        }

        /* About Me */
        .about-text {
            font-size: 0.93rem;
            color: #000000;
            text-align: justify;
            line-height: 1.6;
        }

        /* Strengths & Expertise */
        .expertise-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            text-align: center;
            font-size: 0.9rem;
            line-height: 1.55;
        }

        .expertise-column {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .expertise-item {
            font-weight: 500;
            color: #000000;
        }

        /* Job Experience */
        .job-item {
            margin-bottom: 22px;
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 3px;
        }

        .job-company {
            font-size: 1.08rem;
            font-weight: 700;
            color: #000000;
        }

        .job-date {
            font-size: 0.92rem;
            font-weight: 700;
            color: #000000;
        }

        .job-role {
            font-size: 0.96rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 8px;
        }

        .accomplishments-title {
            font-size: 0.92rem;
            font-weight: 500;
            color: #000000;
            margin-bottom: 4px;
        }

        .job-bullets {
            padding-left: 18px;
            font-size: 0.9rem;
            color: #000000;
        }

        .job-bullets li {
            margin-bottom: 6px;
            line-height: 1.5;
            text-align: justify;
        }

        /* Education */
        .edu-grid {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .edu-item {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .edu-school {
            font-weight: 700;
            font-size: 0.98rem;
            color: #000000;
        }

        .edu-field {
            font-size: 0.92rem;
            color: #000000;
        }

        /* References */
        .ref-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 0.92rem;
        }

        .ref-item {
            line-height: 1.42;
        }

        .ref-name {
            font-weight: 700;
            color: #000000;
        }

        .ref-phone {
            color: #000000;
        }

        /* ── PRINT MEDIA (STRICT PAGE 3 BREAK FOR EDUCATION) ── */
        @page {
            size: A4 portrait;
            margin: 18mm 16mm 14mm 16mm;
        }

        @media print {
            html, body {
                background: #ffffff !important;
                color: #000000 !important;
                padding: 0 !important;
                margin: 0 !important;
                font-size: 9.5pt !important;
                line-height: 1.45 !important;
            }
            .toolbar {
                display: none !important;
            }
            .cv-paper {
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }
            .cv-header {
                gap: 28px !important;
                margin-bottom: 10px !important;
            }
            .cv-photo {
                width: 120px !important;
                height: 144px !important;
            }
            .cv-name {
                font-size: 2.2rem !important;
                letter-spacing: 2.5px !important;
                margin-bottom: 6px !important;
            }
            .cv-contact {
                font-size: 9pt !important;
                line-height: 1.5 !important;
            }
            .divider {
                height: 2px !important;
                background: #000000 !important;
                margin: 12px 0 !important;
            }
            .section-heading {
                font-size: 1.05rem !important;
                margin-bottom: 8px !important;
                letter-spacing: 1.8px !important;
                break-after: avoid !important;
                page-break-after: avoid !important;
            }
            .section-line {
                height: 1.2px !important;
                background: #000000 !important;
                margin: 12px 0 !important;
            }
            .about-text {
                font-size: 9pt !important;
                line-height: 1.46 !important;
            }
            .expertise-grid {
                gap: 6px !important;
                font-size: 8.8pt !important;
            }
            .job-item {
                margin-bottom: 16px !important;
                padding-top: 4px !important;
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }
            .job-header {
                margin-bottom: 2px !important;
                break-after: avoid !important;
                page-break-after: avoid !important;
            }
            .job-company {
                font-size: 1rem !important;
            }
            .job-date {
                font-size: 0.88rem !important;
            }
            .job-role {
                font-size: 0.92rem !important;
                margin-bottom: 4px !important;
            }
            .accomplishments-title {
                font-size: 0.88rem !important;
                margin-bottom: 3px !important;
            }
            .job-bullets {
                font-size: 8.8pt !important;
                padding-left: 16px !important;
            }
            .job-bullets li {
                margin-bottom: 4px !important;
                line-height: 1.44 !important;
            }
            .edu-grid {
                gap: 6px !important;
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }
            .edu-school { font-size: 0.95rem !important; }
            .edu-field  { font-size: 0.88rem !important; }
            .ref-list {
                gap: 6px !important;
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }
            .ref-item { font-size: 8.8pt !important; line-height: 1.4 !important; }

            /* Force Page 3 break right before EDUCATION */
            .page-break-before {
                break-before: page !important;
                page-break-before: always !important;
            }

            a {
                text-decoration: none !important;
                color: inherit !important;
            }
        }
    </style>
</head>
<body>

    <!-- Toolbar (Hidden during print) -->
    <div class="toolbar">
        <a href="/" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
        <div style="display:flex; gap:10px;">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fas fa-print"></i> Print / Save as PDF
            </button>
        </div>
    </div>

    <!-- CV Paper Document -->
    <div class="cv-paper">
        <!-- Header -->
        <div class="cv-header">
            <img src="/portrait.png" alt="Dunstan Devon" class="cv-photo" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face'">
            <div class="header-text">
                <h1 class="cv-name">DUNSTAN DEVON</h1>
                <div class="cv-contact">
                    <p>0895630478594 &nbsp;·&nbsp; dunstandevon2@gmail.com &nbsp;·&nbsp;</p>
                    <p>JL Petitenget Gang Rahayu III., Bali</p>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- About Me -->
        <h2 class="section-heading">ABOUT ME</h2>
        <p class="about-text">
            I am an adaptive and meticulous individual, accustomed to working in a structured manner to resolve various challenges efficiently. I possess strong analytical skills that enable me to understand requirements and translate them into effective solutions, supported by strong teamwork and collaboration abilities. In addition, I have solid public speaking skills and am able to communicate effectively in English, both verbally and in writing. As an added value, I have equipped myself with technical proficiency in Web Development and Microsoft Excel to support work productivity
        </p>

        <div class="section-line"></div>

        <!-- Strengths and Expertise -->
        <h2 class="section-heading">STRENGTHS AND EXPERTISE</h2>
        <div class="expertise-grid">
            <div class="expertise-column">
                <div class="expertise-item">Front-End Development</div>
                <div class="expertise-item">Back-End Development</div>
                <div class="expertise-item">Database Management</div>
            </div>
            <div class="expertise-column">
                <div class="expertise-item">Team Leadership</div>
                <div class="expertise-item">Communication</div>
                <div class="expertise-item">Operational Management</div>
            </div>
            <div class="expertise-column">
                <div class="expertise-item">Microsoft Excel ( Reporting)</div>
                <div class="expertise-item">Spreadsheet Automation</div>
                <div class="expertise-item">(Formulas)</div>
                <div class="expertise-item">Data Visualization (Excel Charts)</div>
            </div>
        </div>

        <div class="section-line"></div>

        <!-- Job Experience -->
        <h2 class="section-heading">JOB EXPERIENCE</h2>

        <!-- Job 1 -->
        <div class="job-item">
            <div class="job-header">
                <span class="job-company">Interlace Studies</span>
                <span class="job-date">April 2026- Present</span>
            </div>
            <div class="job-role">Full Stack Programmer</div>
            <div class="accomplishments-title">Accomplishments:</div>
            <ul class="job-bullets">
                <li>Developed ISWARA (Integrated Solution Waste Range), an integrated Web GIS-based Smart Waste Management System platform for TPS 3R Sapuh Jagat, built using Laravel 13, React.js (TypeScript), and PostgreSQL (PostGIS). The platform comprehensively maps customer geospatial coordinates and collection routes, supported by real-time GPS fleet tracking via WebSockets (Laravel Reverb). The system also features an automated billing engine based on Laravel Queue, distributing thousands of monthly invoices on a scheduled basis without compromising server performance.</li>
                <li>Built a full-stack Migration Intelligence Platform using Next.js (frontend) and Python (backend), supported by an API-based architecture and a MySQL database. This project involved integrating a custom-trained Machine Learning model to predict migration likelihood based on user profiles, as well as designing a Gemini-based Artificial Intelligence Advisor to deliver automated recommendations and an interactive Q&A service for clients.</li>
                <li>Developed a large-scale automated job listing data collection system using Python and Playwright to extract information from the Jora and CareerOne portals, implementing robust browser automation logic to circumvent bot detection mechanisms. The system was integrated with an interactive React-based dashboard and a MySQL database, significantly transforming a manual data collection process into an automated one and accelerating the company's job market analysis.</li>
            </ul>
        </div>

        <!-- Job 2 -->
        <div class="job-item">
            <div class="job-header">
                <span class="job-company">Smokey’s Protein Smoothies</span>
                <span class="job-date">April 2022- 2026</span>
            </div>
            <div class="job-role">Store Crew</div>
            <div class="accomplishments-title">Accomplishments:</div>
            <ul class="job-bullets">
                <li>Assisted the business owner in developing a macro-based application for internal store needs, functioning to automatically and accurately calculate the calorie count (kcal) of each beverage variant.</li>
                <li>Designed the calorie calculation logic using a structured approach, integrating raw material data and measurement units into the macro-based system to produce consistent calculations usable by all staff.</li>
                <li>Applied basic programming skills, algorithmic logic, and problem-solving to support operational decision-making and improve work efficiency through simple yet effective technological solutions.</li>
                <li>Played an active role as store operational staff responsible for beverage preparation, while implementing procedure-based work standards to ensure product quality consistency and daily workflow efficiency.</li>
                <li>Trained and mentored new employees using a systematic approach, including guidance on workflow, equipment usage, and operational process documentation to accelerate adaptation and minimize work errors.</li>
                <li>Managed raw material and store equipment inventory through routine stock recording, needs analysis, and inventory control to prevent stockouts and waste.</li>
            </ul>
        </div>

        <!-- Job 3 -->
        <div class="job-item">
            <div class="job-header">
                <span class="job-company">Beer &amp; Co</span>
                <span class="job-date">August 2020 - Present</span>
            </div>
            <div class="job-role">Daily Worker</div>
            <div class="accomplishments-title">Accomplishments:</div>
            <ul class="job-bullets">
                <li>Worked as a daily worker to support operations during staff shortages, particularly during major events and busy periods such as Christmas and Halloween.</li>
                <li>Served as a waitress, engaging guests directly by taking orders, serving drinks, and ensuring a comfortable and professional experience throughout each event.</li>
                <li>Built active rapport with guests through a persuasive and friendly approach to extend visit duration and encourage additional drink purchases.</li>
                <li>Applied natural upselling techniques by recommending drinks tailored to guest preferences, helping to increase sales during events.</li>
                <li>Able to work quickly and adaptively in high-pressure environments involving large visitor volumes and packed operational schedules.</li>
            </ul>
        </div>

        <!-- Job 4 -->
        <div class="job-item">
            <div class="job-header">
                <span class="job-company">Duwur Studio</span>
                <span class="job-date">February 2018</span>
            </div>
            <div class="job-role">Internship</div>
            <div class="accomplishments-title">Accomplishments:</div>
            <ul class="job-bullets">
                <li>Worked as an intern focused on visual content processing, specifically editing wedding photo collages and wedding videos in line with client concepts and requests.</li>
                <li>Operated photo and video editing software to produce visual content that was engaging, polished, and aesthetically refined.</li>
                <li>Directly involved in on-site fieldwork, helping to manage a photo booth stand during events and ensuring equipment and workflow ran smoothly.</li>
                <li>Followed and studied the prewedding photoshoot process, from equipment preparation and concept planning through to the on-site workflow of the photography and videography team.</li>
                <li>Demonstrated strong adaptability and eagerness to learn by being directly involved in the studio's creative and operational processes, both technical and non-technical.</li>
                <li>Collaborated with the team to ensure photo and video output met the studio's quality standards and agreed production schedules.</li>
            </ul>
        </div>

        <!-- Section Line with Page 3 Break -->
        <div class="section-line page-break-before"></div>

        <!-- Education (Starts at top of Page 3) -->
        <div class="education-section">
            <h2 class="section-heading">EDUCATION</h2>
            <div class="edu-grid">
                <div class="edu-item">
                    <span class="edu-school">STIKOM BALI</span>
                    <span class="edu-field">information Technology</span>
                </div>
                <div class="edu-item">
                    <span class="edu-school">SMK TI BALI GLOBAL JIMBARAN</span>
                    <span class="edu-field">Multimedia</span>
                </div>
            </div>
        </div>

        <div class="section-line"></div>

        <!-- References (Page 3) -->
        <div class="ref-list">
            <div class="ref-item">
                <span class="ref-name">Ida Bagus Irawan Purnama, S.T., M,Sc., Ph.D.</span> (Leader Interlace Studies)<br>
                <span class="ref-phone">+62 811-395-648</span>
            </div>
            <div class="ref-item">
                <span class="ref-name">LENNY RATNA LAWI</span> (Manager Beer &amp; Co)<br>
                <span class="ref-phone">+62 811-395-648</span>
            </div>
            <div class="ref-item">
                <span class="ref-name">WAHYU WULANDARI</span> (Manager Smokey’s Protein Smoothies)<br>
                <span class="ref-phone">+62 877-6165-8228</span>
            </div>
        </div>

    </div>

    <script>
        // Check if download URL param exists to automatically launch print dialog
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('download') || urlParams.has('print')) {
            window.addEventListener('load', () => {
                setTimeout(() => window.print(), 300);
            });
        }
    </script>
</body>
</html>
