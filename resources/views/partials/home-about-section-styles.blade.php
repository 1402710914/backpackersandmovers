<style>
.home-about-section {
    padding: 5rem 0;
    background: linear-gradient(180deg, #f7f6f4 0%, #fff 100%);
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
    overflow: hidden;
}
.home-about-section .container {
    position: relative;
}
.home-about__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    margin-bottom: 0.85rem;
    padding: 0.4rem 0.85rem;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--theme, #DA9B21);
    background: rgba(218, 155, 33, 0.12);
    border: 1px solid rgba(218, 155, 33, 0.25);
}
.home-about__title {
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    line-height: 1.15;
    color: #151515;
    margin: 0 0 1rem;
}
.home-about__title em {
    font-style: normal;
    color: var(--theme, #DA9B21);
}
.home-about__lead {
    font-size: 1.05rem;
    line-height: 1.7;
    color: #555;
    margin: 0 0 1.5rem;
    max-width: 34rem;
}
.home-about__stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}
.home-about__stat {
    padding: 0.85rem 1rem;
    background: #fff;
    border-radius: 14px;
    border: 1px solid rgba(21, 21, 21, 0.06);
    box-shadow: 0 4px 20px rgba(21, 21, 21, 0.05);
    transition: transform 0.2s, box-shadow 0.2s;
}
.home-about__stat:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(21, 21, 21, 0.08);
}
.home-about__stat strong {
    display: block;
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.2;
}
.home-about__stat span {
    display: block;
    font-size: 0.78rem;
    color: #666;
    margin-top: 0.2rem;
    line-height: 1.35;
}
.home-about__features {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.65rem;
    margin-bottom: 1.5rem;
}
.home-about__feature {
    display: flex;
    align-items: flex-start;
    gap: 0.55rem;
    padding: 0.7rem 0.8rem;
    background: #fff;
    border-radius: 12px;
    border: 1px solid rgba(21, 21, 21, 0.05);
    font-size: 0.84rem;
    font-weight: 600;
    color: #444;
    line-height: 1.35;
}
.home-about__feature i {
    flex-shrink: 0;
    width: 1.75rem;
    height: 1.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: rgba(218, 155, 33, 0.12);
    color: var(--theme, #DA9B21);
    font-size: 0.8rem;
}
.home-about__pickup {
    display: flex;
    align-items: flex-start;
    gap: 0.55rem;
    padding: 0.75rem 0.9rem;
    margin-bottom: 1.35rem;
    border-radius: 12px;
    background: rgba(218, 155, 33, 0.1);
    border: 1px solid rgba(218, 155, 33, 0.28);
    font-size: 0.84rem;
    line-height: 1.5;
    color: #5c4a1a;
}
.home-about__pickup i {
    color: var(--theme, #DA9B21);
    margin-top: 0.15rem;
}
.home-about__actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}
.home-about__actions .theme-btn.style-2 {
    background: transparent;
    color: #151515;
    border: 1px solid rgba(21, 21, 21, 0.15);
}
.home-about__actions .theme-btn.style-2:hover {
    border-color: var(--theme, #DA9B21);
    color: var(--theme, #DA9B21);
}
.home-about__visual {
    position: relative;
    min-height: 420px;
    padding: 0 0 1rem 1rem;
}
.home-about__img-main {
    position: relative;
    z-index: 1;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(21, 21, 21, 0.15);
    aspect-ratio: 4 / 5;
    max-width: 85%;
}
.home-about__img-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.home-about__img-secondary {
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: 2;
    width: 52%;
    border-radius: 16px;
    overflow: hidden;
    border: 4px solid #fff;
    box-shadow: 0 12px 36px rgba(21, 21, 21, 0.18);
    aspect-ratio: 1;
}
.home-about__img-secondary img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.home-about__float-card {
    position: absolute;
    top: 8%;
    right: 0;
    z-index: 3;
    max-width: 220px;
    padding: 1.1rem 1.15rem;
    border-radius: 16px;
    background: linear-gradient(145deg, #1a1a1a 0%, #2d2d2d 100%);
    color: #fff;
    box-shadow: 0 16px 40px rgba(21, 21, 21, 0.25);
}
.home-about__float-card .icon {
    width: 2.75rem;
    height: 2.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.75rem;
    border-radius: 12px;
    background: rgba(218, 155, 33, 0.2);
    color: var(--theme, #DA9B21);
    font-size: 1.35rem;
}
.home-about__float-card h5 {
    margin: 0 0 0.4rem;
    font-size: 1rem;
    font-weight: 700;
    color: #fff;
}
.home-about__float-card p {
    margin: 0;
    font-size: 0.8rem;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.78);
}
.home-about__badge-count {
    position: absolute;
    left: -0.5rem;
    bottom: 18%;
    z-index: 4;
    padding: 0.65rem 1rem;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 10px 30px rgba(21, 21, 21, 0.12);
    text-align: center;
    border: 1px solid rgba(21, 21, 21, 0.06);
}
.home-about__badge-count strong {
    display: block;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.1;
}
.home-about__badge-count span {
    display: block;
    font-size: 0.72rem;
    font-weight: 600;
    color: #666;
    margin-top: 0.15rem;
    max-width: 8rem;
    line-height: 1.3;
}
@media (max-width: 991px) {
    .home-about-section {
        padding: 3.5rem 0;
    }
    .home-about__visual {
        min-height: 360px;
        margin-bottom: 2rem;
        max-width: 520px;
        margin-left: auto;
        margin-right: auto;
    }
    .home-about__float-card {
        right: 0;
        max-width: 200px;
    }
    .home-about__lead {
        max-width: none;
    }
}
@media (max-width: 575px) {
    .home-about__features {
        grid-template-columns: 1fr;
    }
    .home-about__stats {
        grid-template-columns: 1fr 1fr;
    }
    .home-about__visual {
        padding-left: 0;
        min-height: 320px;
    }
    .home-about__img-main {
        max-width: 78%;
    }
    .home-about__float-card {
        top: 4%;
        padding: 0.85rem;
    }
    .home-about__badge-count {
        left: 0;
        bottom: 12%;
    }
}
</style>
