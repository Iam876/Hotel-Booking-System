<div class="team-area-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">TEAM</span>
            <h2>Let's Meet Up With Our Special Team Members</h2>
        </div>
        <div class="team-slider-two owl-carousel owl-theme pt-45">
            @foreach ( $teams as $team)
                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ $team->image }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">{{ $team->name }}</a></h3>
                        <span>{{ $team->position }}</span>
                        <ul class="social-link">
                            <li>
                                <a href="{{ $team->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->twitter }}" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->github }}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{ $team->youtube }}" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach

            {{-- <div class="team-item">
                <a href="team.html">
                    <img src="{{ asset('frontend') }}/assets/img/team/team-img2.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="team.html">Carrie Horton</a></h3>
                    <span>Chief Reception Officer</span>
                    <ul class="social-link">
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="team-item">
                <a href="team.html">
                    <img src="{{ asset('frontend') }}/assets/img/team/team-img5.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="team.html">Brian Orlando</a></h3>
                    <span>Housekeeping</span>
                    <ul class="social-link">
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="team-item">
                <a href="team.html">
                    <img src="{{ asset('frontend') }}/assets/img/team/team-img4.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="team.html">Michael Evens</a></h3>
                    <span>Housekeeping</span>
                    <ul class="social-link">
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</div>
