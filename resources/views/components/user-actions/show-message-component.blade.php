<style>
    .modal-body {
        max-height: 60vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-wrapper {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #e5ddd5;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .chat-container {
        padding: 10px;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        height: 100%;
        max-height: 400px;
    }

    .chat-container::-webkit-scrollbar {
        width: 6px;
    }

    .chat-container::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }

    .chat-line {
        display: flex;
        margin-bottom: 10px;
    }

    .chat-line.left {
        justify-content: flex-start;
    }

    .chat-line.right {
        justify-content: flex-end;
    }

    .message-bubble {
        max-width: 70%;
        padding: 10px;
        border-radius: 8px;
        position: relative;
        word-wrap: break-word;
    }

    .chat-line.left .message-bubble {
        background-color: #ffffff;
        color: #000;
        border-bottom-left-radius: 0;
    }

    .chat-line.right .message-bubble {
        background-color: #dcf8c6;
        color: #000;
        border-bottom-right-radius: 0;
    }

    .message-time {
        display: block;
        text-align: right;
        font-size: 10px;
        color: #999;
        margin-top: 5px;
    }
</style>
@foreach ($users as $user)
    <div class="modal fade" id="messageModal{{ $user->id }}" tabindex="-1" aria-hidden="true" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title badge bg-primary" style="background-color: #FF7E00; color:white">
                        Message - {{ $user->name ?? 'NA' }}
                    </h3>
                    <button type="button"
                        class="btn btn-lr btn-secondary rounded-circle d-flex justify-content-center align-items-center"
                        data-dismiss="modal" aria-label="Close"
                        style="width: 35px; height: 35px; position: absolute; top: 10px; right: 10px;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chat-wrapper">
                        <div class="chat-container">
                            @php
                                $messages = collect($user->receiverMessage)
                                    ->merge($user->senderMessage)
                                    ->sortBy('created_at')
                                    ->groupBy(function ($msg) {
                                        return \Carbon\Carbon::parse($msg->created_at)->format('d M Y');
                                    });
                            @endphp
                            @foreach ($messages as $date => $dayMessages)
                                <div style="text-align: center; margin: 15px 0;">
                                    <span class="badge bg-secondary">
                                        {{ $date }}
                                    </span>
                                </div>
                                @foreach ($dayMessages as $msg)
                                    @php
                                        $isSender = $msg->sender_id === auth()->id();
                                    @endphp

                                    <div class="chat-line {{ $isSender ? 'right' : 'left' }}">
                                        <div class="message-bubble {{ $isSender ? 'sender' : 'receiver' }}">
                                            <span class="message-text">{{ $msg->message }}</span>
                                            <span class="message-time">
                                                {{ \Carbon\Carbon::parse($msg->created_at)->format('h:i A') }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="replyMessage" action="{{route('reply.message')}}" method="POST" style="display: flex;">
                        @csrf
                        <input type="text" name="message" id="message" class="form-control"
                            placeholder="Type a message..." style="margin-right: 1rem;">
                        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $user->id ?? '' }}"
                            class="form-control">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    <div class="row text-center" style="margin-top: 1rem;">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('replyMessage ');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = document.getElementById('reply').value.trim();
            const receiver_id = document.getElementById('receiver_id').value;

            alert(receiver_id);
            if (!message) {
                alert('Please enter a message');
                return;
            }
            fetch('{{ route('reply.message') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message: message,
                        receiver_id: receiver_id
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Message sent successfully!');
                    form.reset();
                })
                .catch(error => {
                    console.error('There was an error!', error);
                });
        });
    });
</script>
