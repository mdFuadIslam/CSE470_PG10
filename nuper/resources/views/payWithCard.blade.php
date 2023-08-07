@extends('layouts.master')
@section('project')
<form action='installmentsInvoice' method='post'>
    @csrf
    Card Number:
    <input type="text" name="cnumber" id="cnumber" placeholder="Enter card Number">
    Expiry Date:
    <input type="text" name="date" id="date" placeholder="date-month-year">
    CVV:
    <input type="text" name="cvv" id="cvv" placeholder="Enter CVV number">
    <input type='submit' name='submit' id='submit' value='pay'>
</form>
@endsection