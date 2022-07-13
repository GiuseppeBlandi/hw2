@extends('layouts.feed')

@section('title', 'TuttoF1 | Home')
    
@section('script')
<script src='{{ asset("js/home.js") }}' defer></script>
@endsection
@section('style')
<link rel='stylesheet' href='{{ asset("css/home.css") }}'>
@endsection


@section('content')

        <section class='races'>
        <div class='last_race'></div> 
            <div class='next_race'></div>    
        </section>
        
        <main>
            <section id="feed">
            <template id="post_template">
                <article class="post">
                    <div class="userinfo">
                        <div class="names">
                            <a>
                                <div class="name"></div>
                                <div class="username"></div>
                            </a>
                        </div>
                        <div class="time"></div>
                    </div>
                    <div class="content"></div>
                    <div class="actions">
                        <div class="like"><span></span></div>
                        <div class="comment"><span></span></div> 
                    </div>
                    <div class="comments">
                            <div class="past_messages"></div>
                            <div class="comment_form">
                                <form autocomplete="off">
                                    <input type="text" name="comment" maxlength="254" placeholder="Scrivi un commento..." required="required">
                                    <input type="submit">
                                    <input type="hidden" name="post_id">
                                </form>
                        </div>
                    </div>
                </article>
            </section>
            </template>
        </main>

    @endsection
