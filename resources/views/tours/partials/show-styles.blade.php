<style>
.tour-details-page {
    background: #f7f6f4;
}
.tour-detail-hero {
    position: relative;
    min-height: 340px;
    display: flex;
    align-items: flex-end;
    padding: 2rem 0 2.5rem;
    background-color: #1a1a1a;
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.tour-detail-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(21, 21, 21, 0.55) 0%,
        rgba(21, 21, 21, 0.35) 45%,
        rgba(21, 21, 21, 0.88) 100%
    );
    z-index: 0;
}
.tour-detail-hero .container {
    position: relative;
    z-index: 1;
}
.tour-detail-hero .breadcrumb-items {
    margin-bottom: 1rem;
}
.tour-detail-hero .breadcrumb-items li,
.tour-detail-hero .breadcrumb-items li a {
    color: rgba(255, 255, 255, 0.85);
}
.tour-detail-hero .breadcrumb-items li a:hover {
    color: #fff;
}
.tour-detail-hero .breadcrumb-items li.style-2.style-3 {
    color: var(--theme, #DA9B21);
}
.tour-detail-hero__category {
    display: inline-block;
    margin-bottom: 0.65rem;
    padding: 0.35rem 0.75rem;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #151515;
    background: rgba(255, 255, 255, 0.95);
}
.tour-detail-hero h1 {
    color: #fff;
    font-size: clamp(1.65rem, 4vw, 2.35rem);
    font-weight: 800;
    line-height: 1.2;
    margin: 0 0 0.75rem;
    max-width: 52rem;
}
.tour-detail-hero__excerpt {
    color: rgba(255, 255, 255, 0.88);
    font-size: 1rem;
    line-height: 1.6;
    max-width: 42rem;
    margin: 0 0 1.25rem;
}
.tour-detail-hero__chips {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1.25rem;
}
.tour-detail-hero__chip {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.4rem 0.75rem;
    border-radius: 999px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #fff;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(4px);
}
.tour-detail-hero__chip i {
    color: var(--theme, #DA9B21);
    font-size: 0.85rem;
}
.tour-detail-hero__chip--pickup {
    background: rgba(218, 155, 33, 0.25);
    border-color: rgba(218, 155, 33, 0.45);
}
.tour-detail-hero__actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 1rem;
}
.tour-detail-hero__price {
    display: inline-flex;
    align-items: baseline;
    gap: 0.35rem;
    padding: 0.55rem 1rem;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.96);
    color: var(--theme, #DA9B21);
    font-size: 1.35rem;
    font-weight: 800;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
}
.tour-detail-hero__price small {
    font-size: 0.8rem;
    font-weight: 600;
    color: #666;
}
.tour-detail-hero .theme-btn {
    box-shadow: 0 6px 20px rgba(218, 155, 33, 0.45);
}
.tour-details-body {
    padding: 2rem 0 3.5rem;
}
.tour-details-nav {
    position: sticky;
    top: 0;
    z-index: 20;
    background: rgba(247, 246, 244, 0.92);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(21, 21, 21, 0.08);
    padding: 0.75rem 0;
    margin: -0.5rem 0 1.75rem;
}
.tour-details-nav-inner {
    display: flex;
    flex-wrap: wrap;
    gap: 0.45rem;
    align-items: center;
}
.tour-details-nav a {
    display: inline-block;
    padding: 0.4rem 0.9rem;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #444;
    background: #fff;
    border: 1px solid rgba(21, 21, 21, 0.08);
    text-decoration: none;
    transition: background 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s;
}
.tour-details-nav a:hover {
    background: var(--theme, #DA9B21);
    border-color: var(--theme, #DA9B21);
    color: #fff;
}
.tour-detail-panel {
    scroll-margin-top: 5.5rem;
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(21, 21, 21, 0.06);
    box-shadow: 0 4px 24px rgba(21, 21, 21, 0.05);
    padding: 1.5rem 1.5rem 1.65rem;
    margin-bottom: 1.25rem;
}
.tour-detail-panel__head {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    margin-bottom: 1.15rem;
    padding-bottom: 0.85rem;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-detail-panel__icon {
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: rgba(218, 155, 33, 0.12);
    color: var(--theme, #DA9B21);
    font-size: 1rem;
    flex-shrink: 0;
}
.tour-detail-panel h2 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
    color: #151515;
}
.tour-details-page .tour-html {
    font-size: 1rem;
    line-height: 1.75;
    color: #444;
}
.tour-details-page .tour-html img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 0.75rem 0;
}
.tour-details-page .tour-html ul,
.tour-details-page .tour-html ol {
    padding-left: 1.25rem;
    margin-bottom: 1rem;
}
.tour-gallery-mosaic {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0.65rem;
}
.tour-gallery-mosaic a:first-child {
    grid-column: span 2;
    grid-row: span 2;
}
.tour-gallery-mosaic a {
    display: block;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(21, 21, 21, 0.06);
    aspect-ratio: 1;
    transition: transform 0.2s, box-shadow 0.2s;
}
.tour-gallery-mosaic a:first-child {
    aspect-ratio: auto;
    min-height: 220px;
}
.tour-gallery-mosaic a:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(21, 21, 21, 0.12);
}
.tour-gallery-mosaic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.tour-itinerary-timeline {
    position: relative;
    padding-left: 1.75rem;
}
.tour-itinerary-timeline::before {
    content: '';
    position: absolute;
    left: 0.35rem;
    top: 0.35rem;
    bottom: 0.35rem;
    width: 2px;
    background: linear-gradient(180deg, var(--theme, #DA9B21), rgba(218, 155, 33, 0.2));
    border-radius: 1px;
}
.tour-itin-item {
    position: relative;
    padding-bottom: 1.5rem;
    margin-bottom: 1.5rem;
    border-bottom: 1px dashed rgba(21, 21, 21, 0.1);
}
.tour-itin-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
.tour-itin-dot {
    position: absolute;
    left: -1.5rem;
    top: 0.4rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--theme, #DA9B21);
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px rgba(218, 155, 33, 0.35);
    z-index: 1;
}
.tour-itin-meta {
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: var(--theme, #DA9B21);
    margin: 0 0 0.35rem;
}
.tour-itin-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #151515;
    margin: 0 0 0.65rem;
}
.tour-itin-content.tour-html strong {
    color: #151515;
}
.tour-faq-accordion .accordion-item {
    border: 1px solid rgba(21, 21, 21, 0.08) !important;
    border-radius: 12px !important;
    overflow: hidden;
    margin-bottom: 0.5rem;
}
.tour-faq-accordion .accordion-button {
    font-size: 0.95rem;
    padding: 1rem 1.15rem;
    background: #fafafa;
}
.tour-faq-accordion .accordion-button:not(.collapsed) {
    background: rgba(218, 155, 33, 0.1);
    color: var(--theme, #DA9B21);
    box-shadow: none;
}
.tour-sidebar {
    top: 5.5rem;
    scroll-margin-top: 5.5rem;
}
.tour-sidebar__card {
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
    border: 1px solid rgba(21, 21, 21, 0.08);
    box-shadow: 0 16px 48px rgba(21, 21, 21, 0.1);
}
.tour-sidebar__head {
    padding: 1.35rem 1.35rem 1.15rem;
    background: linear-gradient(145deg, #1a1a1a 0%, #333 100%);
    color: #fff;
    text-align: center;
}
.tour-sidebar__badge {
    display: inline-block;
    margin-bottom: 0.65rem;
    padding: 0.3rem 0.65rem;
    border-radius: 999px;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    background: var(--theme, #DA9B21);
    color: #fff;
}
.tour-sidebar__label {
    margin: 0;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    opacity: 0.7;
}
.tour-sidebar__price {
    margin: 0.2rem 0 0;
    font-size: 2.1rem;
    font-weight: 800;
    line-height: 1.1;
    color: var(--theme, #DA9B21);
}
.tour-sidebar__note {
    margin: 0.4rem 0 0;
    font-size: 0.8rem;
    line-height: 1.45;
    color: rgba(255, 255, 255, 0.78);
}
.tour-sidebar__category-link {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    margin-top: 0.85rem;
    padding: 0.4rem 0.75rem;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 600;
    color: #fff;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-decoration: none;
    transition: background 0.2s, border-color 0.2s;
}
.tour-sidebar__category-link:hover {
    background: rgba(218, 155, 33, 0.25);
    border-color: rgba(218, 155, 33, 0.45);
    color: #fff;
}
.tour-sidebar__facts {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.65rem;
    padding: 1.1rem 1.15rem;
    background: #faf9f7;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-sidebar__fact {
    display: flex;
    align-items: flex-start;
    gap: 0.55rem;
    padding: 0.65rem 0.7rem;
    background: #fff;
    border-radius: 12px;
    border: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-sidebar__fact--wide {
    grid-column: 1 / -1;
}
.tour-sidebar__fact-icon {
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 8px;
    background: rgba(218, 155, 33, 0.12);
    color: var(--theme, #DA9B21);
    font-size: 0.85rem;
}
.tour-sidebar__fact-text {
    display: flex;
    flex-direction: column;
    min-width: 0;
}
.tour-sidebar__fact-text strong {
    font-size: 0.82rem;
    font-weight: 700;
    color: #151515;
    line-height: 1.3;
}
.tour-sidebar__fact-text small {
    font-size: 0.68rem;
    color: #888;
    margin-top: 0.1rem;
}
.tour-sidebar__trust {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
    padding: 0.85rem 1.15rem;
    background: #fff;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-sidebar__trust-item {
    text-align: center;
    padding: 0.5rem 0.25rem;
}
.tour-sidebar__trust-item strong {
    display: block;
    font-size: 1rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.2;
}
.tour-sidebar__trust-item span {
    display: block;
    font-size: 0.65rem;
    color: #666;
    line-height: 1.3;
    margin-top: 0.15rem;
}
.tour-sidebar__section {
    padding: 1.1rem 1.15rem;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-sidebar__section--enquiry {
    background: #fff;
}
.tour-sidebar__section--booking {
    background: #fafafa;
}
.tour-sidebar__section-intro {
    font-size: 0.82rem;
    color: #666;
    line-height: 1.5;
    margin: -0.35rem 0 0.85rem;
}
.tour-sidebar__section--nav {
    padding-bottom: 1rem;
}
.tour-sidebar__section-title {
    display: flex;
    align-items: center;
    gap: 0.45rem;
    margin: 0 0 0.75rem;
    font-size: 0.9rem;
    font-weight: 700;
    color: #151515;
}
.tour-sidebar__section-title i {
    color: var(--theme, #DA9B21);
    font-size: 0.85rem;
}
.tour-sidebar__checklist {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 0.45rem;
}
.tour-sidebar__checklist li {
    position: relative;
    padding-left: 1.15rem;
    font-size: 0.84rem;
    line-height: 1.45;
    color: #555;
}
.tour-sidebar__checklist li::before {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    top: 0.15rem;
    font-size: 0.65rem;
    color: var(--theme, #DA9B21);
}
.tour-sidebar__form .form-label {
    font-size: 0.78rem;
    font-weight: 600;
    color: #555;
}
.tour-sidebar__form .theme-btn {
    border-radius: 10px;
    box-shadow: 0 4px 14px rgba(218, 155, 33, 0.35);
}
.tour-sidebar__login-hint {
    font-size: 0.84rem;
    color: #666;
    line-height: 1.5;
    margin-bottom: 0.85rem;
}
.tour-sidebar__actions {
    display: grid;
    gap: 0.5rem;
    padding: 1rem 1.15rem;
    background: #fff;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-sidebar__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.65rem 1rem;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 700;
    text-decoration: none;
    transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.15s;
}
.tour-sidebar__btn:hover {
    transform: translateY(-1px);
}
.tour-sidebar__btn--whatsapp {
    background: #25d366;
    color: #fff !important;
    box-shadow: 0 4px 14px rgba(37, 211, 102, 0.35);
}
.tour-sidebar__btn--whatsapp:hover {
    background: #1fb855;
    color: #fff !important;
}
.tour-sidebar__btn--outline {
    background: #fff;
    color: #151515 !important;
    border: 1px solid rgba(21, 21, 21, 0.12);
}
.tour-sidebar__btn--outline:hover {
    border-color: var(--theme, #DA9B21);
    color: var(--theme, #DA9B21) !important;
}
.tour-sidebar__btn--ghost {
    background: transparent;
    color: #666 !important;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 0.45rem 0.5rem;
    word-break: break-all;
}
.tour-sidebar__btn--ghost:hover {
    color: var(--theme, #DA9B21) !important;
}
.tour-sidebar__nav {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
}
.tour-sidebar__nav a {
    display: inline-block;
    padding: 0.35rem 0.7rem;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 600;
    color: #444;
    background: #f4f4f4;
    border: 1px solid rgba(21, 21, 21, 0.06);
    text-decoration: none;
    transition: background 0.2s, color 0.2s;
}
.tour-sidebar__nav a:hover {
    background: var(--theme, #DA9B21);
    color: #fff;
    border-color: var(--theme, #DA9B21);
}
.tour-sidebar__footer-link {
    padding: 0.85rem 1.15rem 1.1rem;
    background: rgba(218, 155, 33, 0.08);
}
.tour-sidebar__footer-link a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--theme, #DA9B21);
    text-decoration: none;
}
.tour-sidebar__footer-link a:hover {
    color: #c48a1c;
}
.tour-related-section {
    padding: 2.5rem 0 3rem;
    background: #fff;
    border-top: 1px solid rgba(21, 21, 21, 0.06);
}
.tour-related-section h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-align: center;
}
@media (max-width: 991px) {
    .tour-sidebar {
        position: static !important;
    }
    .tour-gallery-mosaic {
        grid-template-columns: repeat(2, 1fr);
    }
    .tour-gallery-mosaic a:first-child {
        grid-column: span 2;
        grid-row: span 1;
        min-height: 200px;
    }
}
@media (max-width: 575px) {
    .tour-detail-hero {
        min-height: 300px;
        padding: 1.5rem 0 2rem;
    }
    .tour-gallery-mosaic {
        grid-template-columns: 1fr 1fr;
    }
    .tour-gallery-mosaic a:first-child {
        grid-column: span 2;
    }
}
</style>
