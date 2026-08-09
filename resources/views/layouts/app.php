<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($meta_description ?? 'Dunstan Devon - Web Developer Portfolio. Passionate about creating stunning web experiences.', ENT_QUOTES) ?>">
    <title><?= htmlspecialchars($title ?? 'Dunstan Devon | Web Developer Portfolio', ENT_QUOTES) ?></title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <?= $content ?>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p class="footer-text">&copy; <?= date('Y') ?> Dunstan Devon. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Fallback portrait image
        document.querySelectorAll('img[src="portrait.png"]').forEach(img => {
            img.onerror = function() {
                this.onerror = null;
                this.src = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face';
            };
        });
    </script>
    <!-- EmailJS SDK -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>
