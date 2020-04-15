<template>
    <div>
        <section class="features__Search sub__Category--banner" 
                 :style="{ backgroundImage: `url(${oneExp.image})` }">
            <div class="features__Search__Content">
                <h1>
                  {{ oneExp.title }}
                </h1>
            </div>
        </section>

        <main id="main__Content">
            <!-- Sub Ctgry About Area Start -->
            <section class="sub__Ctgry--abut">
                <div class="container">
                    <div class="row cst__Row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                            <div class="sub__Abut--title">
                                <h2>
                                   {{ oneExp.title }}
                                </h2>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                            <div class="sub__Abut--content">
                                <p> {{ oneExp.sub_title }}</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
            <!-- Sub Ctgry About Area Closed -->
            <div class="clearfix"></div>
            <!-- Features Exp Area Start -->
            <section class="features__Exp">
                <div class="container">
                    <div class="listing__Title">
                        <h3>Experience List</h3>
                    </div>
                    <div class="features__Exp--content">

                       <div class="row cst__Row" v-show="isShowingLoader">
                            <div v-for="n in 8" class="col-xs-6 col-sm-6 col-md-4 col-lg-3 cst__Col"> 
                                <content-placeholders :rounded="true">
                                    <content-placeholders-img style="height:350px;" /> 
                                    <content-placeholders-text :lines="3" /> 
                                </content-placeholders> 
                            </div> 
                        </div>  
                    
                        <div class="row cst__Row"> 
                            <div v-for="(experience,key) in experiences" class="col-xs-6 col-sm-6 col-md-4 col-lg-3 cst__Col">
                                <div class="features__Exp--item">
                                    <router-link :to="{ name : 'experiences_detail',params: { exp_slug : experience.slug } }">
                                        <div class="features__Exp--img">
                                          <img v-lazy="experience.image" 
                                          class="img-responsive" 
                                          :alt="experience.title"
                                           :src="experience.image">  
                                        </div>
                                        <div class="features__Exp--details">
                                            <p class="category_name_title">
                                                {{ experience.category.name }}
                                            </p>
                                            <div class="features__Exp--title" :title="experience.title">
                                                {{ experience.title }}
                                            </div>
                                            <div class="features__Exp--rating">
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <span>4.87</span>
                                            </div>
                                        </div>
                                    </router-link>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!-- Features Exp Area Closed --> 
        </main>
    </div>
</template>
<<script>
export default {
    name : 'experiencesC',
    data : function() {
        return {
            experiences : [],
            load : false,
            oneExp : [],
            isShowingLoader : true
        } 
    },
    methods: {
        getExperiencesList(){
          let $this = this;
          $this.isShowingLoader = true;
          this.$store.dispatch('getAllExperiences',{})
            .then(function(response){
                $this.experiences = response;   
                if($this.load == false){
                    $this.load = true;
                    $this.oneExp = response[0];
                    $this.isShowingLoader = false
                }          
            }).
            catch(function(error){
                console.log(error) 
            });
        }
    },
    created() {
        this.getExperiencesList();         
    },
}
</script>