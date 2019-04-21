{if !empty($aItems)}
{foreach from=$aItems item=aItem}
<div class="section-row image-{$aItem.image_position}" {if $aItem.background}style="background: {$aItem.background}"{/if}>
    <div class="container-fluid">
        <div class="row">
            {if $aItem.image_position == 'right'}
            <div class="col-md-6 vc_custom_1509964732428">
                <h3 class="title">
                    {if !empty($aItem.link)}
                    <a href="{$aItem.link}" target="_blank">{_p var=$aItem.title}</a>
                    {else}
                    {_p var=$aItem.title}
                    {/if}
                </h3>
                <h6 class="description subtitle">{_p var=$aItem.subtitle}</h6>
                <h5 class="description">{_p var=$aItem.description}</h5>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    {if !empty($aItem.link)}
                    <a href="{$aItem.link}" target="_blank">
                        {img server_id=$aItem.server_id title=$aItem.title path='core.url_pic' file='landing/'.$aItem.image_path}
                    </a>
                    {else}
                    {img server_id=$aItem.server_id title=$aItem.title path='core.url_pic' file='landing/'.$aItem.image_path}
                    {/if}
                </div>
            </div>
            {else}
            <div class="col-md-7">
                <div class="image-container">
                    {if !empty($aItem.link)}
                    <a href="{$aItem.link}" target="_blank">
                        {img server_id=$aItem.server_id title=$aItem.title path='core.url_pic' file='landing/'.$aItem.image_path}
                    </a>
                    {else}
                    {img server_id=$aItem.server_id title=$aItem.title path='core.url_pic' file='landing/'.$aItem.image_path}
                    {/if}
                </div>
            </div>
            <div class="col-md-5 vc_custom_1509964732428">
                <div class="section-description">
                    <h3 class="title">
                        {if !empty($aItem.link)}
                        <a href="{$aItem.link}" target="_blank">
                            {_p var=$aItem.title}
                        </a>
                        {else}
                        {_p var=$aItem.title}
                        {/if}
                    </h3>
                    <h6 class="description subtitle">{_p var=$aItem.subtitle}</h6>
                    <h5 class="description">{_p var=$aItem.description}</h5>
                </div>
            </div>
            {/if}
        </div>
    </div>
</div>
{/foreach}
{/if}