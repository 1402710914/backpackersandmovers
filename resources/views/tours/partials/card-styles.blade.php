<style>
.tours-listing-grid > [class*="col-"],
.tour-cards-row > [class*="col-"] {
    display: flex;
}
.tour-list-card {
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
.tour-list-card:hover {
    border-color: rgba(218, 155, 33, 0.35);
    box-shadow: 0 16px 40px rgba(21, 21, 21, 0.12);
    transform: translateY(-4px);
}
.tour-list-card__media {
    display: block;
    position: relative;
    width: 100%;
    aspect-ratio: 4 / 3;
    overflow: hidden;
    background: linear-gradient(145deg, #e8e4df 0%, #d4cfc8 100%);
}
.tour-list-card__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.55s ease;
}
.tour-list-card:hover .tour-list-card__media img {
    transform: scale(1.06);
}
.tour-list-card__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(21, 21, 21, 0.15) 0%,
        rgba(21, 21, 21, 0) 40%,
        rgba(21, 21, 21, 0.55) 100%
    );
    pointer-events: none;
    z-index: 1;
}
.tour-list-card__badges {
    position: absolute;
    top: 0.85rem;
    left: 0.85rem;
    right: 0.85rem;
    z-index: 2;
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    align-items: flex-start;
    pointer-events: none;
}
.tour-list-card__badge {
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 0.35rem 0.7rem;
    border-radius: 999px;
    line-height: 1.2;
    max-width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    backdrop-filter: blur(6px);
}
.tour-list-card__badge--featured {
    background: var(--theme, #DA9B21);
    color: #fff;
    box-shadow: 0 4px 12px rgba(218, 155, 33, 0.45);
}
.tour-list-card__badge--category {
    background: rgba(255, 255, 255, 0.92);
    color: #151515;
    text-transform: none;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0;
}
.tour-list-card__price-tag {
    position: absolute;
    right: 0.85rem;
    bottom: 0.85rem;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    padding: 0.5rem 0.75rem;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.96);
    box-shadow: 0 6px 20px rgba(21, 21, 21, 0.15);
    line-height: 1.2;
    pointer-events: none;
}
.tour-list-card__price-label {
    font-size: 0.65rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #888;
}
.tour-list-card__price-tag strong {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
}
.tour-list-card__price-tag small {
    font-size: 0.68rem;
    font-weight: 600;
    color: #666;
}
.tour-list-card__body {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 1.2rem 1.25rem 1.3rem;
    gap: 0.65rem;
}
.tour-list-card__title {
    margin: 0;
    font-size: 1.1rem;
    line-height: 1.35;
    font-weight: 700;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
}
.tour-list-card__title a {
    color: #151515;
    text-decoration: none;
    transition: color 0.2s;
}
.tour-list-card__title a:hover {
    color: var(--theme, #DA9B21);
}
.tour-list-card__excerpt {
    margin: 0;
    font-size: 0.875rem;
    line-height: 1.55;
    color: #666;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
}
.tour-list-card__chips {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-top: auto;
}
.tour-list-card__chip {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.32rem 0.6rem;
    font-size: 0.72rem;
    font-weight: 600;
    color: #444;
    background: #f5f5f5;
    border-radius: 8px;
    line-height: 1.3;
    max-width: 100%;
}
.tour-list-card__chip i {
    font-size: 0.7rem;
    color: var(--theme, #DA9B21);
    flex-shrink: 0;
}
.tour-list-card__chip--pickup {
    background: rgba(218, 155, 33, 0.12);
    color: #5c4a1a;
    border: 1px solid rgba(218, 155, 33, 0.25);
}
.tour-list-card__chip--pickup i {
    color: var(--theme, #DA9B21);
}
.tour-list-card__cta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    margin-top: 0.35rem;
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
.tour-list-card__cta:hover {
    background: #c48a1c;
    gap: 0.75rem;
    box-shadow: 0 6px 18px rgba(218, 155, 33, 0.45);
    color: #fff !important;
}
.tour-list-card__cta i {
    font-size: 0.8rem;
    transition: transform 0.2s;
}
.tour-list-card__cta:hover i {
    transform: translateX(3px);
}
@media (max-width: 575px) {
    .tour-list-card__body {
        padding: 1rem 1rem 1.15rem;
    }
    .tour-list-card__price-tag strong {
        font-size: 1.05rem;
    }
}
</style>
