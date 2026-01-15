<div class="modal fade" id="contactModal{{ $contactDetails->id }}" tabindex="-1" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100px; padding: 15px;">
            <button data-dismiss="modal"
                style="margin-left: 530px; background-color:white;border:none;font-size:20px">X</button>
            <div class="modal-body">
                <div class="row">
                    {{-- LEFT SIDE: IMAGE --}}
                    <div class="col-md-4">
                        @foreach ($contactDetails->images as $image)
                            <img src="{{ $image->name ? asset('storage/users/images/' . $image->name) : asset('user/images/male-default.jpg') }}"
                                class="rounded-circle img-fluid" style="width: 100px; height: 100px; object-fit: cover;"
                                alt="User Image">
                        @endforeach
                    </div>
                    {{-- RIGHT SIDE: CONTENT --}}
                    <div class="col-md-12">
                        <div>
                            <h3 class="mb-1" style="margin-top: -15px">{{ $contactDetails['name'] ?? 'NA' }}</h3>
                            <p class="mb-1" style="margin-top: -8px;color: #CCCCD0;">Profile created by
                                {{ $contactDetails['profile_for'] ?? 'NA' }}</p>
                        </div>
                        <div style="margin-top: 30px">
                            <h5>
                                <strong>
                                    <a href="mailto:{{ $contactDetails['email'] ?? '#' }}" style="color: black">
                                        {{ $contactDetails['email'] ?? 'NA' }}
                                    </a>
                                </strong>
                            </h5>
                            <h5>
                                <strong>
                                    <a href="tel:{{ $contactDetails['mobile'] ?? '#' }}" style="color: black">
                                        {{ $contactDetails['mobile'] ?? 'NA' }}
                                    </a>
                                </strong>
                            </h5>
                        </div>
                        <hr style="border: 1px solid #CCCCD0; ">
                        <div style="float: right">

                            Contact Balance :
                            {{ $user->payments()->latest()->first()->contact ?? 'NA' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
