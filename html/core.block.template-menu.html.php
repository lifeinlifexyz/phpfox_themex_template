<?php

defined('PHPFOX') or exit('NO DICE!');

?>

{if $bOnlyMobileLogin}
	<ul class="nav navbar-nav visible-xs visible-sm site-menu site_menu">
		<li>
			<div class="login-menu-btns-xs clearfix">
				<div class="{if Phpfox::getParam('user.allow_user_registration') && !Phpfox::getParam('user.invite_only_community')}div01{/if}">
					<a class="btn btn01 btn-success text-uppercase {if Phpfox::canOpenPopup('login')}popup{else}no_ajax{/if}" rel="hide_box_title visitor_form" role="link" href="{url link='login'}">
						<i class="fa fa-sign-in"></i> {_p var='login_singular'}
					</a>
				</div>
				{if Phpfox::getParam('user.allow_user_registration') && !Phpfox::getParam('user.invite_only_community')}
				<div class="div02">
					<a class="btn btn02 btn-warning text-uppercase {if Phpfox::canOpenPopup('login')}popup{else}no_ajax{/if}" rel="hide_box_title visitor_form" role="link" href="{url link='user.register'}">
						{_p var='register'}
					</a>
				</div>
				{/if}
			</div>
		</li>
	</ul>
{else}
	{plugin call='core.template_block_template_menu_1'}
<ul class="nav navbar-nav visible-xs visible-sm site_menu">
    	<span class="btn-close">
			<span class="ico ico-close"></span>
		</span>
    {if Phpfox::isUser() && Phpfox::getUserParam('search.can_use_global_search')}
    <li class="visible-xs">
        <div class="user-menu-item" id="menu-image">
            {img user=$aGlobalUser suffix='_50_square'}
            <span>{$aGlobalUser.full_name}</span>
        </div>
    </li>
    {/if}
    {if !Phpfox::isUser()}
    <li>
        <div class="login-menu-btns-xs clearfix">
            <div class="{if Phpfox::getParam('user.allow_user_registration') && !Phpfox::getParam('user.invite_only_community')}div01{/if}">
                <a class="btn btn01 text-uppercase {if Phpfox::canOpenPopup('login')}popup{else}no_ajax{/if}"
                   rel="hide_box_title" role="link" href="{url link='login'}">
                    <i class="fa fa-sign-in"></i> {_p var='login_singular'}
                </a>
            </div>
            {if Phpfox::getParam('user.allow_user_registration') && !Phpfox::getParam('user.invite_only_community')}
            <div class="div02">
                <a class="btn btn02 text-uppercase {if Phpfox::canOpenPopup('login')}popup{else}no_ajax{/if}"
                   rel="hide_box_title" role="link" href="{url link='user.register'}">
                    {_p var='register'}
                </a>
            </div>
            {/if}
        </div>
    </li>
    {/if}
    {if Phpfox::getUserBy('profile_page_id') <= 0 && isset($aMainMenus)}
    {plugin call='theme_template_core_menu_list'}
    {if ($iMenuCnt = 0)}{/if}
    {foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
    {if !isset($aMainMenu.is_force_hidden)}
    {iterate int=$iMenuCnt}
    {/if}
    <li rel="menu{$aMainMenu.menu_id}" {if (isset($iTotalHide) && isset($iMenuCnt) && $iMenuCnt> $iTotalHide)}
        style="display:none;" {/if} {if (($aMainMenu.url == 'apps' && count($aInstalledApps)) ||
        (isset($aMainMenu.children) && count($aMainMenu.children))) ||
        (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) &&
        isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' &&
        count($aInstalledApps))} explore_apps{/if}"{/if}>
        <a {if !isset($aMainMenu.no_link) || $aMainMenu.no_link !=true}href="{url link=$aMainMenu.url}" {else}
           href="#" onclick="return false;" {/if} class="{if isset($aMainMenu.is_selected) &&
        $aMainMenu.is_selected} menu_is_selected {/if}{if isset($aMainMenu.external) && $aMainMenu.external ==
        true}no_ajax_link {/if}ajax_link">
        {if isset($aMainMenu.mobile_icon) && $aMainMenu.mobile_icon}
        <i class="fa fa-{$aMainMenu.mobile_icon}"></i>
        {else}
        <i class="fa fa-list"></i>
        {/if}
        {_p var=$aMainMenu.var_name}{if isset($aMainMenu.suffix)}{$aMainMenu.suffix}{/if}
        </a>
    </li>
    {/foreach}
    {/if}
