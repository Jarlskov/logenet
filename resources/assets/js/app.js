/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var moment = require('moment');
require('moment-timezone');
require('bootstrap-fileinput');
require('bootstrap-material-design/dist/js/material.min.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import EventInfo from './components/Events/EventInfo.vue';
import EventForm from './components/Events/EventForm.vue';
import EventList from './components/Events/EventList.vue';
import myDatepicker from 'vue-datepicker';

Vue.prototype.trans = window.trans;

new Vue({
    el: '#logenet',

    data: function() {
        return {
            event_bus: new Vue(),
        }
    },

    mounted() {
        $.material.init();
        moment.tz.setDefault('Europe/Copenhagen');
    },

    components: {
        EventForm: EventForm,
        EventInfo: EventInfo,
        EventList: EventList,
        'date-picker': myDatepicker,
    }
});
