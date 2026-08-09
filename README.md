# 🚀 Dunstan Devon - Web Developer Portfolio

A modern, high-performance developer portfolio built with a lightweight PHP MVC structure, vanilla JavaScript, and modern CSS aesthetics featuring glassmorphism and smooth animations.

---

## ✨ Features

- **🎨 Modern Aesthetic**: Glassmorphism design, vibrant color gradients, and sleek dark mode styling.
- **⚡ Lightweight PHP Engine**: Native PHP routing and view rendering system (inspired by Laravel conventions) requiring no heavy framework dependencies.
- **📱 Fully Responsive**: Tailored layouts for desktops, tablets, and mobile devices.
- **📂 Interactive Project Showcase**: Detailed project pages accessible via clean dynamic URLs (e.g. `/projects/nexus-dashboard`).
- **💬 Interactive UI Elements**: Smooth scroll navigation, filterable project grid, modal dialogs, and interactive contact form.

---

## 🛠️ Tech Stack

- **Backend / Routing**: PHP 7.4+ / PHP 8.x (Native PHP Front Controller & Router)
- **Frontend**: HTML5, Modern CSS3 (CSS Variables, Flexbox/Grid, Animations), Vanilla JavaScript (ES6+)
- **Tooling**: Node.js & npm (Task Runner & Script Automation)

---

## 📋 Prerequisites

Before running the application, make sure you have the following installed on your system:

1. **PHP**: PHP 7.4 or higher (Ensure `php` command is accessible from your terminal/command prompt).
   - Check version: `php -v`
2. **Node.js & npm** (Optional, but recommended for npm scripts):
   - Check version: `npm -v`

---

## 🚀 How to Run the Application

### Option 1: Using `npm` (Recommended)

1. Open your terminal in the project directory:
   ```bash
   cd "c:\Users\USER\Desktop\New folder (3)"
   ```

2. Start the development server:
   ```bash
   npm run dev
   ```
   *(Alternatively, you can run `npm start`)*

3. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

---

### Option 2: Using PHP Built-In Web Server Directly

If you prefer not to use `npm`, you can launch the PHP development server directly:

1. Open terminal in the project root directory.

2. Run the following command:
   ```bash
   php -S localhost:8000 -t public
   ```

3. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

---

## 📁 Project Structure

```
├── app/
│   └── Http/
│       └── Controllers/
│           └── ProjectController.php  # Controller managing portfolio data and routes
├── public/
│   ├── css/                           # Compiled/Static stylesheets
│   ├── js/                            # Frontend scripts
│   └── index.php                      # Front Controller & Custom Router
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.php                # Main layout template
│       │   └── app.blade.php          # Blade layout template fallback
│       ├── projects/
│       │   ├── show.php               # Project detail page view
│       │   └── show.blade.php
│       ├── home.php                   # Portfolio home page view
│       └── home.blade.php
├── package.json                       # Project scripts and configuration
├── server.php                         # Router script for PHP built-in web server
├── style.css                          # Global styling rules
└── README.md                          # Project documentation
```

---

## 📜 License

This project is open source and available under the [ISC License](LICENSE).
