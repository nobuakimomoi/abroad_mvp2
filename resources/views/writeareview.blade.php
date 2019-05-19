@extends('layouts.app')
@section('content')
<div class="container">
<div class="panel panel-body margin-top">

<!--<div class="row">-->
    <div class="col-md-12 text-center">
    <p>{{$company->company_name}}の企業レビューを書きますか？</p>
    
    <h3>Share your review with other international talents in Japan</h3>
    <p>Sharing is caring</p>
    <p>Your name and other personal information will never go public.</p>
    <p>Your review will only be posted on this website after Abroad team checks your review and makes sure there is nothing crazy.</p>
    <p>Feel free to contact us via the email address below if you have any questions or suggestions!</p>
    </div>
    
        
      <!-- action先はdata base連携時に更新 -->
    <form action="{{ url('reviews') }}" method="POST">
        {{ csrf_field() }}


        <dl class="form-inner">
            <dt class="form-title_review check-radio">Employment condition</dt>
            <dd class="form-item_review">
                <label for="permanent_employee" ><input type="radio" name="employment_condition" id="permanent_employee" value="permanent_employee" class="radio_horizontal">Permanent</label>
                <label for="contact" ><input type="radio" name="employment_condition" id="contract" value="contract" class="radio_horizontal">Contract</label>                            
                <label for="temporary" ><input type="radio" name="employment_condition" id="temporary" value="temporary" class="radio_horizontal">Temporary&nbsp;/&nbsp;dispatched</label>
                <label for="internship" ><input type="radio" name="employment_condition" id="internship" value="internship" class="radio_horizontal">Internship</label>                         
                <label for="other_status" ><input type="radio" name="employment_condition" id="other_status" value="other_status" class="radio_horizontal">Other</label>
                <p>Abroad review website currentluy does not deal with part-time&nbsp;&#040;baito&#041;&nbsp;reviews.</p>
            </dd>
        </dl>
        <dl class="form-inner">
            <dt class="form-title_review check-radio school-type">Currently working in this role</dt>
                <dd class="form-item working_checkbox">
                    <input type="checkbox" name="enrollment_status" id="enrollment_status">
                </dd>
                
            <dt class="form-title_review radio_padding">Year of entry</dt>
            <dd class="form-item_review">
                 {{Form::selectYear('year', 1960, 2019)}}
            </dd>
            <dt class="form-title_review radio_padding">Year of retirement</dt>
            <dd class="form-item_review">
                 {{Form::selectYear('year', 1960, 2019)}}
            </dd>
        <dt class="form-title_review">Job function</dt>
            <dd class="form-item_review"><input type="text" name="function" class="text-box" placeholder="E.g. Sales, Accounting, Web Engineer, etc."></dd>
            <dt class="form-title_review">Department / division name</dt>
            <dd class="form-item_review"><input type="text" name="department" class="text-box"></dd>
            <dt class="form-title_review">Position name</dt>
            <dd class="form-item_review"><input type="text" name="position" class="text-box"></dd>
        </dl>
        Please be as specific as possible to the degree that reviewer is not identified.

        <h3 class="sign-up_sub-title">Rate the company.</h3>
        
        <dl class="form-inner">
            <dt class="form-title_review check-radio school-type">Work environment for non-Japanese employees</dt>
            <dd class="form-item_review"><!--@include('common.rating')-->
                <label><input type="radio" name="work_env_rate" value="5">Very good</label>
                <label><input type="radio" name="work_env_rate" value="4">Good</label>
                <label><input type="radio" name="work_env_rate" value="3">Not sure</label>
                <label><input type="radio" name="work_env_rate" value="2">Bad</label>
                <label><input type="radio" name="work_env_rate" value="1">Very bad</label>
            </dd>

            <dt class="form-title_review check-radio school-type">Employee growth oppurtunity/environment</dt>
            <dd class="form-item_review" >
                <label><input type="radio" name="growth_rate" value="5">Very good</label>
                <label><input type="radio" name="growth_rate" value="4">Good</label>
                <label><input type="radio" name="growth_rate" value="3">Not sure</label>
                <label><input type="radio" name="growth_rate" value="2">Bad</label>
                <label><input type="radio" name="growth_rate" value="1">Very bad</label>
            </dd>

            <dt class="form-title_review check-radio school-type">Promotion of non-Japanese employees</dt>
            <dd class="form-item_review">
                <label><input type="radio" name="promotion_rate"  value="5">Fair</label>
                <label><input type="radio" name="promotion_rate"  value="4">Somewhat fair</label>
                <label><input type="radio" name="promotion_rate"   value="3">Not sure</label>
                <label><input type="radio" name="promotion_rate"  value="2">Somewhat unfair</label>
                <label><input type="radio" name="promotion_rate"   value="1">Unfair</label>
            </dd>

            <dt class="form-title_review check-radio school-type">Work-life balance</dt>
            <dd class="form-item_review" >
                <label><input type="radio" name="work_life_balance_rate"   value="5">Very good</label>
                <label><input type="radio" name="work_life_balance_rate"   value="4">Good</label>
                <label><input type="radio" name="work_life_balance_rate"   value="3">Not sure</label>
                <label><input type="radio" name="work_life_balance_rate"   value="2">Bad</label>
                <label><input type="radio" name="work_life_balance_rate"   value="1">Very bad</label>
            </dd>

            <dt class="form-title_review check-radio school-type">Compensation and benefits</dt>
            <dd class="form-item_review" >
                <label><input type="radio" name="c_and_b_rate"   value="5">Very good</label>
                <label><input type="radio" name="c_and_b_rate"   value="4">Good</label>
                <label><input type="radio" name="c_and_b_rate"   value="3">Not sure</label>
                <label><input type="radio" name="c_and_b_rate"   value="2">Bad</label>
                <label><input type="radio" name="c_and_b_rate"   value="1">Very bad</label>
            </dd>
            <dt class="form-title_review check-radio school-type">Gender equality</dt>
            <dd class="form-item_review" >
                <label><input type="radio" name="gender_equality_rate"   value="5">Very good</label>
                <label><input type="radio" name="gender_equality_rate"   value="4">Good</label>
                <label><input type="radio" name="gender_equality_rate"   value="3">Not sure</label>
                <label><input type="radio" name="gender_equality_rate"   value="2">Bad</label>
                <label><input type="radio" name="gender_equality_rate"   value="1">Very bad</label>
            </dd>

            <dt class="form-title_review radio_padding">Average monthly overtime working hours
                <span style="font-size:1.4rem">&nbsp;&#040;残業&#041;&nbsp;</span></dt>
            <dd class="form-item_review">
                <select id = "overtime" >
                        <option value='0 hour"'>0 hour</option>
                        <option value='5 hours"'>5 hours</option>
                        <option value='10 hours"'>10 hours</option>
                        <option value='20 hours"'>20 hours</option>
                        <option value='30 hours"'>30 hours</option>
                        <option value='40 hours"'>40 hours</option>
                        <option value='50 hours"'>50 hours</option>
                        <option value='60 hours"'>60 hours</option>
                        <option value='70 hours"'>70 hours</option>
                        <option value='80 hours"'>80 hours</option>
                        <option value='90 hours"'>90 hours</option>
                        <option value='100 hours"'>100 hours</option>
                        <option value='120 hours"'>120 hours</option>
                        <option value='140 hours"'>140 hours</option>
                        <option value='160 hours"'>160 hours</option>
                        <option value='180 hours"'>180 hours</option>
                        <option value='"Longer than 200 hours"'>Longer than 200 hours</option>
                </select>
            </dd>
            <dt class="form-title_review radio_padding">Paid day off consumption rate</dt>
                <dd class="form-item_review">
                 {{Form::select('pdo_consumption_rate', ['0%','10%','20%','30%','40%','50%','60%','70%','80%','90%','100%'])}}
                </dd>
            </dl>

            <h3 class="sign-up_sub-title">Reviews of the company.</h3>
            <p>Make sure the total word count of all reviews sums up to at least 300 words.</p>

            <dl class="form-inner">
                <dt class="form-title_review">Work environment for non-Japanese employees</dt>
                <dd class="form-item_review form-details-item">
                    <textarea name="work_env" id="work_env" class="text-box text_count">Fair treatment of non-Japanese employees: Use of languages other than Japanese:
                    </textarea>
                    <div><span class="count"></span> words</div>
                </dd>
                                <dt class="form-title_review">Screening of non-Japanese candidates</dt>
                                <dd class="form-item_review form-details-item">
                                    <textarea name="screening" id="screening" class="text-box text_count"></textarea>
                                    <div><span class="count"></span> words</div>                             
                                </dd>
                                <dt class="form-title_review">Promotion of non-Japanese employees</dt>
                                <dd class="form-item_review form-details-item">
                                    <textarea name="promotion" id="promotion" class="text-box text_count"></textarea>
                                    <div><span class="count"></span> words</div>

                                </dd>
                                
                                <dt class="form-title_review">Employee growth opportuntiy / environment</dt>
                                <dd class="form-item_review form-details-item">
                                    <textarea name="growth" id="growth" class="text-box text_count"></textarea>
                                    <div><span class="count"></span> words</div>
                                </dd>
                                <dt class="form-title_review">Gender equality</dt>
                                <dd class="form-item_review form-details-item">
                                    <textarea name="gender_equality" id="gender_equality" class="text-box text_count"></textarea>
                                    <div><span class="count"></span> words</div>
                                </dd>
                                <dt class="form-title_review">Compensation and benefits</dt>
                                <dd class="form-item_review form-details-item">
                                    <textarea name="c_and_b" id="c_and_b" class="text-box text_count"></textarea>
                                    <div><span class="count"></span> words</div>

                                </dd>
                                
            </dl>
                            
                                
            <!-- user情報を送信 -->
            <input type="hidden" name="company_name" value="{{$company->company_name}}" />
            <input type="hidden" name="company_id" value="{{$company->id}}" />
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
            <!--/ user情報を送信 -->
                                
                                
            <!-- 企業 登録ボタン -->
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon glyphicon-send"></i> Submit
                    </button>
                </div>
            </div>
        </form>

    <!--</form>-->
    <!--</div>-->
    </div>
</div>
</div>
@endsection