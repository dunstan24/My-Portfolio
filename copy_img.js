const fs = require('fs');

const items = [
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/5a04e9f2-4255-49bd-9d50-2fdd96e2f901/media__1786026951456.png',
        dests: [
            'C:/Users/USER/Desktop/New folder (3)/public/job_scraper_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/job_scraper_dashboard.png'
        ]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/66393ad0-3241-4b44-aa41-37d045bbc3ed/media__1786199185275.jpg',
        dests: [
            'C:/Users/USER/Desktop/New folder (3)/public/migration_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/migration_dashboard.png'
        ]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/66393ad0-3241-4b44-aa41-37d045bbc3ed/migration_dashboard_1786199332189.png',
        dests: [
            'C:/Users/USER/Desktop/New folder (3)/public/migration_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/migration_dashboard.png'
        ]
    },
    {
        src: 'C:/Users/USER/.gemini/antigravity-ide/brain/36fbce1a-62e5-41f8-87f6-5a0328be1598/media__1786258759419.png',
        dests: [
            'C:/Users/USER/Desktop/New folder (3)/public/date_planner_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/date_planner_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/public/dpplan_dashboard.png',
            'C:/Users/USER/Desktop/New folder (3)/dpplan_dashboard.png'
        ]
    }
];

items.forEach(item => {
    if (fs.existsSync(item.src)) {
        item.dests.forEach(dest => {
            fs.copyFileSync(item.src, dest);
            console.log('Copied to ' + dest);
        });
    }
});

