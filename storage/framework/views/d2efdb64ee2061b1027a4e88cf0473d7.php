<style>
    .sk-wave {
        margin: 0 auto;
        width: 50px;
        height: 40px;
        text-align: center;
        font-size: 10px;
    }

    .sk-wave>div {
        background-color: #E47203;
        height: 100%;
        width: 7px;
        display: inline-block;

        animation: sk-wave-stretchdelay 1.2s infinite ease-in-out;
    }

    .sk-wave .rect2 {
        animation-delay: -1.1s;
    }

    .sk-wave .rect3 {
        animation-delay: -1.0s;
    }

    .sk-wave .rect4 {
        animation-delay: -0.9s;
    }

    .sk-wave .rect5 {
        animation-delay: -0.8s;
    }

    @keyframes sk-wave-stretchdelay {

        0%,
        40%,
        100% {
            transform: scaleY(0.4);
        }

        20% {
            transform: scaleY(1.0);
        }
    }
</style>
<div class="d-flex align-items-center justify-content-center" style="height: 160px">
    <div class="sk-wave">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/loaders/wave-loader-component.blade.php ENDPATH**/ ?>