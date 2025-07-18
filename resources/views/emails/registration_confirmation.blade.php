<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h2>Hi {{ $registration->name }},</h2>
    <p>Thank you for enrolling in the club(s) at our college.</p>
    <p>We're excited to have you with us!</p>
    <br>
    <p><strong>Details:</strong></p>
    <ul>
        <li>Roll No: {{ $registration->roll_no }}</li>
        <li>Email: {{ $registration->email }}</li>
        <li>Department: {{ $registration->department }}</li>
    </ul>

    <p>Best regards,<br>Clubs Coordination Team</p>
</body>
</html>
