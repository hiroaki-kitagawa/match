
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require( 'vue' );
import dayjs from 'dayjs'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component( 'example-component', require( './components/ExampleComponent.vue' ));
// vue-loader-13.0.0にてvueコンポーネントがデフォルトでesModuleとして設定される。
// グローバルコンポーネントで.default指定すると正常に稼働する。
Vue.component( 'job-list', require( './components/JobList.vue').default );
Vue.component( 'v-pagination', require( './components/v-pagination.vue').default );
Vue.component( 'my-public-message', require( './components/my-public-message.vue' ).default );
Vue.component( 'my-direct-message', require( './components/my-direct-message.vue' ).default );
Vue.component( 'send-public-message', require( './components/send-public-message.vue' ).default );


// 金額を桁区切りで表示する
Vue.filter( 'moneyDelimiter', function ( value ) {
    return value.toLocaleString();
} );

// あと何日かを計算する
Vue.filter( 'deadlinediff', function ( value ) {
    const today = dayjs().format( 'YYYY-MM-DD' );
    return dayjs(value).diff( today, 'days' );

} );

const app = new Vue({
    el: '#app'
});
