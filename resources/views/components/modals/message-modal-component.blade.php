<style>
    .modal-dialog {
        max-width: 50rem;
        width: 90%;
        margin: 3rem auto;
    }

    .modal-content {
        padding: 2rem;
        border-radius: 10px;
        position: relative;
    }

    .modal-close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background-color: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    @media (max-width: 1024px) {
        .modal-dialog {
            max-width: 45rem;
        }
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 40rem;
        }
    }

    @media (max-width: 480px) {

        .modal-dialog {
            max-width: 35rem;
        }

        .modal-content {
            padding: 1.5rem;
        }

        .modal-close-btn {
            font-size: 18px;
        }
    }

    .modal-textarea {
        width: 100%;
        max-width: 100%;
        height: 200px;
        max-height: 250px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
        overflow-y: auto;
    }

    @media (min-width: 768px) {
        .modal-textarea {
            width: 150%;
            max-width: 160%;
        }
    }
</style>
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
