// ===== DOM Elements =====
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const allNavLinks = document.querySelectorAll('.nav-link');
const sections = document.querySelectorAll('.section, .hero');
const filterBtns = document.querySelectorAll('.filter-btn');
const portfolioCards = document.querySelectorAll('.pcard');

// ===== Mobile Menu Toggle =====
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('open');
});

// Close mobile menu on link click
allNavLinks.forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('open');
    });
});

// Close mobile menu on outside click
document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
        hamburger.classList.remove('active');
        navLinks.classList.remove('open');
    }
});

// ===== Active Nav Link on Scroll =====
function updateActiveNav() {
    const scrollPos = window.scrollY + 150;

    document.querySelectorAll('section[id]').forEach(section => {
        const top = section.offsetTop;
        const height = section.offsetHeight;
        const id = section.getAttribute('id');

        if (scrollPos >= top && scrollPos < top + height) {
            allNavLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === id) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', updateActiveNav);

// ===== Scroll Reveal Animation =====
function revealOnScroll() {
    const reveals = document.querySelectorAll('.service-card, .pcard, .about-content, .stat-item');

    reveals.forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;
        const revealPoint = 120;

        if (elementTop < windowHeight - revealPoint) {
            el.classList.add('revealed');
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }
    });
}

// Initialize reveal styles
document.querySelectorAll('.service-card, .pcard, .stat-item').forEach((el, index) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = `all 0.6s ease ${index * 0.1}s`;
});

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

// ===== Counter Animation =====
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');

    counters.forEach(counter => {
        if (counter.classList.contains('counted')) return;

        const rect = counter.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            counter.classList.add('counted');
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        }
    });
}

window.addEventListener('scroll', animateCounters);
window.addEventListener('load', animateCounters);

// ===== Portfolio Filter =====
filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        portfolioCards.forEach((card) => {
            const category = card.getAttribute('data-category');
            const show = filter === 'all' || category === filter;

            if (show) {
                card.classList.remove('hidden');
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                requestAnimationFrame(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                });
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                setTimeout(() => card.classList.add('hidden'), 350);
            }
        });
    });
});

// ===== Portfolio Horizontal Scroll (arrows + drag) =====
const track = document.querySelector('.portfolio-track');
const btnLeft  = document.getElementById('scroll-left');
const btnRight = document.getElementById('scroll-right');
const SCROLL_AMOUNT = 360;

if (btnLeft && btnRight && track) {
    btnLeft.addEventListener('click',  () => track.scrollBy({ left: -SCROLL_AMOUNT, behavior: 'smooth' }));
    btnRight.addEventListener('click', () => track.scrollBy({ left:  SCROLL_AMOUNT, behavior: 'smooth' }));

    // Drag-to-scroll
    let isDown = false, startX, scrollLeft;

    track.addEventListener('mousedown', e => {
        isDown = true;
        track.classList.add('grabbing');
        startX = e.pageX - track.offsetLeft;
        scrollLeft = track.scrollLeft;
    });
    track.addEventListener('mouseleave', () => { isDown = false; track.classList.remove('grabbing'); });
    track.addEventListener('mouseup',    () => { isDown = false; track.classList.remove('grabbing'); });
    track.addEventListener('mousemove',  e => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - track.offsetLeft;
        const walk = (x - startX) * 1.5;
        track.scrollLeft = scrollLeft - walk;
    });
}

// ===== CONTACT FORM — EmailJS =====
// ─────────────────────────────────────────────────────────────
// Replace the three values below after setting up EmailJS
// ─────────────────────────────────────────────────────────────
const EMAILJS_PUBLIC_KEY  = 'QTg1HjsO1SFUJBrBU';
const EMAILJS_SERVICE_ID  = 'service_cki2hxn';
const EMAILJS_TEMPLATE_ID = 'template_70syo69';
// ─────────────────────────────────────────────────────────────

if (typeof emailjs !== 'undefined') {
    emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
}

