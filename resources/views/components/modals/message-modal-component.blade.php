
@foreach ($searchResults as $searchResult)
    <div class="modal fade" id="messageModal{{ $searchResult->id }}" data-id="{{ $searchResult->id }}" tabindex="-1"
        aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
               <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 530px; background-color:white;border:none;font-size:20px">
                    ✖
                </button>
                <div class="modal-body">
                    <div class="row">
                        {{-- LEFT SIDE: IMAGE --}}
                        <div class="col-md-4 text-center mb-3">
                            @foreach ($searchResult->images as $image)
                                <img src="{{ $image->name ? asset('storage/users/images/' . $image->name) : asset('user/images/male-default.jpg') }}"
                                    class="rounded-circle img-fluid"
                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;"
                                    alt="User Image">
                            @endforeach
                            <h4>{{ $prefix->name }}{{ $searchResult->matrimony_id ?? '' }}</h4>
                            <div id="successMessage{{ $searchResult->id ?? '' }}"></div>
                            <div id="expireMessage{{ $searchResult->id ?? '' }}" style="color: #AF3042"></div>
                        </div>
                        {{-- RIGHT SIDE: CONTENT --}}
                        <div class="col-md-8" style="margin-top: -2.5rem">
                            <h3 class="mb-1">{{ $searchResult['name'] ?? 'NA' }}</h3>
                            <p class="text-muted">Profile created by {{ $searchResult['profile_for'] ?? 'NA' }}</p>
                            <div class="mt-3">
                                <form class="send-message-form" method="post" data-id="{{ $searchResult->id }}">
                                    @csrf
                                    <textarea name="message" id="message{{ $searchResult->id }}" placeholder="Enter Message" class="modal-textarea"></textarea>
                                    <div class="row text-center">
                                        <button class="btn gt-btn-green gt-cursor send-message-btn"
                                            type="submit">Send</button>
                                        {{-- <button class="btn gt-btn-green gt-cursor send-message-btn"
                                            type="submit">View Chat</button> --}}
                                  <a href="{{route('message')}}" class="btn gt-btn-green gt-cursor send-message-btn">View Message</a>

                                    </div>
                                </form>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
