@extends('layouts.app')
@include('partials.header')
<title>Мой аватар</title>
@section('content')
<div class="content">
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12 text-center">
            <div class="video-container">
                <video class="img-fluid media video-rounded" id="video" autoplay></video>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center mt-3">
        <div class="col-md-6 text-center">
            <button id="capture" class="btn btn-outline-dark made-avatar">Сделать снимок</button>
        </div>
    </div>

    <div class="row mt-3 justify-content-md-center ">
        <div class="col-md-6 text-center text-dark">
            <h2>Ваш последний аватар</h2>
            <div class="avatar  d-flex justify-content-md-center">
                <img class="img-fluid text-dark" src="/images/{{ Auth::user()->avatar }}" alt="">
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="agreement-section" id="agreementSection">
  <h3>Соглашение на обработку персональных данных</h3>
  <p>Нажимая кнопку "Принимаю", вы соглашаетесь на обработку ваших персональных данных, таких как использование веб-камеры и других технических средств для создания аватара. Ваши данные будут использованы исключительно для целей создания и отображения аватара в вашем личном кабинете.</p>
  <div class="d-flex justify-content-between">
  <button id="acceptButton" class="btn btn-outline-dark ">Принимаю</button>
  <a id="learnMoreButton" class="btn btn-dark" href="{{route('messsage')}}">Узнать больше</a>
@endsection

