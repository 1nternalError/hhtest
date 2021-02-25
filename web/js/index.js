$('#upload').click(function(){
    $.getJSON( 'index.php?r=site/upload', function(data) {
        $('#countPosts').html(data.countPosts);
        $('#countComments').html(data.countComments);
        $('.messageUpload').html('<div class="alert alert-success" role="alert">Данный обновлены! Загружено <b>'+data.countPosts+'</b> постов и <b>'+data.countComments+'</b> комментарий </div>');
        console.log(data);
    });
});

$('#search').click(function(){
   var inputSearch = $('#inputSearch').val();
   if(inputSearch.length < 3){
       alert('Поиск работает от 3х символов');
       return;
   }
   $.get( 'index.php?r=site/search', { search: inputSearch},function(data){
        $('.searchOut').html(data);
    });
});