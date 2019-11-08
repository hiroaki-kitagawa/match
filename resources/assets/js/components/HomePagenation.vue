<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            案件名：{{ item.title }} <br>
            内容：{{ item.detail }} <br>
            種別：{{ item.type }} <br>
            報酬：{{ item.reward_min | moneyDelimiter }} 〜 {{ item.reward_max | moneyDelimiter  }}
            <hr>
        </div>
        <br>
        <v-pagenation :data="items" @move-page="movePage($event)"></v-pagenation>
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
        }
    }
</script>