const contactForm = document.getElementById('contact-form');
if (contactForm) {
    let feedbackEl = document.getElementById('form-feedback');
    if (!feedbackEl) {
        feedbackEl = document.createElement('div');
        feedbackEl.id = 'form-feedback';
        feedbackEl.style.marginBottom = '15px';
        contactForm.insertBefore(feedbackEl, contactForm.firstChild);
    }

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const name     = document.getElementById('form-name')?.value.trim();
        const email    = document.getElementById('form-email')?.value.trim();
        const subject  = document.getElementById('form-subject')?.value.trim();
        const message  = document.getElementById('form-message')?.value.trim();
        const submitBtn = document.getElementById('form-submit');
        const originalText = submitBtn.innerHTML;

        if (!name || !email || !subject || !message) {
            showError('Please fill out all fields.');
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            showError('Please enter a valid email address (e.g. name@example.com).');
            return;
        }

        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.7';
        feedbackEl.innerHTML = '';

        try {
            await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, {
                from_name:  name,
                from_email: email,
                subject:    subject,
                message:    message,
                reply_to:   email
            });
            showSuccess();
        } catch (err) {
            console.error('EmailJS error:', err);
            const mailtoUrl = `mailto:dunstandevon2@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent("From: " + name + " (" + email + ")\n\n" + message)}`;
            showError(`Failed to send via auto-mailer. <a href="${mailtoUrl}" target="_blank" style="color:#00d4ff; text-decoration:underline;">Click here to send email to dunstandevon2@gmail.com directly</a>.`);
        }

        function showSuccess() {
            submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
            submitBtn.style.opacity = '1';
            submitBtn.style.background = '#10b981';
            submitBtn.style.borderColor = '#10b981';
            submitBtn.style.boxShadow = '0 4px 20px rgba(16,185,129,.4)';
            feedbackEl.innerHTML = `
                <div style="background:rgba(16,185,129,.15);color:#34d399;border:1px solid rgba(16,185,129,.3);padding:14px 18px;border-radius:10px;font-size:.92rem;display:flex;align-items:center;gap:10px;">
                    <i class="fas fa-check-circle" style="font-size:1.1rem;"></i>
                    <div><strong>Message Sent!</strong><br>
                    <span style="font-size:.85rem;opacity:.9;">Thanks! I'll get back to you soon.</span></div>
                </div>`;
            contactForm.reset();
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
                submitBtn.style.borderColor = '';
                submitBtn.style.boxShadow = '';
            }, 3500);
        }

        function showError(msg) {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            feedbackEl.innerHTML = `
                <div style="background:rgba(239,68,68,.15);color:#f87171;border:1px solid rgba(239,68,68,.3);padding:12px 16px;border-radius:8px;font-size:.9rem;display:flex;align-items:center;gap:8px;">
                    <i class="fas fa-exclamation-circle"></i> ${msg}
                </div>`;
        }
    });
}

// ===== Smooth scroll for all anchor links =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ===== Parallax on hero image =====
const heroImage = document.querySelector('.image-wrapper');
if (heroImage) {
    document.addEventListener('mousemove', (e) => {
        const xAxis = (window.innerWidth / 2 - e.pageX) / 60;
        const yAxis = (window.innerHeight / 2 - e.pageY) / 60;
        heroImage.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    });

    document.addEventListener('mouseleave', () => {
        heroImage.style.transform = 'rotateY(0deg) rotateX(0deg)';
    });
}

// ===== Typing effect for subtitle =====
const subtitle = document.querySelector('.hero-subtitle');
if (subtitle) {
    const text = subtitle.textContent;
    subtitle.textContent = '';
    subtitle.style.borderRight = '2px solid var(--primary)';

    let charIndex = 0;
    function typeText() {
        if (charIndex < text.length) {
            subtitle.textContent += text.charAt(charIndex);
            charIndex++;
            setTimeout(typeText, 80);
        } else {
            // Blinking cursor effect
            setInterval(() => {
                subtitle.style.borderRight = subtitle.style.borderRight === 'none' 
                    ? '2px solid var(--primary)' 
                    : 'none';
            }, 500);
        }
    }

    setTimeout(typeText, 800);
}
