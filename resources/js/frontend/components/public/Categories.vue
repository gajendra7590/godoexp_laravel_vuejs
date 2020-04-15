<template>
    <div>
        <section class="features__Search sub__Category--banner" 
                 :style="{ backgroundImage: `url(${oneCategory.image})` }"
                 >
            <div class="features__Search__Content"> 
                <h1>{{ oneCategory.title }}</h1>
            </div>
        </section> 
        <main id="main__Content">
            <!-- Sub Ctgry About Area Start -->
            <section class="sub__Ctgry--abut">
                <div class="container">
                    <div class="row cst__Row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                            <div class="sub__Abut--title">
                                <h2>{{ oneCategory.title }}</h2>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                            <div class="sub__Abut--content">
                                <h1>{{ oneCategory.description }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <!-- Top Rated Exp Area Start -->
            <section class="rted__Exp">
                <div class="container">
                    <div class="listing__Title">
                        <h3>All Categories</h3>
                    </div>

                    <div class="rted__Exp--content cst__Row" v-show="isShowingCat">
                        <div v-for="n in 10" class="rted__Exp--col cst__Col"> 
                            <content-placeholders :rounded="true">
                                <content-placeholders-img style="height:350px;" /> 
                                <content-placeholders-text :lines="3" /> 
                            </content-placeholders> 
                        </div> 
                    </div>  
                    <div class="rted__Exp--content cst__Row">  
                        <div v-for="(category,key) in categories" class="rted__Exp--col cst__Col">
                            <div class="rted__Exp--item">
                                <router-link :to="{ name : 'experiences_list_by_cat',params: { category_name : category.slug } }">
                                    <figure class="rted__Exp--img">
                                        <img v-lazy="category.image" 
                                          class="img-responsive" 
                                          :alt="category.title"
                                           :src="category.image"> 
                                    </figure>
                                    <div class="exp_count category_name_title">{{ category.total_exp }}+ Experiences </div>
                                </router-link>
                                <p title="">
                                    <router-link :to="{ name : 'experiences_list_by_cat',params: { category_name : category.slug } }">
                                        {{ category.title }}
                                    </router-link> 
                                </p>
                            </div> 
                        </div>  


                    </div>
                </div>
            </section>
            <!-- Top Rated Exp Area Closed -->
        </main>
    </div>
</template>
<<script>
export default {
    name : 'categoriesC',
    data : function() {
        return {
            categories : [],
            load : false,
            oneCategory : [],
            isShowingCat : true
        } 
    },
    methods: {
        getCategoriesList(){
          let $this = this;
          $this.isShowingCat = true;
          this.$store.dispatch('getAllCategories',{})
            .then(function(response){
                $this.categories = response;   
                if($this.load == false){
                    $this.load = true;
                    $this.oneCategory = response[0];
                    $this.isShowingCat = false;
                }          
            }).
            catch(function(error){
                console.log(error) 
            });
        }
    },
    created() {
        this.getCategoriesList();         
    },
}
</script>