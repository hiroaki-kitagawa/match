<template>
    <div v-for="item in items.data" :key="items.key">
        <div>
            送信者：{{ item.user.name }} <br>
            {{ item.text }} <br>
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
        },
        mounted() {
            this.getItems();
        },
    }
</script>
