<div class="section-users">
    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="section_heading wow animated fadeInUp">
                <h2 class="title">{$title}</h2>
            </div>
        </div>
        {if !empty($users)}
        <div class="row">
            <?php
            $index = 0;
            ?>
            {foreach from=$users item=aUser}
            <div class="col-md-3 col-sm-6 col-xs-12 item">
                <div class="we_are_detail wow animated fadeInUp">
                    <div class="about_us_img">
                        <a href="{url link = $aUser.user_name}" class="avatar card-image">
                            {$aUser.profile_image}
                        </a>
                    </div>
                        <h5 class="card-title">{$aUser.full_name}</h5>
                        <p class="category text-muted">{$aUser.total_friend} {phrase var='friend.menu_friend_friends_532c28d5412dd75bf975fb951c740a30'}</p>
                </div>
            </div>
            <?php
            $index++;
            if ($index % 4 == 0):
                ?>
                <div class="clearfix visible-md visible-lg"></div>
            <?php endif;
            if ($index % 2 == 0):
                ?>
                <div class="clearfix visible-sm"></div>
            <?php endif;?>
            {/foreach}
        </div>
        {/if}
        <div class="clear"></div>
    </div>
</div>