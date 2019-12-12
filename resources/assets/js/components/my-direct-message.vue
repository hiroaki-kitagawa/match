<template>
    <div>
        <h3>ダイレクトメッセージ一覧</h3>
        <hr>
        <div v-for="item in items.data" :key="items.key">
            <div>
                送信者：{{ item.user.name }} <br>
                {{ item.text }} <br>
                <a v-bind:href="'/applications/' + item.apply_id" target="_blank">>>{{ item.user.name }} さんとの取引情報</a>
            </div>
            <hr>
        </div>
        <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: 1,
                items: [],
            }
        },
        methods: {
            getItems() {
                const url = '/ajax/my_direct_message?page='+ this.page;
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
