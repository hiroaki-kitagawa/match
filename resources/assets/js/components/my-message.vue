<template>
    <div>
        <div v-for="item in items.data" :key="items.key">
            <div>

            </div>
            <div>
                <a v-bind:href="'/jobs/' + item.id">{{ item.job.title }}</a> <br>
                {{ item.text }}
            </div>
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
