(function($) {
    'use strict';
    //trip search
        $(document).on('change' , '.trip-form .trip', function(){
            tripSearchParameters();
        });

        //get values on change

        function tripSearchParameters(){
            var destination = 'all' , activity = 'all' , duration = 'all';
            destination = $('#destination').val();
            activity = $('#activity').val();
            duration = $('#duration').val();

            var filterParam = {
                'destination' : destination,
                'activity' : activity,
                'duration' : duration
            }

            get_no_of_matched_trips(filterParam);
        }

        function get_no_of_matched_trips(param){
            var loader = $('span.loader');
            var dataTable = $('table.result');
            var messageHolder = $('p.message');
            $.ajaxSetup({
                beforeSend : function(){
                    if(dataTable.length >= 1 || messageHolder.length >= 1){
                        dataTable.hide();
                        messageHolder.hide();
                    }
                    loader.css('display','block').show();
                },
                complete : function(){
                    loader.hide();
                }
            });
            $.ajax({
                url : ajaxUrl.url,
                type : 'post',
                data : {
                    action : 'find_trips_by_param',
                    'search_params' : param
                },
            }).done(function(result){
                var resultContainer = $('#quickResult');
                var isExpanded = resultContainer.attr('aria-expanded');
                if(result != ''){
                    if(isExpanded == 'false'){
                        resultContainer.html(result).slideDown().attr('aria-expanded','true').toggleClass('open');
                    }else{
                        resultContainer.html(result);
                    }
                }else{
                    if(isExpanded == 'true'){
                        resultContainer.html('<p class="message" style="color : #fff">Oops! No Trips Matches.</p>');
                        //resultContainer.slideUp().attr('aria-expanded','false').toggleClass('open');
                    }else{
                        resultContainer.html('<p class="message" style="color : #fff">Oops! No Trips Matches.</p>').slideDown();
                    }
                }
            });
        }

    //trips comparison

    $(document).on('change','#compare-term-1', function(e){
        $.ajax({
            url : ajaxUrl.url,
            type : 'post',
            data : {
                action : 'aat_reavel_get_a_package',
                'p_id' : $('#compare-term-1').val()
            },
            success : function(result) {
                $('#intro-1').text(result.shortDesc);
                $('#cost-includes-1').empty().append(result.costInc);
                $('#itinerary-1').empty().append(result.itinerary);
                $('#cost-excludes-1').empty().append(result.costExc);
                var tripFacts = '';
                for(var t in result.tripFacts){
                    tripFacts += '<h3>' + t + '</h3>' + '<p>' + result.tripFacts[t] + '</p>';
                }
                $('#trip-facts-1').empty().append(tripFacts);
                $('.comparable-content').removeAttr('style');
            }
        })
    });
    $(document).on('change','#compare-term-2', function(e){
        $.ajax({
            url : ajaxUrl.url,
            type : 'post',
            data : {
                action : 'aat_reavel_get_a_package',
                'p_id' : $('#compare-term-2').val()
            },
            success : function(result) {
                $('#intro-2').text(result.shortDesc);
                $('#cost-includes-2').empty().append(result.costInc);
                $('#itinerary-2').empty().append(result.itinerary);
                $('#cost-excludes-2').empty().append(result.costExc);
                var tripFacts = '';
                for(var t in result.tripFacts){
                    tripFacts += '<h3>' + t + '</h3>' + '<p>' + result.tripFacts[t] + '</p>';
                }
                $('#trip-facts-2').empty().append(tripFacts);
                $('.comparable-content').removeAttr('style');
            }
        })
    });
})(jQuery);