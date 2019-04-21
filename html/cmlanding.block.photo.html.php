{if !empty($aPhotos)}
<div class="section section-photo">
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="section_heading wow animated fadeInUp">
                <h2 class="heading">{$sTitle}</h2>
            </div>
            <div class="section_text">
                <a style="" href="{$sViewMoreUrl}" class="btn btn-primary btn-round">{phrase var='View more'}</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            {foreach from=$aPhotos item=aPhoto}
            <div class="col-md-3  col-sm-6 item element-item">
                <div class="recent_wrap">
                    <div class="recent_img">
                <a href="{$aPhoto.link}">
                    {if $aPhoto.can_view}
                    <span class="img" style="background-image: url({img server_id=$aPhoto.server_id path='photo.url_photo' file=$aPhoto.destination suffix='_500' title=$aPhoto.title return_url=true}); display: block; width: 360px; height: 260px; background-position: center; background-size: cover"></span>
                    {else}
                    <div class="photo_mature photo_mature_{$aPhoto.mature}">
                        <i class="fa fa-warning"></i>
                    </div>
                    {/if}
                </a>
                {if !empty($aPhoto.album_id)}
                <div class="recent_hover">
                    <a href="{$aPhoto.album_url}">{$aPhoto.album_title|convert|clean|split:45|shorten:75:'...'}</a>
                </div>
                {/if}
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
</div>
{/if}