/****  Variables Initiation  ****/
var doc = document;
var docEl = document.documentElement;
var page = $("body").data("page");


/****  Break Points Creation  ****/
if ($.fn.setBreakpoints) {
    $(window).setBreakpoints({
        distinct: true,
        breakpoints: [320, 480, 768, 1200]
    });
}
//******************************** PROGRESS BAR *******************************//

NProgress.configure({
    showSpinner: false
}).start();
setTimeout(function () {
    NProgress.done();
    $('.fade').removeClass('out');
}, 1000);


//******************************** RETINA READY *******************************//

Modernizr.addTest('retina', function () {
    return ( !! navigator.userAgent.match(/Macintosh|Mac|iPhone|iPad/i) && window.devicePixelRatio == 2);
});

Modernizr.load([{
    test: Modernizr.retina,
    yep: 'assets/plugins/retina.js'
}]);


//******************************** MAIN SIDEBAR ******************************//

var $html = $('html');
var $wrapper = $('#wrapper');
var $sidebar = $('#sidebar');
var $sidebar_toggle = $('.sidebar-toggle');
var $sidebar_submenu = $('.submenu');

function manageSidebar() {

    /* We change sidebar type on resize event */
    $(window).bind('enterBreakpoint1200', function () {
        $html.removeClass().addClass('sidebar-large');
        $('.sidebar-nav li.current').addClass('active');
        $('.sidebar-nav li.current .submenu').addClass('in').height('auto');
        $sidebar_toggle.attr('id', 'menu-medium');
        $sidebar.removeClass('collapse');
        sidebarHeight();
        createSideScroll();
    });

    $(window).bind('enterBreakpoint768', function () {
        $html.removeClass('sidebar-hidden').removeClass('sidebar-large').removeClass('sidebar-thin').addClass('sidebar-medium');
        $('.sidebar-nav li.current').removeClass('active');
        $('.sidebar-nav li.current .submenu').removeClass('in');
        $sidebar_toggle.attr('id', 'menu-thin');
        sidebarHeight();
        $sidebar.removeClass('collapse');
        $("#menu-right").trigger("close");
        destroySideScroll();
    });

    $(window).bind('enterBreakpoint480', function () {
        $html.removeClass('sidebar-medium').removeClass('sidebar-large').removeClass('sidebar-hidden').addClass('sidebar-thin');
        $('.sidebar-nav li.current').removeClass('active');
        $('.sidebar-nav li.current .submenu').removeClass('in');
        $sidebar.removeClass('collapse');
        sidebarHeight();
        destroySideScroll();
    });

    $(window).bind('enterBreakpoint320', function () {
        $html.removeClass('sidebar-medium').removeClass('sidebar-large').removeClass('sidebar-thin').addClass('sidebar-hidden');
        sidebarHeight();
        destroySideScroll();
    });

    /* We change sidebar type on click event */
    $(document).on("click", "#menu-large", function () {
        $html.removeClass('sidebar-medium').removeClass('sidebar-hidden').removeClass('sidebar-thin').addClass('sidebar-large');
        $sidebar_toggle.attr('id', 'menu-medium');
        $('.sidebar-nav li.current').addClass('active');
        $('.sidebar-nav li.current .submenu').addClass('in').height('auto');
        sidebarHeight();
        createSideScroll();
    });

    $(document).on("click", "#menu-medium", function () {
        $html.removeClass('sidebar-hidden').removeClass('sidebar-large').removeClass('sidebar-thin').addClass('sidebar-medium');
        $sidebar_toggle.attr('id', 'menu-thin');
        $('.sidebar-nav li.current').removeClass('active');
        $('.sidebar-nav li.current .submenu').removeClass('in');
        sidebarHeight();
        destroySideScroll();
    });

    $(document).on("click", "#menu-thin", function () {
        $html.removeClass('sidebar-medium').removeClass('sidebar-large').removeClass('sidebar-thin').addClass('sidebar-thin');
        $sidebar_toggle.attr('id', 'menu-large');
        $('.sidebar-nav li.current').removeClass('active');
        $('.sidebar-nav li.current .submenu').removeClass('in');
        sidebarHeight();
        if ($('body').hasClass('breakpoint-768')) $sidebar_toggle.attr('id', 'menu-medium');
        destroySideScroll();
    });

    function destroySideScroll() {
        $sidebar.mCustomScrollbar("destroy");
    }

    function createSideScroll() {
        destroySideScroll();
        $sidebar.mCustomScrollbar({
            scrollButtons: {
                enable: false
            },
            autoHideScrollbar: true,
            scrollInertia: 150,
            theme: "light-thin",
            advanced: {
                updateOnContentResize: true
            }
        });
    }
}

