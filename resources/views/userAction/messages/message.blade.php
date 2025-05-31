@switch($action)
    @case('sendInterest')
        <span style="font-size: 14px; padding-left: 59px; color: #499202;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Sent
        </span>
    @break

    @case('cancelInterest')
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Cancel
        </span>
    @break

    @case('friend')
        <span style="font-size: 14px; padding-left: 59px; color: #499202;">
            <i class="fas fa-check gt-margin-right-5"></i> Now you are Friend
        </span>
    @break

    @case('declineByMe')
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Interest Request Decline
        </span>
    @break
    @case('cancelDeclineByMe')
        <span style="font-size: 14px; padding-left: 59px; color: #A94442;">
            <i class="fas fa-check gt-margin-right-5"></i> Cancel Decline
        </span>
    @break

    @default
@endswitch
