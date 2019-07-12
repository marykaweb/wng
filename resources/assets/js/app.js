
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$(document).ready(function() {
    
    var getIdArray = [];
    $('.card').each(function () {
        getIdArray.push( $(this).attr('data-display-id') );
    });

    $countNews = getIdArray.length;

    var counAllNews = $('#countAllNews').val();
    
    console.log( counAllNews );

    if ( $countNews < 2 ||  $countNews == counAllNews) {
        $('#showmore').css('display', 'none');
    } else {
        $('#showmore').css('display', 'inline-block');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#showmore').on('click', function(){
        $.ajax({
            type: 'POST',
            uploadUrl: '{{url("/")}}',
            data: { countNews: $countNews },
            success: function (data) {
                $('body').html(data);
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });

    });

    CKEDITOR.replace('description');
   
});

