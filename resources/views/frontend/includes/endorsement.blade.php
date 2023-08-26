<div class="endorsement-section small-sec-height">
    <div class="container">
        <div class="endorsement-row flex">
            <div
                class="endorsement-student-column endorsement-column"
            >
                <div class="reg-field-wrapp">
                    <div class="content">
                        <div class="heading">
                            <h3>Admit as a <br> Student</h3>
                        </div>
                        <div class="button">

                            @if(isset($studentPortal->saved_data) && !empty(json_decode($studentPortal->saved_data)->{'portal-url'}))
                                <a href="{{ json_decode($studentPortal->saved_data)->{'portal-url'} }}"  target="_blank" class="text-align">Apply</a>
                            @endif
                        </div>
                    </div>
                    <div class="bg-image">
                        <img
                            src="{{ asset('frontend/img/endorsement/Student-enroll.png') }}"
                        />
                    </div>
                </div>
            </div>
            <div
                class="endorsement-member-column endorsement-column"
            >
                <div class="reg-field-wrapp">
                    <div class="content">
                        <div class="heading">
                            <h3>Register as a Member</h3>
                        </div>
                        <div class="button">

                            @if(isset($memberPortal->saved_data) && !empty(json_decode($memberPortal->saved_data)->{'portal-url'}))
                                <a href="{{ json_decode($memberPortal->saved_data)->{'portal-url'} }}"  target="_blank" class="text-align">Apply</a>
                            @endif

                        </div>
                    </div>
                    <div class="bg-image">
                        <img
                            src="{{ asset('frontend/img/endorsement/register-imgae.png') }}"
                        />
                    </div>
                </div>
            </div>
            <div
                class="endorsement-endor-column endorsement-column"
            >
                <div class="reg-field-wrapp">
                    <div class="content">
                        <div class="heading">
                            <h3>
                                Obtain Practicing License
                            </h3>
                        </div>
                        <div class="button">
                            <a href="#" class="text-align">Apply</a>
                        </div>
                    </div>
                    <div class="bg-image">
                        <img
                            class="object-fit-cover"
                            src="{{ asset('frontend/img/endorsement/Untitled-1.png') }}"
                        />
                    </div>
                </div>
            </div>
            <div
                class="endorsement-endor-column new endorsement-column"
            >
                <div class="reg-field-wrapp">
                    <div class="content">
                        <div class="heading">
                            <h3>
                                Find a corporate leader
                            </h3>
                        </div>
                        <div class="button">
                            <a href="#" class="text-align">Find</a>
                        </div>
                    </div>
                    <div class="bg-image">
                        <img
                            class="object-fit-cover"
                            src="{{ asset('frontend/img/endorsement/new.png') }}"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
