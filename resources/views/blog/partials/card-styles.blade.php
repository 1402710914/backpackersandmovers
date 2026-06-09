<style>
.blog-cards-row > [class*="col-"] {
    display: flex;
}
.blog-list-card {
    display: flex;
    flex-direction: column;
    width: 100%;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(21, 21, 21, 0.08);
    box-shadow: 0 4px 20px rgba(21, 21, 21, 0.06);
    transition: box-shadow 0.3s ease, transform 0.3s ease, border-color 0.3s ease;
}
.blog-list-card:hover {
    border-color: rgba(218, 155, 33, 0.35);
    box-shadow: 0 16px 40px rgba(21, 21, 21, 0.12);
    transform: translateY(-4px);
}
.blog-list-card__media {
    display: block;
    position: relative;
    width: 100%;
    aspect-ratio: 4 / 3;
    overflow: hidden;
    background: linear-gradient(145deg, #e8e4df 0%, #d4cfc8 100%);
}
.blog-list-card__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.55s ease;
}
.blog-list-card:hover .blog-list-card__media img {
    transform: scale(1.06);
}
.blog-list-card__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(21, 21, 21, 0.2) 0%,
        rgba(21, 21, 21, 0) 45%,
        rgba(21, 21, 21, 0.5) 100%
    );
    pointer-events: none;
    z-index: 1;
}
.blog-list-card__category {
    position: absolute;
    top: 0.85rem;
    left: 0.85rem;
    z-index: 2;
    max-width: calc(100% - 1.7rem);
    padding: 0.35rem 0.7rem;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 600;
    color: #151515;
    background: rgba(255, 255, 255, 0.94);
    backdrop-filter: blur(6px);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    pointer-events: none;
}
.blog-list-card__date {
    position: absolute;
    right: 0.85rem;
    bottom: 0.85rem;
    z-index: 2;
    padding: 0.4rem 0.65rem;
    border-radius: 10px;
    font-size: 0.72rem;
    font-weight: 700;
    line-height: 1.2;
    color: #151515;
    background: rgba(255, 255, 255, 0.96);
    box-shadow: 0 4px 14px rgba(21, 21, 21, 0.12);
    pointer-events: none;
}
.blog-list-card__draft {
    position: absolute;
    top: 0.85rem;
    right: 0.85rem;
    z-index: 3;
    padding: 0.35rem 0.65rem;
    border-radius: 8px;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: #151515;
    background: #ffc107;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    pointer-events: none;
}
.blog-list-card__body {
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 0.65rem;
    padding: 1.2rem 1.25rem 1.3rem;
}
.blog-list-card__title {
    margin: 0;
    font-size: 1.1rem;
    line-height: 1.35;
    font-weight: 700;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
}
.blog-list-card__title a {
    color: #151515;
    text-decoration: none;
    transition: color 0.2s;
}
.blog-list-card__title a:hover {
    color: var(--theme, #DA9B21);
}
.blog-list-card__excerpt {
    margin: 0;
    flex: 1;
    font-size: 0.875rem;
    line-height: 1.55;
    color: #666;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
}
.blog-list-card__cta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    margin-top: 0.25rem;
    padding: 0.65rem 1rem;
    border-radius: 10px;
    background: var(--theme, #DA9B21);
    color: #fff !important;
    font-size: 0.875rem;
    font-weight: 700;
    text-decoration: none;
    transition: background 0.2s, gap 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(218, 155, 33, 0.35);
}
.blog-list-card__cta:hover {
    background: #c48a1c;
    gap: 0.75rem;
    box-shadow: 0 6px 18px rgba(218, 155, 33, 0.45);
    color: #fff !important;
}
.blog-list-card__cta i {
    font-size: 0.8rem;
    transition: transform 0.2s;
}
.blog-list-card__cta:hover i {
    transform: translateX(3px);
}
@media (max-width: 575px) {
    .blog-list-card__body {
        padding: 1rem 1rem 1.15rem;
    }
}
</style>
