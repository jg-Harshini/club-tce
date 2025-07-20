<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
</head>
<body>
    <h2>Dear {{ $data['name'] }}!</h2>
    <p>You have successfully registered for the club(s).</p>

    <ul>
        <li><strong>Roll Number:</strong> {{ $data['roll_no'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Department:</strong> {{ $data['department'] }}</li>
        <li><strong>Clubs Enrolled:</strong>
            <ul>
                @foreach($data['clubs'] as $clubName)
                    <li>{{ $clubName }}</li>
                @endforeach
            </ul>
        </li>
    </ul>

    <p>Thank you!</p>
</body>
</html>
