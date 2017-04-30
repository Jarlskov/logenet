<script>
export default {
    data: function() {
        return {

        }
    },

    props: {
        events: {
            required: true
        }
    },

    methods: {
        createEvent() {
            this.$parent.event_bus.$emit('createEvent');
        },

        showEvent: (event) => {
            window.location = '/events/' + event.id;
        }
    }
}
</script>

<template>
<div class="row">
    <div>
        <a v-on:click.prevent="createEvent" class="btn btn-primary">Plan new event</a>
    </div>
    <div v-if="events.length === 0">You have no upcomming events.</div>
    <div v-else>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                </tr>
            </thead>
            <tbody>
                <tr class="link" v-for="event in events" v-on:click.prevent="showEvent(event)">
                    <td>{{ event.title }}</td>
                    <td>{{ event.starttime }}</td>
                    <td>{{ event.endtime }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <a v-on:click.prevent="createEvent" class="btn btn-primary">Plan new event</a>
    </div>
</div>
</template>
