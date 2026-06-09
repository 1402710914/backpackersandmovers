<style>
.payment-page-wrap {
    background: #fff;
}
.payment-page {
    background: #fff;
}
.payment-page__inner {
    max-width: 980px;
    margin: 0 auto;
}
.payment-hero {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2418 55%, #1a1a1a 100%);
    border-radius: 18px;
    padding: 1.75rem 1.85rem;
    color: #fff;
    margin-bottom: 1.5rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(21, 21, 21, 0.18);
}
.payment-hero::after {
    content: '';
    position: absolute;
    top: -40%;
    right: -8%;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(218, 155, 33, 0.28) 0%, transparent 70%);
    pointer-events: none;
}
.payment-hero__top {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1rem;
    position: relative;
    z-index: 1;
}
.payment-hero__label {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: rgba(255, 255, 255, 0.75);
    margin-bottom: 0.35rem;
}
.payment-hero__label i {
    color: var(--theme, #DA9B21);
}
.payment-hero__ref {
    font-size: 1.05rem;
    font-weight: 800;
    letter-spacing: 0.02em;
    margin: 0;
}
.payment-hero__tour {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.82);
    margin: 0.35rem 0 0;
    max-width: 28rem;
    line-height: 1.45;
}
.payment-hero__amount-wrap {
    text-align: right;
}
.payment-hero__amount-label {
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: rgba(255, 255, 255, 0.65);
    margin-bottom: 0.2rem;
}
.payment-hero__amount {
    font-size: clamp(1.75rem, 4vw, 2.35rem);
    font-weight: 800;
    color: var(--theme, #DA9B21);
    line-height: 1.1;
    margin: 0;
}
.payment-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.65rem;
    margin-bottom: 1.5rem;
}
.payment-step {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    padding: 0.85rem 1rem;
    background: #fff;
    border-radius: 12px;
    border: 1px solid rgba(21, 21, 21, 0.07);
    box-shadow: 0 2px 10px rgba(21, 21, 21, 0.04);
    transition: border-color 0.2s, box-shadow 0.2s;
}
.payment-step.is-active {
    border-color: rgba(218, 155, 33, 0.45);
    box-shadow: 0 4px 18px rgba(218, 155, 33, 0.12);
}
.payment-step.is-done {
    border-color: rgba(37, 167, 80, 0.35);
}
.payment-step__num {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 800;
    flex-shrink: 0;
    background: #f0eeeb;
    color: #888;
}
.payment-step.is-active .payment-step__num {
    background: var(--theme, #DA9B21);
    color: #fff;
}
.payment-step.is-done .payment-step__num {
    background: #22a55b;
    color: #fff;
}
.payment-step__text strong {
    display: block;
    font-size: 0.82rem;
    font-weight: 700;
    color: #151515;
    line-height: 1.25;
}
.payment-step__text small {
    font-size: 0.68rem;
    color: #888;
}
.payment-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
}
@media (max-width: 767px) {
    .payment-grid {
        grid-template-columns: 1fr;
    }
    .payment-hero__amount-wrap {
        text-align: left;
    }
    .payment-steps {
        grid-template-columns: 1fr;
    }
}
.payment-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(21, 21, 21, 0.07);
    box-shadow: 0 4px 22px rgba(21, 21, 21, 0.06);
    overflow: hidden;
    height: 100%;
}
.payment-card__head {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 1.2rem;
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
    background: #fafafa;
}
.payment-card__head i {
    color: var(--theme, #DA9B21);
    font-size: 0.95rem;
}
.payment-card__head h4 {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 700;
    color: #151515;
}
.payment-card__body {
    padding: 1.15rem 1.2rem 1.25rem;
}
.payment-facts {
    display: grid;
    gap: 0.65rem;
}
.payment-fact {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.65rem 0.75rem;
    background: #f8f7f5;
    border-radius: 10px;
}
.payment-fact__icon {
    width: 2.1rem;
    height: 2.1rem;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(218, 155, 33, 0.12);
    color: var(--theme, #DA9B21);
    font-size: 0.85rem;
    flex-shrink: 0;
}
.payment-fact__text strong {
    display: block;
    font-size: 0.84rem;
    font-weight: 700;
    color: #151515;
    line-height: 1.3;
}
.payment-fact__text small {
    font-size: 0.68rem;
    color: #888;
}
.payment-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.45rem;
    margin-top: 1rem;
}
.payment-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.35rem 0.7rem;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
}
.payment-badge--pending {
    background: #f0eeeb;
    color: #666;
}
.payment-badge--submitted {
    background: #fff4e0;
    color: #b07a10;
}
.payment-badge--verified {
    background: #e8f8ee;
    color: #1a7a42;
}
.payment-badge--rejected {
    background: #fdecea;
    color: #c0392b;
}
.payment-badge--confirmed {
    background: #e8f8ee;
    color: #1a7a42;
}
.payment-status-banner {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-top: 1rem;
    padding: 0.85rem 1rem;
    border-radius: 10px;
    font-size: 0.84rem;
    line-height: 1.5;
}
.payment-status-banner i {
    margin-top: 0.15rem;
    font-size: 1rem;
    flex-shrink: 0;
}
.payment-status-banner--success {
    background: #e8f8ee;
    color: #1a5c34;
}
.payment-status-banner--warning {
    background: #fff8e8;
    color: #8a6412;
}
.payment-status-banner--danger {
    background: #fdecea;
    color: #a33025;
}
.payment-qr-wrap {
    text-align: center;
    padding: 1rem;
    background: linear-gradient(180deg, #fafafa 0%, #fff 100%);
    border-radius: 14px;
    border: 1px dashed rgba(218, 155, 33, 0.35);
    margin-bottom: 1rem;
}
.payment-qr-wrap img {
    max-width: 220px;
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 8px 28px rgba(21, 21, 21, 0.12);
}
.payment-qr-hint {
    font-size: 0.8rem;
    color: #666;
    line-height: 1.5;
    margin: 0 0 1rem;
    text-align: center;
}
.payment-upi-apps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 1rem;
}
.payment-upi-app {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.35rem 0.65rem;
    border-radius: 999px;
    background: #f5f4f2;
    font-size: 0.72rem;
    font-weight: 600;
    color: #555;
}
.payment-upi-app i {
    font-size: 0.85rem;
}
.payment-upi-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
    padding: 0.85rem 1rem;
    background: #1a1a1a;
    border-radius: 12px;
    color: #fff;
}
.payment-upi-box__label {
    font-size: 0.68rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: rgba(255, 255, 255, 0.55);
    margin-bottom: 0.15rem;
}
.payment-upi-box__id {
    font-size: 0.95rem;
    font-weight: 700;
    word-break: break-all;
}
.payment-upi-box .btn-copy {
    flex-shrink: 0;
    padding: 0.45rem 0.85rem;
    border: 1px solid rgba(218, 155, 33, 0.5);
    background: rgba(218, 155, 33, 0.15);
    color: var(--theme, #DA9B21);
    border-radius: 8px;
    font-size: 0.78rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, color 0.2s;
}
.payment-upi-box .btn-copy:hover {
    background: var(--theme, #DA9B21);
    color: #fff;
}
.payment-bank {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 0.85rem;
    font-size: 0.78rem;
    color: #888;
}
.payment-bank i {
    color: var(--theme, #DA9B21);
}
.payment-proof-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(21, 21, 21, 0.07);
    box-shadow: 0 4px 22px rgba(21, 21, 21, 0.06);
    overflow: hidden;
}
.payment-proof-card__head {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1.1rem 1.25rem;
    background: linear-gradient(90deg, rgba(218, 155, 33, 0.1) 0%, transparent 100%);
    border-bottom: 1px solid rgba(21, 21, 21, 0.06);
}
.payment-proof-card__step {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    background: var(--theme, #DA9B21);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.95rem;
    flex-shrink: 0;
}
.payment-proof-card__head h4 {
    margin: 0;
    font-size: 1rem;
    font-weight: 700;
    color: #151515;
}
.payment-proof-card__head p {
    margin: 0.15rem 0 0;
    font-size: 0.8rem;
    color: #777;
}
.payment-proof-card__body {
    padding: 1.25rem;
}
.payment-proof-card .form-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #555;
}
.payment-proof-card .form-control {
    border-radius: 10px;
    border-color: rgba(21, 21, 21, 0.12);
    padding: 0.65rem 0.85rem;
    font-size: 0.9rem;
}
.payment-proof-card .form-control:focus {
    border-color: var(--theme, #DA9B21);
    box-shadow: 0 0 0 3px rgba(218, 155, 33, 0.15);
}
.payment-file-hint {
    font-size: 0.72rem;
    color: #999;
    margin-top: 0.35rem;
}
.payment-proof-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.75rem;
    margin-top: 0.5rem;
}
.payment-proof-actions .theme-btn {
    border-radius: 10px;
    box-shadow: 0 4px 14px rgba(218, 155, 33, 0.35);
    padding: 0.7rem 1.5rem;
}
.payment-proof-actions .btn-back {
    font-size: 0.88rem;
    font-weight: 600;
    color: #666;
    text-decoration: none;
}
.payment-proof-actions .btn-back:hover {
    color: var(--theme, #DA9B21);
}
.payment-done-card {
    text-align: center;
    padding: 2.5rem 1.5rem;
    background: #fff;
    border-radius: 16px;
    border: 1px solid rgba(21, 21, 21, 0.07);
    box-shadow: 0 4px 22px rgba(21, 21, 21, 0.06);
}
.payment-done-card__icon {
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    background: #e8f8ee;
    color: #22a55b;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    margin-bottom: 1rem;
}
.payment-done-card h4 {
    font-weight: 800;
    color: #151515;
    margin-bottom: 0.5rem;
}
.payment-done-card p {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1.25rem;
}
.payment-help-strip {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 1rem 1.5rem;
    margin-top: 1.5rem;
    padding: 1rem 1.25rem;
    background: #fff;
    border-radius: 12px;
    border: 1px solid rgba(21, 21, 21, 0.06);
    font-size: 0.84rem;
    color: #666;
}
.payment-help-strip a {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-weight: 700;
    color: #151515;
    text-decoration: none;
}
.payment-help-strip a:hover {
    color: var(--theme, #DA9B21);
}
.payment-help-strip a.whatsapp {
    color: #25d366;
}
.payment-alert-success {
    border-radius: 12px;
    border: none;
    background: #e8f8ee;
    color: #1a5c34;
    font-size: 0.88rem;
    padding: 0.85rem 1.1rem;
    margin-bottom: 1.25rem;
}
</style>
