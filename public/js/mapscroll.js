$(function () {
    var MapScroll = $('#mapid');
    $('.map').click(function () {
        MapScroll.css('pointer-events', 'auto');
    });
    MapScroll.mouseleave(function () {
        MapScroll.css('pointer-events', 'none');
    })
});