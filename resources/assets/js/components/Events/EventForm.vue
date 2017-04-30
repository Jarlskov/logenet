<script>
    var moment = require('moment');
    var axios = require('axios');

    export default {
        data: () => {
            return {
                event: {},
                show: false,
            }
        },

        mounted: function() {
            this.resetForm();
            this.$parent.event_bus.$on('createEvent', this.display);
            this.$parent.event_bus.$on('editEvent', (event) => {
                this.event = event;
                this.display();
            });
        },

        methods: {
            display() {
                this.$refs['startdateinput'].value = this.event.starttime.format('YYYY-MM-DD');
                this.$refs['starttimeinput'].value = this.event.starttime.format('HH:mm');
                this.$refs['enddateinput'].value = this.event.endtime.format('YYYY-MM-DD');
                this.$refs['endtimeinput'].value = this.event.endtime.format('HH:mm');

                $('#event-form').modal('show');
            },

            hide() {
                $('#event-form').modal('hide');
            },

            resetForm() {
                this.event = {
                    title: '',
                    location: '',
                    starttime: moment(),
                    endtime: moment(),
                    description: '',
                };

                this.event.starttime.set({hour: 12, minute: 0});
                this.event.endtime.set({hour: 13, minute: 0});
            },

            setEndtime() {
                this.setTimeField(this.event.endtime, this.$refs['starttimeinput'].value);
            },

            setEnddate() {
                this.setDateField(this.event.endtime, this.$refs['enddateinput'].value);
            },

            setStarttime() {
                this.setTimeField(this.event.starttime, this.$refs['starttimeinput'].value);
            },

            setStartdate() {
                this.setDateField(this.event.starttime, this.$refs['startdateinput'].value);
            },

            setDateField(field, date) {
                var date = date.split('-');
                field.set('year', parseInt(date[0]));
                field.set('month', parseInt(date[1]) - 1);
                field.set('date', parseInt(date[2]));
            },

            setTimeField(field, time) {
                var time = time.split(':');
                field.set('hour', parseInt(time[0]));
                field.set('minute', parseInt(time[1]));
            },

            submitForm() {
                var url = this.$refs['event-form'].getAttribute('action');
                if (this.is_edit_state) {
                    url += '/' + this.event.id;
                }

                axios.post(url, this.event)
                    .then(({ data }) => {
                        if (!this.is_edit_state) {
                            window.location = '/events/' + data.id;
                        }

                        this.$parent.event_bus.$emit('eventEdited', data);
                        this.hide();
                    })
                    .catch(({ error, errorBag }) => {
                        console.log(error);
                    });
            }
        },

        computed: {
            is_edit_state() {
                return this.event.id;
            }
        }
    }
</script>

<template>
<div class="modal fade" tabindex="-1" role="dialog" id="event-form">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" v-if="is_edit_state">Edit {{ event.name }}</h4>
                <h4 class="modal-title" v-else>Create event</h4>
            </div>

            <div class="modal-body">
                <form method="POST" action="/events" class="event-form" enctype="multipart/form-data" v-on:submit.prevent="submitForm" ref="event-form">
                    <div class="form-group label-floating">
                        <label for="title" class="control-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" v-model="event.title">
                    </div>
                    <div class="form-group label-floating">
                        <label for="location" class="control-label">Location</label>
                        <input type="text" id="location" name="location" class="form-control" v-model="event.location">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group label-static">
                                <label for="fromtime" class="control-label">Start time</label>
                                <input type="date" ref="startdateinput" v-on:change="setStartdate" required>
                                <input type="time" ref="starttimeinput" v-on:change="setStarttime" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group label-static">
                                <label for="totime" class="control-label">End time</label>
                                <input type="date" ref="enddateinput" v-on:change="setEnddate" required>
                                <input type="time" ref="endtimeinput" v-on:change="setEndtime" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group label-floating">
                        <label for="description" class="control-label">Description</label>
                        <textarea class="form-control" id="description" name="description" v-model="event.description"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="form-group label-floating">
                    <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="resetForm">Cancel</button>
                    <button type="button" class="btn btn-primary btn-raised" v-on:click.prevent="submitForm">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
