<script>
var moment = require('moment');
import ParticipantList from './ParticipantList.vue';

export default {
    data: function() {
        return {

        }
    },

    mounted: function() {
        this.event.starttime = moment(this.event.starttime);
        this.event.endtime = moment(this.event.endtime);

        this.$parent.event_bus.$on('eventEdited', (event) => {
            this.event = event;
        });
    },

    props: {
        can_edit_event: {
            required: true,
        },

        event: {
            required: true,
        }
    },

    methods: {
        editEvent() {
            this.$parent.event_bus.$emit('editEvent', this.event);
        }
    },

    components: {
        ParticipantList: ParticipantList,
    }
}
</script>

<template>
<div>
    <div class="page-header">
        <h1>{{ event.title }}</h1>
        <a href="#" v-on:click.prevent="editEvent">Edit</a>
        <div>
            {{ event.location }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Description
                </div>
                <div class="panel-body">
                    <img class="img-responsive img-rounded" v-if="event.image_url" :src="event.image_url">
                    &nbsp;
                    {{ event.description }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <participant-list :event="event"></participant-list>
        </div>
    </div>
</div>
</template>
