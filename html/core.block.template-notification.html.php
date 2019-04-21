<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: template-notification.html.php 2838 2011-08-16 19:09:21Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if Phpfox::isUser()}
<ul class="user-sticky-bar-items">
    {if Phpfox::getUserBy('profile_page_id') > 0}
    {else}
    <li class="mr-1" id="hd-request">
        <a role="button"
            data-toggle="dropdown"
            class="notification-icon w-4"
            title="{_p var='friend_requests'}"
            data-panel="#request-panel-body"
            data-url="{url link='friend.panel'}">
            <span class="icon-olymp-happy-face-icon"></span>
            <span id="js_total_new_friend_requests" class="notify-number"></span>
        </a>
        <div class="dropdown-panel">
            <div class="dropdown-panel-header">
                <span>
                    {_p var='friend_requests'}
                    <span class="count-unread" id="js_total_friend_requests"></span>
                </span>
            </div>
            <div class="dropdown-panel-body" id="request-panel-body"></div>
             <div class="dropdown-panel-footer" id="request-panel-footer">
                 <a href="{url link='friend.accept'}" id="js_view_all_requests"></a>
             </div>
        </div>
    </li>
    <li class="mr-1" id="hd-message">
        <a role="button"
            class="notification-icon w-4"
            data-toggle="dropdown"
            title="{_p var='messages'}"
            data-panel="#message-panel-body"
            data-url="{url link='mail.panel'}">
            <span class="icon-olymp-chat---messages-icon"></span>
            <span id="js_total_new_messages" class="notify-number"></span>
        </a>
        <div class="dropdown-panel">
            <div class="dropdown-panel-header">
                <span>
                    {_p var='messages'}
                    <span class="count-unread" id="js_total_unread_messages"></span>
                </span>
            </div>
            <div class="dropdown-panel-body" id="message-panel-body"></div>
            <div class="dropdown-panel-footer {if !empty($aMessages)}one-el{/if}">
                <a role="button" onclick="$.ajaxCall('mail.markAllRead'); event.stopPropagation();" {if !empty($aMessages)}style="display:none;"{/if} data-action="mail_mark_all_read">
                    <span class="ico ico-check-circle-alt"></span>
                    {_p var='mark_all_read'}
                </a>
                <a href="{url link='mail'}">{_p var='view_all_messages'}</a>
             </div>
        </div>
    </li>
    <li class="mr-2" id="hd-notification">
        <a role="button"
            class="notification-icon w-4"
            data-panel="#notification-panel-body"
            title="{_p var='notifications'}"
            data-toggle="dropdown"
            data-url="{url link='notification.panel'}">
            <span class="icon-olymp-thunder-icon"></span>
            <span id="js_total_new_notifications" class="notify-number"></span>
        </a>
        <div class="dropdown-panel">
            <div class="dropdown-panel-header">
                <span>{_p var='notifications'}</span>
                <a role="button" onclick="$.ajaxCall('notification.markAllRead');event.stopPropagation();">{_p var='mark_all_read_notification'}</a>
            </div>
            <div class="dropdown-panel-body" id="notification-panel-body"></div>
            <div class="dropdown-panel-footer">
                <a href="{url link='notification'}">{_p var='view_all_notifications'}</a>
            </div>
        </div>
    </li>
    {/if}
    <li class="mr-1 user-icon s-4 avatar circle" id="hd-user">
        {img user=$aGlobalUser suffix='_50_square'}
    </li>
    <li class="settings-dropdown" id="hd-cof">
        <a href="#"
            class="notification-icon w-2"
            data-toggle="dropdown"
            type="button"
            aria-haspopup="true"
            aria-expanded="false">
            <span class="circle-background s-2">
                <span class="ico ico-angle-down"></span>
            </span>
        </a>

        {if Phpfox::getUserBy('profile_page_id') > 0}
        <ul class="dropdown-menu dropdown-menu-right dont-unbind">
            <li class="mr-1 user-icon avatar circle" id="user-photo">
                {img user=$aGlobalUser suffix='_120_square'}
                <div class="profile-info pr-7 py-1">
                    <div class="fullname"><a href="{url link='user.profile'}">{$aGlobalUser.full_name|clean}</a></div>
                </div>
                <div class="edit-page">
                    <a href="{url link='user.profile'}" class="no_ajax s-4 btn edit-btn">
                        <span class="icon-ic_edit_none_black_24px"></span>
                    </a>
                </div>
            </li>
            <li class="header_menu_user_link_page">
                <a href="#" onclick="$.ajaxCall('pages.logBackIn'); return false;">
                    <i class="ico ico-reply-o"></i>
                    {_p var='log_back_in_as_global_full_name'
                    global_full_name=$aGlobalProfilePageLogin.full_name|clean}
                </a>
            </li>
        </ul>
        {else}
        <ul class="dropdown-menu dropdown-menu-right dont-unbind">
            <li class="mr-1 user-icon avatar circle" id="user-photo">
                {img user=$aGlobalUser suffix='_120_square'}
                <div class="profile-info pr-7 py-1">
                    {if !empty($aUser.full_name)}
                    <div class="fullname"><a href="{url link='user.profile'}">{$aUser.full_name|clean}</a></div>
                    {/if}
                    {if !empty($aUser.title)}
                    <div class="memebership-level"><a href="{url link='user.profile'}">{_p var=$aUser.title}</a></div>
                    {/if}
                </div>
            </li>
            {if Phpfox::isModule('pages') && Phpfox::getUserParam('pages.can_add_new_pages')}
            <li>
                <a href="#" onclick="$Core.box('pages.login', 400); return false;">
                    <i class="ico ico-unlock-o"></i>
                    {_p var='login_as_page'}
                </a>
            </li>
            {/if}
            <li role="presentation">
                <a href="{url link='user.setting'}" class="no_ajax">
                    <i class="ico ico-businessman"></i>
                    {_p var='account_settings'}
                </a>
            </li>

            <li role="presentation">
                <a href="{url link='friend'}" class="no_ajax">
                    <i class="ico ico-user-couple"></i>
                    {_p var='manage_friends'}
                </a>
            </li>
            <li role="presentation">
                <a href="{url link='user.privacy'}" class="no_ajax">
                    <i class="ico ico-shield"></i>
                    {_p var='privacy_settings'}
                </a>
            </li>
            {if isset($showMembership)}
            <li role="presentation">
                <a href="{url link='subscribe'}">
                    <i class="ico ico-trophy-o"></i>
                    {_p var='membership'}
                </a>
            </li>
            {/if}
            {if Phpfox::isAdmin() }
            <li role="presentation">
                <a href="{url link='admincp'}" class="no_ajax">
                    <i class="ico ico-gear-o"></i>
                    {_p var='menu_admincp'}
                </a>
            </li>
            {/if}
            {plugin call='core.template_block_notification_dropdown_menu'}
            <li class="divider"></li>
            <li role="presentation">
                <a href="{url link='user.logout'}" class="no_ajax logout">
                    {_p var='logout'}
                </a>
            </li>
        </ul>
        {/if}
    </li>
</ul>
{else}
<div class="guest-login-small" data-component="guest-actions">
    {if Phpfox::getParam('user.allow_user_registration') && !Phpfox::getParam('user.invite_only_community')}
    <a class="btn btn-sm btn-default {if Phpfox::canOpenPopup('user.register')}popup{else}no_ajax{/if}"
       rel="hide_box_title visitor_form" role="link" href="{url link='user.register'}">
        {_p var='sign_up'}
    </a>
    {/if}
    <a class="btn btn-sm btn-success btn-gradient {if Phpfox::canOpenPopup('login')}popup{else}no_ajax{/if}"
       rel="hide_box_title visitor_form" role="link" href="{url link='login'}">
        {_p var='sign_in'}
    </a>
</div>
{/if}
