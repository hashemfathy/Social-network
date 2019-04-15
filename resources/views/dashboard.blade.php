@extends('layouts/master')
@section('title')
home
@endsection
@section('content')

@include('includes.message-block')

    <div class="row new-post">
        <div class="col-md-6 sol-md-offset-3">
            <header><h3>what do you want to say?</h3></header>
                <form action="{{route('create')}}"method="post">
                    <div class="form-group">
                        <textarea name="body" id="new-post" rows="5" class="form-control" placeholder="type your post!"></textarea>
                    </div>
                        <button type="submit"class="btn btn-primary">Post</button>
                        <div class="dropdown-divider"></div>
                        {{csrf_field()}}
                </form>
        </div>
    </div>
    <div class="row new-post">
        <div class="col-md-6 sol-md-offset-3">
            <header><h3>what other people say!</h3></header>
                @foreach($posts as $post)
                <article class="post" data-postid="{{$post->id}}">
                    <p>{{$post->body}}</p>
                    <div class="info">
                        Posted by {{$post->user->first_name}} on {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href=""class="like">like</a>
                        <a href=""class="like">dislike</a>
                        @if(Auth::user() == $post->user)
                        <a href="#" class="edit">edit</a>
                        <a href="{{route('delete',['post_id'=> $post->id ])}}">delete</a>
                        @endif
                    </div>
                </article>
                @endforeach
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id='edit-modal'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-group">
         <textarea name="body" id="post-body" rows="5" class="form-control" placeholder="edit your post!"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"id="modal-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    var token = '{{Session::token()}}';
    var urlEdit = '{{ route ('edit')}}';
    var urlLike = '{{ route ('like')}}';

</script>
@endsection