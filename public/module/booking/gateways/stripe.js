jQuery(document).ready(function ($) {
    'use strict';
    var stripePublishKey = myTravel_gateways_stripe.stripe_publishable_key;
 


    var stripe = Stripe(stripePublishKey);
    var elements = stripe.elements();
    var elementStyles = {
        base: {
            fontWeight: 500,
            fontSize: '14px',
        },
    };
    var elementClasses = {
        focus: 'is-focused',
        empty: 'is-empty',
        invalid: 'invalid',
    };


});
