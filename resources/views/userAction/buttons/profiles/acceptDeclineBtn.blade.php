<div id="accept-decline{{ $receiverId }}" class="btn-group" role="group">
    <a title="Accept Interest" class="gt-cursor btn btn-default accept-interest-by-me-btn"
        data-id="{{ $receiverId }}" style="width: 12.4rem">
        <i class="fas fa-handshake gt-margin-right-5" style="color:#499202;"></i>
        <p class="hidden-xs hidden-sm hidden-md">Accept</p>
    </a>
    <a title="Cancel Interest" class="gt-cursor btn btn-default decline-interest-by-me-btn"
        data-id="{{ $receiverId }}" style="width: 12.5rem">
        <i class="fas fa-times gt-margin-right-5" style="color:#A0061C;"></i>
        <p class="hidden-xs hidden-sm hidden-md">Decline</p>
    </a>
</div>