/* Toggle submenu open */
function toggleSidebarMenu() {
    var $this = $('.sidebar-nav');
    $this.find('li.active').has('ul').children('ul').addClass('collapse in');
    $this.find('li').not('.active').has('ul').children('ul').addClass('collapse');
    $this.find('li').has('ul').children('a').on('click', function (e) {
        e.preventDefault();
        $(this).parent('li').toggleClass('active').children('ul').collapse('toggle');
        $(this).parent('li').siblings().removeClass('active').children('ul.in').collapse('hide');
    });
}

/* Adjust sidebar height */
function sidebarHeight() {
    var sidebar_height;
    var mainMenuHeight = parseInt($('#main-menu').height());
    var windowHeight = parseInt($(window).height());
    var mainContentHeight = parseInt($('#main-content').height());
    if (windowHeight > mainMenuHeight && windowHeight > mainContentHeight) sidebar_height = windowHeight;
    if (mainMenuHeight > windowHeight && mainMenuHeight > mainContentHeight) sidebar_height = mainMenuHeight;
    if (mainContentHeight > mainMenuHeight && mainContentHeight > windowHeight) sidebar_height = mainContentHeight;
    if ($html.hasClass('sidebar-large') || $html.hasClass('sidebar-hidden')) {
        $sidebar.height('');
    } else {
        $sidebar.height(sidebar_height);
    }
}


/* Sidebar Statistics */
if ($.fn.sparkline) {

    sparkline1_color = '#159077';  
    sparkline2_color = '#00699e';  
    sparkline3_color = '#9e494e';

    if($.cookie('style-color') == 'dark') { sparkline1_color = '#159077'; sparkline2_color = '#00699e'; sparkline3_color = '#9e494e';}   
    if($.cookie('style-color') == 'red') { sparkline1_color = '#121212'; sparkline2_color = '#4AB2F8'; sparkline3_color = '#E0A832';}
    if($.cookie('style-color') == 'blue') { sparkline1_color = '#E0A832'; sparkline2_color = '#D9534F'; sparkline3_color = '#121212';}
    if($.cookie('style-color') == 'green') { sparkline1_color = '#E0A832'; sparkline2_color = '#D9534F'; sparkline3_color = '#121212';}
    if($.cookie('style-color') == 'dark') { sparkline1_color = '#159077'; sparkline2_color = '#00699e'; sparkline3_color = '#9e494e';}   
    
    /* Sparklines can also take their values from the first argument passed to the sparkline() function */
    var myvalues1 = [13, 14, 16, 15, 11, 14, 20, 14, 12, 16, 11, 17, 19, 16];
    var myvalues2 = [14, 17, 16, 12, 18, 16, 22, 15, 14, 17, 11, 18, 11, 12];
    var myvalues3 = [18, 14, 15, 14, 15, 12, 21, 16, 18, 14, 12, 15, 17, 19];
    var sparkline1 = $('.dynamicbar1').sparkline(myvalues1, {
        type: 'bar',
        barColor: sparkline1_color,
        barWidth: 4,
        barSpacing: 1,
        height: '28px'
    });
    var sparkline2 = $('.dynamicbar2').sparkline(myvalues2, {
        type: 'bar',
        barColor: sparkline2_color,
        barWidth: 4,
        barSpacing: 1,
        height: '28px'
    });
    var sparkline3 = $('.dynamicbar3').sparkline(myvalues3, {
        type: 'bar',
        barColor: sparkline3_color,
        barWidth: 4,
        barSpacing: 1,
        height: '28px'
    });
};


//******************************** CHAT MENU SIDEBAR ******************************//
function chatSidebar() {

    /* Manage the right sidebar */
    if ($.fn.mmenu) {
        var $menu = $('nav#menu-right');
        $menu.mmenu({
            position: 'right',
            dragOpen: true,
            counters: false,
            searchfield: {
                add: true,
                search: true,
                showLinksOnly: false
            }
        });
    }

    /* Open / Close right sidebar */
    $('#chat-toggle').on('click', function () {
        $menu.hasClass('mm-opened') ? $menu.trigger("close") : $menu.trigger("open");
        $('#chat-notification').hide();
        setTimeout(function () {
            $('.mm-panel .badge-danger').each(function () {
                $(this).removeClass('hide').addClass('animated bounceIn');
            });
        }, 1000);
    });

    /* Remove current message when opening */
    $('.have-message').on('click', function () {
        $(this).removeClass('have-message');
        $(this).find('.badge-danger').fadeOut();
    });

    /* Send messages */
    $('.send-message').keypress(function (e) {
        if (e.keyCode == 13) {
            var chat_message = '<li class="img">' +
                '<span>' +
                '<div class="chat-detail chat-right">' +
                '<img src="assets/img/avatars/avatar1.png" data-retina-src="assets/img/avatars/avatar1_2x.png"/>' +
                '<div class="chat-detail">' +
                '<div class="chat-bubble">' +
                $(this).val() +
                '</div>' +
                '</div>' +
                '</div>' +
                '</span>' +
                '</li>';
            $(chat_message).hide().appendTo($(this).parent().parent()).fadeIn();
            $(this).val("");
        }
    });
}

