<footer class="footer-area">
    @php
        $siteinfo = App\Models\SiteSetting::find(1);
    @endphp
    <div class="container">

        <div class="footerColor">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <h3 class="footer-title">
                        OFFICE : </h3>
                    <div class="footer-content">
                        <p style="text-align: left;">ADDRESS : {{ $siteinfo->address }} </p>
                        <p style="text-align: left;">EMAIL : {{ $siteinfo->address }}</p>
                        <p style="text-align: left;">MOBILE : {{ $siteinfo->address }}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="header-social">
                        <ul>
                            <li> <a href="{{ $siteinfo->facebook }}" target="_blank" title="facebook"><i
                                        class="lab la-facebook-f"></i> </a> </li>
                            <li><a href="{{ $siteinfo->twitter }}" target="_blank" title="twitter"><i
                                        class="lab la-twitter"> </i> </a></li>
                            <li> <a href="{{ $siteinfo->youtube }}" target="_blank" title="youtube"><i
                                        class="lab la-youtube"></i> </a> </li>
                            <li><a href="{{ $siteinfo->instagram }}" target="_blank" title="instagram"><i
                                        class="lab la-instagram"> </i> </a></li>
                    </div>
                </div>
                <div class="copy_right_section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-right">
                                © All rights reserved © {{ $siteinfo->site_title }} </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href=" " class="scrollToTop" style=""><i class="las la-long-arrow-alt-up"></i></a>
        </div>
</footer>
