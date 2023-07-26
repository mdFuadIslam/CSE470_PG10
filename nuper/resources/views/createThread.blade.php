@extends('layouts.master')
@section('project')

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Create Thread</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="createThread" method="post">
    @csrf
    <div class="loginBox">
    <input type="text" name="threadName" id="threadName" placeholder="Enter Thread name">
    </div>
    <div class="loginBox">
    Thread Content:
    <textarea name="threadContent" rows="10" cols="100"></textarea>
    </div>
    <div class="loginBox">
    <input type="submit" name="post" value="post" class="read_more">
    </div>
</form>
@endsection