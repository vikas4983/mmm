<style>
    .friend-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 6px;
        width: 150px;
        background: white;
        border: 1px solid #ccc;
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    .friend-btn:focus,
    .friend-btn:active {
        outline: none !important;
        box-shadow: none !important;
        border: 1px solid #ccc !important;

    }

    .cancel-text {
        opacity: 0;
        visibility: hidden;
        position: absolute;
    }

    .friend-btn:hover .friend-text {
        opacity: 0;
        visibility: hidden;
    }

    .friend-btn:hover .cancel-text {
        opacity: 1;
        visibility: visible;
    }
</style>

<div id="profile-cancel-friend{{ $receiverId }}" class="btn-group" role="group">
    <button id="friend-btn{{ $receiverId }}" title="You are Friend" class="gt-cursor btn btn-default friend-btn"
        data-id="{{ $receiverId }}" style="width: 25rem;
    height: 6.4rem;">
        <span class="friend-text">
            <i class="fas fa-check-circle"></i>
            <p class="hidden-xs hidden-sm hidden-md">
                <span style="color: #499202;">Friend</span>
            </p>
        </span>
        <span class="cancel-text" title="Cancel Friend">
            <i class="fas fa-times-circle" style="color: red;"></i>
            <p class="hidden-xs hidden-sm hidden-md cancel-friend-btn" data-id="{{ $receiverId }}">
                Cancel Friend
            </p>
        </span>
    </button>
</div>
