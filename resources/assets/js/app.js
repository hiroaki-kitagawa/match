
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require( 'vue' );


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component( 'example-component', require( './components/ExampleComponent.vue' ));
// vue-loader-13.0.0にてvueコンポーネントがデフォルトでesModuleとして設定される。
// グローバルコンポーネントで.default指定すると正常に稼働する。
// ただし、飽くまで暫定対応
Vue.component('home-pagenation', require( './components/HomePagenation.vue').default );
Vue.component('v-pagenation', require( './components/v-pagenation.vue').default );
Vue.component('single-jobs', require( './components/SingleJobs.vue' ).default );
Vue.component('service-jobs', require( './components/ServiceJobs.vue' ).default );


// グローバルフィルター
// 金額を桁区切りで表示する
Vue.filter( 'moneyDelimiter', function ( value ) {
    return value.toLocaleString();
} );

const app = new Vue({
    el: '#app'
});
