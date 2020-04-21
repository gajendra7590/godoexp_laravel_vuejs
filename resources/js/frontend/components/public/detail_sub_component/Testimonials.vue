<template> 
    <section class="exp_testimonial_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="exp_testimonial_info">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active">
                                    <img class="img-responsive " 
                                         :src="`${baseURL}frontend/images/background/banner1.jpg`" 
                                         alt="test">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1">
                                    <img class="img-responsive" 
                                         :src="`${baseURL}frontend/images/background/banner1.jpg`" 
                                         alt="test">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2">
                                    <img class="img-responsive"
                                         :src="`${baseURL}frontend/images/background/banner1.jpg`" 
                                         alt="test">
                                </li>
                            </ol> 
                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">
                                <div class="btc_center_line"></div>
                                <!-- Quote 1 -->
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-2 col-xs-offset-2">
                                            <div class="exp_quote_one"></div>
                                            <div class="exp_quote_two"></div>
                                            <p>“Donec feugiat id augue consequat vulputate Suspendisse at magna mattis
                                             dignissim libero fringilla leo aiquam veh. ultrices fringilla est tortor sollicitudin. 
                                             This is Photoshop's version of Lorem Ipsum. Proin graida nibh vel velit auctor aliquet. 
                                             Aenean sollicitudin, lorem quis bibendum auctor.”
                                            </p>
                                            <div class="exp_quote_line"></div>
                                            <h1>Chiara & Nonna</h1>
                                            <a href="#">Contact Host</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-2 col-xs-offset-2">
                                            <div class="exp_quote_one"></div>
                                            <div class="exp_quote_two"></div>
                                            <p>“Donec feugiat id augue consequat vulputate Suspendisse at 
                                            magna mattis dignissim libero fringilla leo aiquam veh. 
                                            ultrices fringilla est tortor sollicitudin. This is Photoshop's 
                                            version of Lorem Ipsum. Proin graida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.”
                                            </p>
                                            <div class="exp_quote_line"></div>
                                            <h1>Chiara & Nonna</h1>
                                            <a href="#">Contact Host</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quote 3 -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-2 col-xs-offset-2">
                                            <div class="exp_quote_one"></div>
                                            <div class="exp_quote_two"></div>
                                            <p>“Donec feugiat id augue consequat vulputate Suspendisse at magna mattis dignissim libero fringilla leo aiquam veh. ultrices fringilla est tortor sollicitudin. This is Photoshop's version of Lorem Ipsum. Proin graida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.”
                                            </p>
                                            <div class="exp_quote_line"></div>
                                            <h1>Chiara & Nonna</h1>
                                            <a href="#">Contact Host</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name : 'singlePageTestimonials',
    data : function() {
        return {
            baseURL : this.$store.state.ASSET_BURL
        } 
    },
    created() {
        this.baseURL = this.$store.state.ASSET_BURL;
    },
     
}
</script>