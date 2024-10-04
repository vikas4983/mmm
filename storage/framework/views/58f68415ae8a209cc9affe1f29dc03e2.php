<li class="has-sub">
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
        data-target="#ui-geographys" aria-expanded="false" aria-controls="ui-geographys">
        <i class="mdi mdi-earth" style="color: rgb(158,109,226)"></i>
        <span class="nav-text">Geography</span> <b class="caret"></b>
    </a>
    <ul class="collapse" id="ui-geographys" data-parent="#sidebar-menu">
        <div class="sub-menu">
            <!-- Countries Section -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                    data-target="#countries" aria-expanded="false" aria-controls="countries">
                    <?php
                        $countryIndex = $modelCounts->firstWhere(
                            'route_name',
                            'countries.index',
                        );
                        $countryCreate = $modelCounts->firstWhere(
                            'route_name',
                            'countries.create',
                        );
                    ?>

                    <?php if($countryIndex): ?>
                        <span class="nav-text">Countries
                            <span
                                class="badge badge-primary badge-pill"><?php echo e($countryIndex->count); ?></span>
                        </span>
                    <?php endif; ?>
                    <b class="caret"></b>
                </a>
                <ul class="collapse" id="countries">
                    <div class="sub-menu">
                        <?php if($countryIndex): ?>
                            <li>
                                <a href="<?php echo e($countryIndex->url); ?>">List</a>
                            </li>
                        <?php endif; ?>

                        <?php if($countryCreate): ?>
                            <li>
                                <a href="<?php echo e($countryCreate->url); ?>">Create</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </li>

            <!-- States Section -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                    data-target="#states" aria-expanded="false" aria-controls="states">
                    <?php
                        $stateIndex = $modelCounts->firstWhere('route_name', 'states.index');
                        $stateCreate = $modelCounts->firstWhere('route_name', 'states.create');
                    ?>

                    <?php if($stateIndex): ?>
                        <span class="nav-text">States
                            <span
                                class="badge badge-primary badge-pill"><?php echo e($stateIndex->count); ?></span>
                        </span>
                    <?php endif; ?>
                    <b class="caret"></b>
                </a>
                <ul class="collapse" id="states">
                    <div class="sub-menu">
                        <?php if($stateIndex): ?>
                            <li>
                                <a href="<?php echo e($stateIndex->url); ?>">List</a>
                            </li>
                        <?php endif; ?>

                        <?php if($stateCreate): ?>
                            <li>
                                <a href="<?php echo e($stateCreate->url); ?>">Create</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </li>

            <!-- Cities Section -->
            <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                    data-target="#cities" aria-expanded="false" aria-controls="cities">
                    <?php
                        $cityIndex = $modelCounts->firstWhere('route_name', 'cities.index');
                        $cityCreate = $modelCounts->firstWhere('route_name', 'cities.create');
                    ?>

                    <?php if($cityIndex): ?>
                        <span class="nav-text">Cities
                            <span
                                class="badge badge-primary badge-pill"><?php echo e($cityIndex->count); ?></span>
                        </span>
                    <?php endif; ?>
                    <b class="caret"></b>
                </a>
                <ul class="collapse" id="cities">
                    <div class="sub-menu">
                        <?php if($cityIndex): ?>
                            <li>
                                <a href="<?php echo e($cityIndex->url); ?>">List</a>
                            </li>
                        <?php endif; ?>

                        <?php if($cityCreate): ?>
                            <li>
                                <a href="<?php echo e($cityCreate->url); ?>">Create</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </li>

        </div>
    </ul>
</li><?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\geography-component.blade.php ENDPATH**/ ?>