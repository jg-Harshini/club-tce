<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h2>Hi <?php echo e($registration->name); ?>,</h2>
    <p>Thank you for enrolling in the club(s) at our college.</p>
    <p>We're excited to have you with us!</p>
    <br>
    <p><strong>Details:</strong></p>
    <ul>
        <li>Roll No: <?php echo e($registration->roll_no); ?></li>
        <li>Email: <?php echo e($registration->email); ?></li>
        <li>Department: <?php echo e($registration->department); ?></li>
    </ul>

    <p>Best regards,<br>Clubs Coordination Team</p>
</body>
</html>
<?php /**PATH C:\HARSHINI\intern\club-tce\resources\views/emails/registration_confirmation.blade.php ENDPATH**/ ?>