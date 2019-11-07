<template>
    <div>
        <div v-for="job in jobs" :key="job.key">
            案件名：{{ job.title }} <br>
            内容：{{ job.detail }} <br>
            種別：{{ job.type }} <br>
            報酬：{{ job.reward_min | moneyDelimiter  }} 〜 {{ job.reward_max | moneyDelimiter  }}
            <hr>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                jobs: {}
            }
        },
        mounted() {
            var self = this;
            var url = '/ajax/job_single';
            axios.get(url).then(function(response){
                self.jobs = response.data;
            });
        }
    }
</script>
