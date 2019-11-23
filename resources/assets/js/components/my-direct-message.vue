<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            <div>
                送信者：{{ item.user.name }} <br>
                {{ item.text }} <br>
                <a v-bind:href="'/applications/' + item.apply_id" target="_blank">＞取引情報：{{ item.job.title }}</a>
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
