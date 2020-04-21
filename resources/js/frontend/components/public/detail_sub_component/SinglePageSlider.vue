<template>  
    <div v-if="experience.id">   

       <div class="col-md-12 gallery_One" v-if="experience.media.length == 0">  
            <div class="gallery_one-img gallery_Item">
                <a :href="experience.media.image" 
                    data-lightbox="gallery">
                    <img class="img-responsive lazy" alt="Slider Image" 
                         :data-original="experience.image" 
                         :src="experience.image" 
                         style="display: block;"> 
                </a>
                <div class="exp_column_four-share">
                    <a :href="experience.image" data-lightbox="gallery">
                    </a>
                    <ul class="single-share-wishlisth">
                        <a :href="experience.image" data-lightbox="gallery">
                        </a>
                        <li>
                            <a :href="experience.image" data-lightbox="gallery"></a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                <span>Share</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <span>Save</span>
                            </a> 
                        </li>
                    </ul>
                </div> 
            </div> 
        </div> 

        <div class="col-md-12 gallery_One" v-if="experience.media.length == 1"> 
            <div class="gallery_one-img gallery_Item">
                <a :href="experience.media[0].image" 
                    data-lightbox="gallery">
                    <img class="img-responsive lazy" alt="Slider Image" :data-original="experience.media[0].image" 
                    :src="experience.media[0].image" style="display: block;"> 
                </a>
                <div class="exp_column_four-share">
                    <a :href="experience.media[0].image" data-lightbox="gallery">
                    </a>
                    <ul class="single-share-wishlisth">
                        <a :href="experience.media[0].image" data-lightbox="gallery">
                        </a>
                        <li>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                <span>Share</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <span>Save</span>
                            </a> 
                        </li>
                    </ul>
                </div> 
            </div> 
        </div> 

        <div class="col-md-12 gallery_Two" v-if="experience.media.length == 2">
            <div class="row">
                <div v-for="(md,key)  in  experience.media" :class="`col-xs-6 col-sm-6 col-${key}`">
                    <div class="gallery_Two-img gallery_Item">
                        <a :href="md.image" data-lightbox="gallery">
                            <img class="img-responsive" alt="Slider Image" :src="md.image" style="display: block;">

                            <div class="exp_column_four-share" v-if="key == 1">
                                <ul class="single-share-wishlisth">
                                    <li>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                            <i class="fa fa-share-square-o" aria-hidden="true"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> Save
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 gallery_Three" v-if="experience.media.length == 3">
            <div class="row">
                <div v-for="(md,key)  in  experience.media" :class="`col-xs-6 col-sm-6 col-${key}`">
                    <div class="gallery_Three-img gallery_Item">
                        <a :href="md.image" data-lightbox="gallery">
                            <img class="img-responsive" alt="Slider Image" :src="md.image" style="display: block;">

                            <div class="exp_column_four-share" v-if="key == 2">
                                <ul class="single-share-wishlisth">
                                    <li>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                            <i class="fa fa-share-square-o" aria-hidden="true"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> Save
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 gallery_Four" v-if="experience.media.length == 4">
            <div class="row">
                <div v-for="(md,key)  in  experience.media" :class="`col-xs-3 col-sm-3 col-${key}`">
                    <div class="gallery_Four-img gallery_Item">
                        <a :href="md.image" data-lightbox="gallery">
                            <img class="img-responsive" alt="Slider Image" :src="md.image" style="display: block;">

                            <div class="exp_column_four-share" v-if="key == 3">
                                <ul class="single-share-wishlisth">
                                    <li>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                            <i class="fa fa-share-square-o" aria-hidden="true"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['/login','ref'=>(Yii::$app->request->url)]);?>">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> Save
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-md-12 gallery_Five" v-if="experience.media.length >= 5">
            <div class="exp_gallery_main">
                <div class="exp_column exp_column_one">
                    <a :href="experience.media[0].image" data-lightbox="gallery">
                        <img class="img-responsive lazy" alt="Slider Image" :data-original="experience.media[0].image" :src="experience.media[0].image" style="display: block;">
                    </a>
                </div>
                <div class="exp_column exp_column_two">
                    <a :href="experience.media[1].image" data-lightbox="gallery">
                        <img class="img-responsive lazy" alt="Slider Image" :data-original="experience.media[1].image" :src="experience.media[1].image" style="display: block;">
                    </a>
                </div>
                <div class="exp_column_third">
                    <div class="exp_inner_column">
                        <a :href="experience.media[2].image" data-lightbox="gallery">
                            <img class="img-responsive lazy" alt="Slider Image" :data-original="experience.media[2].image" :src="experience.media[2].image" style="display: block;">
                        </a>
                    </div>
                    <div class="exp_inner_column">
                        <a :href="experience.media[3].image" data-lightbox="gallery">
                            <img class="img-responsive lazy" alt="Slider Image" :data-original="experience.media[3].image" :src="experience.media[3].image" style="display: block;">
                        </a>
                    </div>
                </div>
                <div class="exp_column exp_column_four">
                    <a :href="experience.media[4].image" data-lightbox="gallery">
                        <img class="img-responsive" alt="Slider Image" :src="experience.media[4].image" style="display: block;">
                        <div class="exp_column_four-share">
                            <ul class="single-share-wishlisth">
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#shareIcon">
                                        <i class="fa fa-share-square-o" aria-hidden="true"></i> Share
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>Save
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div> 

    </div> 
</template>
<script> 
export default {
    name : 'singlePageSlider', 
    props: ['experience'],
    data : function() {
        return {

        } 
    }
}
</script>