//******************************** SKIN COLORS SWITCH ******************************//

var setColor = function (color) {
    var color_ = 'color-'+color; 
    $('#theme-color').attr("href", "assets/css/colors/" + color_ + ".css");
    if ($.cookie) {         
        $.cookie('style-color', color);
    }
}

/* Change theme color onclick on menu */
$('.theme-color').click(function (e) {
    e.preventDefault();
    var color = $(this).attr("data-style");
    setColor(color);
    $('.theme-color').parent().removeClass("c-white w-600");
    $(this).parent().addClass("c-white w-600");

    if($.cookie('style-color') == 'dark') { sparkline1_color = '#159077';  sparkline2_color = '#00699e';  sparkline3_color = '#9e494e';}   
    if($.cookie('style-color') == 'red') { sparkline1_color = '#E0A832'; sparkline2_color = '#4AB2F8'; sparkline3_color = '#121212';}
    if($.cookie('style-color') == 'blue') { sparkline1_color = '#E0A832'; sparkline2_color = '#D9534F'; sparkline3_color = '#121212';}
    if($.cookie('style-color') == 'green') { sparkline1_color = '#E0A832'; sparkline2_color = '#D9534F'; sparkline3_color = '#121212';}
    if($.cookie('style-color') == 'cafe') { sparkline1_color = '#159077';  sparkline2_color = '#00699e';  sparkline3_color = '#9e494e';}   

    /* We update Sparkline colors */
    $('.dynamicbar1').sparkline(myvalues1, {type: 'bar', barColor: sparkline1_color, barWidth: 4, barSpacing: 1, height: '28px'});
    $('.dynamicbar2').sparkline(myvalues2, {type: 'bar', barColor: sparkline2_color, barWidth: 4, barSpacing: 1, height: '28px'});
    $('.dynamicbar3').sparkline(myvalues3, {type: 'bar', barColor: sparkline3_color, barWidth: 4, barSpacing: 1, height: '28px'});

});

/* If skin color selected in menu, we display it */
if($.cookie('style-color')){
    var color_ = 'color-'+$.cookie('style-color');
    $('#theme-color').attr("href", "assets/css/colors/" + color_ + ".css");
}
else{
    $('#theme-color').attr("href", "assets/css/colors/color-dark.css");
}

//*********************************** CUSTOM FUNCTIONS *****************************//

/****  Custom Scrollbar  ****/
function customScroll() {
    $('.withScroll').each(function () {
        $(this).mCustomScrollbar("destroy");
        var scroll_height = $(this).data('height') ? $(this).data('height') : 'auto';
        var data_padding = $(this).data('padding') ? $(this).data('padding') : 0;
        if ($(this).data('height') == 'window') scroll_height = $(window).height() - data_padding;
        $(this).mCustomScrollbar({
            scrollButtons: {
                enable: false
            },
            autoHideScrollbar: true,
            scrollInertia: 150,
            theme: "dark-2",
            set_height: scroll_height,
            advanced: {
                updateOnContentResize: true
            }
        });
    });
}

/****  Back to top on menu click when screen size < 480px (to see menu content) ****/
$('.navbar-toggle').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
});

/****  Animated Panels  ****/
function liveTile() {
    $('.live-tile').each(function () {
        $(this).liveTile("destroy", true); /* To get new size if resize event */
        tile_height = $(this).data("height") ? $(this).data("height") : $(this).find('.panel-body').height() + 52;
        $(this).height(tile_height);
        $(this).liveTile({
            speed: $(this).data("speed") ? $(this).data("speed") : 500, // Start after load or not
            mode: $(this).data("animation-easing") ? $(this).data("animation-easing") : 'carousel', // Animation type: carousel, slide, fade, flip, none
            playOnHover: $(this).data("play-hover") ? $(this).data("play-hover") : false, // Play live tile on hover
            repeatCount: $(this).data("repeat-count") ? $(this).data("repeat-count") : -1, // Repeat or not (-1 is infinite
            delay: $(this).data("delay") ? $(this).data("delay") : 0, // Time between two animations
            startNow: $(this).data("start-now") ? $(this).data("start-now") : true, //Start after load or not
        });
    });
}

