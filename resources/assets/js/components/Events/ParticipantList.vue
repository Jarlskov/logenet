<template>
    <div class="panel panel-default">
        <div class="panel-heading">Participants</div>
        <div class="panel-body">
            <span v-show="show_headers">Participants</span>
            <ul>
                <li v-for="host in hosts">{{ host.name }} <i class="glyphicon glyphicon-star"></i></li>
                <li v-for="guest in guests">{{ guest.name }}</li>
            </ul>
            <span v-show="show_headers">Invited</span>
            <ul>
                <li v-for="invitee in invited">{{ invitee.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {

            }
        },

        props: {
            event: {
                required: true
            }
        },

        mounted() {

        },

        methods: {
            show_headers: () => {
                return this.participants.length && this.invited.length;
            }
        },

        computed: {
            guests: function() {
                return this.event.participants.filter((participant) => {
                    return participant.is_attending && !participant.is_host;
                });
            },

            hosts: function() {
                return this.event.participants.filter((participant) => {
                    return participant.is_attending && participant.is_host;
                });
            },

            invited: function() {
                return this.event.participants.filter((participant) => {
                    return !participant.is_attending;
                });
            }
        }
    }
</script>
