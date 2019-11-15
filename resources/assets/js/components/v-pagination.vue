<template>

    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" v-if="data.current_page > 0" @click.prevent="move(data.current_page-1)">前へ</a>
        </li>
        <li class="page-item"><span>{{data.current_page}}/{{data.last_page}}</span></li>
        <li class="page-item">
            <a class="page-link" href="#" v-if="data.current_page < data.last_page" @click.prevent="move(data.current_page+1)">次へ</a>
        </li>
    </ul>

</template>

<script>
    export default {
        props: {
            data: {}
        },
        methods: {
            move(page) {
                if(!this.isCurrentPage(page)) {
                    this.$emit('move-page', page);
                }
            },
            isCurrentPage(page) {
                return (this.data.current_page == page); // 独自イベントを送出
            },
            getPageClass(page) {
                let classes = ['page-item'];
                if(this.isCurrentPage(page)) {
                    classes.push('active');
                }
                return classes;
            },

        },
        computed: {
            hasPrev() {
                return (this.data.prev_page_url != null);
            },
            hasNext() {
                return (this.data.next_page_url != null);
            },
            pages() {
                let pages = [];
                for(let i = 1 ; i <= this.data.last_page ; i++) { pages.push(i); }
                return pages;
            },
            lastPage() {
                return this.data.last_page;
            }
        },

    }
</script>
