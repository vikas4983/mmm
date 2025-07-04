<?php switch($button):
    case ('add-to-shortlist'): ?>
        <div id="remove-to-shorlist<?php echo e($receiverId); ?>" class="btn-group" role="group">
            <a class="btn btn-default gt-cursor remove-to-shortlist-btn" style="width: 25rem;" data-id="<?php echo e($receiverId); ?>"
                title="Add to Shortlist">
                <i class="fas fa-ban"></i>
                <p class="hidden-xs hidden-sm hidden-md" style="color: #499202"> Remove to Shortlist </p>
            </a>
        </div>
    <?php break; ?>
    <?php case ('remove-to-shortlist'): ?>
    <div id="add-to-shorlist<?php echo e($receiverId); ?>" class="btn-group" role="group">
        <a class="btn btn-default gt-cursor add-to-shortlist-btn" style="width: 25rem;" data-id="<?php echo e($receiverId); ?>"
            title="Add to Shortlist">
            <i class="fas fa-star"></i>
            <p class="hidden-xs hidden-sm hidden-md" style="color: #499202"> Add to Shortlist </p>
        </a>
    </div>
    <?php default: ?>
   
<?php endswitch; ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/userAction/buttons/profiles/shortlist.blade.php ENDPATH**/ ?>