{if !empty($aItems)}
<div class="section-coll">
    <div class="container-fluid">
        <div class="row">
            {foreach from=$aItems item=aItem}
            <div class="col-md-3">
                <div class="info align-center">
                    <div class="icon">
                        {if !empty($aItem.link)}
                        <a href="{$aItem.link}" target="_blank">
                            {img path='core.url_pic' file='landing/'.$aItem.image_path server_id=$aItem.server_id suffix='_120' max_width=62}
                        </a>
                        {else}
                        {img path='core.url_pic' file='landing/'.$aItem.image_path server_id=$aItem.server_id suffix='_120' max_width=62}
                        {/if}
                    </div>
                    <h4 class="info-title">
                        {if !empty($aItem.link)}
                        <a href="{$aItem.link}" target="_blank">
                            {_p var=$aItem.title}
                        </a>
                        {else}
                        {_p var=$aItem.title}
                        {/if}
                    </h4>
                    <p>{_p var=$aItem.description}</p>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
</div>
{/if}