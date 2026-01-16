<div class="row" id="accept-by-me{{ $receiverId }}"
    style="display: flex; margin-left: -3rem;">
    <a class="btn btn-default inResultSendMessageBtn accept-interest-btn-by-me"
        style="margin-left: 1.5rem" data-id="{{ $receiverId }}">
        <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span
            style="color: #E47203">|</span>
    </a>
    <a class="btn btn-default inResultSendMessageBtn decline-interest-btn-by-me"
        style="margin-right: 1.5rem" data-id="{{ $receiverId }}">
        <span style="color:#A0061C; margin-left:-1.5rem;">
            <i class="fas fa-times gt-margin-right-5"></i>Decline
        </span>
    </a>
</div>