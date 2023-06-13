listAction();

function listAction() {
    var itemTitle = $('#itemTitle').val();
    var userName = $('#userName').val();
    var matchingjoinState = $('#matchingjoinState').find(":selected").val();
    var frontalColor = $('#frontalColor').find(":selected").val();
    var categoryId = $('#category').find(":selected").val();

    $.get('/itemList/search', {
        'itemTitle': itemTitle,
        'userName': userName,
        'matchingjoinState': matchingjoinState,
        'frontalColor': frontalColor,
        'categoryId': categoryId
    }, function(data){
        $('#itemList').html(data);
    });

}