/****  Full Screen Toggle  ****/
function toggleFullScreen() {
    if (!doc.fullscreenElement && !doc.msFullscreenElement && !doc.webkitIsFullScreen && !doc.mozFullScreenElement) {
        if (docEl.requestFullscreen) {
            docEl.requestFullscreen();
        } else if (docEl.webkitRequestFullScreen) {
            docEl.webkitRequestFullscreen();
        } else if (docEl.webkitRequestFullScreen) {
            docEl.webkitRequestFullScreen();
        } else if (docEl.msRequestFullscreen) {
            docEl.msRequestFullscreen();
        } else if (docEl.mozRequestFullScreen) {
            docEl.mozRequestFullScreen();
        }
    } else {
        if (doc.exitFullscreen) {
            doc.exitFullscreen();
        } else if (doc.webkitExitFullscreen) {
            doc.webkitExitFullscreen();
        } else if (doc.webkitCancelFullScreen) {
            doc.webkitCancelFullScreen();
        } else if (doc.msExitFullscreen) {
            doc.msExitFullscreen();
        } else if (doc.mozCancelFullScreen) {
            doc.mozCancelFullScreen();
        }
    }
}
$('.toggle_fullscreen').click(function () {
    toggleFullScreen();
});

/****  Animate numbers onload  ****/
if ($('.animate-number').length && $.fn.numerator) {
    $('.animate-number').each(function () {
        $(this).numerator({
            easing: $(this).data("animation-easing") ? $(this).data("animation-easing") : 'linear', // easing options.
            duration: $(this).data("animation-duration") ? $(this).data("animation-duration") : 700, // the length of the animation.
            toValue: $(this).data("value"), // animate to this value.
            delimiter: ','
        });
    });
}

/****  Custom Select Input  ****/
if ($('select').length && $.fn.selectpicker) {
  setTimeout(function(){
    $('select').selectpicker();
  },50);
}
/****  Show Tooltip  ****/
if ($('[data-rel="tooltip"]').length && $.fn.tooltip) {
    $('[data-rel="tooltip"]').tooltip();
}

/****  Show Popover  ****/
if ($('[rel="popover"]').length && $.fn.popover) {
    $('[rel="popover"]').popover();
    $('[rel="popover_dark"]').popover({
        template: '<div class="popover popover-dark"><div class="arrow"></div><h3 class="popover-title popover-title"></h3><div class="popover-content popover-content"></div></div>',
    });
}

/****  Improve Dropdown effect  ****/
if ($('[data-hover="dropdown"]').length && $.fn.popover) {
    $('[data-hover="dropdown"]').popover();
}

/****  Add to favorite  ****/
$('.favorite').on('click', function () {
    ($(this).hasClass('btn-default')) ? $(this).removeClass('btn-default').addClass('btn-danger') : $(this).removeClass('btn-danger').addClass('btn-default');
});

/****  Add to favorite  ****/
$('.favs').on('click', function () {
    event.preventDefault();
    ($(this).hasClass('fa-star-o')) ? $(this).removeClass('fa-star-o').addClass('fa-star c-orange') : $(this).removeClass('fa-star c-orange').addClass('fa-star-o');
});

/* Toggle All Checkbox Function */
$('.toggle_checkbox').on('click', function () {

   if ($(this).prop('checked') ==  true){
        $(this).closest('#task-manager').find('input:checkbox').prop('checked', true);
    } else {
        $(this).closest('#task-manager').find('input:checkbox').prop('checked', false);
    }
});






/****  Form Validation with Icons  ****/
if ($('.icon-validation').length && $.fn.parsley) {

    $('.icon-validation').each(function () {

        icon_validation = $(this);

        $(this).parsley().subscribe('parsley:field:success', function (formInstance) {

           formInstance.$element.prev().removeClass('fa-exclamation c-red').addClass('fa-check c-green');
           
        });
        $(this).parsley().subscribe('parsley:field:error', function (formInstance) {

            formInstance.$element.prev().removeClass('fa-check c-green').addClass('fa-exclamation c-red');
            
        });

    });
}

/****  Custom Range Slider  ****/
if ($('.range-slider').length && $.fn.rangeSlider) {
    $('.range-slider').each(function () {
        $(this).rangeSlider({
            delayOut: $(this).data('slider-delay-out') ? $(this).data('slider-delay-out') : '0',
            valueLabels: $(this).data('slider-value-label') ? $(this).data('slider-value-label') : 'show',
            step: $(this).data('slider-step') ? $(this).data('slider-step') : 1,
        });
    });
}

/****  Custom Slider  ****/
function handleSlider() {
    if ($('.slide').length && $.fn.slider) {
        $('.slide').each(function () {
            $(this).slider();
        });
    }
}

