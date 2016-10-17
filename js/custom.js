(function(d, s, a, i, j, r, l, m, t) {
        try {
            l = d.getElementsByTagName('a');
            t = d.createElement('textarea');
            for (i = 0; l.length - i; i++) {
                try {
                    a = l[i].href;
                    s = a.indexOf('/cdn-cgi/l/email-protection');
                    m = a.length;
                    if (a && s > -1 && m > 28) {
                        j = 28 + s;
                        s = '';
                        if (j < m) {
                            r = '0x' + a.substr(j, 2) | 0;
                            for (j += 2; j < m && a.charAt(j) != 'X'; j += 2) s += '%' + ('0' + ('0x' + a.substr(j, 2) ^ r).toString(16)).slice(-2);
                            j++;
                            s = decodeURIComponent(s) + a.substr(j, m - j)
                        }
                        t.innerHTML = s.replace(/</g, '&lt;').replace(/>/g, '&gt;');
                        l[i].href = 'mailto:' + t.value
                    }
                } catch (e) {}
            }
        } catch (e) {}
    })(document);

(function($){

    $('.filters-trigger').on('click',function(e){
        e.preventDefault();
        triggerFilters(true);
    });
    $('.filters .close').on('click',function(e){
        e.preventDefault();
        triggerFilters(false);
    });

    function triggerFilters($bool){
        var elementsToTrigger = $([$('.filters'),$('.trip-gallery'),$('.filter-tab')]);
        elementsToTrigger.each(function(){
            $(this).toggleClass('filters-is-visible', $bool);
        });
    }

    $(window).on('scroll', function(){
        // var offsetTop = $('.gallery-content').offset().top,
        //     scrollTop = $(window).scrollTop();
        //     (scrollTop >= offsetTop) ? $('.gallery-content').addClass('gallery-fixed') : $('.gallery-content').removeClass('gallery-fixed');
    });

})(jQuery);

//trip filter
(function($){

    'use strict';

    var tripFilter = {

        $filters : null,
        groups : [],
        outputArray : [],
        outputString : '',

        init : function(){
            var self = this;
            self.$filters = $('div.gallery-content');
            self.$container = $('.trip-gallery');
            self.$filters = self.$filters.find('.filters').each(function(){
                var $this = $(this);
                self.groups.push({
                    $inputs : $this.find('input[type=checkbox]'),
                    active : '',
                    tracker : false
                })
            })
            self.bindHandlers();
        },

        bindHandlers : function(){
            var self = this;

            self.$filters.on('change', function(){
                self.parseFilters();
            })
        },

        parseFilters : function(){
            var self = this;
            for(var i = 0, group; group = self.groups[i]; i++) {
                group.active = [];
                group.$inputs.each(function(){
                    var $this = $(this);
                    if($this.is('input[type="radio"]') || $this.is('input[type="checkbox"]')) {
                    if($this.is(':checked') ) {
                            group.active.push($this.attr('value'));
                        }
                    } else if($this.is('select')){
                        group.active.push($this.val());
                    } else if( $this.find('.selected').length > 0 ) {
                        group.active.push($this.attr('data-filter'));
                    }
                });
            }
            self.concatenate();
        },

        concatenate : function(){
            var self = this;
            console.log(this);
        }
    }

    tripFilter.init();

})(jQuery);

//single-package float nav-erap
(function($){

    $win = $(window);
    $win.load(function(){
        $el = $('.nav-wrap');
        $elHeight = $el.outerHeight(true);
        console.log($elHeight);
        $offsetTop = $el.offset().top;
        //$el.wrap("<div class='lf-ghost' style='height:" + $elHeight + "px;display:" + $el.css("display") + "'></div>");
        $win.on('scroll', function(){
            (!window.requestAnimationFrame) ? fixNavWrap() : window.requestAnimationFrame(fixNavWrap);
        });
        function fixNavWrap() {
            var scrollTop = $(window).scrollTop();
            console.log(scrollTop);
            ( scrollTop >= $offsetTop ) ? $('#mobile-nav').addClass('nav-fixed') : $('#mobile-nav').removeClass('nav-fixed');
        }
    });

    $('.nav li').on('click',function(){
        $win.scrollTop($offsetTop);
    })

})(jQuery);