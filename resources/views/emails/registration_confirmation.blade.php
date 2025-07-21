<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Club Registration Confirmation</title>
</head>
<body>
    <p>Dear {{ $data['name'] }},</p>

    <p>
        We are pleased to inform you that your enrollment in the following clubs has been successfully completed:
        <strong>{{ implode(', ', $data['clubs']) }}</strong>.
    </p>

    <p>
        We are delighted to welcome you to the club community at Thiagarajar College of Engineering and look forward to your active involvement in the diverse activities, events, and initiatives organized throughout the academic year. Your participation plays a vital role in fostering a vibrant and collaborative campus environment.
    </p>

    <p>
        Further information regarding orientation sessions, regular meetings, and upcoming events will be shared shortly by the respective club coordinators.
    </p>

    <p>
        Wishing you a rewarding and enriching experience ahead.
    </p>

    <p>
        Best regards,<br>
        Clubs Coordination Committee<br>
        Thiagarajar College of Engineering
    </p>
</body>
</html>
