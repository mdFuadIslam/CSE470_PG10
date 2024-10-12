@extends('layouts.master')
@section('project')

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Thread Owner View</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loginBox">
@foreach($data as $thread)
<p>Title=>{{$thread->threadName}}</P>
<p>Owner=>{{$thread->username}}</P>
<p>Thread ID=>{{$thread->threadID}}</P>
<p>Content=>{{$thread->threadContent}}</P>
<!-- <form method="post" action="upVote">
    @csrf
    <input type="hidden" name="id" value="threadId">
    {{$thread->upVote}}
    <input type="submit" name="upVote" value='upVote'>
</form>
<form method="post" action="downVote">
    @csrf
    <input type="hidden" name="id" value="threadId">
    {{$thread->downVote}}
    <input type="submit" name="downVote" value='downVote'>
</form> -->
<form method="post" action="deleteThread">
    @csrf
    <input type="hidden" name="id" value="{{$thread->threadID}}">
    <input type="submit" name="deleteThread" value='deleteThread'>
</form>
</div>
@break
@endforeach
<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Comments</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="comment" method="post">
    @csrf
    <input type='hidden' name="threadID" value="{{$thread->threadID}}">
    <div class="loginBox">
    Comment:
    <textarea name="threadComment" rows="2" cols="60"></textarea>
    </div>
    <div class="loginBox">
    <input type="submit" name="comment" value="comment" class="read_more">
    </div>
</form>
@foreach($data as $thread)
<div class="loginBox">
<?php
if ($thread->commenter!=NULL){
    ?>
<p>User=>{{$thread->commenter}}</P>
<?php
$username=Auth::user()->name;
$commenter=$thread->commenter;
if ($username!=$commenter){
?>
<form method="post" action="ban">
    @csrf
    <input type="hidden" name="username" value="{{$thread->commenter}}">
    <input type="hidden" name="id" value="{{$thread->threadID}}">
    <input type="submit" name="ban" value='ban'>
</form>
<?php
}
?>
<p>Comment=>{{$thread->comment}}</P>
<!-- <form method="post" action="upCVote">
    @csrf
    <input type="hidden" name="id" value="threadId">
    {{$thread->upCVote}}
    <input type="submit" name="upCVote" value='upCVote'>
</form>
<form method="post" action="downCVote">
    @csrf
    <input type="hidden" name="id" value="threadId">
    {{$thread->downCVote}}
    <input type="submit" name="downCVote" value='downCVote'>
</form> -->
<?php
}
?>
</div>
@endforeach
@endsection