<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            <a v-bind:href="'/jobs/' + item.job.id" target="_blank">＞案件名：{{ item.job.title }}</a> <br>
            <div>
                送信者：{{ item.user.name }} <br>
                {{ item.text }}
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
                const url = '/ajax/my_public_message?page='+ this.page;
                axios.get(url)
                    .then((response) => {
                        this.items = response.data;                });
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
