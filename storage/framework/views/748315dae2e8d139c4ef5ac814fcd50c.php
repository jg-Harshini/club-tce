<!DOCTYPE html>
<html>
<head>
    <title>Registrations PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
    </style>
</head>
<body>
    <h2>Student Registrations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($s->id); ?></td>
                    <td><?php echo e($s->name); ?></td>
                    <td><?php echo e($s->roll_no); ?></td>
                    <td><?php echo e($s->email); ?></td>
                    <td><?php echo e($s->phone); ?></td>
                    <td><?php echo e($s->department); ?></td>
                    <td><?php echo e($s->created_at); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\HARSHINI\intern\clubstce\resources\views/pdf/enrollments.blade.php ENDPATH**/ ?>