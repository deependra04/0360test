@extends('layouts.app')

@section('content')
<div class="container">


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  create artical
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <from id="create-artical-form" method="POST">
            @csrf
  <label  class="form-label">title:</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="">


  <label  class="form-label">content:</label>
  <textarea class="form-control" name="content" id="content" rows="3"></textarea>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        <button type="button" class="btn btn-primary" id="create-article">submit</button>
</from>
      </div>
    </div>
  </div>
</div>






















  <h2>list of articals</h2>
    <ul id="artical-list">
   
   
    <table class="table">
  <thead>
    <tr>
  
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">action</th>
    </tr>
  </thead>
 
  <tbody>
  @foreach($articles as $article)
    <tr>
   
      <td>{{$article->title}}</td>
      <td>{{$article->content}}</td>
      <td><button class="edit" id="{{$article->id}}">Edit</button></td>

      
      <td><button  class="delete-article" data-article-id="{{ $article->id }}">Delete</button></td> 
    </tr>
  </tbody>
  @endforeach
</table>
   
</ul>


<script>





$('#create-article').click(function() {
    let title = $('#title').val();
    let content = $('#content').val();
  

    let token = $('meta[name="csrf-token"]').attr('content');

$.ajax({
    type: 'POST',
    url: '/articls',
    data: {
        title: title,
        content: content,
    },
    headers: {
        'X-CSRF-TOKEN': token
    },
    success: function(data) {
       
    },
    error: function(xhr) {
       
        console.log(xhr.responseText);
    }
});
});




// delete

function deleteArticle(articleId) {
    var token =$('meta[name="csrf-token"]').attr('content');

    if (confirm('Are you sure you want to delete this article?')) {
        $.ajax({
            type: 'DELETE',
            url: `/articls/${articleId}`,
           
            headers: {
        'X-CSRF-TOKEN': token
             },
            success: function(data) {
             
                $(`tr[data-article-id="${articleId}"]`).remove();
            },
            error: function(xhr) {
               
                console.log(xhr.responseText);
            }
        });
    }
}

// Click event for the "Delete" button
$('.delete-article').click(function() {
    let articleId = $(this).data('article-id');
    deleteArticle(articleId);
});
</script>


</script>










</div>
@endsection








