/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

define([
    "jquery",
    "jquery/ui"
], function ($) {
    'use strict';

    $.widget('cs.cookieNotice', {
        _init: function () {
            var self = this;
            window.onpaint = self.checkCookie();

            if (self.options.autoHideMessage != 0) {
                self.autoHideMessage(self.options.autoHideMessage);
            }

            $('.btn-accept').click(function () {
                $('#cs-cookie-notice').css("display", "none");
                self.setCookie('cookienotice', 'cs', 180);
            });
        },

        autoHideMessage: function (seconds) {
            if (seconds != 0) {
                setTimeout(function () {
                    $('#cs-cookie-notice').fadeOut('fast');
                }, seconds);
            }
        },

        setCookie: function (cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        },

        getCookie: function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        },

        checkCookie: function () {
            var self = this;
            var cookienotice = self.getCookie("cookienotice");
            if (cookienotice == "") {
                $.each(self.options.position, function ($key, $value) {
                    $('#cs-cookie-notice').css($key, $value);
                });
                $('#cs-cookie-notice').css("background-color", self.options.backgroundColor);
                $('#cs-cookie-notice .title').css("color", self.options.titleColor);
                $('#cs-cookie-notice .content').css("color", self.options.contentColor);
                $('#cs-cookie-notice .btn-accept').css({
                    "color":self.options.acceptButtonColor, "background-color": self.options.acceptButtonBackgroundColor
                });
                $('#cs-cookie-notice .btn-more-info').css({
                    "color":self.options.moreInfoColor, "background-color": self.options.moreInfoBackgroundColor
                });
                $('#cs-cookie-notice').css("display", "block");
            }
        }

    });
    return $.cs.cookieNotice;
});
