@extends('layouts.app')
@section('title','Hash')
@section('content')
    <div class="container">
        <div class="hash">
            <div class="hash-item">
                <label class="switch">
                    <input type="checkbox" value="md5"  autocomplete="off">
                    <div class="slider round"></div>
                    <span class="hash-name">md5</span>
                </label>
            </div>

            <div class="hash-item">
                <label class="switch">
                    <input type="checkbox" value="sha1"  autocomplete="off">
                    <div class="slider round"></div>
                    <span class="hash-name">sha1</span>
                </label>
            </div>

            <div class="hash-item">
                <label class="switch">
                    <input type="checkbox" value="whirlpool "  autocomplete="off">
                    <div class="slider round"></div>
                    <span class="hash-name">whirlpool</span>
                </label>
            </div>

            <div class="hash-item">
                <label class="switch">
                    <input type="checkbox" value="sha512"  autocomplete="off">
                    <div class="slider round"></div>
                    <span class="hash-name">sha512</span>
                </label>
            </div>

            <div class="hash-item">
            <label class="switch">
                <input type="checkbox" value="gost"  autocomplete="off">
                <div class="slider round"></div>
                <span class="hash-name">gost</span>
            </label>
            </div>
        </div>

        <div class="words">
        @foreach($words as $word)
            <input class="item" type="checkbox" name="vehicle" autocomplete="off"
                   value="{{$word->id}}"> <span class="item">{{$word->word}}</span><br>
        @endforeach
        </div>

        <div class="js-table" style="overflow-x:auto">
            <table>
            </table>
        </div>

        <div class="js-button"></div>

    </div>