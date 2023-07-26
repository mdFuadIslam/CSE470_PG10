@extends('layouts.master')
@section('project')

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Threads</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="rightButton" type="button"><a href="createThread">Create new thread</a></button><br>
<form action='searchThread' method='post'>
    @csrf
    <div class="loginBox">
    <input type='text' name='searchName' id='searchName' placeholder='Search'>
    </div>
    <div class="loginBox">
    <input type="submit" name='search' value='Search'>
    </div>
</form>
<p class='loginBox'>
<button type="button"><a href="latestThread">Latest</a></button><br>
<button type="button"><a href="oldestThread">Oldest</a></button><br>
</p>
@foreach($data as $thread)
    <p class="loginBox"><a href="thread/{{$thread->threadID}}">{{$thread->threadName}}</a></P>
    <p class="loginBox">UpVotes:{{$thread->upVote}} || DownVotes:{{$thread->downVote}}</p>
@endforeach
@endsection