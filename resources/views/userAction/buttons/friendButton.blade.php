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

<a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn" data-id="{{ $receiverId }}">
    <span style="margin-left:8rem">
        <i class="fas fa-check gt-margin-right-5" style="color: #28a745; transition: transform 0.3s;"></i>Friend
    </span>
</a>

{{-- <div id="send-request{{ $receiverId }}">
    <a class="btn btn-default btn-block inResultSendMessageBtn friend-btn"
        data-id="{{ $receiverId }}">
        <span class="default-text">
            <i class="fas fa-check gt-margin-right-5"
                style="color: #28a745; transition: transform 0.3s;"></i>
            Friend
        </span>
        <span class="hover-text decline-interest-btn-by-me"
            data-id="{{ $receiverId }}" style="color: #dc3545;">
            <i class="fas fa-times gt-margin-right-5"></i>
            Decline
        </span>
    </a>
</div> --}}
