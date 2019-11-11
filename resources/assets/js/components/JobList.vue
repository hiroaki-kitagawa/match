<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            <a v-bind:href="'/jobs/' + item.id">案件名：{{ item.title }}</a> <br>
            ID: {{ item.id }} <br>
            投稿者： {{ item.user.name }} <br>
            内容：{{ item.detail }} <br>
            種別：{{ item.type }} <br>
            報酬：{{ item.reward_min | moneyDelimiter }} 〜 {{ item.reward_max | moneyDelimiter  }} <br>
            締切：あと{{ item.deadline | deadlinediff }}日({{ item.deadline }})
            <hr>
        </div>
        <br>
        <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>
    </div>
</template>

<script>
    export default {
        props: ['ajaxpath'],
        data() {
            return {
                page: 1,
                items: []
            }
        },
        methods: {
            getItems() {
                const url = '/ajax/'+ this.ajaxpath +'?page='+ this.page;
                axios.get(url)
                    .then((response) => {
                        this.items = response.data;
                });
            },
            movePage(page) {
                this.page = page;
                this.getItems();
            }

        },
        mounted() {
            this.getItems();
        },
    }
</script>
