const fs = require('fs');
const path = require('path');

const items = [
    {
        src: path.join(__dirname, 'index.html'),
        dests: [path.join(__dirname, 'public/index.html')]
    },
    {
        src: path.join(__dirname, 'cv.html'),
        dests: [path.join(__dirname, 'public/cv.html')]
    },
    {
        src: path.join(__dirname, 'style.css'),
        dests: [path.join(__dirname, 'public/style.css'), path.join(__dirname, 'public/css/style.css')]
    },
    {
        src: path.join(__dirname, 'script.js'),
        dests: [path.join(__dirname, 'public/script.js'), path.join(__dirname, 'public/js/script.js')]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/5a04e9f2-4255-49bd-9d50-2fdd96e2f901/media__1786026951456.png',
        dests: [
            path.join(__dirname, 'public/job_scraper_dashboard.png'),
            path.join(__dirname, 'job_scraper_dashboard.png')
        ]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/66393ad0-3241-4b44-aa41-37d045bbc3ed/media__1786199185275.jpg',
        dests: [
            path.join(__dirname, 'public/migration_dashboard.png'),
            path.join(__dirname, 'migration_dashboard.png')
        ]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/36fbce1a-62e5-41f8-87f6-5a0328be1598/media__1786258759419.png',
        dests: [
            path.join(__dirname, 'public/date_planner_dashboard.png'),
            path.join(__dirname, 'date_planner_dashboard.png'),
            path.join(__dirname, 'public/dpplan_dashboard.png'),
            path.join(__dirname, 'dpplan_dashboard.png')
        ]
    },
    {
        src: path.join(__dirname, 'public/browser_supply_preview.png'),
        dests: [
            path.join(__dirname, 'browser_supply_preview.png')
        ]
    }
];

items.forEach(item => {
    if (fs.existsSync(item.src)) {
        item.dests.forEach(dest => {
            try {
                fs.copyFileSync(item.src, dest);
                console.log('Copied to ' + dest);
            } catch (err) {
                console.log('Skip copying to ' + dest);
            }
        });
    }
});
