<div id="{$group}-slider" class="owl-carousel dont-unbind dont-unbind-children">
    {foreach from=$sliders item=aItem}
        <div class="slider-item dont-unbind">
            {img path='core.url_pic' file='landing/'.$aItem.image_path server_id=$aItem.server_id}
            <div class="slider-detail dont-unbind">
                <div class="banner_text">
                    <h1 class="slider-item dont-unbind">{_p var=$aItem.title}</h1>
                    <h3 class="slider-desc dont-unbind">{_p var=$aItem.description}</h3>
                </div>
            </div>
        </div>
    {/foreach}
</div>

<script type="text/javascript">
    {literal}
    var init_owl_carousel = function(target){
        var owl = $(target);

        if(!owl.hasClass('owl-loaded')) {
            owl.addClass('dont-unbind-children');
            owl.owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                nav:true,
                dots: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
            owl.find('.owl-nav').addClass('dont-unbind').find('*').addClass('dont-unbind');
        }
    };
    var isImagesLoaded = function(target) {
        var images = $(target).find('img');
        if (!(images.length > 0)) {
            return true;
        }
        var loaded = false;
        images.each(function(){
            if ($(this).hasClass('built')) {
                loaded = true;
            } else {
                loaded = false;
            }
        });
        return loaded;
    };
    $Ready(function(){
        $('.owl-carousel').each(function(){
            var that = this;
            function checkCondition(){
                if(!isImagesLoaded(that)){
                    window.setTimeout(checkCondition, 1500);
                }
                else {
                    init_owl_carousel(that);
                }
            }
            window.setTimeout(checkCondition, 1500);
        });
    });
    {/literal}
</script>
