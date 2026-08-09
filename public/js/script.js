/* ============================================================
   DUNSTAN DEVON — PORTFOLIO · ENHANCED SCRIPTS
   ============================================================ */

// ===== DOM READY =====
document.addEventListener('DOMContentLoaded', () => {

  // ===== MOBILE MENU =====
  const hamburger   = document.getElementById('hamburger');
  const navLinks    = document.getElementById('nav-links');
  const allNavLinks = document.querySelectorAll('.nav-link');

  if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('active');
      navLinks.classList.toggle('open');
    });
    allNavLinks.forEach(link => {
      link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('open');
      });
    });
    document.addEventListener('click', e => {
      if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
        hamburger.classList.remove('active');
        navLinks.classList.remove('open');
      }
    });
  }

  // ===== ACTIVE NAV ON SCROLL =====
  function updateActiveNav() {
    const scrollPos = window.scrollY + 160;
    document.querySelectorAll('section[id]').forEach(section => {
      const top    = section.offsetTop;
      const height = section.offsetHeight;
      const id     = section.getAttribute('id');
      if (scrollPos >= top && scrollPos < top + height) {
        allNavLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('data-section') === id) link.classList.add('active');
        });
      }
    });
  }
  window.addEventListener('scroll', updateActiveNav, { passive: true });

  // ===== INTERSECTION OBSERVER REVEAL =====
  const observerOpts = { threshold: 0.12, rootMargin: '0px 0px -50px 0px' };
  const revealItems  = document.querySelectorAll(
    '.service-card, .portfolio-item, .stat-item, .skill-tag, .about-content'
  );

  revealItems.forEach((el, i) => {
    el.style.opacity   = '0';
    el.style.transform = 'translateY(32px)';
    el.style.transition = `opacity .65s ease ${i * 0.07}s, transform .65s ease ${i * 0.07}s`;
  });

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity   = '1';
        entry.target.style.transform = 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, observerOpts);

  revealItems.forEach(el => observer.observe(el));

  // ===== COUNTER ANIMATION =====
  function animateCounters() {
    document.querySelectorAll('.stat-number:not(.counted)').forEach(counter => {
      const rect = counter.getBoundingClientRect();
      if (rect.top < window.innerHeight && rect.bottom > 0) {
        counter.classList.add('counted');
        const target   = parseInt(counter.getAttribute('data-target'));
        const duration = 1800;
        const step     = target / (duration / 16);
        let current    = 0;
        const update = () => {
          current += step;
          if (current < target) {
            counter.textContent = Math.ceil(current);
            requestAnimationFrame(update);
          } else {
            counter.textContent = target;
          }
        };
        update();
      }
    });
  }
  window.addEventListener('scroll', animateCounters, { passive: true });
  animateCounters();

  // ===== PORTFOLIO FILTER =====
  const filterBtns   = document.querySelectorAll('.filter-btn');
  const portfolioCards = document.querySelectorAll('.pcard');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.getAttribute('data-filter');

      portfolioCards.forEach(card => {
        const cat  = card.getAttribute('data-category');
        const show = filter === 'all' || cat === filter;

        if (show) {
          card.classList.remove('hidden');
          card.style.opacity   = '0';
          card.style.transform = 'scale(0.92)';
          card.style.transition = 'opacity .4s ease, transform .4s ease';
          requestAnimationFrame(() => {
            card.style.opacity   = '1';
            card.style.transform = 'scale(1)';
          });
        } else {
          card.style.opacity   = '0';
          card.style.transform = 'scale(0.92)';
          setTimeout(() => card.classList.add('hidden'), 350);
        }
      });
    });
  });

  // ===== HORIZONTAL SCROLL — ARROWS + DRAG =====
  const track    = document.querySelector('.portfolio-track');
  const btnLeft  = document.getElementById('scroll-left');
  const btnRight = document.getElementById('scroll-right');
  const SCROLL_AMT = 360;

  if (track && btnLeft && btnRight) {
    btnLeft.addEventListener('click',  () => track.scrollBy({ left: -SCROLL_AMT, behavior: 'smooth' }));
    btnRight.addEventListener('click', () => track.scrollBy({ left:  SCROLL_AMT, behavior: 'smooth' }));

    let isDown = false, startX, scrollLeft;
    track.addEventListener('mousedown', e => {
      isDown = true;
      track.classList.add('grabbing');
      startX     = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });
    track.addEventListener('mouseleave', () => { isDown = false; track.classList.remove('grabbing'); });
    track.addEventListener('mouseup',    () => { isDown = false; track.classList.remove('grabbing'); });
    track.addEventListener('mousemove', e => {
      if (!isDown) return;
      e.preventDefault();
      const x    = e.pageX - track.offsetLeft;
      const walk = (x - startX) * 1.5;
      track.scrollLeft = scrollLeft - walk;
    });
  }

  // Reveal animation for pcard elements
  const pcardObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity   = '1';
        entry.target.style.transform = 'translateY(0)';
        pcardObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  portfolioCards.forEach((card, i) => {
    card.style.opacity   = '0';
    card.style.transform = 'translateY(32px)';
    card.style.transition = `opacity .6s ease ${i * 0.08}s, transform .6s ease ${i * 0.08}s`;
    pcardObserver.observe(card);
  });


  // ===== CONTACT FORM — EmailJS =====
  // ─────────────────────────────────────────────────────────────
  // STEP 1: Replace the three values below after setting up EmailJS
  // (see README or ask Antigravity for the exact steps)
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

    contactForm.addEventListener('submit', async e => {
      e.preventDefault();

      const name    = document.getElementById('form-name')?.value.trim();
      const email   = document.getElementById('form-email')?.value.trim();
      const subject = document.getElementById('form-subject')?.value.trim();
      const message = document.getElementById('form-message')?.value.trim();
      const btn     = document.getElementById('form-submit');
      const origText = btn.innerHTML;

      if (!name || !email || !subject || !message) {
        feedbackEl.innerHTML = `
          <div style="background:rgba(239,68,68,.15);color:#f87171;border:1px solid rgba(239,68,68,.3);padding:12px 16px;border-radius:8px;font-size:.9rem;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-exclamation-circle"></i> Please fill out all fields.
          </div>`;
        return;
      }

      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
      btn.disabled  = true;
      btn.style.opacity = '.7';
      feedbackEl.innerHTML = '';

      try {
        await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, {
          from_name:    name,
          from_email:   email,
          subject:      subject,
          message:      message,
          reply_to:     email
        });
        showSuccess();
      } catch (err) {
        console.error('EmailJS error:', err);
        showError('Failed to send message. Please email <strong>smokeysssa@gmail.com</strong> directly.');
      }

      function showSuccess() {
        btn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
        btn.style.opacity = '1';
        btn.style.background = '#10b981';
        btn.style.borderColor = '#10b981';
        btn.style.boxShadow = '0 4px 20px rgba(16,185,129,.4)';
        feedbackEl.innerHTML = `
          <div style="background:rgba(16,185,129,.15);color:#34d399;border:1px solid rgba(16,185,129,.3);padding:14px 18px;border-radius:10px;font-size:.92rem;display:flex;align-items:center;gap:10px;">
            <i class="fas fa-check-circle" style="font-size:1.1rem;"></i>
            <div><strong>Message Sent!</strong><br>
            <span style="font-size:.85rem;opacity:.9;">Thanks! I'll get back to you soon.</span></div>
          </div>`;
        contactForm.reset();
        setTimeout(() => {
          btn.innerHTML = origText;
          btn.disabled  = false;
          btn.style.background = '';
          btn.style.borderColor = '';
          btn.style.boxShadow = '';
        }, 3500);
      }

      function showError(msg) {
        btn.innerHTML = origText;
        btn.disabled  = false;
        btn.style.opacity = '1';
        feedbackEl.innerHTML = `
          <div style="background:rgba(239,68,68,.15);color:#f87171;border:1px solid rgba(239,68,68,.3);padding:12px 16px;border-radius:8px;font-size:.9rem;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-exclamation-circle"></i> ${msg}
          </div>`;
      }
    });
  }

  // ===== SMOOTH SCROLL =====
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ===== SUBTLE PARALLAX ON HERO IMAGE =====
  const imageWrapper = document.querySelector('.image-wrapper');
  if (imageWrapper) {
    let ticking = false;
    document.addEventListener('mousemove', e => {
      if (!ticking) {
        requestAnimationFrame(() => {
          const xAxis = (window.innerWidth  / 2 - e.pageX) / 80;
          const yAxis = (window.innerHeight / 2 - e.pageY) / 80;
          imageWrapper.style.transform = `perspective(1000px) rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
          ticking = false;
        });
        ticking = true;
      }
    });
    document.addEventListener('mouseleave', () => {
      imageWrapper.style.transform = 'perspective(1000px) rotateY(0) rotateX(0)';
    });
  }

  // ===== TYPING EFFECT FOR SUBTITLE =====
  const subtitle = document.querySelector('.hero-subtitle');
  if (subtitle) {
    const text = subtitle.textContent.trim();
    subtitle.textContent = '';
    subtitle.style.borderRight = '2px solid #06b6d4';
    let i = 0;
    const type = () => {
      if (i < text.length) {
        subtitle.textContent += text[i++];
        setTimeout(type, 75);
      } else {
        // blinking cursor
        setInterval(() => {
          subtitle.style.borderRight =
            subtitle.style.borderRight === 'none'
              ? '2px solid #06b6d4'
              : 'none';
        }, 530);
      }
    };
    setTimeout(type, 900);
  }

  // ===== CURSOR GLOW TRAIL =====
  const glow = document.createElement('div');
  Object.assign(glow.style, {
    position:     'fixed',
    width:        '300px',
    height:       '300px',
    borderRadius: '50%',
    pointerEvents:'none',
    zIndex:       '9999',
    background:   'radial-gradient(circle, rgba(124,58,237,.08) 0%, transparent 65%)',
    transform:    'translate(-50%,-50%)',
    transition:   'left .12s ease, top .12s ease',
    left:         '-300px',
    top:          '-300px',
  });
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => {
    glow.style.left = e.clientX + 'px';
    glow.style.top  = e.clientY + 'px';
  });

});
