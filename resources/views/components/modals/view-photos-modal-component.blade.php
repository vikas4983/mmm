<style>
    .modal-body {
        max-height: 100vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        object-fit: cover;
    }

    .custom-carousel {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease;
    }

    .carousel-slide {
        min-width: 100%;
        box-sizing: border-box;
    }

    .carousel-image {
        width: 100%;
        display: block;
    }

    .carousel-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        border: none;
        font-size: 2rem;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }
                                                     
    .carousel-button.prev {
        left: 10px;
    }

    .carousel-button.next {
        right: 10px;
    }

    .carousel-button:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
</style>
@foreach ($photos as $photo)
    <div class="modal fade" id="photoModal{{ $photo->id }}" tabindex="-1"
        aria-labelledby="photoModalLabel{{ $photo->id }}" aria-hidden="true" data-backdrop="static" data-keyboard="false"
        style="max-height:100vh ">        
                                           


        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                {{-- <button type="button" class="modal-close-btn" data-dismiss="modal" aria-label="Close"
                    style="margin-left: 530px; background-color:white;border:none;font-size:20px">
                    ✖
                </button> --}}

                <div class="modal-body" style="max-height: 95vh">
                    <div class="custom-carousel" id="carousel{{ $photo->id }}">
                        <div class="carousel-track">
                            @foreach ($photos as $slidePhoto)
                                <div class="carousel-slide">
                                    <img src="{{ asset('storage/users/images/' . $slidePhoto->name) }}" alt="User Image"
                                        class="carousel-image">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-button prev" data-carousel="#carousel{{ $photo->id }}">❮</button>
                        <button class="carousel-button next" data-carousel="#carousel{{ $photo->id }}">❯</button>
                    </div>
                    <div class="row text-center">
                        <button type="button" class="modal-close-btn btn btn-primary" data-dismiss="modal"
                            aria-label="Close" style="margin-top: 15px">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carousels = document.querySelectorAll('.custom-carousel');
        carousels.forEach(carousel => {
            const track = carousel.querySelector('.carousel-track');
            const slides = carousel.querySelectorAll('.carousel-slide');
            const prevBtn = carousel.querySelector('.carousel-button.prev');
            const nextBtn = carousel.querySelector('.carousel-button.next');
            let currentIndex = 0;
            const totalSlides = slides.length;

            function updateCarousel() {
                const slideWidth = slides[0].offsetWidth;
                track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }

            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
                updateCarousel();
            });

            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
                updateCarousel();
            });
            window.addEventListener('resize', updateCarousel);
        });
    });
</script>
