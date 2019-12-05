$(function () {

  $('#submit').on('click', function () {
    var word = $('#searchWord').val();
    console.log(word);
    localStorage.setItem('searchWord', word);
  });

  var searches = localStorage.getItem('searchWord');

  $.ajax({
    url: 'https://newsapi.org/v2/top-headlines',
    type: 'get',
    data: {
      'q': searches,
      'country': 'us',
      'apiKey': 'yourkey'
    }
  })

    // Ajaxリクエストが成功した時発動
    .done((data) => {
      console.log(data.articles);
      let dom;
      data.articles.forEach(article => {
        // console.log(article.author);

        dom += `<div>
        <hr>
        <p>${article.title}</p>
        <p>${article.author}</p>
        <p>${article.content}</p>
        <p>${article.description}</p>
        <p>${article.publishedAt}</p>
        <p>${article.source}</p>
        <a href=${article.url}>◇SORCE URL</a>
        <a href=${article.urlToImage}>◆IMAGE</a>
      </div>`;
      })
      $('#echo').append(dom);
    })


    // Ajaxリクエストが失敗した時発動
    .fail((data) => {
      // $('.result').html(data);
      console.log(data);
    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always((data) => {
      console.log('ok');
    });




});