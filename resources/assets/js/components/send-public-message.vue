<template>
    <div>
        <textarea id="public-message" v-model="message"></textarea>
        <br>
        <button type="button" @click="send()">パブリックメッセージを送る</button>
    </div>
</template>

<script>
    export default {
        props:{
            job_id: '',
        },
        data() {
            return {
                message:''
            }
        },
        methods: {
            send: function() {
                var self = this;
                const url = '/ajax/send_public_message';
                const params = {
                    message: self.message,
                    job_id: self.job_id
                };
                axios.post(url, 1)
                    .then((response) => {
                        self.messages = '';
                    }).catch(error=> {console.log(error);});
            }
        },


    }
</script>
