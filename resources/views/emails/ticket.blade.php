<!DOCTYPE html>
<html>
<head>
    <title>Ticket Purchase Confirmation</title>
</head>
<body>
    <h1>Thank you for purchasing a ticket!</h1>
    <p>Dear {{ $ticket->name }},</p>
    <p>Here are the details of your ticket:</p>
    <ul>
        <li><strong>Event:</strong> {{ $event->title }}</li>
        <li><strong>Date:</strong> {{ $event->start_date->format('d M Y') }}</li>
        <li><strong>Location:</strong> {{ $event->location }}</li>
        <li><strong>Price:</strong> Rp.{{ number_format($ticket->price, 2) }}</li>
    </ul>
    <p>We look forward to seeing you at the event!</p>
    <p>Best regards,</p>
    <p><strong>Event Organizer</strong></p>
</body>
</html>
