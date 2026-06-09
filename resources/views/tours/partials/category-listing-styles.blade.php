<style>
.tour-category-page .tour-category-hero {
    position: relative;
    padding: 3.5rem 0 3rem;
    background-color: #1a1a1a;
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.tour-category-page .tour-category-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(21, 21, 21, 0.88) 0%, rgba(21, 21, 21, 0.65) 55%, rgba(218, 155, 33, 0.25) 100%);
    z-index: 0;
}
.tour-category-page .tour-category-hero .container {
    position: relative;
    z-index: 1;
}
.tour-category-page .tour-category-hero .breadcrumb-items li,
.tour-category-page .tour-category-hero .breadcrumb-items li a {
    color: rgba(255, 255, 255, 0.85);
}
.tour-category-page .tour-category-hero .breadcrumb-items li.style-2 {
    color: var(--theme, #DA9B21);
}
.tour-category-page .tour-category-hero__eyebrow {
    display: inline-block;
    margin-bottom: 0.75rem;
    padding: 0.35rem 0.8rem;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #fff;
    background: rgba(218, 155, 33, 0.35);
    border: 1px solid rgba(218, 155, 33, 0.5);
}
.tour-category-page .tour-category-hero h1 {
    color: #fff;
    font-size: clamp(1.75rem, 4vw, 2.6rem);
    font-weight: 800;
    line-height: 1.15;
    margin: 0 0 1rem;
    max-width: 40rem;
}
.tour-category-page .tour-category-hero__intro {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.05rem;
    line-height: 1.65;
    max-width: 42rem;
    margin: 0 0 1.25rem;
}
.tour-category-page .tour-category-hero__stats {
    display: flex;
    flex-wrap: wrap;
    gap: 0.65rem;
    margin-bottom: 1.35rem;
}
.tour-category-page .tour-category-hero__stat {
    padding: 0.5rem 0.85rem;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(4px);
}
.tour-category-page .tour-category-hero__stat strong {
    display: block;
    font-size: 1rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.2;
}
.tour-category-page .tour-category-hero__stat span {
    font-size: 0.72rem;
    color: rgba(255, 255, 255, 0.8);
}
.tour-category-page .tour-category-hero__actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.65rem;
}
.tour-category-page .tour-category-body {
    padding: 2.5rem 0 3rem;
    background: #f7f6f4;
}
.tour-category-page .tour-category-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 1.75rem;
    align-items: start;
}
.tour-category-page .tour-category-sidebar {
    position: sticky;
    top: 5.5rem;
}
.tour-category-page .tour-category-sidebar__card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(21, 21, 21, 0.08);
    box-shadow: 0 8px 32px rgba(21, 21, 21, 0.06);
    overflow: hidden;
    margin-bottom: 1rem;
}
.tour-category-page .tour-category-sidebar__head {
    padding: 1.1rem 1.15rem;
    background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
    color: #fff;
}
.tour-category-page .tour-category-sidebar__head h3 {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 700;
}
.tour-category-page .tour-category-sidebar__head p {
    margin: 0.35rem 0 0;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.75);
}
.tour-category-page .tour-category-sidebar__body {
    padding: 1rem 1.15rem 1.15rem;
}
.tour-category-page .tour-category-sidebar__list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 0.55rem;
}
.tour-category-page .tour-category-sidebar__list li {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    font-size: 0.84rem;
    line-height: 1.45;
    color: #555;
}
.tour-category-page .tour-category-sidebar__list li i {
    color: var(--theme, #DA9B21);
    margin-top: 0.2rem;
    flex-shrink: 0;
}
.tour-category-page .tour-category-sidebar__meta {
    display: grid;
    gap: 0.5rem;
    margin-bottom: 1rem;
    font-size: 0.84rem;
}
.tour-category-page .tour-category-sidebar__meta div {
    display: flex;
    justify-content: space-between;
    gap: 0.5rem;
    padding-bottom: 0.45rem;
    border-bottom: 1px dashed rgba(21, 21, 21, 0.08);
}
.tour-category-page .tour-category-sidebar__meta dt {
    color: #888;
    font-weight: 600;
}
.tour-category-page .tour-category-sidebar__meta dd {
    margin: 0;
    font-weight: 700;
    color: #151515;
    text-align: right;
}
.tour-category-page .tour-category-sidebar__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.45rem;
    width: 100%;
    padding: 0.65rem 1rem;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 700;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s;
}
.tour-category-page .tour-category-sidebar__btn--wa {
    background: #25d366;
    color: #fff !important;
    margin-bottom: 0.5rem;
}
.tour-category-page .tour-category-sidebar__btn--wa:hover {
    background: #1fb855;
    color: #fff !important;
}
.tour-category-page .tour-category-sidebar__btn--contact {
    background: var(--theme, #DA9B21);
    color: #fff !important;
    box-shadow: 0 4px 14px rgba(218, 155, 33, 0.35);
}
.tour-category-page .tour-category-main__toolbar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.25rem;
}
.tour-category-page .tour-category-main__count {
    margin: 0;
    font-size: 0.95rem;
    color: #666;
}
.tour-category-page .tour-category-main__count strong {
    color: #151515;
}
.tour-category-page .tours-filter-nav {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-bottom: 1.5rem;
}
.tour-category-page .tours-filter-pill {
    display: inline-block;
    padding: 0.38rem 0.8rem;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 600;
    text-decoration: none;
    color: #444;
    background: #fff;
    border: 1px solid rgba(21, 21, 21, 0.1);
    transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.tour-category-page .tours-filter-pill:hover,
.tour-category-page .tours-filter-pill.is-active {
    background: var(--theme, #DA9B21);
    border-color: var(--theme, #DA9B21);
    color: #fff;
}
.tour-category-page .tour-pickup-notice {
    margin-bottom: 1.25rem;
}
.tour-category-page .tours-empty-state {
    background: #fff;
    border-radius: 16px;
    padding: 3rem 1.5rem;
    border: 1px solid rgba(21, 21, 21, 0.06);
}
@media (max-width: 991px) {
    .tour-category-page .tour-category-layout {
        grid-template-columns: 1fr;
    }
    .tour-category-page .tour-category-sidebar {
        position: static;
    }
}
@media (max-width: 575px) {
    .tour-category-page .tour-category-hero {
        padding: 2.5rem 0 2rem;
    }
}
</style>
