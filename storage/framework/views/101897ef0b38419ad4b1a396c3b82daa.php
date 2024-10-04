<?php $__env->startSection('title', 'Success Strory - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
    <script type="text/javascript">
        var numDays = {
            '01': 31,
            '02': 28,
            '03': 31,
            '04': 30,
            '05': 31,
            '06': 30,
            '07': 31,
            '08': 31,
            '09': 30,
            '10': 31,
            '11': 30,
            '12': 31
        };

        function setDays(oMonthSel, oDaysSel, oYearSel) {
            var nDays, oDaysSelLgth, opt, i = 1;
            nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
            if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
                ++nDays;
            oDaysSelLgth = oDaysSel.length;
            if (nDays != oDaysSelLgth) {
                if (nDays < oDaysSelLgth)
                    oDaysSel.length = nDays;
                else
                    for (i; i < nDays - oDaysSelLgth + 1; i++) {
                        opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
                        oDaysSel.options[oDaysSel.length] = opt;
                    }
            }
            var oForm = oMonthSel.form;
            var month = oMonthSel.options[oMonthSel.selectedIndex].value;
            var day = oDaysSel.options[oDaysSel.selectedIndex].value;
            var year = oYearSel.options[oYearSel.selectedIndex].value;
        }

        function setDays1(oMonthSel, oDaysSel, oYearSel) {
            var nDays, oDaysSelLgth, opt, i = 1;
            nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
            if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
                ++nDays;
            oDaysSelLgth = oDaysSel.length;
            if (nDays != oDaysSelLgth) {
                if (nDays < oDaysSelLgth)
                    oDaysSel.length = nDays;
                else
                    for (i; i < nDays - oDaysSelLgth + 1; i++) {
                        opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
                        oDaysSel.options[oDaysSel.length] = opt;
                    }
            }
            var oForm = oMonthSel.form;
            var month1 = oMonthSel.options[oMonthSel.selectedIndex].value;
            var day1 = oDaysSel.options[oDaysSel.selectedIndex].value;
            var year1 = oYearSel.options[oYearSel.selectedIndex].value;
        }
    </script>
    <div class="container">
        <h2 class="text-center inPageTitle fontMerriWeather">
            <i class="fa fa-heart mr-10 gt-text-orange"></i>Happy Marriages
        </h2>
        <p class="inPageSubTitle text-center mb-30">Check it out our success stories who found their life partner here.</p>
        <div class="row">
            <div class="gt-tabs gt-success-story col-xs-16">
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active text-center">
                            <a href="#gt-success-tab-1" aria-controls="gt-success-tab-1" role="tab" data-toggle="tab">
                                Success Stories </a>
                        </li>
                        <li role="presentation" class="text-center">
                            <a href="#gt-success-tab-2" aria-controls="gt-success-tab-2" role="tab" data-toggle="tab">
                                Post your success story </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Success Story -->
                        <div role="tabpanel" class="tab-pane active" id="gt-success-tab-1">
                            <div class="col-xl-16 text-center mb-20 mt-20">
                                <h3 class="inSearchTitle">
                                    Success Story </h3>
                                <p class="pb-10 inSearchSubTitle">
                                    Some of our happily married couples story </p>
                            </div>
                            <div class="row">
                                <!-- Success Story Card -->
                                <div id="suc_story"></div>
                                <!-- /. Success Story Card -->
                            </div>
                        </div>
                        <!-- /. Success Story -->
                        <!-- Post Story -->
                        <div role="tabpanel" class="tab-pane" id="gt-success-tab-2">
                            <div class="col-xl-16 text-center mb-20 mt-20">
                                <h3 class="inSearchTitle">
                                    Post Success Story </h3>
                                <p class="pb-10 inSearchSubTitle">
                                    Post your success story here </p>
                            </div>
                            <form class="col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 inSuccessForm" action=""
                                method="post" name="suc-form" id="suc-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Bride Id <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <input type="text" Class="gt-form-control" name="brideid" id="brideid"
                                                    onChange="chackbride(this.value);" data-validetta="required"
                                                    placeholder="Enter Bride Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Bride Name <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <input type="text" Class="gt-form-control" name="bridename"
                                                    id="bridename" data-validetta="required" placeholder="Enter Bride Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Groom Id <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <input type="text" Class="gt-form-control" name="groomid" id="groomid"
                                                    onChange="chackgroom(this.value);" data-validetta="required"
                                                    placeholder="Enter Groom Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Groom Name<span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <input type="text" Class="gt-form-control" name="groomname"
                                                    id="groomname" data-validetta="required" placeholder="Enter Groom Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Engagement Date <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <select name="day1" id="day1" class="gt-form-control"
                                                            onchange="setDays1(month1,this,year1)"
                                                            data-validetta="required">
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04">04</option>
                                                            <option value="05">05</option>
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="month1" id="month1" class="gt-form-control"
                                                            onchange="setDays1(this,day1,year1)"
                                                            data-validetta="required">
                                                            <option value="01">Jan</option>
                                                            <option value="02">Feb</option>
                                                            <option value="03">Mar</option>
                                                            <option value="04">Apr</option>
                                                            <option value="05">May</option>
                                                            <option value="06">Jun</option>
                                                            <option value="07">Jul</option>
                                                            <option value="08">Aug</option>
                                                            <option value="09">Sep</option>
                                                            <option value="10">Oct</option>
                                                            <option value="11">Nov</option>
                                                            <option value="12">Dec</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <select name="year1" id="year1" class="gt-form-control"
                                                            onchange="setDays1(month1,day1,this)"
                                                            data-validetta="required">
                                                            <option value='2050'>
                                                                2050 </option>
                                                            <option value='2049'>
                                                                2049 </option>
                                                            <option value='2048'>
                                                                2048 </option>
                                                            <option value='2047'>
                                                                2047 </option>
                                                            <option value='2046'>
                                                                2046 </option>
                                                            <option value='2045'>
                                                                2045 </option>
                                                            <option value='2044'>
                                                                2044 </option>
                                                            <option value='2043'>
                                                                2043 </option>
                                                            <option value='2042'>
                                                                2042 </option>
                                                            <option value='2041'>
                                                                2041 </option>
                                                            <option value='2040'>
                                                                2040 </option>
                                                            <option value='2039'>
                                                                2039 </option>
                                                            <option value='2038'>
                                                                2038 </option>
                                                            <option value='2037'>
                                                                2037 </option>
                                                            <option value='2036'>
                                                                2036 </option>
                                                            <option value='2035'>
                                                                2035 </option>
                                                            <option value='2034'>
                                                                2034 </option>
                                                            <option value='2033'>
                                                                2033 </option>
                                                            <option value='2032'>
                                                                2032 </option>
                                                            <option value='2031'>
                                                                2031 </option>
                                                            <option value='2030'>
                                                                2030 </option>
                                                            <option value='2029'>
                                                                2029 </option>
                                                            <option value='2028'>
                                                                2028 </option>
                                                            <option value='2027'>
                                                                2027 </option>
                                                            <option value='2026'>
                                                                2026 </option>
                                                            <option value='2025'>
                                                                2025 </option>
                                                            <option value='2024'>
                                                                2024 </option>
                                                            <option value='2023'>
                                                                2023 </option>
                                                            <option value='2022'>
                                                                2022 </option>
                                                            <option value='2021'>
                                                                2021 </option>
                                                            <option value='2020'>
                                                                2020 </option>
                                                            <option value='2019'>
                                                                2019 </option>
                                                            <option value='2018'>
                                                                2018 </option>
                                                            <option value='2017'>
                                                                2017 </option>
                                                            <option value='2016'>
                                                                2016 </option>
                                                            <option value='2015'>
                                                                2015 </option>
                                                            <option value='2014'>
                                                                2014 </option>
                                                            <option value='2013'>
                                                                2013 </option>
                                                            <option value='2012'>
                                                                2012 </option>
                                                            <option value='2011'>
                                                                2011 </option>
                                                            <option value='2010'>
                                                                2010 </option>
                                                            <option value='2009'>
                                                                2009 </option>
                                                            <option value='2008'>
                                                                2008 </option>
                                                            <option value='2007'>
                                                                2007 </option>
                                                            <option value='2006'>
                                                                2006 </option>
                                                            <option value='2005'>
                                                                2005 </option>
                                                            <option value='2004'>
                                                                2004 </option>
                                                            <option value='2003'>
                                                                2003 </option>
                                                            <option value='2002'>
                                                                2002 </option>
                                                            <option value='2001'>
                                                                2001 </option>
                                                            <option value='2000'>
                                                                2000 </option>
                                                            <option value='1999'>
                                                                1999 </option>
                                                            <option value='1998'>
                                                                1998 </option>
                                                            <option value='1997'>
                                                                1997 </option>
                                                            <option value='1996'>
                                                                1996 </option>
                                                            <option value='1995'>
                                                                1995 </option>
                                                            <option value='1994'>
                                                                1994 </option>
                                                            <option value='1993'>
                                                                1993 </option>
                                                            <option value='1992'>
                                                                1992 </option>
                                                            <option value='1991'>
                                                                1991 </option>
                                                            <option value='1990'>
                                                                1990 </option>
                                                            <option value='1989'>
                                                                1989 </option>
                                                            <option value='1988'>
                                                                1988 </option>
                                                            <option value='1987'>
                                                                1987 </option>
                                                            <option value='1986'>
                                                                1986 </option>
                                                            <option value='1985'>
                                                                1985 </option>
                                                            <option value='1984'>
                                                                1984 </option>
                                                            <option value='1983'>
                                                                1983 </option>
                                                            <option value='1982'>
                                                                1982 </option>
                                                            <option value='1981'>
                                                                1981 </option>
                                                            <option value='1980'>
                                                                1980 </option>
                                                            <option value='1979'>
                                                                1979 </option>
                                                            <option value='1978'>
                                                                1978 </option>
                                                            <option value='1977'>
                                                                1977 </option>
                                                            <option value='1976'>
                                                                1976 </option>
                                                            <option value='1975'>
                                                                1975 </option>
                                                            <option value='1974'>
                                                                1974 </option>
                                                            <option value='1973'>
                                                                1973 </option>
                                                            <option value='1972'>
                                                                1972 </option>
                                                            <option value='1971'>
                                                                1971 </option>
                                                            <option value='1970'>
                                                                1970 </option>
                                                            <option value='1969'>
                                                                1969 </option>
                                                            <option value='1968'>
                                                                1968 </option>
                                                            <option value='1967'>
                                                                1967 </option>
                                                            <option value='1966'>
                                                                1966 </option>
                                                            <option value='1965'>
                                                                1965 </option>
                                                            <option value='1964'>
                                                                1964 </option>
                                                            <option value='1963'>
                                                                1963 </option>
                                                            <option value='1962'>
                                                                1962 </option>
                                                            <option value='1961'>
                                                                1961 </option>
                                                            <option value='1960'>
                                                                1960 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Marriage Date <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <select name="day" id="day" class="gt-form-control"
                                                            onchange="setDays(month,this,year)" data-validetta="required">
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04">04</option>
                                                            <option value="05">05</option>
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="month" id="month" class="gt-form-control"
                                                            onchange="setDays(this,day,year)" data-validetta="required">
                                                            <option value="01">Jan</option>
                                                            <option value="02">Feb</option>
                                                            <option value="03">Mar</option>
                                                            <option value="04">Apr</option>
                                                            <option value="05">May</option>
                                                            <option value="06">Jun</option>
                                                            <option value="07">Jul</option>
                                                            <option value="08">Aug</option>
                                                            <option value="09">Sep</option>
                                                            <option value="10">Oct</option>
                                                            <option value="11">Nov</option>
                                                            <option value="12">Dec</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <select name="year" id="year" class="gt-form-control"
                                                            onchange="setDays(month,day,this)" data-validetta="required">
                                                            <option value='2050'>
                                                                2050 </option>
                                                            <option value='2049'>
                                                                2049 </option>
                                                            <option value='2048'>
                                                                2048 </option>
                                                            <option value='2047'>
                                                                2047 </option>
                                                            <option value='2046'>
                                                                2046 </option>
                                                            <option value='2045'>
                                                                2045 </option>
                                                            <option value='2044'>
                                                                2044 </option>
                                                            <option value='2043'>
                                                                2043 </option>
                                                            <option value='2042'>
                                                                2042 </option>
                                                            <option value='2041'>
                                                                2041 </option>
                                                            <option value='2040'>
                                                                2040 </option>
                                                            <option value='2039'>
                                                                2039 </option>
                                                            <option value='2038'>
                                                                2038 </option>
                                                            <option value='2037'>
                                                                2037 </option>
                                                            <option value='2036'>
                                                                2036 </option>
                                                            <option value='2035'>
                                                                2035 </option>
                                                            <option value='2034'>
                                                                2034 </option>
                                                            <option value='2033'>
                                                                2033 </option>
                                                            <option value='2032'>
                                                                2032 </option>
                                                            <option value='2031'>
                                                                2031 </option>
                                                            <option value='2030'>
                                                                2030 </option>
                                                            <option value='2029'>
                                                                2029 </option>
                                                            <option value='2028'>
                                                                2028 </option>
                                                            <option value='2027'>
                                                                2027 </option>
                                                            <option value='2026'>
                                                                2026 </option>
                                                            <option value='2025'>
                                                                2025 </option>
                                                            <option value='2024'>
                                                                2024 </option>
                                                            <option value='2023'>
                                                                2023 </option>
                                                            <option value='2022'>
                                                                2022 </option>
                                                            <option value='2021'>
                                                                2021 </option>
                                                            <option value='2020'>
                                                                2020 </option>
                                                            <option value='2019'>
                                                                2019 </option>
                                                            <option value='2018'>
                                                                2018 </option>
                                                            <option value='2017'>
                                                                2017 </option>
                                                            <option value='2016'>
                                                                2016 </option>
                                                            <option value='2015'>
                                                                2015 </option>
                                                            <option value='2014'>
                                                                2014 </option>
                                                            <option value='2013'>
                                                                2013 </option>
                                                            <option value='2012'>
                                                                2012 </option>
                                                            <option value='2011'>
                                                                2011 </option>
                                                            <option value='2010'>
                                                                2010 </option>
                                                            <option value='2009'>
                                                                2009 </option>
                                                            <option value='2008'>
                                                                2008 </option>
                                                            <option value='2007'>
                                                                2007 </option>
                                                            <option value='2006'>
                                                                2006 </option>
                                                            <option value='2005'>
                                                                2005 </option>
                                                            <option value='2004'>
                                                                2004 </option>
                                                            <option value='2003'>
                                                                2003 </option>
                                                            <option value='2002'>
                                                                2002 </option>
                                                            <option value='2001'>
                                                                2001 </option>
                                                            <option value='2000'>
                                                                2000 </option>
                                                            <option value='1999'>
                                                                1999 </option>
                                                            <option value='1998'>
                                                                1998 </option>
                                                            <option value='1997'>
                                                                1997 </option>
                                                            <option value='1996'>
                                                                1996 </option>
                                                            <option value='1995'>
                                                                1995 </option>
                                                            <option value='1994'>
                                                                1994 </option>
                                                            <option value='1993'>
                                                                1993 </option>
                                                            <option value='1992'>
                                                                1992 </option>
                                                            <option value='1991'>
                                                                1991 </option>
                                                            <option value='1990'>
                                                                1990 </option>
                                                            <option value='1989'>
                                                                1989 </option>
                                                            <option value='1988'>
                                                                1988 </option>
                                                            <option value='1987'>
                                                                1987 </option>
                                                            <option value='1986'>
                                                                1986 </option>
                                                            <option value='1985'>
                                                                1985 </option>
                                                            <option value='1984'>
                                                                1984 </option>
                                                            <option value='1983'>
                                                                1983 </option>
                                                            <option value='1982'>
                                                                1982 </option>
                                                            <option value='1981'>
                                                                1981 </option>
                                                            <option value='1980'>
                                                                1980 </option>
                                                            <option value='1979'>
                                                                1979 </option>
                                                            <option value='1978'>
                                                                1978 </option>
                                                            <option value='1977'>
                                                                1977 </option>
                                                            <option value='1976'>
                                                                1976 </option>
                                                            <option value='1975'>
                                                                1975 </option>
                                                            <option value='1974'>
                                                                1974 </option>
                                                            <option value='1973'>
                                                                1973 </option>
                                                            <option value='1972'>
                                                                1972 </option>
                                                            <option value='1971'>
                                                                1971 </option>
                                                            <option value='1970'>
                                                                1970 </option>
                                                            <option value='1969'>
                                                                1969 </option>
                                                            <option value='1968'>
                                                                1968 </option>
                                                            <option value='1967'>
                                                                1967 </option>
                                                            <option value='1966'>
                                                                1966 </option>
                                                            <option value='1965'>
                                                                1965 </option>
                                                            <option value='1964'>
                                                                1964 </option>
                                                            <option value='1963'>
                                                                1963 </option>
                                                            <option value='1962'>
                                                                1962 </option>
                                                            <option value='1961'>
                                                                1961 </option>
                                                            <option value='1960'>
                                                                1960 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Upload Photo <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <input type="file" Class="gt-form-control" name="susphoto"
                                                    data-validetta="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-xxl-6 col-lg-6">
                                                Success Story <span class="text-danger gtRegMandatory">*</span>
                                            </label>
                                            <div class="col-xxl-10 col-lg-10">
                                                <textarea Class="gt-form-control" name="succstory" id="succstory" rows="5" data-validetta="required"
                                                    placeholder="Enter Your Success Story Here"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="row">
                                            <input type="submit" class="btn gt-btn-orange gt-btn-xl" value="SUBMIT"
                                                name="sub_success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-xxl-12 col-xxl-offset-2 col-xl-12 col-xl-offset-2">
                                <div class="col-xxl-16 col-xs-16 text-center">
                                    <h4>Which topics you can write as your success story</h4>
                                </div>
                                <div class="col-xxl-8 col-xl-8 col-xs-16">
                                    <h6 class="text-muted">
                                        - How you create your id and how you became our user.
                                    </h6>
                                    <h6 class="text-muted">
                                        - How you you contact your partner </h6>
                                </div>
                                <div class="col-xxl-8 col-xl-8 col-xs-16">
                                    <h6 class="text-muted">
                                        - How you think that your perfect and process further.
                                    </h6>
                                    <h6 class="text-muted">
                                        - What do you think about our website and experience.
                                    </h6>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /. Post Story -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\successstory.blade.php ENDPATH**/ ?>