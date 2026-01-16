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
@switch($action)
    @case('sendInterest')
        <div id="cancel-interest{{ $receiverId }}" data-id="{{ $receiverId }}">
            <a data-id="{{ $receiverId }}" class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                style="color: #AF3042;font-size: 14px;">
                <i class="fas fa-times gt-margin-right-5 text-danger"></i>Cancel
            </a>
        </div>
    @break

    @case('cancelInterest')
   
        <div id="send-interest{{ $receiverId }}" data-id="{{ $receiverId }}">
            <a data-id="{{ $receiverId }}" class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn"
                style="color: #3A7303;font-size: 14px;">
                <i class="fas fa-heart gt-margin-right-5"></i>Interest
            </a>
        </div>
    @break

    @case('friend')
        <div id="friend{{ $receiverId }}" class="friend-btn">
            <a class="btn btn-default btn-block inResultSendMessageBtn" data-id="{{ $receiverId }}">
                <span class="default-text" style="margin-left: 4rem;font-size: 14px;">
                    <i class="fas fa-check gt-margin-right-5" style="color: #28a745; transition: transform 0.3s;"></i>
                    Friend
                </span>
                <span class="hover-text decline-interest-by-me-btn" data-id="{{ $receiverId }}"
                    style="color: #A0061C; margin-left:4rem;font-size: 14px;">
                    <i class="fas fa-times gt-margin-right-5"></i>
                    Decline Request
                </span>
            </a>
        </div>
    @break

    @case('declineByMe')
        <div class="row" id="cancel-decline-by-me{{ $receiverId }}" >
            <a class="btn btn-default inResultSendMessageBtn cancel-decline-by-me-btn" style="margin-left: 5.5rem"
                data-id="{{ $receiverId }}">
                <span style="color:#A0061C; margin-left:1.5rem;font-size: 14px;">
                    <i class="fas fa-times gt-margin-right-5"></i>Cancel Decline
                </span>
            </a>
        </div>
    @break

    @case('cancelDeclineByMe')
        <div class="row" id="accept-by-me{{ $receiverId }}" style="display: flex; margin-left: -0.5rem;">
            <a class="btn btn-default inResultSendMessageBtn accept-interest-by-me-btn" style="margin-left: 1.5rem;font-size: 14px;"
                data-id="{{ $receiverId }}">
                <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span style="color: #E47203">|</span>
            </a>
            <a class="btn btn-default inResultSendMessageBtn decline-interest-by-me-btn" style="margin-right: 1.5rem"
                data-id="{{ $receiverId }}">
                <span style="color:#A0061C; margin-left:-1.5rem;font-size: 14px;">
                    <i class="fas fa-times gt-margin-right-5"></i>Decline
                </span>
            </a>
        </div>
    @break

    @default
@endswitch
