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
            send() {
                const url = '/ajax/chat';
                const params = {
                    message: this.message,
                    job_id: this.job_id
                };
                var self = this;
                axios.post(url, params)
                    .then((response) => {
                        this.messages = '';
                    }).catch(error=> {console.log(error);});
            }
        },


    }
</script>
