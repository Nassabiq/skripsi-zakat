@extends('layouts.app')
@section('title', 'Profile - Masjid Miftahul Jannah')

@section('content')
    <div>
        <section id="profil" class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 aos-init aos-animate mt-4" data-aos="fade-left"
                        data-aos-delay="100" style="max-width: 500px">
                        <img src="img/masjid.jpeg" class="img-fluid" alt="Masjid" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content aos-init aos-animate mt-4"
                        data-aos="fade-right" data-aos-delay="100">
                        <h3>Sejarah Masjid Miftahul Jannah</h3>
                        <p class="fst-italic">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit
                            nobis ea id minima, aliquam hic nemo sunt sint autem provident
                            reiciendis, repudiandae nulla aspernatur dignissimos!
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Aspernatur mollitia exercitationem deleniti, dolor vero
                            praesentium molestias iure, sunt consequuntur, at accusamus dicta
                            sequi. Tenetur atque doloremque debitis porro ipsum unde.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
