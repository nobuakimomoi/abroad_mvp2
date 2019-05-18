@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <h2>Sign up completed!</h2>
                <p>Please select one of the below two options</p>
                </div>

                <div class="col-md-6"><div class="panel panel-default"><div class="panel-body signup_option_square">
                    <a href="https://forms.gle/JgWQFV7E3JDhng6MA">
                        <div class="signup_option_square2" id="write-review">
                            <h2 class="signup_completed_sub_title">Share your work/internship/job application experience</h2>
                            <p class="sign_up_sub_desc">Share a review of your work / internship / application experience and view all the reviews by the international talents in Japan for free!</p>
                            <p><br><br>Free / 2 minutes~</p>
                        </div>
                     </a>
                </div></div></div>
                <div class="col-md-6"><div class="panel panel-default"><div class="panel-body signup_option_square">
                     <a href="web-resume-student.html">
                        <div class="signup_option_square2">
                            <h2 class="signup_completed_sub_title">Register for Abroad Career Service</h2>
                            <p class="sign_up_sub_desc">Register and view all the reviews by the international talents in Japan for free!</p>
                            <p class="sign_up_sub_desc">Abroad career service is currently under consutraction. Register from here if you want to be notified when the service is launched.</p>
                            <p>Free</p>
                        </div>
                    </a>
                </div></div></div>
                
            <a href="/">
                <button class="btn btn-primary btn-lg btn-center">Come back later</button>
            </a>
            
            <!--<section>-->
            <!--    <div class="come_back_later">-->
            <!--        <a href="index.html"><button class="come_back_later btn">Come back later</button></a>-->
            <!--    </div>-->
            <!--</section>-->


                
        </div>
    </div>
</div>
@endsection
