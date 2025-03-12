
<?php $__env->startSection('title', 'Search Result'); ?>
<?php $__env->startSection('content'); ?>

<div>
  
  <?php if (isset($component)) { $__componentOriginalfa9909dfd47d8283fd80d4d75a386af1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa9909dfd47d8283fd80d4d75a386af1 = $attributes; } ?>
<?php $component = App\View\Components\SearchResultComponent::resolve(['searchResults' => $searchResults,'user' => $user,'options' => $options] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-result-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SearchResultComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa9909dfd47d8283fd80d4d75a386af1)): ?>
<?php $attributes = $__attributesOriginalfa9909dfd47d8283fd80d4d75a386af1; ?>
<?php unset($__attributesOriginalfa9909dfd47d8283fd80d4d75a386af1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa9909dfd47d8283fd80d4d75a386af1)): ?>
<?php $component = $__componentOriginalfa9909dfd47d8283fd80d4d75a386af1; ?>
<?php unset($__componentOriginalfa9909dfd47d8283fd80d4d75a386af1); ?>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/frontend/search/searchResult.blade.php ENDPATH**/ ?>