</ul>

<ul class="nav navbar-nav visible-md visible-lg site_menu" data-component="menu">
    <div class="overlay"></div>
    {if Phpfox::getUserBy('profile_page_id') <= 0 && isset($aMainMenus)}
    {plugin call='theme_template_core_menu_list'}
    <li><a role="button" title="{_p('menu')}"
           class="btn-abr collapsed"
           href="#site-menu"
           data-toggle="collapse"
           data-panel="#menu-panel-body"
           data-url="{url link='mail.panel'}"
           aria-expanded="false"><span class="icon-olymp-menu-icon"></span></a></li>
    {foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
    <li rel="menu{$aMainMenu.menu_id}" {if (($aMainMenu.url==
    'apps' && count($aInstalledApps)) || (isset($aMainMenu.children) && count($aMainMenu.children))) ||
    (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) &&
    isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' && count($aInstalledApps))}
    explore_apps{/if}"{/if}>
    <a {if !isset($aMainMenu.no_link) || $aMainMenu.no_link !=true}href="{url link=$aMainMenu.url}" {else} href="#"
       onclick="return false;" {/if} class="{if isset($aMainMenu.is_selected) && $aMainMenu.is_selected}
    menu_is_selected {/if}{if isset($aMainMenu.external) && $aMainMenu.external == true}no_ajax_link
    {/if}ajax_link" title="{_p var=$aMainMenu.var_name}">
    {if isset($aMainMenu.mobile_icon) && $aMainMenu.mobile_icon}
    <i class="fa fa-{$aMainMenu.mobile_icon}"></i>
    {else}
    <i class="fa fa-list"></i>
    {/if}
    </a>
    </li>
    {/foreach}
    <li class="hide explorer">
    </li>
    {/if}
</ul>

<div id="site-menu" class="collapse" aria-expanded="true">
<ul class="nav navbar-nav visible-md visible-lg site_menu" data-component="menu">
    <div class="overlay"></div>
    {if Phpfox::getUserBy('profile_page_id') <= 0 && isset($aMainMenus)}
    {plugin call='theme_template_core_menu_list'}
    <li><a role="button" title="{_p('menu')}"
           class="btn-abr collapsed"
           href="#site-menu"
           data-toggle="collapse"
           data-panel="#menu-panel-body"
           data-url="{url link='mail.panel'}"
           aria-expanded="false"><span class="icon-olymp-close-icon"></span>Collapse Menu</a></li>
    {foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
    <li rel="menu{$aMainMenu.menu_id}" {if (($aMainMenu.url==
    'apps' && count($aInstalledApps)) || (isset($aMainMenu.children) && count($aMainMenu.children))) ||
    (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) &&
    isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' && count($aInstalledApps))}
    explore_apps{/if}"{/if}>
    <a {if !isset($aMainMenu.no_link) || $aMainMenu.no_link !=true}href="{url link=$aMainMenu.url}" {else} href="#"
       onclick="return false;" {/if} class="{if isset($aMainMenu.is_selected) && $aMainMenu.is_selected}
    menu_is_selected {/if}{if isset($aMainMenu.external) && $aMainMenu.external == true}no_ajax_link
    {/if}ajax_link">
    {if isset($aMainMenu.mobile_icon) && $aMainMenu.mobile_icon}
    <i class="fa fa-{$aMainMenu.mobile_icon}"></i>
    {else}
    <i class="fa fa-list"></i>
    {/if}
    {_p var=$aMainMenu.var_name}{if isset($aMainMenu.suffix)}{$aMainMenu.suffix}{/if}
    </a>
    </li>
    {/foreach}
    <li class="hide explorer">

    </li>
    {/if}
</ul>
</div>
{/if}