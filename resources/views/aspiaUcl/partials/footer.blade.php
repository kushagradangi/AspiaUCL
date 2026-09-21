<style>
    /* SHARED FOOTER STYLES (DARK SECONDARY NAVY) */
    .site-footer {
        background: #0B132B;
        border-top: none;
        margin-top: 0;
        transition: background 0.3s, border-color 0.3s;
        width: 100%;
        color: #94a3b8;
    }
    .site-footer .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .site-footer .footer {
        padding: 28px 0 24px 0;
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 14px;
        font-size: 0.78rem;
        color: #94a3b8;
    }
    .site-footer .footer a {
        color: #cbd5e1;
        text-decoration: none;
        transition: color 0.2s;
    }
    .site-footer .footer a:hover {
        color: #16C4F4;
    }
    .site-footer .footer .brand-col {
        justify-self: start;
    }
    .site-footer .footer .links {
        justify-self: center;
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
        align-items: center;
        text-align: center;
    }
    .site-footer .footer .social {
        justify-self: end;
        display: flex;
        gap: 14px;
        font-size: 0.95rem;
        align-items: center;
    }
    .site-footer .footer .social a {
        color: #94a3b8;
    }
    .site-footer .footer .social a:hover {
        color: #16C4F4;
    }

    @media (max-width: 768px) {
        .site-footer .footer {
            grid-template-columns: 1fr;
            justify-items: center;
            text-align: center;
            gap: 16px;
        }
        .site-footer .footer .brand-col,
        .site-footer .footer .links,
        .site-footer .footer .social {
            justify-self: center;
            text-align: center;
        }
    }

    /* Dark Mode Footer Overrides */
    [data-theme="dark"] .site-footer,
    body.dark-mode .site-footer {
        background: #0B132B !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
    }
    [data-theme="dark"] .site-footer .footer strong,
    body.dark-mode .site-footer .footer strong {
        color: #ffffff !important;
    }
    [data-theme="dark"] .site-footer .footer a,
    body.dark-mode .site-footer .footer a {
        color: #cbd5e1 !important;
    }
    [data-theme="dark"] .site-footer .footer a:hover,
    body.dark-mode .site-footer .footer a:hover {
        color: #16C4F4 !important;
    }
</style>

<footer class="site-footer">
    <div class="container">
        <div class="footer">
            <div class="brand-col">
                <strong style="color:#ffffff;font-size:0.9rem;">ASPIA UCL</strong> <span style="color:#64748b;">— Unified Control Layer</span>
                <div class="footer-sub" style="margin-top:3px;font-size:0.65rem;color:#64748b;">Free compliance framework directory</div>
            </div>
            <div class="links">
                <a href="{{ route('frameworks.public_index') }}" title="Compliance Frameworks Directory">Frameworks</a>
                <a href="{{ route('domains.public_index') }}" title="Governance Domains">Domains</a>
                <a href="{{ route('controls.public_index') }}" title="Unified Controls Directory">Controls</a>
                <a href="https://aspiainfotech.com/about-aspia-infotech/" target="_blank" rel="noopener noreferrer" title="About ASPIA Infotech">About Us</a>
                <a href="https://aspiainfotech.com/blog/" target="_blank" rel="noopener noreferrer" title="Compliance Blog & Articles">Blog</a>
                <a href="{{ route('login') }}" title="Sign In to ASPIA">Sign In</a>
            </div>
            <div class="social">
                <a href="https://www.linkedin.com/company/aspiainfotech/posts/?feedView=all" target="_blank" rel="noopener noreferrer" aria-label="ASPIA LinkedIn Profile" title="ASPIA LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                <a href="https://x.com/infotechaspia" target="_blank" rel="noopener noreferrer" aria-label="ASPIA X (Twitter) Profile" title="ASPIA X (Twitter)"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</footer>

<script>
    // Universal Mobile Menu Toggle & Theme Switcher
    (function() {
        function initNavigationScripts() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navLinks = document.querySelector('.nav-links');
            if (mobileMenuToggle && navLinks) {
                mobileMenuToggle.onclick = function() {
                    navLinks.classList.toggle('active');
                };
            }

            const themeSwitch = document.getElementById('themeToggleSwitch');
            function applySiteTheme(theme) {
                if (theme === 'dark') {
                    document.body.classList.add('dark-mode');
                    document.documentElement.setAttribute('data-theme', 'dark');
                    if (themeSwitch) themeSwitch.checked = true;
                } else {
                    document.body.classList.remove('dark-mode');
                    document.documentElement.setAttribute('data-theme', 'light');
                    if (themeSwitch) themeSwitch.checked = false;
                }
            }
            const savedTheme = localStorage.getItem('ucl-theme') || 'light';
            applySiteTheme(savedTheme);

            if (themeSwitch) {
                themeSwitch.onchange = function() {
                    const newTheme = this.checked ? 'dark' : 'light';
                    localStorage.setItem('ucl-theme', newTheme);
                    applySiteTheme(newTheme);
                };
            }
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initNavigationScripts);
        } else {
            initNavigationScripts();
        }
    })();
</script>
