<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
</head>
<body>
    <h2>Dear <?php echo e($data['name']); ?>!</h2>
    <p>You have successfully registered for the club(s).</p>

    <ul>
        <li><strong>Roll Number:</strong> <?php echo e($data['roll_no']); ?></li>
        <li><strong>Email:</strong> <?php echo e($data['email']); ?></li>
        <li><strong>Department:</strong> <?php echo e($data['department']); ?></li>
        <li><strong>Clubs Enrolled:</strong>
            <ul>
                <?php $__currentLoopData = $data['clubs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($clubName); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    </ul>

    <p>Thank you!</p>
</body>
</html>
<?php /**PATH E:\club\kiruthi\admin\club-tce\resources\views/emails/registration_confirmation.blade.php ENDPATH**/ ?>