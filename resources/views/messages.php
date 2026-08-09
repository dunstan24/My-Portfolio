<?php
$title = "Inbox - Received Messages | Dunstan Devon";
$meta_description = "Inbox of messages received from contact form.";
ob_start();
?>

<!-- ===== HEADER ===== -->
<header class="header sticky" id="header" style="position: sticky; top: 0; z-index: 100; background: rgba(10, 10, 20, 0.9); backdrop-filter: blur(12px); border-bottom: 1px solid var(--border, rgba(255, 255, 255, 0.1)); padding: 15px 0;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
        <a href="<?= route('home') ?>" class="logo" style="display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 1.25rem; color: #fff; text-decoration: none;">
            <i class="fas fa-arrow-left" style="color: var(--primary, #06b6d4);"></i> Back to Portfolio
        </a>
        <div style="display: flex; align-items: center; gap: 15px;">
            <span class="badge" style="background: rgba(6, 182, 212, 0.15); color: #06b6d4; border: 1px solid rgba(6, 182, 212, 0.3); padding: 6px 14px; border-radius: 20px; font-weight: 600; font-size: 0.85rem;">
                <i class="fas fa-inbox"></i> <?= count($messages) ?> Messages Received
            </span>
        </div>
    </div>
</header>

<section class="section" style="padding: 40px 0; min-height: 80vh;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; margin-bottom: 30px;">
            <div>
                <h1 style="font-size: 2rem; font-weight: 800; color: #fff; margin-bottom: 5px;">Received Messages</h1>
                <p style="color: var(--text-muted, #94a3b8);">All inquiries submitted through your website contact form.</p>
            </div>
            
            <?php if (!empty($messages)): ?>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="text" id="search-messages" placeholder="Search sender, subject..." style="padding: 10px 16px; border-radius: 8px; background: rgba(255, 255, 255, 0.05); border: 1px solid var(--border, rgba(255, 255, 255, 0.1)); color: #fff; outline: none; font-size: 0.9rem;">
                </div>
            <?php endif; ?>
        </div>

        <?php if (empty($messages)): ?>
            <div class="glass-card" style="text-align: center; padding: 60px 20px; background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.15); border-radius: 16px;">
                <div style="width: 70px; height: 70px; background: rgba(6, 182, 212, 0.1); color: #06b6d4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 1.8rem;">
                    <i class="fas fa-envelope-open"></i>
                </div>
                <h3 style="color: #fff; font-size: 1.3rem; margin-bottom: 8px;">No Messages Yet</h3>
                <p style="color: #94a3b8; max-width: 450px; margin: 0 auto 20px;">Messages sent through the contact form on your portfolio website will appear here in real-time.</p>
                <a href="<?= route('home') ?>#contact" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fas fa-paper-plane"></i> Test Contact Form
                </a>
            </div>
        <?php else: ?>
            <div id="messages-list" style="display: flex; flex-direction: column; gap: 20px;">
                <?php foreach ($messages as $msg): ?>
                    <div class="message-card glass-card" id="msg-card-<?= $msg['id'] ?>" style="background: rgba(20, 20, 35, 0.6); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 14px; padding: 24px; transition: transform 0.2s ease, border-color 0.2s ease;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 15px; margin-bottom: 16px; flex-wrap: wrap;">
                            <div style="display: flex; align-items: center; gap: 14px;">
                                <div style="width: 46px; height: 46px; border-radius: 50%; background: linear-gradient(135deg, #06b6d4, #3b82f6); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 1.2rem; text-transform: uppercase;">
                                    <?= substr($msg['name'], 0, 1) ?>
                                </div>
                                <div>
                                    <h4 class="sender-name" style="color: #fff; font-size: 1.1rem; font-weight: 700; margin: 0;"><?= htmlspecialchars($msg['name']) ?></h4>
                                    <a class="sender-email" href="mailto:<?= htmlspecialchars($msg['email']) ?>" style="color: #06b6d4; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-envelope" style="font-size: 0.75rem;"></i> <?= htmlspecialchars($msg['email']) ?>
                                    </a>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <span style="font-size: 0.82rem; color: #94a3b8; background: rgba(255, 255, 255, 0.05); padding: 4px 10px; border-radius: 6px;">
                                    <i class="far fa-clock"></i> <?= htmlspecialchars($msg['date_formatted'] ?? $msg['created_at']) ?>
                                </span>
                                <button onclick="deleteMsg('<?= $msg['id'] ?>')" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3); width: 34px; height: 34px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s;" title="Delete message">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                        <div style="margin-bottom: 14px; padding-bottom: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.06);">
                            <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; font-weight: 600;">Subject:</span>
                            <h5 class="msg-subject" style="color: #e2e8f0; font-size: 1rem; font-weight: 600; margin-top: 4px;"><?= htmlspecialchars($msg['subject']) ?></h5>
                        </div>

                        <div style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.6; white-space: pre-wrap; background: rgba(0, 0, 0, 0.2); padding: 16px; border-radius: 10px; border: 1px solid rgba(255, 255, 255, 0.04);" class="msg-body">
                            <?= htmlspecialchars($msg['message']) ?>
                        </div>

                        <div style="margin-top: 16px; display: flex; gap: 10px; justify-content: flex-end;">
                            <a href="mailto:<?= htmlspecialchars($msg['email']) ?>?subject=Re: <?= urlencode($msg['subject']) ?>" class="btn btn-sm" style="background: #06b6d4; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fas fa-reply"></i> Reply via Email
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<script>
function deleteMsg(id) {
    if (!confirm('Are you sure you want to delete this message?')) return;
    
    fetch('/api/messages/delete', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const card = document.getElementById('msg-card-' + id);
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'translateY(-10px)';
                setTimeout(() => card.remove(), 250);
            }
        }
    })
    .catch(err => console.error(err));
}

const searchInput = document.getElementById('search-messages');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll('.message-card').forEach(card => {
            const name = card.querySelector('.sender-name').textContent.toLowerCase();
            const email = card.querySelector('.sender-email').textContent.toLowerCase();
            const subject = card.querySelector('.msg-subject').textContent.toLowerCase();
            const body = card.querySelector('.msg-body').textContent.toLowerCase();
            
            if (name.includes(term) || email.includes(term) || subject.includes(term) || body.includes(term)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
}
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/app.php';
