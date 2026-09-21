<div class="maybe" style="background: #ffffff;    margin-top: -50px; padding-bottom:  40px; margin: 5px 0;display:none">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="ser-title"> همکاران ما </h2>
            </div>

            <style>
                .qess li a{
                    display: block;padding: 10px 15px;margin-bottom: 10px;background: #ffffff;border-radius: 10px;font-weight: 700;font-size: 14px;color: #444444;
                }
                .qess li a:hover{
                    color: #c57126;
                }
            </style>
            <div class="col-12">
                <div class="row" style="    justify-content: center;
    align-items: center;">
                    <?php

                $option = get_option( 'setting_magit_moshtari' ); // prefix of framework


                $gallery_opt = $option['opt-gallery-hamkaran']; // for eg. 15,50,70,125
//                $gallery_ids = explode( ',', $gallery_opt );

                    //var_dump($gallery_opt);

//
//                if ( ! empty( $gallery_opt ) ) {
//                    foreach ( $gallery_opt as $gallery_item_id ) {
//                        ?>
<!--                        <div class="col-4 col-md-2">-->
<!--                            <img src="--><?php // echo $gallery_item_id["opt-upload-10"] ; ?><!--" alt="" class="">-->
<!--                        </div>-->
<!--                    --><?php
//                        // echo wp_get_attachment_image( $gallery_item_id, 'full' );
//
//                        // echo wp_get_attachment_image_src( $gallery_item_id, 'full' );
//                        // var_dump( wp_get_attachment_metadata( $gallery_item_id ) );
//                    }
//                }
                ?>


                    <style>
                        .swiper {
                            width: 100%;
                            height: 100%;
                        }

                        .swiper-slide {
                            text-align: center;
                            font-size: 18px;
                            background: #fff;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }

                        .swiper-slide img {
                            display: block;
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        }
                    </style>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            if ( ! empty( $gallery_opt ) ) {
                                foreach ( $gallery_opt as $gallery_item_id ) {
                                    ?>
                                        <img  src="<?php  echo $gallery_item_id["opt-upload-10"] ; ?>" alt="" class="swiper-slide">
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <script>
                        var swiper = new Swiper(".mySwiper", {
                            slidesPerView: 2,
                            spaceBetween: 30,
                            autoplay : true,
                            loop : true,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            breakpoints: {
                                320: {
                                    slidesPerView: 2,
                                    spaceBetween: 15
                                },
                                // when window width is >= 480px
                                480: {
                                    slidesPerView: 2,
                                    spaceBetween: 15
                                },
                                // when window width is >= 640px
                                640: {
                                    slidesPerView: 5,
                                    spaceBetween: 15
                                }
                            },

                        });

                    </script>
                </div>

            </div>
        </div>
    </div>
</div>