function getAjaxRequest(url) {
    return JSON.parse($.ajax({
        async: false,
        type : 'GET',
        url : url,
        success : function(data) {
            return data;
        }
    }).responseText);
}
