<script>
var moment = require('moment');
import ParticipantList from './ParticipantList.vue';

export default {
    data: function() {
        return {
            object: {},
        }
    },

    mounted: function() {
        this.object.starttime = moment(this.object.starttime);
        this.object.endtime = moment(this.object.endtime);

        this.$parent.event_bus.$on('eventEdited', (event) => {
            this.object = event;
            this.object.starttime = moment(this.object.starttime);
            this.object.endtime = moment(this.object.endtime);
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
            this.$parent.event_bus.$emit('editEvent', this.object);
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
        <h1>{{ object.title }}</h1>
        <a href="#" v-on:click.prevent="editEvent">Edit</a>
        <div>
            {{ object.location }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Description
                </div>
                <div class="panel-body">
                    <img class="img-responsive img-rounded" v-if="object.image_url" :src="object.image_url">
                    &nbsp;
                    {{ object.description }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <participant-list :event="object"></participant-list>
        </div>
    </div>
</div>
</template>
