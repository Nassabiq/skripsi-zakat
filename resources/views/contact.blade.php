@extends('layouts.app')
@section('title', 'Contact - Masjid Miftahul Jannah')

@section('content')
    <div>
        <!-- Kontak Start -->
        <div class="row mt-4">
            <div class="col-6">
                <div class="sigma_map">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="600" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=PWQP+55G,%20Komplek%20Jati%20Bening%20Dua,Jalan%20Jati%20Utama%20Raya,%20RT.001/RW.008,%20Jatibening%20Baru,%20Pondok%20Gede,%20Bekasi%20City,%20West%20Java%2017412&t=&z=19&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe><a href="https://123movies-to.org"></a><br />
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 100%;
                                    width: 100%;
                                }
                            </style><a href="https://www.embedgooglemap.net"></a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 100%;
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="section mt-negative pt-0">
                    <div class="container">
                        <form class="sigma_box box-lg m-0 mf_form_validate ajax_submit" action="sendmail.php" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <i class="far fa-user"></i>
                                        <input type="text" placeholder="Full Name" class="form-control dark"
                                            name="name" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" placeholder="Email Address" class="form-control dark"
                                            name="email" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <i class="far fa-pencil"></i>
                                        <input type="text" placeholder="Subject" class="form-control dark"
                                            name="Subesubject" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <textarea name="message" placeholder="Enter Message" cols="45" rows="5" class="form-control dark"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="sigma_btn-custom" name="button">
                                    Submit Now
                                </button>
                                <div class="server_response w-100"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sigma_icon-block text-center light icon-block-7">
                            <i class="flaticon-email"></i>
                            <div class="sigma_icon-block-content">
                                <span>Send Email <i class="far fa-arrow-right"></i> </span>
                                <h5>Email Address</h5>
                                <p>info@example.com</p>
                            </div>
                            <div class="icon-wrapper">
                                <i class="flaticon-email"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sigma_icon-block text-center light icon-block-7">
                            <i class="flaticon-telephone"></i>
                            <div class="sigma_icon-block-content">
                                <span>Call Us Now <i class="far fa-arrow-right"></i> </span>
                                <h5>Phone Number</h5>
                                <p>+123 478 390</p>
                            </div>
                            <div class="icon-wrapper">
                                <i class="flaticon-telephone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sigma_icon-block text-center light icon-block-7">
                            <i class="flaticon-paper-plane"></i>
                            <div class="sigma_icon-block-content">
                                <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
                                <h5>Location</h5>
                                <p>Komplek Jati Bening Dua, Jatibening Baru</p>
                                <p>Pondok Gede, Bekasi City, West Java</p>
                            </div>
                            <div class="icon-wrapper">
                                <i class="flaticon-paper-plane"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kontak End -->
    </div>
@endsection
