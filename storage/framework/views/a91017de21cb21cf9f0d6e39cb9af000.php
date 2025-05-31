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
<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="photoModal<?php echo e($photo->id); ?>" tabindex="-1"
        aria-labelledby="photoModalLabel<?php echo e($photo->id); ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false"
        style="max-height:100vh ">        
                                           


        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                

                <div class="modal-body" style="max-height: 95vh">
                    <div class="custom-carousel" id="carousel<?php echo e($photo->id); ?>">
                        <div class="carousel-track">
                            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slidePhoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-slide">
                                    <img src="<?php echo e(asset('storage/users/images/' . $slidePhoto->name)); ?>" alt="User Image"
                                        class="carousel-image">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-button prev" data-carousel="#carousel<?php echo e($photo->id); ?>">❮</button>
                        <button class="carousel-button next" data-carousel="#carousel<?php echo e($photo->id); ?>">❯</button>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\modals\view-photos-modal-component.blade.php ENDPATH**/ ?>