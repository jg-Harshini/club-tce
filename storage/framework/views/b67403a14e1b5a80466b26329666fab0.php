<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h3 class="mb-4 text-primary">Edit Event Details</h3>

<form action="<?php echo e(route('superadmin.events', ['action' => 'edit', 'id' => $event->id])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Basic Info -->
        <h5 class="mb-3 border-bottom pb-2 text-secondary">Basic Information</h5>

        <div class="mb-3">
            <label class="form-label">Event Name</label>
            <input type="text" name="event_name" value="<?php echo e($event->event_name); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?php echo e($event->description); ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" value="<?php echo e($event->date); ?>" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Time</label>
                <input type="time" name="time" value="<?php echo e($event->time); ?>" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Event Image</label>
            <input type="file" name="image" class="form-control">
            <?php if($event->image_path): ?>
                <div class="mt-2">
                    <img src="<?php echo e(asset('storage/' . $event->image_path)); ?>" width="180" class="rounded shadow border" alt="Event Image">
                </div>
            <?php endif; ?>
        </div>

        <!-- Winner Info -->
        <h5 class="mt-4 mb-3 border-bottom pb-2 text-secondary">Winner Information (Optional)</h5>

        <div class="mb-3">
            <label class="form-label">Winner Name</label>
            <input type="text" name="winner_name" class="form-control" value="<?php echo e($event->winner_name); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Winner Photo</label>
            <input type="file" name="winner_photo" class="form-control">
            <?php if($event->winner_photo): ?>
                <div class="mt-2">
                    <img src="<?php echo e(asset('storage/' . $event->winner_photo)); ?>" width="150" class="rounded border shadow-sm" alt="Winner Photo">
                </div>
            <?php endif; ?>
        </div>

        <!-- Gallery -->
<!-- Event Gallery -->
<h5 class="mt-4 mb-3 border-bottom pb-2 text-secondary">Event Gallery <small class="text-muted">(Optional)</small></h5>

<div class="mb-3">
    <label class="form-label">Upload Photos</label>
    <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
    <small class="text-muted">You can upload multiple images.</small>
</div>

<?php if($event->gallery && is_array(json_decode($event->gallery, true))): ?>
    <div class="row g-3 mb-3">
        <?php $__currentLoopData = json_decode($event->gallery, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-3">
                <div class="border rounded shadow-sm p-1 bg-white">
                    <img src="<?php echo e(asset('storage/' . $img)); ?>"
                         class="img-fluid rounded"
                         style="height: 140px; object-fit: cover; width: 100%;"
                         alt="Gallery Image">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


        <!-- Buttons -->
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Update Event</button>
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\clubstce\resources\views/events/edit.blade.php ENDPATH**/ ?>