/**** Custom Switch  ****/
if ($('.switch').length && $.fn.bootstrapSwitch) {
    $('.switch').each(function () {
        var switch_size = $(this).data('size') ? $(this).data('size') : '';
        var switch_on_color = $(this).data('on-color') ? $(this).data('on-color') : 'primary';
        var switch_off_color = $(this).data('off-color') ? $(this).data('off-color') : 'primary';
        $(this).bootstrapSwitch('size', switch_size);
        $(this).bootstrapSwitch('onColor', switch_on_color);
        $(this).bootstrapSwitch('offColor', switch_off_color);
    });
}

/****  Datepicker  ****/
if ($('.datepicker').length && $.fn.datepicker) {
    $('.datepicker').each(function () {
        var datepicker_inline = $(this).data('inline') ? $(this).data('inline') : false;
        $(this).datepicker({
            inline: datepicker_inline
        });
    });
}

/****  Datetimepicker  ****/
if ($('.datetimepicker').length && $.fn.datetimepicker) {
    $('.datetimepicker').each(function () {
        var datetimepicker_inline = $(this).data('inline') ? $(this).data('inline') : false;
        $(this).datetimepicker({
            inline: datetimepicker_inline
        });
    });
}

/****  Pickadate  ****/
if ($('.pickadate').length && $.fn.pickadate) {
    $('.pickadate').each(function () {
        $(this).pickadate();
    });
}

/****  Pickatime  ****/
if ($('.pickatime').length && $.fn.pickatime) {
    $('.pickatime').each(function () {
        $(this).pickatime();
    });
}

/****  Sortable Panels  ****/
if ($('.sortable').length && $.fn.sortable) {
    $(".sortable").sortable({
        connectWith: '.sortable',
        iframeFix: false,
        items: 'div.panel',
        opacity: 0.8,
        helper: 'original',
        revert: true,
        forceHelperSize: true,
        placeholder: 'sortable-box-placeholder round-all',
        forcePlaceholderSize: true,
        tolerance: 'pointer'
    });
}

/****  Tables Responsive  ****/
function tableResponsive(){
    $('.table').each(function () {
        table_width = $(this).width();
        content_width = $(this).parent().width();
        if(table_width > content_width) {
            $(this).parent().addClass('force-table-responsive');
        }
        else{
            $(this).parent().removeClass('force-table-responsive');
        }
    });
}

/****  Sortable Tables  ****/
if ($('.sortable_table').length && $.fn.sortable) {
    $(".sortable_table").sortable({
        itemPath: '> tbody',
        itemSelector: 'tbody tr',
        placeholder: '<tr class="placeholder"/>'
    });
}

/****  Nestable List  ****/
if ($('.nestable').length && $.fn.nestable) {
    $(".nestable").nestable();
}

/****  Sparkline Inline Charts  ****/
if ($('.sparkline').length && $.fn.sparkline) {
    $('.sparkline').each(function () {
        $(this).sparkline(
            $(this).data("sparkline-value"), {
                type: $(this).data("sparkline-type") ? $(this).data("sparkline-type") : 'bar',
                barWidth: $(this).data("sparkline-bar-width") ? $(this).data("sparkline-bar-width") : 5,
                barSpacing: $(this).data("sparkline-bar-spacing") ? $(this).data("sparkline-bar-spacing") : 2,
                height: $(this).data("sparkline-height") ? $(this).data("sparkline-height") : '20px',
                barColor: $(this).data("sparkline-color") ? $(this).data("sparkline-color") : '#7BB2B4',
                enableTagOptions: true
            });
    });
}

/****  Animation CSS3  ****/
if ($('.animated').length) {
    $('.animated').each(function () {
        delay_animation = parseInt($(this).attr("data-delay") ? $(this).attr("data-delay") : 500);
        $(this).addClass('hide').removeClass('hide', delay_animation);
    });
}

