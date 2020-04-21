<template>
    <div id="homeComponent">
        <section class="features__Search" style="background: #000 url(http://61.246.140.190/godoexperience/asset/images/background/banner4.jpg);">
            <div class="features__Search__Content">
                <h1>Go Do Experiences are vetted for quality</h1> 
                <div class="features__Search__Input features__mod">
                <input class="form-control" placeholder="Search" type="text">
                </div>
                <div class="features__Search__Input">
                <input class="form-control" placeholder="mm/dd/yyyy" type="text">
                <button>Search</button>
                </div>
            </div>
        </section>  

        <main id="main__Content">
            <div class="hm__Block">
                <!-- Activities Category Area Start -->
                <section class="activities__Catgry">
                    <div class="container">
                        <div class="activities__Catgry--title">
                            <h2>One-of-a-kind activities hosted by locals</h2>
                        </div>
                        <div class="row cst__Row" v-show="isShowingCat">
                            <div v-for="n in 3" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 cst__Col"> 
                                <content-placeholders :rounded="true">
                                    <content-placeholders-img style="height:300px;" /> 
                                    <content-placeholders-text :lines="3" /> 
                                </content-placeholders> 
                            </div> 
                        </div> 
                        <div class="row cst__Row">  
                            <div v-for="(category,key) in homeData.top_categories" :key="key"
                                class="col-xs-12 col-sm-4 col-md-4 col-lg-4 cst__Col"> 
                                <div class="activities__Catgry--content">
                                    <figure class="activities__Catgry--img">
                                        <router-link :to="{name : 'experiences_list_by_cat',params: { category_name: category.slug }}"> 
                                            <img v-lazy="category.image" class="img-responsive lazy" 
                                                 alt="Adventures"  
                                                 :src="category.image" 
                                                 style="display: block;"> 
                                            <p class="figcation">{{ category.name }}</p>
                                        </router-link>
                                    </figure>
                                    <div class="activities__Catgry--link">
                                        <span class="cat_exp_count">{{ category.total_exp }}+ Experiences</span>
                                        <router-link :to="{name : 'experiences_list_by_cat',params: { category_name: category.slug }}">
                                            {{ category.name }}
                                        </router-link>
                                        <span> 
                                            {{ category.title }}
                                        </span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="clearfix"></div>
                        <div class="row cst__Row">
                            <div class="col-sm-12 cst__Col">
                                <div class="show__all--exp">
                                <router-link 
                                     :to="{name : 'experience_categories_list'}"
                                     title="Show All Categories"
                                     class="exp__Btn--outline"> 
                                       Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </router-link>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Activities Category Area Closed -->
                <div class="clearfix"></div>
                <!-- Meet Host World Area Start-->
                <section class="meet__Host--world">
                    <div class="container">
                        <div class="listing__Title">
                            <h3>Meet hosts around the world</h3>
                        </div>

                        <div class="meet__Host--content cst__Row" v-show="isShowingCat">
                            <div v-for="n in 5" class="meet__Host--col cst__Col"> 
                                <content-placeholders :rounded="true">
                                    <content-placeholders-img style="height:350px;" /> 
                                    <content-placeholders-text :lines="3" /> 
                                </content-placeholders> 
                            </div> 
                        </div> 

                        <div class="meet__Host--content cst__Row">  
                            <div v-for="(experience,key) in homeData.top_world_around_experiences" :key="key" 
                            class="meet__Host--col cst__Col">
                                <div class="meet__Host--item">
                                    <router-link :to="{ name : 'experiences_detail',params: { exp_slug : experience.slug } }">
                                        <div class="meet__Host--img"> 
                                            <img v-lazy="experience.image" class="img-responsive" alt="experience.title" :src="experience.image"> 
                                        </div>
                                        <p class="category_name_title">{{ experience.category.name }}</p>
                                        <p class="exp_title" :title="experience.title">{{ experience.title }}</p>
                                        <span>From  ${{ experience.price }}/ person . {{ experience.duration+' '+experience.duration_type }}</span>
                                    </router-link>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row cst__Row">
                            <div class="col-sm-12 cst__Col">
                                <div class="show__all--exp">
                                    <router-link 
                                     :to="{ name : 'experiences_list' }"
                                     title="Show All Categories"
                                     class="exp__Btn--outline"> 
                                       Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Meet Host World Area Closed -->
                <div class="clearfix"></div>
                <!-- Features Exp Area Start -->
                <section class="features__Exp">
                    <div class="container">
                        <div class="row cst__Row">
                            <div class="col-sm-12 cst__Col">
                                <div class="listing__Title">
                                    <h3>Our Features Experience</h3>
                                </div>
                            </div>

                            <div class="features__Exp--content" v-show="isShowingCat">
                                <div v-for="n in 4" class="cst__Col col-xs-6 col-sm-6 col-md-4 col-lg-3"> 
                                    <content-placeholders :rounded="true">
                                        <content-placeholders-img style="height:300px;" /> 
                                        <content-placeholders-text :lines="3" /> 
                                    </content-placeholders> 
                                </div> 
                            </div> 

                            <div class="features__Exp--content"> 
                                <div v-for="(experience,key) in homeData.top_featured_experiences" class="cst__Col col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <div class="features__Exp--item">
                                         <router-link :to="{ name : 'experiences_detail',params: { exp_slug : experience.slug } }">
                                            <div class="features__Exp--img"> 
                                                <img v-lazy="experience.image" class="img-responsive" alt="experience.title" :src="experience.image">  
                                            </div>
                                            <p class="category_name_title">{{ experience.category.name }}</p>
                                            <div class="features__Exp--details">
                                                <div class="features__Exp--title" :title="experience.title">
                                                    {{ experience.title }}
                                                </div>
                                                <div class="features__Exp--rating"> <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>4.97</span>
                                                </div>
                                            </div>
                                            <span class="price__Item--prduct">
                                                From  ${{ experience.price }}/ person . {{ experience.duration+' '+experience.duration_type }}
                                            </span>
                                        </router-link> 
                                    </div>
                                </div> 

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row cst__Row">
                            <div class="col-sm-12 cst__Col">
                                <div class="show__all--exp">
                                   <router-link 
                                     :to="{ name : 'experiences_list' }"
                                     title="Show All Categories"
                                     class="exp__Btn--outline"> 
                                       Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
                <!-- Features Exp Area Closed -->
                <!-- Top Rated Exp Area Start -->
                <section class="rted__Exp">
                    <div class="container">
                        <div class="listing__Title">
                            <h3>Top-rated experiences</h3>
                        </div>

                        <div class="rted__Exp--content cst__Row" v-show="isShowingCat">
                            <div v-for="n in 5" class="rted__Exp--col cst__Col"> 
                                <content-placeholders :rounded="true">
                                    <content-placeholders-img style="height:300px;" /> 
                                    <content-placeholders-text :lines="3" /> 
                                </content-placeholders> 
                            </div> 
                        </div> 


                        <div class="rted__Exp--content cst__Row">   
                            <div v-for="(experience,key) in homeData.top_rated_experiences" class="rted__Exp--col cst__Col">
                                <div class="rted__Exp--item">
                                    <router-link :to="{ name : 'experiences_detail',params: { exp_slug : experience.slug } }">
                                        <figure class="rted__Exp--img">
                                           <img v-lazy="experience.image" class="img-responsive" :alt="experience.title" :src="experience.image">                                            
                                        </figure>
                                        <p class="category_name_title">{{ experience.category.name }}</p>
                                        <p class="exp_title" :title="experience.title">{{ experience.title }}</p>
                                        <span>From  ${{ experience.price }}/ person . {{ experience.duration+' '+experience.duration_type }}</span>
                                    </router-link> 
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row cst__Row">
                            <div class="col-sm-12 cst__Col">
                                <div class="show__all--exp">
                                     <router-link 
                                     :to="{ name : 'experiences_list' }"
                                     title="Show All Categories"
                                     class="exp__Btn--outline"> 
                                       Show all <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Top Rated Exp Area Closed -->
                <div class="clearfix"></div> 
            </div>
        </main> 
    </div>
</template>
<script>
export default {
    name : 'homeComponent',
    data : function() {
        return {
            isShowingCat : true,
            homeData : []
        } 
    },
    methods: {
        getHomeData(){ 
            let $this = this;
            this.isShowingCat = true;
            this.$store.dispatch('getExperiencesHome',{})
            .then(function(response){
                $this.homeData = response; 
                $this.isShowingCat = false;                 
            }).
            catch(function(error){
                console.log(error) 
            });
        }
    },
    created() {
        this.getHomeData();
    },
}
</script>