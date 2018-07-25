<style>
    @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
body
{
    font-family: 'Open Sans', sans-serif;
    }
</style>
<footer>
    <div class="footer clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <a href="index.html" class="footer-logo"><img src="{{ asset('images/img_sites/logo-color-sm.png') }}" alt="footer-logo"></a>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <h5>{{ trans('site.contact_us') }}</h5>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-home" aria-hidden="true"></i>{{ trans('site.company') }}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@star-travel.com">utt@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent imgGallery">
                        <h5>{{ trans('site.gallery') }}</h5>
                        <div class="row">
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-1.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-1.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-2.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-2.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-3.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-3.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-4.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-4.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-5.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-5.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="images/img_sites/home/gallery/gallery-6.jpg"><img src="{{ asset('images/img_sites/home/gallery/thumb-gallery-6.jpg') }}" alt="image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <h5>{{ trans('site.news_letter') }}</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ trans('site.enter_email') }}" aria-describedby="basic-addon21">
                            <span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyRight clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6 col-xs-12">
                    <ul class="list-inline">
                        <li><a href="#">{{ trans('site.privacy_policy') }}</a></li>
                        <li><a href="#">{{ trans('site.about_us') }}</a></li>
                        <li><a href="#">{{ trans('site.support') }}</a></li>
                        <li><a href="#">{{ trans('site.blog') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                    <div class="copyRightText">
                        <p>{{ trans('site.copyright') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</footer>