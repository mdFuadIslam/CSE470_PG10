@extends('layouts.master')
@section('project')
Pay {{$total}} to 01111111111<br>
<form action='bkash' method='post'>
    @csrf
    your Number:
    <input type="text" name="number" id="number" placeholder="Enter Bkash Number">
    Transaction Id:
    <input type="text" name="trxID" id="trxID" placeholder="Enter transaction number">
    <input type='submit' name='submit' id='submit' value='pay'>
</form>
@endsection