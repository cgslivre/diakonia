document.addEventListener('DOMContentLoaded', function() {
    M.updateTextFields();
}, false);

// Busca pelo menus recolhíveis
var collapsibleMenus = document.querySelectorAll('.collapsible');

var optionsCollapsibleMenu = {
    accordion: true
};
collapsibleMenus.forEach(
    function(currentValue, currentIndex, listObj) {
        var instance = new M.Collapsible(currentValue, optionsCollapsibleMenu);
    }
);

$(function() {

    "use strict";

    var window_width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var openIndex;

    $('.nav-collapsible .navbar-toggler').on('click', function() {
        // Set index value 
        getCollapseIndex();
        // Toggle navigation expan and collapse on radio click
        if ($('#left-sidebar-nav').hasClass('nav-expanded') && !$('#left-sidebar-nav').hasClass('nav-lock')) {
            $('#left-sidebar-nav').toggleClass('nav-expanded');
            $('#main').toggleClass('main-full');
        } else {
            $('#left-sidebar-nav').toggleClass('nav-expanded nav-collapsed');
            $('#main').toggleClass('main-full');
        }
        // Set navigation lock / unlock with radio icon
        if ($(this).children().text() == 'radio_button_unchecked') {
            $(this).children().text('radio_button_checked');
            $('#left-sidebar-nav').addClass('nav-lock');
            $('.header-search-wrapper').addClass('sideNav-lock');
        } else {
            $(this).children().text('radio_button_unchecked');
            $('#left-sidebar-nav').removeClass('nav-lock');
            $('.header-search-wrapper').removeClass('sideNav-lock');
        }

        // Expand navigation on mouseenter event
        $('#left-sidebar-nav.nav-collapsible').on('mouseenter', function() {
            //set Index velue
            getCollapseIndex();

            if (!$(this).hasClass('nav-lock')) {
                $(this).addClass('nav-expanded').removeClass('nav-collapsed');
                // setTimeout(function () {
                //     $('.collapsible').collapsible('open', (openIndex));
                // }, 100);
            }
        });

        // Collapse navigation on mouseleave event
        $('#left-sidebar-nav.nav-collapsible').on('mouseleave', function() {
            //set Index velue
            getCollapseIndex();
            if (!$(this).hasClass('nav-lock')) {
                $(this).addClass('nav-collapsed').removeClass('nav-expanded');
                // setTimeout(function () {
                //     $('.collapsible').collapsible('close', (openIndex));
                // }, 100);
            }
        });
    });



    function getCollapseIndex() {
        openIndex = undefined;
        $("#slide-out > li > ul > li > a.collapsible-header").each(function(index) {
            if ($(this).parent().hasClass('active')) {
                openIndex = index;
            }
        });
    }
});