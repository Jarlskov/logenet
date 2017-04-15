<template>
    <div class="panel panel-default">
        <div class="panel-heading">Participants</div>
        <div class="panel-body">
            <ul>
                <li v-for="host in hosts">{{ host.name }} <i class="glyphicon glyphicon-star"></i></li>
                <li v-for="guest in guests">{{ guest.name }}</li>
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
            participants: {
                required: true
            }
        },

        mounted() {

        },

        computed: {
            guests: function() {
                return this.participants.filter((participant) => {
                    return !participant.is_host;
                });
            },

            hosts: function() {
                return this.participants.filter((participant) => {
                    return participant.is_host;
                });
            }
        }
    }
</script>
