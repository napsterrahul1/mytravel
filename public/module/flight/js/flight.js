(function ($) {
    var isEmpty = function isEmpty(f) {
        return (/^function[^{]+\{\s*\}/m.test(f.toString())
        );
    }
    var flightFormBookModal = new Vue({
        el:'#flightFormBookModal',
        data:{
            id:'',
            buyer_fees:[],
            message:{
                content:'',
                type:false
            },
            flight:{
                airline:{},
                airport_from:{},
                airport_to:{}
            },
            html:'',
            onSubmit:false,
            step:1,
            firstLoad:true,
            i18n:[],
            total_price_before_fee:0,
            total_price_fee:0,
            onLoading:false
        },
        computed: {
            total_price:function() {
                var me = this;
                var total = 0;
                if(typeof me.flight.flight_seat !='undefined'){
                    _.forEach( me.flight.flight_seat,function (item) {
                        if(item.number >0){
                            total += item.number * item.price;
                        }
                    });
                }
                return total;
            },
            total_price_html:function(){
                if(!this.total_price) return '';
                return window.bravo_format_money(this.total_price);
            },
        },
        methods: {
            openModal(flightId) {
                new Custombox.modal(
                    {
                        content: {
                            target: '#flightFormBookModal',
                            effect: 'fadein',
                            onOpen: function() {
                                console.log(1);
                                config['onOpen'].call($(target));
                            },
                            onClose: function() {
                                config['onClose'].call($(target));
                            },
                            onComplete: function() {
                                config['onComplete'].call($(target));
                            }
                        },
                    }
                ).open();

                var me = this;
                me.id= flightId;
                if(me.onSubmit==true){
                    return false;
                }
                me.onSubmit = true;
                me.onLoading = true;// dung cai nay de them icon loading
                $.ajax({
                    url:myTravel.module.flight+'/getData/'+me.id,
                    data:this.form,
                    dataType:'json',
                    method:'post',
                    success:function (json) {
                        if(json.status){
                            me.flight = json.data;
                        }
                        me.onSubmit = false;
                        me.onLoading = false;
                    },
                    error:function (e) {
                        me.onSubmit = false;
                        me.onLoading = false;
                    }
                });
            },
            flightCheckOut(){
                var me = this;
                me.message.content = '';
                var params = {
                    service_id:me.flight.id,
                    service_type:'flight',
                    flight_seat : me.flight.flight_seat
                }
                if(me.onSubmit==true){
                    return false;
                }
                me.onSubmit = true;
                $.ajax({
                    url:myTravel.url+'/booking/addToCart',
                    data:params,
                    dataType:'json',
                    method:'post',
                    success:function (json) {
                        if(!json.status){
                            me.onSubmit = false;
                        }
                        if(json.message)
                        {
                            me.message.content = json.message;
                            me.message.type = json.status;
                        }
                        if(json.url){
                            window.location.href = json.url
                        }
                        if(json.errors && typeof json.errors == 'object')
                        {
                            var html = '';
                            for(var i in json.errors){
                                html += json.errors[i]+'<br>';
                            }
                            me.message.content = html;
                            myTravelApp.showError(html);
                        }
                        me.onSubmit = false;
                    },
                    error:function (e) {
                        me.onSubmit = false;
                        bravo_handle_error_response(e);
                        if(e.status == 401){
                            Custombox.modal.closeAll();
                        }
                        if(e.status != 401 && e.responseJSON){
                            me.message.content = e.responseJSON.message ? e.responseJSON.message : 'Can not booking';
                            me.message.type = false;
                        }
                        me.onSubmit = false;
                    }
                });

            },











            minusNumberFlightSeat(flightSeat){
                if(flightSeat.number <= 0){
                    flightSeat.number = 0;
                }else{
                    flightSeat.number--;
                }
            },
            addNumberFlightSeat(flightSeat){
                if(flightSeat.number>=flightSeat.max_passengers){
                    flightSeat.number=flightSeat.max_passengers;
                }else{
                    flightSeat.number++;
                }
            },
            updateNumberFlightSeat(flightSeat){
                if(flightSeat.number>=flightSeat.max_passengers){
                    flightSeat.number=flightSeat.max_passengers;
                }
            }
        },
    })
    var flightFormBook = new Vue({
        el:'#flightFormBook',
        data:{
        },
        methods:{
            openModalBook(flightId){
                flightFormBookModal.openModal(flightId);
            }
        }

    });
    $(".bravo_filter").each(function () {
        $(this).find(".bravo-filter-price").each(function () {
            var input_price = $(this).find(".filter-price");
            var $this = input_price,
                type = $this.data('type'),
                minResult = $this.data('result-min'),
                maxResult = $this.data('result-max'),
                secondaryResult = $this.data('result-secondary'),
                secondaryValue = $this.data('secondary-value'),
                hasGrid = Boolean($this.data('grid')),
                graphForegroundTarget = $this.data('foreground-target');
            var config = {
                hide_min_max: true,
                hide_from_to: true,
                onStart: function () {
                },
                onChange: function () {
                },
                onFinish: function () {
                    $(".bravo_form_filter").submit();
                },
                onUpdate: function () {
                }
            };
            $this.ionRangeSlider({
                hide_min_max: true,
                hide_from_to: true,
                onStart: isEmpty(config.onStart) === true ? function (data) {
                    if (graphForegroundTarget) {
                        var w = (100 - (data.from_percent + (100 - data.to_percent)));

                        $(graphForegroundTarget).css({
                            left: data.from_percent + '%',
                            width: w + '%'
                        });

                        $(graphForegroundTarget + '> *').css({
                            width: $(graphForegroundTarget).parent().width(),
                            'transform': 'translateX(-' + data.from_percent + '%)'
                        });
                    }
                    if (minResult && type === 'single') {
                        if ($(minResult).is('input')) {
                            $(minResult).val(data.from);
                        } else {
                            $(minResult).text(data.from);
                        }
                    } else if (minResult || maxResult && type === 'double') {
                        if ($(minResult).is('input')) {
                            $(minResult).val(data.from);
                        } else {
                            $(minResult).text(data.from);
                        }

                        if ($(minResult).is('input')) {
                            $(maxResult).val(data.to);
                        } else {
                            $(maxResult).text(data.to);
                        }
                    }
                    if (hasGrid && type === 'single') {
                        $(data.slider).find('.irs-grid-text').each(function (i) {
                            var current = $(this);

                            if ($(current).text() === data.from) {
                                $(data.slider).find('.irs-grid-text').removeClass('current');
                                $(current).addClass('current');
                            }
                        });
                    }
                    if (secondaryResult) {
                        secondaryValue.steps.push(data.max + 1);
                        secondaryValue.values.push(secondaryValue.values[secondaryValue.values.length - 1] + 1);

                        for (var i = 0; i < secondaryValue.steps.length; i++) {
                            if (data.from >= secondaryValue.steps[i] && data.from < secondaryValue.steps[i + 1]) {
                                if ($(secondaryResult).is('input')) {
                                    $(secondaryResult).val(secondaryValue.values[i]);
                                } else {
                                    $(secondaryResult).text(secondaryValue.values[i]);
                                }
                            }
                        }
                    }
                } : config.onStart,
                onChange: isEmpty(config.onChange) === true ? function (data) {
                    if (graphForegroundTarget) {
                        var w = (100 - (data.from_percent + (100 - data.to_percent)));

                        $(graphForegroundTarget).css({
                            left: data.from_percent + '%',
                            width: w + '%'
                        });

                        $(graphForegroundTarget + '> *').css({
                            width: $(graphForegroundTarget).parent().width(),
                            'transform': 'translateX(-' + data.from_percent + '%)'
                        });
                    }

                    if (minResult && type === 'single') {
                        if ($(minResult).is('input')) {
                            $(minResult).val(data.from);
                        } else {
                            $(minResult).text(data.from);
                        }
                    } else if (minResult || maxResult && type === 'double') {
                        if ($(minResult).is('input')) {
                            $(minResult).val(data.from);
                        } else {
                            $(minResult).text(data.from);
                        }

                        if ($(minResult).is('input')) {
                            $(maxResult).val(data.to);
                        } else {
                            $(maxResult).text(data.to);
                        }
                    }

                    if (hasGrid && type === 'single') {
                        $(data.slider).find('.irs-grid-text').each(function (i) {
                            var current = $(this);

                            if ($(current).text() === data.from) {
                                $(data.slider).find('.irs-grid-text').removeClass('current');
                                $(current).addClass('current');
                            }
                        });
                    }

                    if (secondaryResult) {
                        for (var i = 0; i < secondaryValue.steps.length; i++) {
                            if (data.from >= secondaryValue.steps[i] && data.from < secondaryValue.steps[i + 1]) {
                                if ($(secondaryResult).is('input')) {
                                    $(secondaryResult).val(secondaryValue.values[i]);
                                } else {
                                    $(secondaryResult).text(secondaryValue.values[i]);
                                }
                            }
                        }
                    }
                } : config.onChange,
                onFinish: isEmpty(config.onFinish) === true ? function (data) {
                } : config.onFinish,
                onUpdate: isEmpty(config.onUpdate) === true ? function (data) {
                } : config.onUpdate
            });
        });
    });
    $(".bravo_form_filter input[type=checkbox]").on('change',function () {
        $(this).closest(".bravo_form_filter").submit();
    });
})(jQuery);
