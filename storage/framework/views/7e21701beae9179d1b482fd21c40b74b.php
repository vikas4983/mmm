<style>
    .friend-btn {
        position: relative;
        display: inline-block;
        text-align: center;
        color: #670311;
        transition: background-color 0.3s;
    }

    .friend-btn .hover-text {
        display: none;
    }

    .friend-btn:hover .default-text {
        display: none;
    }

    .friend-btn:hover .hover-text {
        display: inline;
    }
</style>

<a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn" data-id="<?php echo e($receiverId); ?>">
    <span style="margin-left:8rem">
        <i class="fas fa-check gt-margin-right-5" style="color: #28a745; transition: transform 0.3s;"></i>Friend
    </span>
</a>


<?php /**PATH C:\xampp\htdocs\mmm\resources\views\userAction\buttons\friendButton.blade.php ENDPATH**/ ?>