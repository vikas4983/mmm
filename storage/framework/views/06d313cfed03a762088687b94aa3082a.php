<?php $__env->startSection('title', 'Search - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="container">
        <div class="row">
            <div id="searchResult">
                <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 mb-20">
                    <h2 class="inPageTitle fontMerriWeather">Search Options</h2>
                    <p class="inPageSubTitle">Search perfect partner with our multiple search options which help you to find
                        out
                        perfect partner for life.</p>

                </div>
                <div class="clearfix"></div>
                <div class="col-xs-16 col-lg-16 col-xxl-12 col-xl-12 gt-search-opt mb-20">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs responsive-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#quick-search" aria-controls="quick-search" role="tab" data-toggle="tab">
                                    Quick Search </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#basic-search" aria-controls="basic-search" role="tab" data-toggle="tab">
                                    Basic Search </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#advance-search" aria-controls="advance-search" role="tab" data-toggle="tab">
                                    Advanced Search </a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                           
                            <!-- Quick Search -->
                            <div role="tabpanel" class="tab-pane active" id="quick-search">
                                <div class="row">
                                    <?php
                                        $age = '';
                                        $options[] = '';
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal81603440b10408c40fe26d203f07075b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81603440b10408c40fe26d203f07075b = $attributes; } ?>
<?php $component = App\View\Components\QuickSearchComponent::resolve(['age' => $age,'options' => $options,'quickFilter' => $quickFilter] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('quick-search-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\QuickSearchComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81603440b10408c40fe26d203f07075b)): ?>
<?php $attributes = $__attributesOriginal81603440b10408c40fe26d203f07075b; ?>
<?php unset($__attributesOriginal81603440b10408c40fe26d203f07075b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81603440b10408c40fe26d203f07075b)): ?>
<?php $component = $__componentOriginal81603440b10408c40fe26d203f07075b; ?>
<?php unset($__componentOriginal81603440b10408c40fe26d203f07075b); ?>
<?php endif; ?>
                                </div>
                            </div>
                            <!-- Basic Search  -->
                            <div role="tabpanel" class="tab-pane " id="basic-search">
                                <div class="row">
                                    <?php if (isset($component)) { $__componentOriginalac126ead96a0f952a4685cef3f27aba7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac126ead96a0f952a4685cef3f27aba7 = $attributes; } ?>
<?php $component = App\View\Components\Searches\BasicSearchComponent::resolve(['options' => $options,'basicFilter' => $basicFilter] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('searches.basic-search-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Searches\BasicSearchComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac126ead96a0f952a4685cef3f27aba7)): ?>
<?php $attributes = $__attributesOriginalac126ead96a0f952a4685cef3f27aba7; ?>
<?php unset($__attributesOriginalac126ead96a0f952a4685cef3f27aba7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac126ead96a0f952a4685cef3f27aba7)): ?>
<?php $component = $__componentOriginalac126ead96a0f952a4685cef3f27aba7; ?>
<?php unset($__componentOriginalac126ead96a0f952a4685cef3f27aba7); ?>
<?php endif; ?>
                                </div>
                            </div>
                            <!-- Advance Search  -->
                            <div role="tabpanel" class="tab-pane " id="advance-search">
                                <div class="row">
                                    <?php if (isset($component)) { $__componentOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0 = $attributes; } ?>
<?php $component = App\View\Components\Searches\AdvanceSearchComponent::resolve(['options' => $options,'selectedAdvanceFilters' => $selectedAdvanceFilters] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('searches.advance-search-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Searches\AdvanceSearchComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0)): ?>
<?php $attributes = $__attributesOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0; ?>
<?php unset($__attributesOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0)): ?>
<?php $component = $__componentOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0; ?>
<?php unset($__componentOriginal8c7fb4da4ef05738d7d931cd4dcf7bc0); ?>
<?php endif; ?>

                                </div>
                            </div>

                            <!-- Keyword Search  -->
                            <div role="tabpanel" class="tab-pane " id="key-search">
                                <div class="row">
                                    <div class="col-xxl-14 col-xxl-offset-1">
                                        <h3 class="inSearchTitle">
                                            Keyword Search </h3>
                                        <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                            With keyword search, you can get suitable profiles with specific keywords.
                                        </p>
                                        <form action="" id="baisc_search_form" method="post">
                                            <div class="form-group mt-15">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Keyword Search </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <input type="text" class="gt-form-control" name="keyword">
                                                        <p class="text-muted ">
                                                            Example - First Name, Last Name, Email id.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Photo settings </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select class="gt-form-control flat" name="photo_search">
                                                            <option value="">Does not matter</option>
                                                            <option value="Yes">With Photo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="submit" value="Search Now" name="keyword_sub"
                                                    class="btn gt-btn-green">
                                                <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                                                    Search</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Keyword Search  -->
                            <!-- Location Search  -->
                            <div role="tabpanel" class="tab-pane " id="loc-search">
                                <div class="row">
                                    <div class="col-xxl-14 col-xxl-offset-1">
                                        <h3 class="inSearchTitle">
                                            Location Search </h3>
                                        <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                            With Location search, you can get suitable profiles from specific location or
                                            place.
                                        </p>
                                        <form action="" id="location_search_form" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Country living in </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a Country..."
                                                            class="chosen-select gt-form-control flat" multiple
                                                            tabindex="4" id="country_id_loc" name="country_id[]">
                                                            <option value=""></option>
                                                            <option value="1">Andorra</option>
                                                            <option value="2">United Arab Emirates</option>
                                                            <option value="3">Afghanistan</option>
                                                            <option value="4">Antigua And Barbuda</option>
                                                            <option value="5">Albania</option>
                                                            <option value="6">Armenia</option>
                                                            <option value="7">Angola</option>
                                                            <option value="8">Antarctica</option>
                                                            <option value="9">Argentina</option>
                                                            <option value="10">American Samoa</option>
                                                            <option value="11">Austria</option>
                                                            <option value="12">Australia</option>
                                                            <option value="13">Aruba</option>
                                                            <option value="14">Aland Islands</option>
                                                            <option value="15">Azerbaijan</option>
                                                            <option value="16">Bosnia And Herzegovina</option>
                                                            <option value="17">Barbados</option>
                                                            <option value="18">Bangladesh</option>
                                                            <option value="19">Belgium</option>
                                                            <option value="20">Burkina Faso</option>
                                                            <option value="21">Bulgaria</option>
                                                            <option value="22">Bahrain</option>
                                                            <option value="23">Burundi</option>
                                                            <option value="24">Benin</option>
                                                            <option value="25">Bermuda</option>
                                                            <option value="26">Brunei</option>
                                                            <option value="27">Bolivia</option>
                                                            <option value="28">Bonaire, Saint Eustatius And Saba
                                                            </option>
                                                            <option value="29">Brazil</option>
                                                            <option value="30">Bahamas</option>
                                                            <option value="31">Bhutan</option>
                                                            <option value="32">Bouvet Island</option>
                                                            <option value="33">Botswana</option>
                                                            <option value="34">Belarus</option>
                                                            <option value="35">Belize</option>
                                                            <option value="36">Canada</option>
                                                            <option value="37">Democratic Republic Of The Congo
                                                            </option>
                                                            <option value="38">Central African Republic</option>
                                                            <option value="39">Republic Of The Congo</option>
                                                            <option value="40">Switzerland</option>
                                                            <option value="41">Ivory Coast</option>
                                                            <option value="42">Chile</option>
                                                            <option value="43">Cameroon</option>
                                                            <option value="44">China</option>
                                                            <option value="45">Colombia</option>
                                                            <option value="46">Costa Rica</option>
                                                            <option value="47">Cuba</option>
                                                            <option value="48">Cape Verde</option>
                                                            <option value="49">Cyprus</option>
                                                            <option value="50">Czech Republic</option>
                                                            <option value="51">Germany</option>
                                                            <option value="52">Djibouti</option>
                                                            <option value="53">Denmark</option>
                                                            <option value="54">Dominica</option>
                                                            <option value="55">Dominican Republic</option>
                                                            <option value="56">Algeria</option>
                                                            <option value="57">Ecuador</option>
                                                            <option value="58">Estonia</option>
                                                            <option value="59">Egypt</option>
                                                            <option value="60">Western Sahara</option>
                                                            <option value="61">Eritrea</option>
                                                            <option value="62">Spain</option>
                                                            <option value="63">Ethiopia</option>
                                                            <option value="64">Finland</option>
                                                            <option value="65">Fiji</option>
                                                            <option value="66">Micronesia</option>
                                                            <option value="67">Faroe Islands</option>
                                                            <option value="68">France</option>
                                                            <option value="69">Gabon</option>
                                                            <option value="70">United Kingdom</option>
                                                            <option value="71">Grenada</option>
                                                            <option value="72">Georgia</option>
                                                            <option value="73">French Guiana</option>
                                                            <option value="74">Guernsey</option>
                                                            <option value="75">Ghana</option>
                                                            <option value="76">Greenland</option>
                                                            <option value="77">Gambia</option>
                                                            <option value="78">Guinea</option>
                                                            <option value="79">Guadeloupe</option>
                                                            <option value="80">Equatorial Guinea</option>
                                                            <option value="81">Greece</option>
                                                            <option value="82">Guatemala</option>
                                                            <option value="83">Guam</option>
                                                            <option value="84">Guinea-Bissau</option>
                                                            <option value="85">Guyana</option>
                                                            <option value="86">Hong Kong</option>
                                                            <option value="87">Honduras</option>
                                                            <option value="88">Croatia</option>
                                                            <option value="89">Haiti</option>
                                                            <option value="90">Hungary</option>
                                                            <option value="91">Indonesia</option>
                                                            <option value="92">Ireland</option>
                                                            <option value="93">Israel</option>
                                                            <option value="94">Isle Of Man</option>
                                                            <option value="95">India</option>
                                                            <option value="96">British Indian Ocean Territory</option>
                                                            <option value="97">Iraq</option>
                                                            <option value="98">Iran</option>
                                                            <option value="99">Iceland</option>
                                                            <option value="100">Italy</option>
                                                            <option value="101">Jersey</option>
                                                            <option value="102">Jamaica</option>
                                                            <option value="103">Jordan</option>
                                                            <option value="104">Japan</option>
                                                            <option value="105">Kenya</option>
                                                            <option value="106">Kyrgyzstan</option>
                                                            <option value="107">Cambodia</option>
                                                            <option value="108">Kiribati</option>
                                                            <option value="109">Comoros</option>
                                                            <option value="110">Saint Kitts And Nevis</option>
                                                            <option value="111">North Korea</option>
                                                            <option value="112">South Korea</option>
                                                            <option value="113">Kuwait</option>
                                                            <option value="114">Kazakhstan</option>
                                                            <option value="115">Laos</option>
                                                            <option value="116">Lebanon</option>
                                                            <option value="117">Saint Lucia</option>
                                                            <option value="118">Liechtenstein</option>
                                                            <option value="119">Sri Lanka</option>
                                                            <option value="120">Liberia</option>
                                                            <option value="121">Lesotho</option>
                                                            <option value="122">Lithuania</option>
                                                            <option value="123">Luxembourg</option>
                                                            <option value="124">Latvia</option>
                                                            <option value="125">Libya</option>
                                                            <option value="126">Morocco</option>
                                                            <option value="127">Monaco</option>
                                                            <option value="128">Moldova</option>
                                                            <option value="129">Montenegro</option>
                                                            <option value="130">Madagascar</option>
                                                            <option value="131">Marshall Islands</option>
                                                            <option value="132">Macedonia</option>
                                                            <option value="133">Mali</option>
                                                            <option value="134">Myanmar</option>
                                                            <option value="135">Mongolia</option>
                                                            <option value="136">Macao</option>
                                                            <option value="137">Northern Mariana Islands</option>
                                                            <option value="138">Martinique</option>
                                                            <option value="139">Mauritania</option>
                                                            <option value="140">Montserrat</option>
                                                            <option value="141">Mauritius</option>
                                                            <option value="142">Maldives</option>
                                                            <option value="143">Malawi</option>
                                                            <option value="144">Mexico</option>
                                                            <option value="145">Malaysia</option>
                                                            <option value="146">Mozambique</option>
                                                            <option value="147">Namibia</option>
                                                            <option value="148">New Caledonia</option>
                                                            <option value="149">Niger</option>
                                                            <option value="150">Nigeria</option>
                                                            <option value="151">Nicaragua</option>
                                                            <option value="152">Netherlands</option>
                                                            <option value="153">Norway</option>
                                                            <option value="154">Nepal</option>
                                                            <option value="155">Nauru</option>
                                                            <option value="156">New Zealand</option>
                                                            <option value="157">Oman</option>
                                                            <option value="158">Panama</option>
                                                            <option value="159">Peru</option>
                                                            <option value="160">French Polynesia</option>
                                                            <option value="161">Papua New Guinea</option>
                                                            <option value="162">Philippines</option>
                                                            <option value="163">Pakistan</option>
                                                            <option value="164">Poland</option>
                                                            <option value="165">Saint Pierre And Miquelon</option>
                                                            <option value="166">Puerto Rico</option>
                                                            <option value="167">Palestinian Territory</option>
                                                            <option value="168">Portugal</option>
                                                            <option value="169">Palau</option>
                                                            <option value="170">Paraguay</option>
                                                            <option value="171">Qatar</option>
                                                            <option value="172">Reunion</option>
                                                            <option value="173">Romania</option>
                                                            <option value="174">Serbia</option>
                                                            <option value="175">Russia</option>
                                                            <option value="176">Rwanda</option>
                                                            <option value="177">Saudi Arabia</option>
                                                            <option value="178">Solomon Islands</option>
                                                            <option value="179">Seychelles</option>
                                                            <option value="180">Sudan</option>
                                                            <option value="181">Sweden</option>
                                                            <option value="182">Singapore</option>
                                                            <option value="183">Saint Helena</option>
                                                            <option value="184">Slovenia</option>
                                                            <option value="185">Svalbard And Jan Mayen</option>
                                                            <option value="186">Slovakia</option>
                                                            <option value="187">Sierra Leone</option>
                                                            <option value="188">San Marino</option>
                                                            <option value="189">Senegal</option>
                                                            <option value="190">Somalia</option>
                                                            <option value="191">Suriname</option>
                                                            <option value="192">South Sudan</option>
                                                            <option value="193">Sao Tome And Principe</option>
                                                            <option value="194">El Salvador</option>
                                                            <option value="195">Syria</option>
                                                            <option value="196">Swaziland</option>
                                                            <option value="197">Chad</option>
                                                            <option value="198">French Southern Territories</option>
                                                            <option value="199">Togo</option>
                                                            <option value="200">Thailand</option>
                                                            <option value="201">Tajikistan</option>
                                                            <option value="202">Tokelau</option>
                                                            <option value="203">East Timor</option>
                                                            <option value="204">Turkmenistan</option>
                                                            <option value="205">Tunisia</option>
                                                            <option value="206">Tonga</option>
                                                            <option value="207">Turkey</option>
                                                            <option value="208">Trinidad And Tobago</option>
                                                            <option value="209">Tuvalu</option>
                                                            <option value="210">Taiwan</option>
                                                            <option value="211">Tanzania</option>
                                                            <option value="212">Ukraine</option>
                                                            <option value="213">Uganda</option>
                                                            <option value="214">United States Minor Outlying Islands
                                                            </option>
                                                            <option value="215">United States</option>
                                                            <option value="216">Uruguay</option>
                                                            <option value="217">Uzbekistan</option>
                                                            <option value="218">Saint Vincent And The Grenadines
                                                            </option>
                                                            <option value="219">Venezuela</option>
                                                            <option value="220">U.S. Virgin Islands</option>
                                                            <option value="221">Vietnam</option>
                                                            <option value="222">Vanuatu</option>
                                                            <option value="223">Wallis And Futuna</option>
                                                            <option value="224">Samoa</option>
                                                            <option value="225">Kosovo</option>
                                                            <option value="226">Yemen</option>
                                                            <option value="227">Mayotte</option>
                                                            <option value="228">South Africa</option>
                                                            <option value="229">Zambia</option>
                                                            <option value="230">Zimbabwe</option>
                                                        </select>
                                                        <div id="stateDivloader_loc"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            State living in </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a State..."
                                                            class="chosen-select gt-form-control flat" multiple
                                                            tabindex="4" id="state_id_loc" name="state_id[]">
                                                            <option value=""></option>
                                                        </select>
                                                        <div id="cityDivloader_loc"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            City living in </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a City..."
                                                            class="chosen-select gt-form-control flat" multiple
                                                            tabindex="4" id="city_id_loc" name="city_id[]">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Photo settings </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select class="gt-form-control flat" name="photo_search">
                                                            <option value="">Does not matter</option>
                                                            <option value="Yes">With Photo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="submit" value="Search Now" name="location_sub"
                                                    class="btn gt-btn-green">
                                                <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                                                    Search</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Location Search  -->
                            <!-- Occupation Search  -->
                            <div role="tabpanel" class="tab-pane " id="oct-search">
                                <div class="row">
                                    <div class="col-xxl-14 col-xxl-offset-1">
                                        <h3 class="inSearchTitle">
                                            Occupation Search </h3>
                                        <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                            With Occupation Search, you can get suitable profiles with specific type of
                                            occupation.
                                        </p>
                                        <form action="" id="ocp_search_form" method="post">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Education </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a Education..."
                                                            class="chosen-select gt-form-control flat" multiple
                                                            tabindex="4" name="education[]">
                                                            <option value=""></option>
                                                            <option value="9">B Arch</option>
                                                            <option value="16">B Com</option>
                                                            <option value="15">B Phil</option>
                                                            <option value="10">B Plan</option>
                                                            <option value="12">B Tech</option>
                                                            <option value="60">B.Pharm</option>
                                                            <option value="17">BA</option>
                                                            <option value="67">Bachelor Of Law</option>
                                                            <option value="54">Bachelor Of Veterinary Science</option>
                                                            <option value="52">BAMS</option>
                                                            <option value="25">BBA</option>
                                                            <option value="8">BCA</option>
                                                            <option value="48">BDS</option>
                                                            <option value="11">BE</option>
                                                            <option value="22">BEd</option>
                                                            <option value="18">BFA</option>
                                                            <option value="26">BFM (Financial Management)</option>
                                                            <option value="66">BGL</option>
                                                            <option value="24">BHM</option>
                                                            <option value="50">BHMS</option>
                                                            <option value="19">BLIS</option>
                                                            <option value="21">BMM (MASS MEDIA)</option>
                                                            <option value="58">BPT</option>
                                                            <option value="13">BSc Computer Science</option>
                                                            <option value="14">BSc IT</option>
                                                            <option value="62">BSc Nursing</option>
                                                            <option value="20">BSW</option>
                                                            <option value="72">CA Final</option>
                                                            <option value="71">CA Inter</option>
                                                            <option value="75">CFA (Chartered Financial Analyst)
                                                            </option>
                                                            <option value="74">Company Secretary (CS)</option>
                                                            <option value="56">Degree In Medicine</option>
                                                            <option value="80">Diploma</option>
                                                            <option value="64">Diploma In Nursing</option>
                                                            <option value="47">DM - Doctorate Of Medicine</option>
                                                            <option value="82">High School</option>
                                                            <option value="77">IAS</option>
                                                            <option value="73">ICWA</option>
                                                            <option value="78">IPS</option>
                                                            <option value="79">IRS</option>
                                                            <option value="83">Less Than High School</option>
                                                            <option value="68">LLB</option>
                                                            <option value="70">LLM</option>
                                                            <option value="28">M Arch</option>
                                                            <option value="35">M Com</option>
                                                            <option value="34">M Phil</option>
                                                            <option value="36">M Sc</option>
                                                            <option value="31">M Tech</option>
                                                            <option value="61">M.Pharm</option>
                                                            <option value="37">MA</option>
                                                            <option value="53">MAMS</option>
                                                            <option value="57">Master In Medicine</option>
                                                            <option value="69">Master Of Law</option>
                                                            <option value="55">Master Of Veterinary Science</option>
                                                            <option value="41">MBA</option>
                                                            <option value="44">MBBS</option>
                                                            <option value="29">MCA</option>
                                                            <option value="46">MCh - Master Of Chirurgiae</option>
                                                            <option value="45">MD / MS (Medical)</option>
                                                            <option value="49">MDS</option>
                                                            <option value="27">ME</option>
                                                            <option value="23">MEd</option>
                                                            <option value="65">Medical Laboratory Technology</option>
                                                            <option value="43">MFM (Financial Management)</option>
                                                            <option value="40">MHM</option>
                                                            <option value="51">MHMS</option>
                                                            <option value="38">MLIS</option>
                                                            <option value="59">MPT</option>
                                                            <option value="32">MSc Computer Science</option>
                                                            <option value="33">MSc IT</option>
                                                            <option value="63">MSc Nursing</option>
                                                            <option value="39">MSW</option>
                                                            <option value="84">Other Education</option>
                                                            <option value="30">PGDCA</option>
                                                            <option value="42">PGDM</option>
                                                            <option value="76">Ph D</option>
                                                            <option value="81">Polytechnic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Occupation </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a Occupation..."
                                                            class="chosen-select gt-form-control flat" multiple
                                                            name="occupation[]">
                                                            <option value=""></option>
                                                            <option value="18">Civil Engineer</option>
                                                            <option value="19">Clerical Official</option>
                                                            <option value="20">Commercial Pilot</option>
                                                            <option value="21">Company Secretary</option>
                                                            <option value="22">Computer Professional</option>
                                                            <option value="23">Consultant</option>
                                                            <option value="24">Contractor</option>
                                                            <option value="25">Cost Accountant</option>
                                                            <option value="26">Creative Person</option>
                                                            <option value="27">Customer Support Professional</option>
                                                            <option value="28">Defense Employee</option>
                                                            <option value="29">Dentist</option>
                                                            <option value="30">Designer</option>
                                                            <option value="31">Doctor</option>
                                                            <option value="32">Economist</option>
                                                            <option value="33">Engineer</option>
                                                            <option value="34">Engineer (Mechanical)</option>
                                                            <option value="35">Engineer (Project)</option>
                                                            <option value="36">Entertainment Professional</option>
                                                            <option value="37">Event Manager</option>
                                                            <option value="38">Executive</option>
                                                            <option value="39">Factory worker</option>
                                                            <option value="40">Farmer</option>
                                                            <option value="41">Fashion Designer</option>
                                                            <option value="42">Finance Professional</option>
                                                            <option value="43">Flight Attendant</option>
                                                            <option value="44">Government Employee</option>
                                                            <option value="45">Health Care Professional</option>
                                                            <option value="46">Home Maker</option>
                                                            <option value="47">Hotel & Restaurant Professional
                                                            </option>
                                                            <option value="48">Human Resources Professional</option>
                                                            <option value="49">Interior Designer</option>
                                                            <option value="50">Investment Professional</option>
                                                            <option value="51">IT / Telecom Professional</option>
                                                            <option value="52">Journalist</option>
                                                            <option value="53">Lawyer</option>
                                                            <option value="54">Lecturer</option>
                                                            <option value="55">Legal Professional</option>
                                                            <option value="56">Manager</option>
                                                            <option value="57">Marketing Professional</option>
                                                            <option value="58">Media Professional</option>
                                                            <option value="59">Medical Professional</option>
                                                            <option value="60">Medical Transcriptionist</option>
                                                            <option value="61">Merchant Naval Officer</option>
                                                            <option value="95">Not Working</option>
                                                            <option value="62">Nurse</option>
                                                            <option value="63">Occupational Therapist</option>
                                                            <option value="64">Optician</option>
                                                            <option value="94">Others</option>
                                                            <option value="65">Pharmacist</option>
                                                            <option value="66">Physician Assistant</option>
                                                            <option value="67">Physicist</option>
                                                            <option value="68">Physiotherapist</option>
                                                            <option value="69">Pilot</option>
                                                            <option value="70">Politician</option>
                                                            <option value="71">Production professional</option>
                                                            <option value="72">Professor</option>
                                                            <option value="73">Psychologist</option>
                                                            <option value="74">Public Relations Professional</option>
                                                            <option value="75">Real Estate Professional</option>
                                                            <option value="76">Research Scholar</option>
                                                            <option value="78">Retail Professional</option>
                                                            <option value="77">Retired Person</option>
                                                            <option value="79">Sales Professional</option>
                                                            <option value="80">Scientist</option>
                                                            <option value="81">Self-employed Person</option>
                                                            <option value="82">Social Worker</option>
                                                            <option value="83">Software Consultant</option>
                                                            <option value="84">Sportsman</option>
                                                            <option value="85">Student</option>
                                                            <option value="86">Teacher</option>
                                                            <option value="87">Technician</option>
                                                            <option value="88">Training Professional</option>
                                                            <option value="89">Transportation Professional</option>
                                                            <option value="90">Veterinary Doctor</option>
                                                            <option value="91">Volunteer</option>
                                                            <option value="92">Writer</option>
                                                            <option value="93">Zoologist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6">
                                                        <label class="mt-10">
                                                            Annual Income </label>
                                                    </div>
                                                    <div class="col-xxl-10 col-xl-10">
                                                        <select data-placeholder="Choose a Annual Income..."
                                                            class="chosen-select gt-form-control" multiple
                                                            name="annual_income[]">
                                                            <option value=""></option>
                                                            <option value="1">50,000</option>
                                                            <option value="2">1,00,000</option>
                                                            <option value="3">2,00,000</option>
                                                            <option value="4">3,00,000</option>
                                                            <option value="5">4,00,000</option>
                                                            <option value="6">5,00,000</option>
                                                            <option value="7">6,00,000</option>
                                                            <option value="8">7,00,000</option>
                                                            <option value="9">8,00,000</option>
                                                            <option value="10">9,00,000</option>
                                                            <option value="11">10,00,000</option>
                                                            <option value="12">11,00,000</option>
                                                            <option value="13">12,00,000</option>
                                                            <option value="14">13,00,000</option>
                                                            <option value="15">14,00,000</option>
                                                            <option value="16">15,00,000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="submit" value="Search Now" name="occupation_sub"
                                                    class="btn gt-btn-green">
                                                <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                                                    Search</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Occupation Search  -->
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-16 col-xs-16 col-md-16 col-sm-16 gt-search-opt ">
                    <div class="gt-panel">
                        <div id="alerts"></div>
                        <div class="gt-panel-head gt-panel-border-orange">
                            <div class="gt-panel-title">Search By Id</div>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <form action="<?php echo e(route('search.by.id')); ?>"method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-xs-16 form-group">
                                        <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <label>Enter Matri Id </label>

                                        <input type="text" minlength="6" maxlength="6" id="searchById"
                                            class="gt-form-control" name="searchById" pattern="^\d{6}$"
                                            placeholder="Enter Matri Id Here">
                                        <p class="text-muted mt-10">Example - IN1234</p>

                                    </div>
                                    <div class="form-group text-center">
                                        <div class="row">
                                            <button type="submit" class="btn gt-btn-orange mb-20">
                                                Search Now </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchByIdForm = document.getElementById("searchByIdForm");
            const errorMessage = document.getElementById("errorMessage");
            const searchResult = document.getElementById("searchResult");
            const alerts = document.getElementById("alerts");

            if (searchByIdForm) {
                searchByIdForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    const searchById = document.getElementById("searchById").value;
                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    errorMessage.textContent = "";

                    if (!searchById) {
                        errorMessage.textContent = "Please enter a valid Profile ID.";
                        return;
                    }

                    $.ajax({
                        url: "<?php echo e(route('search.by.id')); ?>", 
                        method: "POST",
                        data: {
                            _token: csrfToken,
                            searchById: searchById,
                        },
                        success: function(response) {
                            var searchTemplate = document.getElementById('searchTemplate');
                            searchTemplate.style.display = "none";
                            searchResult.innerHTML = response;
                        },
                        error: function(xhr) {
                            alerts.innerHTML = xhr.responseJSON.alert;
                            setTimeout(function() {
                                alerts.innerHTML =
                                    '';
                            }, 3000);
                        },
                    });
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            const $selectBox = $(".custom-select2");
            if ($selectBox.length) {
                $selectBox.on('change', function() {
                    let selectedValues = $(this).val() || ['0'];
                    if (selectedValues.length > 2 && selectedValues.includes('0')) {
                        selectedValues = ["0"];
                    } else if (selectedValues.length === 0) {
                        selectedValues = ["0"];
                    } else if (selectedValues.length > 1) {
                        selectedValues = selectedValues.filter(value => value !== '0');
                    }
                    $(this).val(selectedValues).trigger('change.select2');
                    if (selectedValues.length === 1 && selectedValues.includes('1')) {
                        $('.children').hide();
                    } else if (selectedValues.length > 1) {
                        $('.children').show();
                    }
                    $(this).val(selectedValues).trigger('change.select2');

                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\search\search.blade.php ENDPATH**/ ?>