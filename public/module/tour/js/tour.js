jQuery(function ($) {
    "use strict"
    var isEmpty = function isEmpty(f) {
        return (/^function[^{]+\{\s*\}/m.test(f.toString())
        );
    }
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

});