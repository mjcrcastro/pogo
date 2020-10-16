@extends('master')

@section('main')      
<!-- Masthead-->
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="text-uppercase mb-0">Log In</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div><h1>*</h1><div class="divider-custom-line"></div>
    </div>
    <p class="text-justify masthead-subheading font-weight-light mb-0">
        Use your <span class="font-weight-bold">Trainer Code</span> to Log in our site. Do not know your friend code? Follow Niantic's instructions <a class="btn btn-info" href="https://niantic.helpshift.com/a/pokemon-go/?p=web&s=friends-gifting-and-trading&f=friend-list-friendship-levels" target="_blank"> here </a>.</p> 
    <img class="img-fluid border rounded" src="/img/Login.PNG" alt=""/>
    <br>
    <br>
    <br>
    <h1 class="text-uppercase mb-0">Navigate through friend codes</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div><h1>*</h1><div class="divider-custom-line"></div>
    </div>
    <p class="text-justify masthead-subheading font-weight-light mb-0">
        Once you log In, <span class="font-weight-bold">you will be presented a QR code of the most current (active) friend code available to you</span>. You will not be shown codes marked as invalid by you or by other users of the site.
    </p> 

    <img src="/img/AddFriend.PNG" alt=""/>

    <p class="text-justify masthead-subheading font-weight-light mb-0">
        Scan the code with the "QR CODE" function of the "ADD FRIEND" option in your PokémonGo game. <kbd> Click/Tap</kbd> "Friend added show next" when the friend request is successful. <kbd> Click/Tap</kbd> "This is an Invalid Friend Code" if unsucessful.
    </p>

    <br>
    <br>
    <br>
    <p class="text-justify masthead-subheading font-weight-light mb-0">
        We believe Good Friend grinding is the fastest way to level up in Pokemon Go. Currently, Pokemon Go has a limit on the number of gifts you can open, but has no limit on the number of gifts you can send, so the only limit on the amount of XP you can earn daily is in the number of gifts you can harvest. You can use this site to level up if that’s your goal, or if you only need couple of friends to beat an in-game challenge. 
        If you find this site useful or have comments, please leave your comments in this <a class="btn btn-info" href="https://majcro.blogspot.com/2020/09/how-to-level-up-pokemon-go.html" target="_blank">blog</a>.
    </p>

    @stop {{-- End of section main --}}