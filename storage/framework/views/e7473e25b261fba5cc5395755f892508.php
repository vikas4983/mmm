<?php switch($action):
    case ('sendInterest'): ?>
        <span style="font-size: 14px; padding-left: 59px; color: #499202;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Sent
        </span>
    <?php break; ?>

    <?php case ('cancelInterest'): ?>
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Cancel
        </span>
    <?php break; ?>

    <?php case ('friend'): ?>
        <span style="font-size: 14px; padding-left: 59px; color: #499202;">
            <i class="fas fa-check gt-margin-right-5"></i> Now you are Friend
        </span>
    <?php break; ?>

    <?php case ('declineByMe'): ?>
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Request Decline
        </span>
    <?php break; ?>
    <?php case ('cancelDeclineByMe'): ?>
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Cancel Decline
        </span>
    <?php break; ?>

    <?php default: ?>
<?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/userAction/messages/message.blade.php ENDPATH**/ ?>