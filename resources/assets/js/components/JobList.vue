<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            <a v-bind:href="'/jobs/' + item.id" target="_blank">案件名：{{ item.title }}</a> <br>
            ID: {{ item.id }} <br>
            投稿者： {{ item.user.name }} <br>
            内容：{{ item.detail }} <br>
            種別：{{ item.type }} <br>
            報酬：{{ item.reward_min | moneyDelimiter }} 〜 {{ item.reward_max | moneyDelimiter  }} <br>
            締切：あと{{ item.deadline | deadlinediff }}日({{ item.deadline }})

            <br>
            <div v-for="dealings in item.applications" :key="dealings.key">
                応募者：{{ dealings.user_name }}
                <a v-bind:href="'/applications/' + dealings.id" target="_blank">＞{{ }}取引情報</a>
            </div>

            <hr>
        </div>
        <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>
    </div>
</template>

<script>
    export default {
        props: ['ajaxpath'],
        data() {
            return {
                page: 1,
                items: [],
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
