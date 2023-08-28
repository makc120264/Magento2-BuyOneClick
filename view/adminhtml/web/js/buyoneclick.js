require([
    'jquery',
    'mage/translate'
], function ($, $t) {
    'use strict';

    $(document).ready(function () {
        // $('.command').on('mouseover', function () {
        //     let tooltipId = $(this).attr('id');
        //     $('#tooltip-text-' + tooltipId).css('display', 'block');
        // });

        // $('.command').on('mouseleave', function () {
        //     let tooltipId = $(this).attr('id');
        //     $('#tooltip-text-' + tooltipId).css('display', 'none');
        // });

        // $('.command').on('click', function () {
        //     let command = $(this).find('div').text();
        //     navigator.clipboard.writeText(command).then(() => {
        //         alert("Copied to clipboard");
        //     });
        // });

        // $('.import').on('click', function () {
        //     let sendData = getSendData(this);
        //     let lastRequestDataType = sendData.type;
        //     sendData.ajaxUrl = '/rest/V1/pimcore/' + lastRequestDataType;
        //     sendQuery(sendData);
        // });

        // $('.clear-result').on('click', function () {
        //     $(".test-result").empty();
        // });

        // $('.check-query').on('click', function () {
        //     let sendData = getSendData(this);
        //     // console.log(sendData.endpoint.split("/").pop());
        //     sendData.ajaxUrl = '/rest/V1/pimcore/query';
        //     sendQuery(sendData);
        // });
    });

    // function copyContent(el) {
    //     alert('copyContent');
    //     let command = $(el).text();
    //     navigator.clipboard.writeText(command).then(() => {
    //         // Alert the user that the action took place.
    //         // Nobody likes hidden stuff being done under the hood!
    //         alert("Copied to clipboard");
    //     });
    //
    //     // const copyContent = async () => {
    //     //     try {
    //     //         await navigator.clipboard.writeText(command);
    //     //         console.log('Content copied to clipboard');
    //     //     } catch (err) {
    //     //         console.error('Failed to copy: ', err);
    //     //     }
    //     // }
    // }

    function getSendData(element) {
        // let queryId = element.dataset.id
        // let sendData = {};
        //
        // sendData.endpoint = $('#endpoint-' + queryId).text();
        // sendData.key = $('#key-' + queryId).text();
        // sendData.type = $('#type-' + queryId).text();
        //
        // return sendData;
    }

    function sendQuery(sendData) {
        var ajaxUrl = location.origin + sendData.ajaxUrl;
        $('body').trigger('processStart');
        $.ajax({
            method: "POST",
            url: ajaxUrl,
            data: 'sendData=' + JSON.stringify(sendData)
        })
            .done(function (html) {
                $(".test-result").append(html + '<br>');
                $('body').trigger('processStop');
            });
    }
});