/****  Summernote Editor  ****/
if ($('.summernote').length && $.fn.summernote) {
    $('.summernote').each(function () {
        $(this).summernote({
            height: 300,
            toolbar: [
                ["style", ["style"]],
                ["style", ["bold", "italic", "underline", "clear"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["table", ["table"]]
            ]
        });
    });
}

/****  CKE Editor  ****/
if ($('.cke-editor').length && $.fn.ckeditor) {
    $('.cke-editor').each(function () {
        $(this).ckeditor();
    });
}

/****  Tables Dynamic  ****/
if ($('.table-dynamic').length && $.fn.dataTable) {
    $('.table-dynamic').each(function () {
        var opt = {};
        // Tools: export to Excel, CSV, PDF & Print
        if ($(this).hasClass('table-tools')) {
            opt.sDom = "<'row'<'col-md-6'f><'col-md-6'T>r>t<'row'<'col-md-6'i><'spcol-md-6an6'p>>",
            opt.oTableTools = {
                "sSwfPath": "assets/plugins/datatables/swf/copy_csv_xls_pdf.swf",
                "aButtons": ["csv", "xls", "pdf", "print"]
            };
        }
        if ($(this).hasClass('no-header')) {
            opt.bFilter = false;
            opt.bLengthChange = false;
        }
        if ($(this).hasClass('no-footer')) {
            opt.bInfo = false;
            opt.bPaginate = false;
            opt.bRetrieve = true;
        }
        var oTable = $(this).dataTable(opt);
        oTable.fnDraw();
    });
}

/****  Table progress bar  ****/
if ($('body').data('page') == 'tables' || $('body').data('page') == 'products' || $('body').data('page') == 'blog') {
    $('.progress-bar').progressbar();
}

/****  Gallery Images  ****/
if ($('.gallery').length && $.fn.mixItUp) {
    $('.gallery').each(function () {

        $(this).mixItUp({
            animation: {
                enable: false       
            },
            callbacks: {
                onMixLoad: function(){
                    $('.mix').hide();
                    $(this).mixItUp('setOptions', {
                        animation: {
                            enable: true,
                            effects: "fade", 
                        },
                    });
                    $(window).bind("load", function() {
                       $('.mix').fadeIn();
                    });
                }
            }
        });


    });
}

if ($('.magnific').length && $.fn.magnificPopup) {
    $('.magnific').magnificPopup({
        type:'image',
        gallery: {
            enabled: true
        },
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });
}


/****  Initiation of Main Functions  ****/
jQuery(document).ready(function () {

    manageSidebar();
    toggleSidebarMenu();
    chatSidebar();
    customScroll();
    liveTile();
    handleSlider();
    tableResponsive();

});


/****  On Resize Functions  ****/
$(window).bind('resize', function (e) {
    window.resizeEvt;
    $(window).resize(function () {
        clearTimeout(window.resizeEvt);
        window.resizeEvt = setTimeout(function () {
            sidebarHeight();
            liveTile();
            customScroll();
            handleSlider();
            tableResponsive();
        }, 250);
    });
});

//////////////////////////////////////
/////////  Category Filter Functions
/////////

/* Add Labels when select an option on a filter */

    $(".slFilter").off("change");
    $(".slFilter").change(function () {
        AddFilter(this);
    });

    $(".slpFilter").off("change");
    $(".slpFilter").change(function () {
        AddPrevFilter(this);
    });
    
    convertFilters();

    $('#FamilyMembers').off("change");
    $('#FamilyMembers').change(function () {
        AddFilter(this);
    });

function useSaved(search)
{
    $("#searchBox").val(search);
    applySearchFilter();
}

function SelYear(obj)
{
    //alert($("#yearsFilter").val());
    if ($(obj).hasClass('btnAllYear')) {
        $('.btnYear').removeClass('btn-primary');
        $('.btnYear').addClass('btn-default');
        $("#yearsFilter").val("");
    } else {
        $('.btnAllYear').removeClass('btn-primary');
        $('.btnAllYear').addClass('btn-default');
    }

    if ($(obj).hasClass('btn-default'))
    {
        $(obj).removeClass('btn-default');
        $(obj).addClass('btn-primary');
        if ($(obj).attr("year")!="")
            $("#yearsFilter").val($("#yearsFilter").val() + "," + $(obj).attr("year"));
        //alert($("#yearsFilter").val());
    } else {
        $(obj).removeClass('btn-primary');
        $(obj).addClass('btn-default');
        //it should be removed from yearsFilter
        $("#yearsFilter").val($("#yearsFilter").val().replace(","+$(obj).attr("year"),""));
    }
    //alert($("#yearsFilter").val());
    //$('#MonthGroup').removeClass('hide');
    //alert(obj.innerHTML);
}

function SelMonth(obj)
{
    if ($(obj).hasClass('btnAllMonth')) {
        $('.btnMonth').removeClass('btn-primary');
        $('.btnMonth').addClass('btn-default');
        $("#monthsFilter").val("");
    } else {
        $('.btnAllMonth').removeClass('btn-primary');
        $('.btnAllMonth').addClass('btn-default');
    }

    if ($(obj).hasClass('btn-default')) {
        $(obj).removeClass('btn-default');
        $(obj).addClass('btn-primary');
        if ($(obj).attr("month")!="")
            $("#monthsFilter").val($("#monthsFilter").val() + "," + $(obj).attr("month"));
        //alert($("#monthsFilter").val());
    } else {
        $(obj).removeClass('btn-primary');
        $(obj).addClass('btn-default');
        //it should be removed from monthsFilter
        $("#monthsFilter").val($("#monthsFilter").val().replace(","+$(obj).attr("month"),""));
    }

    //alert(obj.innerHTML);
}

function RemoveFilter(obj,value)
{
    var parentTag = $($(obj).parent().get(0)).parent().get(0);
    $(parentTag).addClass('hide');
    //alert(parentTag.innerHTML);
    //alert(value);
    
    var table = $("#tblFiles").DataTable();
    var searchStr="";
    
    $(".txtFilter").each(function () {
        $(this).val($(this).val().replace("|"+value,""));
        if ($(this).val().substring(1)!="")
        {
            searchStr = searchStr + "|" + $(this).val().substring(1);
        }
    });
    searchStr = searchStr.substring(1);
    //alert(searchStr);
    table.search(searchStr,true,false);
    // refresh the table
    table.draw();
}

function AddFilter(obj)
{
    //alert("valor=" + obj.value);
    if (obj.value != "")
    {
        var flt = '<span><span class="label label-primary">' + obj.value + ' <a href="#" class="label label-primary" onClick="RemoveFilter(this,\'(' + obj.value + ')\');" >x</a></span>&nbsp;</span>';
        //alert(flt);
        $('.' + obj.id + 'FLT').append(flt);
        
        var txtFilter= "#" + obj.id + "Txt";
        //alert(txtFilter);
        //alert($(txtFilter).val());
        $(txtFilter).val($(txtFilter).val() + "|(" + obj.value + ")");
        //alert($(txtFilter).val());
        $(obj).val("");
        //alert($(obj).val());
        applyListFilter();
    }
}

function applyListFilter()
{
        var searchStr ="";
        var table = $("#tblFiles").DataTable();
        $(".txtFilter").each(function () {
            if ($(this).val().substring(1)!="")
            {
                searchStr = searchStr + "|" + $(this).val().substring(1);
            }
        });
        searchStr = searchStr.substring(1);
        //alert(searchStr);
        table.search(searchStr,true,false);
        // refresh the table
        table.draw();
}

function DrawFilters()
{
    var searchStr="";
    var filterid="";
    $(".txtFilter").each(function () {
        if ($(this).val().substring(1)!="")
        {
            filterid=$(this).attr("id");
            //alert(filterid);
            filterid=filterid.replace(/Txt/g,"");
            searchStr = $(this).val().substring(1);
            //alert(filterid);
            //alert("p:"+searchStr);
            if ($("#selector").val()=="list")
            {
                var arrFilters = searchStr.split("|")
            }else{
                var arrFilters = searchStr.split(".")
            }
            //alert(arrFilters);
            var x;
            for (x in arrFilters)
            {
                DrawFilter(filterid,arrFilters[x]);
                //alert(searchStr);
            }
        }
    });
}

function DrawFilter(filter,value)
{
    var strValue="";
    
    strValue = value.replace(/www\-/g,"www.");
    strValue = strValue.replace(/\-com/g,".com");
    strValue = strValue.replace(/www\ /g,"www.");
    strValue = strValue.replace(/\ com/g,".com");
    strValue = strValue.replace(/\-/g," ");
    strValue = strValue.replace(/\(/g,"");
    strValue = strValue.replace(/\)/g,"");
    if ($("#selector").val()=="list")
    {
        var flt = '<span><span class="label label-primary">' + strValue + ' <a href="#" class="label label-primary" onClick="RemoveFilter(this,\'' + value + '\');" >x</a></span>&nbsp;</span>';
    }else{
        var flt = '<span><span class="label label-primary">' + strValue + ' <a href="#" class="label label-primary" onClick="RemovePrevFilter(this,\'' + value + '\');" >x</a></span>&nbsp;</span>';
    }
    //alert(flt);
    $('.' + filter + 'FLT').append(flt);
}

function convertFilters()
{
    if ($("#executed").val()=="0")
    {
        if ($("#selector").val()=="list")
        {
            //alert("list");
            if ($("#rOrigin").val()!="list")
            {
                //alert("convert");
                $(".txtFilter").each(function () {
                    if ($(this).val().substring(1)!="")
                    {
                        $(this).val($(this).val().replace(/\-/g," "));
                        $(this).val($(this).val().replace(/\./g,")|(") + ")");
                        $(this).val($(this).val().substring(1));
                        $(this).val($(this).val().replace(/\)\)/g,")"));
                        //alert("filtro convertido:" + $(this).val());
                    }
                }); 
            }
            applyListFilter();
            DrawFilters();
        }else{
            //alert("preview");
            if ($("#rOrigin").val()!="preview")
            {
                //alert("convert");
                $(".txtFilter").each(function () {
                   if ($(this).val().substring(1)!="")
                   {
                       $(this).val($(this).val().replace(/\./g,"-"))   
                       $(this).val($(this).val().replace(/\|\(/g,"."));
                       $(this).val($(this).val().replace(/\)/g,""));
                       $(this).val($(this).val().replace(/ /g,"-"));
                       //alert("filtro convertido:" + $(this).val());
                   }
                }); 
            }
            applyPrevFilter();
            DrawFilters();
        }
        $("#executed").val("1");
    }
}

