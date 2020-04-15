<template>
    <main class="inner-Page">
        <section class="inner-Page-content">
            <div class="cst-breadcrumbs">
            <h1>contact us</h1>
                <ul>
                    <li><a href="/godoexperience-php/">home</a></li>
                    <li><span>/</span></li>
                    <li><a href="javascript:void(0)">Contact us</a></li>
                </ul>
            </div>
            <div class="container">
                <!-- Contact Page-->
                <div class="contact-page">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="contact-title">
                                <h3>get in touch</h3>
                                <p></p>
                            </div>
                            <!--Contct getin touch-->
                            <div class="contct-getin-touch">
                                <!-- Contct getin touch Item-->
                                <div class="contct-get-item">
                                    <div class="contct-get-item-icn">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class="contct-get-item-info">
                                        <a data-toggle="tooltip" title="Make a call us" href="tel:(+01) 34 56 7890">
                                        (+01) 34 56 7890                                    </a>
                                    </div>
                                </div>
                                <!-- // Contct getin touch Item-->
                                <!-- Contct getin touch Item-->
                                <div class="contct-get-item">
                                    <div class="contct-get-item-icn">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="contct-get-item-info">
                                        <a data-toggle="tooltip" title="Email Us" href="mailto:info@godoexperience.com">
                                            info@godoexperience.com                                    </a>
                                    </div>
                                </div>
                                <!-- // Contct getin touch Item-->
                                <!-- Contct getin touch Item-->
                                <div class="contct-get-item">
                                    <div class="contct-get-item-icn">
                                        <i class="fa fa-map-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="contct-get-item-info">
                                        San Diego , CA 92120 USA                                </div>
                                </div>
                                <!-- // Contct getin touch Item-->
                                <div class="contct-getin-social">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- // Contct getin touch-->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <!--<div class="contact-title">
                                <h3>send us a message</h3>
                            </div>-->
                            <div class="contact-msg">
                                <div class="experience-categories-form">
                                    <form id="experiences_form" action="/godoexperience-php/contact-us" method="post">
    <input type="hidden" name="_csrf-frontend" value="7mbX2A-AV2Y4bJ0I2-Y8QcfqoDxAqR0PbCWRzfAMYaiICOOoV7EmVnUnyUGEnFErgqPHaSafdTgpVM6MhWogwQ==">
                                        <div class="form-group field-contactus-contact_name required">
    <label class="label_Mod">Your Name<sub>*</sub></label>
    <input type="text" id="contactus-contact_name" class="form-control input_Mod" name="ContactUs[contact_name]" placeholder="Enter your name.." aria-required="true">

    <div class="help-block"></div>
    </div>
                                        <div class="form-group field-contactus-contact_email required">
    <label class="label_Mod">Email<sub>*</sub></label>
    <input type="text" id="contactus-contact_email" class="form-control input_Mod" name="ContactUs[contact_email]" placeholder="Enter your name.." aria-required="true">

    <div class="help-block"></div>
    </div>
                                        <div class="form-group field-contactus-contact_phone required">
    <label class="label_Mod">Phone<sub>*</sub></label>
    <input type="text" id="contactus-contact_phone" class="form-control input_Mod" name="ContactUs[contact_phone]" placeholder="Enter your name.." aria-required="true">

    <div class="help-block"></div>
    </div>                                    <div class="form-group field-contactus-contact_message required">
    <label class="label_Mod">Message<sub>*</sub></label>
    <textarea id="contactus-contact_message" class="form-control input_Mod" name="ContactUs[contact_message]" rows="6" cols="32" placeholder="Write your note." aria-required="true"></textarea>

    <div class="help-block"></div>
    </div>
                                        <div class="contact-msg-btn">
                                            <button type="submit" class="btn_Primary">Submit</button>
                                        </div>

                                </form>                        </div>
                        </div>
                    </div>
                </div>
                <!-- // Contact Page-->
            </div>
        </div></section>
    </main>
</template>
<script>
    export default {
        name : 'contactusC',
        data : function(){
            return {

            }
        } 
    }
</script>
<style lang="scoped">
    
</style>