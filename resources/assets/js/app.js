
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

// vue-loader-13.0.0にてvueコンポーネントがデフォルトでesModuleとして設定される。
// グローバルコンポーネントで.default指定すると正常に稼働する。
Vue.component( 'job-list', require( './components/JobList.vue').default );
Vue.component( 'my-job-list', require( './components/MyJobList.vue').default );
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

// 多重送信防止,submitボタンを押した後、ポインタを無効にする。
$( '#btn-submit' ).on( 'click', function () {
    $( this ).css( 'pointer-events', 'none' );
} );

// 呼び出した案件の編集内容がサービス案件なら、金額欄を隠す。
$( function () {
    if ( $( '#select_type select[name="type"] option:selected' ).val() == '単発案件' )
    {
        $( '#reward_form' ).show();
    } else {
        $( '#reward_form' ).hide();
    }
} );

// 金額入力フォームの制御
$( function () {
    $( '#select_type select[name="type"]' ).change( function () {
        if ( $( 'select[name="type"] option:selected' ).val() == '単発案件' )
        {
            $( '#reward_form' ).show();
        }
        else
        {
            $( '#reward_form' ).hide();
            $( 'select[name="reward_min"]' ).val('');
            $( 'select[name="reward_max"]' ).val('');
        }
    } );
} );