function RemovePrevFilter(obj,value)
{
    var parentTag = $($(obj).parent().get(0)).parent().get(0);
    $(parentTag).addClass('hide');
    
    $(".mix").addClass("hide");
    //alert(parentTag.innerHTML);
    //alert(value);
    
    //var searchStr="";
    
    $(".txtFilter").each(function () {
        if ($(this).val().substring(1)!="")
        {
            $(this).val($(this).val().replace("." + value.replace(/ /g,"-").replace(/\./g,"-"),""));
            //searchStr = searchStr + $(this).val();
        }
    });
    applyPrevFilter();
    //alert(searchStr);

    //if (searchStr=="")
    //    $(".mix").removeClass("hide");
    //else
    //    $(searchStr).removeClass("hide");
}

function AddPrevFilter(obj)
{
    //alert("valor=" + obj.value);
    if (obj.value != "")
    {
        var flt = '<span><span class="label label-primary">' + obj.value + ' <a href="#" class="label label-primary" onClick="RemovePrevFilter(this,\'' + obj.value + '\');" >x</a></span>&nbsp;</span>';
        //alert(flt);
        $('.' + obj.id + 'FLT').append(flt);
        
        var txtFilter= "#" + obj.id + "Txt";
        //alert(txtFilter);
        //alert($(txtFilter).val());
        $(txtFilter).val($(txtFilter).val() + "." + obj.value.replace(/ /g,"-").replace(/\./g,"-"));
        //alert($(txtFilter).val());
        $(obj).val("");
        applyPrevFilter();
    }
}

