<div class="modal fade" id="expireModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100px; padding: 15px;">
            <button data-dismiss="modal"
                style="margin-left: 530px; background-color:white;border:none;font-size:20px">X</button>
            <div class="modal-body">
                <div class="row">
                    <h3 style="display: flex; justify-content: center; margin-top:-9px">Dear {{$user->name ?? ''}}, contact directly, Upgrade
                        Now</h3>
                    <form action="{{ route('plan') }}" method="get">
                        <div class="row text-center"
                            style="margin-top: 50px;font-size: 33px;">
                            <button class="btn gt-btn-green">View Plans</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
