@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
            <div class="row cover-image">
@include('helpers.cover-image', ['cover_image' => $fields['cover_image']])
            </div>
@overwrite
