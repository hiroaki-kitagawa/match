<template>
    <ul class="c-pagination" v-if="data.total > 0">
        <li class="c-pagination-page-item" v-if="data.current_page > 0">
            <a class="page-link" href="#" @click.prevent="move(data.current_page-1)">前へ</a>
        </li>
        <li class="c-pagination-page-number"><span>{{data.current_page}}/{{data.last_page}}</span></li>
        <li class="c-pagination-page-item" v-if="data.current_page < data.last_page">
            <a class="page-link" href="#"  @click.prevent="move(data.current_page+1)">次へ</a>
        </li>
    </ul>
    <div v-else>表示するアイテムがありません。</div>
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
