<template>
    <div>
        <div v-for="jobs in all_jobs">
            {{ jobs }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                all_jobs: {}
            }
        },
        mounted() {
            var self = this;
            var url = '/ajax/jobs';
            axios.get(url).then(function(response){
                self.all_jobs = response.data;
            });
        }
    }
</script>
