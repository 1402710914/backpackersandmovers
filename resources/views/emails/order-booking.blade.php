<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 640px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #1a1a1a;">Thank you for your booking</h2>

    <p>Hi {{ $order->user?->name ?? 'there' }},</p>

    <p>Your booking request has been received. Please find your <strong>Trek Declaration &amp; Green Pledge</strong> attached as a PDF for your records.</p>

    <table cellpadding="6" cellspacing="0" style="width: 100%; background: #f7f7f7; border-radius: 6px; margin: 16px 0;">
        <tr><td><strong>Reference</strong></td><td>{{ $order->reference }}</td></tr>
        <tr><td><strong>Tour</strong></td><td>{{ $order->tour?->title ?? '—' }}</td></tr>
        <tr><td><strong>Travel date</strong></td><td>{{ $order->travel_date?->format('d M Y') ?? '—' }}</td></tr>
        <tr><td><strong>Travelers</strong></td><td>{{ $order->travelers }}</td></tr>
        <tr><td><strong>Amount due</strong></td><td>₹{{ number_format($order->amount, 2) }}</td></tr>
    </table>

    <p style="margin-top: 24px;"><strong>Complete your payment</strong> online to confirm your booking. You can pay securely with UPI, card, or net banking via Razorpay.</p>

    <p style="text-align: center; margin: 24px 0;">
        <a href="{{ $paymentUrl }}" style="display: inline-block; background: #da9b21; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold;">Pay now &amp; confirm booking</a>
    </p>

    <hr style="border: none; border-top: 1px solid #ddd; margin: 28px 0;">

    <h3 style="color: #1a1a1a;">{{ $declaration['title'] }}</h3>

    @foreach (preg_split('/\n\s*\n/', trim($declaration['declaration'])) as $paragraph)
        <p style="font-size: 14px;">{{ $paragraph }}</p>
    @endforeach

    <h4 style="color: #333;">{{ $declaration['green_pledge_title'] }}</h4>
    <p style="font-size: 14px;">I pledge to:</p>
    <ul style="font-size: 14px;">
        @foreach ($declaration['green_pledge_items'] as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <p style="font-size: 14px;"><strong>{{ $declaration['acceptance'] }}</strong></p>

    <p style="font-size: 12px; color: #777; margin-top: 32px;">
        {{ config('app.name') }} — Questions? Reply to this email or contact us on WhatsApp.
    </p>
</body>
</html>
