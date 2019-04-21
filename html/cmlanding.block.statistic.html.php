<div class="container-fluid">
    <div class="col-md-8 col-md-offset-2">
        <div class="section_heading wow animated fadeInUp">
            <h2 class="heading">{_p var='advantages_and_achievements'}</h2>
        </div>
    </div>
</div>
{foreach from=$statistics item=aItem}
<div class="col-sm-6 col-md-3 col-lg-3">
    <div class="we_do_detail wow animated fadeInUp">
        <div class="we_do_detail_m">
            <i class="fa fa-{$aItem.icon}"></i>
            <h6 class='heading'>{_p var=$aItem.title}</h6>
            <div class="we_do_content">{$aItem.count}</div>
        </div>
    </div>
</div>
{/foreach}
