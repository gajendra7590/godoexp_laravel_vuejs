<template>
    <div id="experience_detail">
        <section class="exp_gallery_wrapper">
            <div class="container" v-if="!experience.id">
                <div class="row">
                    <div class="col-md-12">
                        <content-placeholders :rounded="true">
                            <content-placeholders-text :lines="1" />
                            <content-placeholders-img style="height:350px;" />
                            <content-placeholders-text :lines="5" />
                        </content-placeholders>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" v-if="experience.id">
                        <div class="exp_breadcrumb">
                            <ul>
                                <li>
                                    <router-link :to="{ name : 'experiences_home'}">Home <span>/</span></router-link>
                                </li>
                                <li>
                                    <router-link :to="{ name : 'experiences_list_by_cat',params: { category_name: experience.category.slug }}">
                                        {{ experience.category.name }} <span>/</span>
                                    </router-link>
                                </li>
                                <li>
                                    <a href="javascript:void:(0)">{{ experience.title }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Load Slider Componenet here -->
                    <SinglePageSlider :experience="experience"></SinglePageSlider>


                    <div class="exp_detail-fea" v-if="experience.id">
                        <div class="col-sm-4">
                            <div class="exp_detail-info">
                                <span class="exp_detail-sub">featured</span> : {{ (experience.featured == '1')?'Yes':'No' }}
                                <h3>{{ experience.category.name }}</h3>
                                <h5>{{ experience.title }}</h5>
                                <div class="exp_detail-cate">
                                    <a href="javascript:void(0);">{{ experience.state+' '+experience.country }}</a>
                                </div>
                                <div class="exp_detail-rateing">
                                    <i class="fa fa-star" aria-hidden="true"></i><span>4.97</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="exp_detail-ele">
                                <div class="exp_detail-des">
                                    {{ experience.sub_title }}
                                </div>
                                <div class="exp_ele-list">
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="exp_ele-mod">
                                            <div class="exp_ele-icn">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="exp_ele-duration">
                                                Duration
                                            </div>
                                            <div class="exp_ele-time">
                                                {{ experience.duration+' '+experience.duration_type }} </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="exp_ele-mod">
                                            <div class="exp_ele-icn">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                            <div class="exp_ele-duration">
                                                Group size
                                            </div>
                                            <div class="exp_ele-time">
                                                Up to {{ experience.group_size }} people
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="exp_ele-mod">
                                            <div class="exp_ele-icn">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="exp_ele-duration">
                                                Activity level
                                            </div>
                                            <div class="exp_ele-time">
                                                {{ experience.activity_level }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="exp_ele-mod">
                                            <div class="exp_ele-icn">
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="exp_ele-duration">
                                                Hosted in
                                            </div>
                                            <div class="exp_ele-time">
                                                {{ experience.state+' '+experience.country }}
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
        <section class="exp_wyou_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="exp_wyou_title">
                            <h3>What you'll do</h3>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="exp_wyou_des">
                            <p v-html="experience.description">
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <WhatToDo></WhatToDo>
        <Testimonials></Testimonials>

        <!-- Btm Show Date Area Start -->
        <section class="btm_Show-date">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="btm_Show-profile">
                            <div class="btm_Show-icon">
                                <img :src="`${baseURL}frontend/images/icons/user-showdata.png`" alt="user" />
                            </div>
                            <div class="btm_Show-title">
                                <span class="btm_Show-title-deshktop">Feeling Samurai Soul</span>
                                <span class="btm_Show-ele-mobile">From $400/person</span>
                            </div>
                            <div class="btn-Show-rating">
                                <a href="#">4.99
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span>(05)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="btm_Show-ele">
                            <span class="btm_Show-ele-deshktop">
                                From ${{ experience.price }}/person
                            </span>
                            <button @click="showBookDates" class="btn_Primary" id="showBookDates" data-id="37">
                                Show dates
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Show Date Area Popup -->
        <section class="modal fade exp_shw-date" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <img :src="`${baseURL}frontend/images/icons/close-show-date.png`" alt="close icn" />
                        </button>
                    </div>
                    <!-- Modal Body Start -->
                    <div class="modal-body">
                        <!-- Exp Show Ele Start -->
                        <div class="exp_shw-ele">
                            <!-- Container Area Start -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <!--events calendar shw Start-->
                                        <div class="corona_Events" id="avalaibleDates">
                                            <div class="corona_ele-list">
                                                    <div class="corona_ele-title">
                                                        <h4>{{ monthsName(currentMonth) }} - {{ currentYear }}</h4>
                                                        <div class="corona_ele-arrow">
                                                            <span class="corona_ele-lft" @click.prevent="backMonth()">
                                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="corona_ele-rght" @click.prevent="nextMonth()">
                                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Corona Ele Day Area Start -->
                                                    <div class="corona_ele-day">
                                                        <div class="corona_ele-item" v-for="(day,key) in daysName()" :key="key">
                                                            <div class="corona_nme-day">
                                                                {{ day }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Corona Ele Day Area Closed -->
                                                    <div class="corona_ele-item corona_Disabled"
                                                          v-for="(num,key) in monthStartDay"
                                                          :key="key+100"
                                                          data-action="back"
                                                         :data-date="num" :data-month="currentMonth" :data-year="currentYear">
                                                        <div class="corona_ele-mod">
                                                            {{ (lastMonthDays-monthStartDay)+num }}
                                                        </div>
                                                    </div>
                                                    <!-- Corona Ele Day Area Closed -->
                                                    <div class="corona_ele-item" v-for="(n,key) in currentMonthDays" :key="key+200">
                                                        <div
                                                            class="corona_ele-mod"
                                                            :class="addClass(currentYear+'-'+currentMonth+'-'+n)"
                                                            @click.prevent="chooseSingleDate(n)"
                                                            :data-value="n.toString().padStart(2, 0)"
                                                            :title="n+' '+currentMonth+' '+currentYear">
                                                            <span>{{ n }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                        <!--events calendar shw End-->
                                        <!--Pay Section shw Start-->
                                       <!-- Single :  {{ singleEventData }} -->
                                        <div id="cartPaySection" v-show="singleEventTrue" v-if="singleEventData.evnt">
                                               <div class="bking__Your--cart exp_cart_box">
                                                    <h2>Your Cart</h2>
                                                    <!-- Booking your cart item Area Start -->
                                                    <div class="your__Cart--item">
                                                        <h3>BOOKING FOR (
                                                            {{ $moment(singleEventData.evnt.year+'-'+singleEventData.evnt.month+'-'+singleEventData.evnt.date, "YYYY-MM-DD").format("DD-MMM-YYYY")
                                                             }} )
                                                         </h3>
                                                        <ul>
                                                            <li>
                                                                <span class="cart_item_title">Price</span>
                                                                <span class="cart_item_quantity">$( {{ guest.total }} × {{ singleEventData.experience.price }})</span>
                                                                <span class="cart_item_value"> ${{  (guest.total) * (singleEventData.experience.price) }}</span>
                                                            </li>
                                                             <li v-for="(ad,key) in singleEventData.adons" :key="key+12">
                                                                 <div v-if="ad.cart == true">
                                                                    <span class="cart_item_title">{{ ad.name }}</span>
                                                                    <span class="cart_item_quantity">$( {{ guest.total }} × {{ ad.price }})</span>
                                                                    <span class="cart_item_value">${{  ( guest.total ) * (ad.price) }}</span>
                                                                    <a href="javascript:void(0)" data-event_id="336" data-id="51"
                                                                    class="remove-link adon_remove_to_cart_icon">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                             </li>
                                                            <li>
                                                                <span class="cart_item_title">Net Pay </span>
                                                                <span class="cart_item_quantity"></span>
                                                                <span class="cart_item_value">$520</span>
                                                            </li>
                                                        </ul>
                                                        <!-- Payment Button Start-->
                                                        <div id="payment_form_container_div">
                                                            <button type="submit" class="stripe-button-el" style="visibility: visible;">
                                                            <span style="display: block; min-height: 30px;">Book Now</span>
                                                            </button>
                                                        </div>
                                                        <!-- Payment Button End-->
                                                    </div>
                                                    <!-- Booking your cart item Area Closed -->
                                                </div>
                                        </div>
                                        <!--Pay Section shw End-->
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <!-- Exp Show Available Closed -->
                                        <div class="exp_shw-avilble">
                                            <div class="exp_shw-slct">
                                                <h1>Next available</h1>
                                                <p>Select dates for availability.</p>
                                                <!--guests shw Start-->
                                                <div class="guests-shw" id="guestSection" v-show="singleEventTrue">
                                                    <button class="guests-shw-toggle" type="button" id="total_guest">{{ guest.title }}</button>
                                                    <!--guests shw menu Start-->
                                                    <ul class="guests-shw-menu" style="display: none;">
                                                        <li>
                                                            <div class="guests_menu-item">
                                                                <div class="guests_menu-label">
                                                                    Guests
                                                                </div>
                                                                <div class="guests_menu-qty">
                                                                    <button type="button" @click.prevent="guestMinus(1)" class="qty-minus">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input type="text" :value="guest.adults" class="qty-num">
                                                                    <button type="button" @click.prevent="guestPlus(1)" class="qty-plus">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="guests_menu-item">
                                                                <div class="guests_menu-label">
                                                                    Childrens
                                                                </div>
                                                                <div class="guests_menu-qty">
                                                                    <button type="button" @click.prevent="guestMinus(2)" class="qty-minus">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input type="text" :value="guest.childrens" class="qty-num">
                                                                    <button type="button" @click.prevent="guestPlus(2)" class="qty-plus">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="guests_menu-item">
                                                                <div class="guests_menu-label">
                                                                    Infants
                                                                </div>
                                                                <div class="guests_menu-qty">
                                                                    <button type="button" @click.prevent="guestMinus(3)" class="qty-minus">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input type="text" :value="guest.infants" class="qty-num">
                                                                    <button type="button" @click.prevent="guestPlus(3)" class="qty-plus">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div class="guests-shw-btn">
                                                            <button class="guests_shw-clear" @click.prevent="guestClear" type="button">Clear</button>
                                                            <button class="guests_shw-save"  @click.prevent="guestSave" type="button">Save</button>
                                                        </div>
                                                    </ul>
                                                    <!--guests shw menu Closed--></div>
                                                <!--guests shw Closed-->
                                            </div>
                                            <!--events shw Start-->
                                            <div class="exp_package-slct" id="avalaibleEvents"
                                                 v-show="singleEventTrue"
                                                 v-if="(Object.keys(eventsList).length) > 0">
                                                <div class="exp_package-item" v-if="singleEventData.evnt" >
                                                    <input type="hidden" value="333" id="selectedEvent">
                                                    <div class="exp_shwMod-title">
                                                        {{ $moment(singleEventData.evnt.year+'-'+singleEventData.evnt.month+'-'+singleEventData.evnt.date, "YYYY-MM-DD").format('dddd, MMM, DD YYYY') }}
                                                    </div>
                                                    <div class="exp_package-ele">
                                                        <div class="exp_package-mod">
                                                            <div class="exp_package-prson">$ {{ experience.price }} per person</div>
                                                            <div class="exp_package-join">
                                                                <span class="exp_package-item1">You Can Join with Max {{ experience.group_size }} guests</span>
                                                                <span class="exp_package-item2">Hosted in {{ experience.country }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{ singleEventData.adons }}
                                                    <div class="exp_adons_lists"
                                                         v-if="singleEventData.adons.length > 0">
                                                        <div class="bking__item--select" v-for="(evn,key) in singleEventData.adons" :key="key+333">
                                                            <div class="bking__item--title">
                                                                {{ evn.name }}
                                                            </div>
                                                            <div class="bking__item--body">
                                                                <div class="bking__item--desc">
                                                                   {{ evn.description }}
                                                                </div>
                                                                <div class="bking__item-doller">
                                                                    ${{ evn.price }}/Person
                                                                </div>
                                                                <div class="bking__item-select" id="booking__Filp1">
                                                                    <a href="javascript:void(0)"
                                                                       @click.prevent="addToCart(evn.id)"
                                                                       class="exp__Btn--primary adon_add_to_cart">
                                                                        Add to Cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="exp_package-slct" id="avalaibleEvents"  v-show="!singleEventTrue" v-if="(Object.keys(eventsList).length) > 0">
                                                <div class="exp_package-item"
                                                     v-for="(evnt,key) in eventsList" :key="key"
                                                     v-show="evnt.show"
                                                     >
                                                    <div class="exp_shwMod-title">
                                                        {{ $moment(evnt.year+'-'+evnt.month+'-'+evnt.date, "YYYY-MM-DD").format('dddd, MMM, DD YYYY') }}
                                                    </div>
                                                    <div class="exp_package-ele">
                                                        <div class="exp_package-mod">
                                                            <div class="exp_package-prson">${{ experience.price }} per person</div>
                                                            <div class="exp_package-join">
                                                                <span class="exp_package-item1">You Can Join with Max {{ experience.group_size }} guests</span>
                                                                <span class="exp_package-item2">Hosted in {{ experience.country }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="exp_package-chse">
                                                            <button class="btn-secondary"
                                                            :disabled="(checkEventPast(evnt.year+'-'+evnt.month+'-'+evnt.date) == true)"
                                                            @click.prevent="clickOneEvent( evnt.date )">
                                                               Choose
                                                             </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="exp_package-slct" id="avalaibleEvents"  v-if="(Object.keys(eventsList).length) == 0">
                                                <section class="no-exp-event">
                                                    <div class="no-event-select myac-nomsg ">
                                                        No booking date avaliable yet
                                                    </div>
                                                </section>
                                            </div>
                                            <!--events shw End-->
                                        </div>
                                        <!-- Exp Show Available Closed -->
                                    </div>
                                </div>
                            </div>
                            <!-- Container Area Closed -->
                        </div>
                        <!-- Exp Show Ele Closed -->
                    </div>
                    <!-- Modal Body Cloase -->
                </div>
                <!-- Modal content Closed-->
            </div>
        </section>

        <!-- Share Social Media-->
        <section class="modal fade share_Popup" id="shareIcon" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <img :src="`${baseURL}frontend/images/icons/close-show-date.png`" alt="close icn" />
                        </button>
                        <h4 class="modal-title">Share</h4>
                    </div>
                    <div class="modal-body">
                        <!--noindex-->
                        <ul class="social-share">
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry" rel="noopener" target="_blank"><span Class="facebook"> Facebook</span></a>
                            </li>
                            <li>
                                <a href="http://twitter.com/share?url=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry&amp;text=Lorem+Ipsum%26nbsp%3Bis+simply+dummy+text+of+the+printing+and+typesetting+industry.%0D%0A%0D%0ALorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+si..." rel="noopener" target="_blank"><span Class="twitter"> Twitter</span></a></li>
                            <li><a href="https://www.pinterest.com/pin/create/link/?url=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry&amp;media=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fuploads%2Fexperiences%2F75b509d5-b4c4-456b-baf6-489336dbd26e.jpg&amp;description=Lorem+Ipsum%26nbsp%3Bis+simply+dummy+text+of+the+printing+and+typesetting+industry.%0D%0A%0D%0ALorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+si..." rel="noopener" target="_blank"><span Class="pinterest"> Pinterest</span></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry&amp;title=Lorem+Ipsum+is+simply+dummy+text+of+the+printing+and+typesetting+industry&amp;summary=Lorem+Ipsum%26nbsp%3Bis+simply+dummy+text+of+the+printing+and+typesetting+industry.%0D%0A%0D%0ALorem+Ipsum+has+been+the+industry%26%2339%3Bs+standard+dummy+text+ever+si..." rel="noopener" target="_blank"><span Class="linked In"> Linked In</span></a></li>
                            <li><a href="whatsapp://send?text=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry" rel="noopener" target="_blank"><span Class="whatsapp"> Whats App</span></a></li>
                            <li><a href="https://telegram.me/share/url?url=http%3A%2F%2F61.246.140.190%2Fgodoexperience%2Fexperience%2Florem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry" rel="noopener" target="_blank"><span Class="telegram"> Telegram</span></a></li>
                        </ul>
                        <!--/noindex-->
                    </div>
                </div>
            </div>
        </section>
        <!-- Share Social Media Closed-->
   </div>
</template>
<script>

import SinglePageSlider from "./detail_sub_component/SinglePageSlider.vue";
import WhatToDo from "./detail_sub_component/WhatToDo.vue";
import Testimonials from "./detail_sub_component/Testimonials.vue";

export default {
    name : 'experienceDetailC',
    components : {
        SinglePageSlider,
        WhatToDo,
        Testimonials
    },
    data : function() {
        return {
            experience : [],
            experience_name : '',
            isShowingLoader : true,
            baseURL : this.$store.state.ASSET_BURL,
            currentMonth : this.$moment().format('MM'),
            currentYear :  this.$moment().format('YYYY'),
            currentMonthDays : 0,
            lastMonthDays : 0,
            monthStartDay : 0,
            existingSavedDates : [],
            eventsList : [],
            allEventsList : [],
            singleEventData : [],
            singleEventTrue : false,
            guest : {
                adults : 1,
                childrens : 0,
                infants : 0,
                total : 1,
                title : 'Guests'
            }

        }
    },
    methods: {
         showBookDates :function(){
             $('.exp_shw-date').modal('show');
         },
         addToCart :function(event_id){
             let ad = this.singleEventData.adons;
             Object.keys(ad).forEach(key => {
                 if(ad[key]['id'] == event_id){
                     ad[key]['cart'] = ( (ad[key]['cart'] == undefined) || (ad[key]['cart'] == false) )?true:false;
                 }
            });
             this.singleEventData.adons = ad;
         },
         guestPlus : function(type){
             if(type == 1){
                 this.guest.adults = (this.guest.adults)+1;
             }else if(type == 2){
                 this.guest.childrens = (this.guest.childrens)+1;
             }else if(type == 3){
                 this.guest.infants = (this.guest.infants)+1;
             }
             if(this.guest.total > 1){ this.guest.title = this.guest.total+' Guests';  }
             else{ this.guest.title = 'Guests'; }
         },
         guestMinus : function(type){
             if(type == 1 && this.guest.adults > 1){
                 this.guest.adults = (this.guest.adults) - 1;
             }else if(type == 2 && this.guest.childrens > 0){
                 this.guest.childrens = (this.guest.childrens) - 1;
             }else if(type == 3 && this.guest.infants > 0){
                 this.guest.infants = (this.guest.infants) - 1;
             }
             if(this.guest.total > 1){ this.guest.title = this.guest.total+' Guests';  }
             else{ this.guest.title = 'Guests'; }
         },
         guestSave : function(){
             this.guest.total = ( this.guest.adults + this.guest.childrens + this.guest.infants );
             if(this.guest.total > 1){ this.guest.title = this.guest.total+' Guests';  }
             else{ this.guest.title = 'Guests'; }
             $('.guests-shw-menu').hide();
         },
         guestClear : function(){
            this.guest = {
                adults : 1,
                childrens : 0,
                infants : 0,
                total : 1,
                title : 'Guests'
            }
             $('.guests-shw-menu').hide();
         },
         chooseSingleDate:function(d){
            let current = this.allEventsList[d];
            current = {
                [d] : current
            };
            this.eventsList = current;
            this.singleEventTrue = false;
            this.singleEventData = [];
         },
         clickOneEvent :function(evnt_date){
             let current = this.eventsList[evnt_date];
             let exp = { id : this.experience.id,price : this.experience.price }
             let evntSet = {
                 evnt : current,
                 adons : this.experience.adons,
                 experience : exp
             };
             this.singleEventData = evntSet;
             this.singleEventTrue = true;
         },
         getMonthStartDay :  function(month,year){
            let currentMonth = (month == undefined) ? this.$moment().format('MM') : month;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            let days = this.$moment(currentYear+'-'+currentMonth).startOf('month').format('d');
            this.monthStartDay = parseInt(days);
        },
        gettotalDaysInMonth : function(month,year){
            let currentMonth = (month == undefined) ? this.$moment().format('MM') : month;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            this.currentMonthDays = this.$moment(currentYear+'-'+currentMonth, "YYYY-MM").daysInMonth();
        },
        gettotalDaysInLastMonth : function(month,year){
            let currentMonth = ( (month == undefined) ? this.$moment().format('MM') : month) - 1;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            if(currentMonth == 0){
                currentMonth = 12;
                currentYear = currentYear - 1;
            }
            this.lastMonthDays = this.$moment(currentYear+'-'+currentMonth, "YYYY-MM").daysInMonth()
        },
        setValues : function(){

            let m = this.$moment(this.selectedMonth,'MMM').format('M');
            let y = this.selectedYear;

            this.getScheduleDates(y,m);
            this.getMonthStartDay( this.currentMonth ,this.currentYear );
            this.gettotalDaysInMonth( this.currentMonth ,this.currentYear );
            this.gettotalDaysInLastMonth( this.currentMonth ,this.currentYear );
        },
        daysName : function(){
            return {'01':'Sun','02':'Mon','03':'Tue','04':'Wed','05':'Thu','06':'Fri','07':'Sat'};
        },
        monthsName : function(code){
            code = parseInt(code);
            let nameList =  {
                '1':'January','2':'February','3':'March','4':'April','5':'May','6':'June',
                '7':'July','8':'August','9':'September','10':'October','11':'November','12':'December'
            };
            return nameList[code];
        },
         addClass : function(date){
            let cdate = this.$moment(date).format('YYYY-MM-DD');
            let d = this.$moment(date).format('D');
            let now = this.$moment().format('YYYY-MM-DD');

            var cls = ( this.existingSavedDates.includes(d) == true ) ? 'corona_Active':'corona_Disabled';
            if(now > cdate){
                return 'corona_Disabled '+cls;
            }else{
                return 'date_change_event '+cls;
            }
        },
        checkEventPast: function(date){
            let cdate = this.$moment(date).format('YYYY-MM-DD');
            let d = this.$moment(date).format('D');
            let now = this.$moment().format('YYYY-MM-DD');
            if(now > cdate){
                return true;
            }

        },
        getScheduleDates : function(yr,mt){
            let m = (mt!=undefined)?mt:this.currentMonth;
            let y = (yr!=undefined)?yr:this.currentYear;
            let payload = { id : this.experience.id,y : y,m:m}
            let $this = this;
            $this.isLoading = true;
            this.$store.dispatch('getScheduleDates',payload)
            .then(function(response){
                 $this.existingSavedDates = response.dates;
                 $this.eventsList = response.events;
                 $this.allEventsList = response.events;
                 $this.singleEventTrue = false;
                 $this.isLoading = false;
            });
        },
        getExperiencesList: function(){
          let $this = this;
          let experience_name = $this.$route.params.exp_slug;
          $this.experience_name = experience_name;

          $this.isShowingLoader = true;
          this.$store.dispatch('getSingleExperience',{slug:experience_name})
            .then(function(response){
                $this.experience = response;
                $this.manageOnChangeCalendar();
            }).
            catch(function(error){
                console.log(error)
            });
        },
        backMonth: function(){
            let b = parseInt(this.currentMonth) - 1;
            if(b <= 0){
                b = 12;
                this.currentYear  = parseInt(this.currentYear) - 1;
                this.currentMonth = b;
            }else if(b >= 13){
                b = 1;
                this.currentYear  = parseInt(this.currentYear) + 1;
                this.currentMonth = b;
            }else{
                this.currentMonth = b;
            }
            this.manageOnChangeCalendar(this.currentYear,this.currentMonth);
        },
        nextMonth: function(){
            let b = parseInt(this.currentMonth) + 1;
            if(b <= 0){
                b = 12;
                this.currentYear  = parseInt(this.currentYear) - 1;
                this.currentMonth = b;
            }else if(b >= 13){
                b = 1;
                this.currentYear  = parseInt(this.currentYear) + 1;
                this.currentMonth = b;
            }else{
                this.currentMonth = b;
            }
            this.manageOnChangeCalendar(this.currentYear,this.currentMonth);
        },
        manageOnChangeCalendar: function(Y,M){
            this.getScheduleDates(Y,M);
            this.gettotalDaysInMonth(M,Y);
            this.gettotalDaysInLastMonth(M,Y);
            this.getMonthStartDay(M,Y);
        }
    },
    created() {
        this.getExperiencesList();
    }
}
</script>