function applyPrevFilter()
{
        var searchStr ="";
        var filtred=false;
        $(".mix").addClass("hide");
        $(".txtFilter").each(function () {
            if ($(this).val().substring(1)!="")
            {
                searchStr = $(this).val().substring(1);
                //alert(searchStr);
                var arrFilters = searchStr.split(".")
                //alert(arrFilters);
                var x;
                for (x in arrFilters)
                {
                    searchStr = "." + arrFilters[x];
                    //alert(searchStr);
                    $(searchStr).removeClass("hide");
                    filtred=true;
                }
            }
        });
        
        if (!filtred)
            $(".mix").removeClass("hide");
            
}

function applyDateFilter()
{
    //$("#selector").val("list");
    $("#searchFilter").val($("#searchBox").val());
    $("#monthsFilter").val($("#monthsFilter").val().substring(1));
    $("#yearsFilter").val($("#yearsFilter").val().substring(1));
    //alert($("#yearsFilter").val());
    //alert($("#monthsFilter").val());
    $("#selpreview").submit();
}

function applySearchFilter()
{
    //$("#selector").val("list");
    $("#searchFilter").val($("#searchBox").val());
    $("#monthsFilter").val("");
    $("#yearsFilter").val("");
    $(".txtFilter").each(function () {
       $(this).val("");
    }); 
    $("#selpreview").submit();
}

function documentPreview()
{
    $("#selector").val("preview");
    $("#searchFilter").val($("#searchBox").val());
    $("#monthsFilter").val($("#monthsFilter").val().substring(1));
    $("#yearsFilter").val($("#yearsFilter").val().substring(1));
    $("#selpreview").submit();
}

function documentList()
{
    $("#selector").val("list");
    $("#searchFilter").val($("#searchBox").val());
    $("#monthsFilter").val($("#monthsFilter").val().substring(1));
    $("#yearsFilter").val($("#yearsFilter").val().substring(1));    
    $("#selpreview").submit();
}

function RemoveSearch(obj,searchId)
{
    var parentTag = $($(obj).parent().get(0)).parent().get(0);
    $(parentTag).addClass('hide');
    $(".TRDocuments").removeClass("hide");
    //alert(parentTag.innerHTML);
    //alert(searchId);
    //code for removing from database
}

function addFavorite(search,id)
{
    //alert(search);
    //alert(id);
    
    $.ajax({
        url: "http://54.213.69.30/docufiler/api/setFavorite?search=" + search 
    }).then(function(data) {
       $("#fb" + id ).removeClass("fa-heart-o");
       $("#fb" + id ).addClass("fa-heart");
    });
}

function removeFavorite(id)
{
    $.ajax({
        url: "http://54.213.69.30/docufiler/api/delFavorite?id=" + id 
    }).then(function(data) {
       $("#fb" + id ).removeClass("fa-heart");
       $("#fb" + id ).addClass("fa-heart-o");
    });    
}