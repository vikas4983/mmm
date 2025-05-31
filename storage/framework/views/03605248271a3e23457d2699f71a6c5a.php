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
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="messageModal<?php echo e($user->id); ?>" tabindex="-1" aria-hidden="true" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title badge bg-primary" style="background-color: #FF7E00; color:white">
                        Message - <?php echo e($user->name ?? 'NA'); ?>

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
                            <?php
                                $messages = collect($user->receiverMessage)
                                    ->merge($user->senderMessage)
                                    ->sortBy('created_at')
                                    ->groupBy(function ($msg) {
                                        return \Carbon\Carbon::parse($msg->created_at)->format('d M Y');
                                    });
                            ?>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $dayMessages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="text-align: center; margin: 15px 0;">
                                    <span class="badge bg-secondary">
                                        <?php echo e($date); ?>

                                    </span>
                                </div>
                                <?php $__currentLoopData = $dayMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $isSender = $msg->sender_id === auth()->id();
                                    ?>

                                    <div class="chat-line <?php echo e($isSender ? 'right' : 'left'); ?>">
                                        <div class="message-bubble <?php echo e($isSender ? 'sender' : 'receiver'); ?>">
                                            <span class="message-text"><?php echo e($msg->message); ?></span>
                                            <span class="message-time">
                                                <?php echo e(\Carbon\Carbon::parse($msg->created_at)->format('h:i A')); ?>

                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="replyMessage" action="<?php echo e(route('reply.message')); ?>" method="POST" style="display: flex;">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="message" id="message" class="form-control"
                            placeholder="Type a message..." style="margin-right: 1rem;">
                        <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo e($user->id ?? ''); ?>"
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            fetch('<?php echo e(route('reply.message')); ?>', {
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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\user-actions\show-message-component.blade.php ENDPATH**/ ?>