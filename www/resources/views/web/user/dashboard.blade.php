@extends('web.layout.user')

@section('site_title', 'Dashboard | 4teamfantasy')

@section('custom_header')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('main_content')

    <div class="inner">
        <div class="container">
            <h1 class="page_header">rookie level dashboard</h1>

            <div class="info">
                <div class="row mb-5">
                    @if ($my_group != null)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="box shadow-sm d-flex flex-column justify-content-between">
                                <p class="box_title  text-secondary">MY GROUP</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div>
                                            <img class="rounded" src="{{ asset($my_group->group_logo) }}" width="60"
                                                alt="">
                                        </div>
                                        <div class="ms-3">
                                            <p class=" group_name">{{ $my_group->group_name }}</p>
                                            <p class=" group_type">Group Type: {{ $my_group->group_type }}</p>
                                            <p class=" points">POINTS: {{ $my_group->group_points }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="number fs-2 ">{{ $my_group->total_no_of_member }}</p>
                                        <p class=" total_no_text text-secondary">TOTAL <br> MEMBERS</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-view-details shadow-none" id="groupDetails"
                                        data-id="{{ Crypt::encrypt($my_group->id) }}">VIEW DETAILS</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($my_group == null)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="box shadow-sm p-0">
                                <div class="row h-100">
                                    <div class="col-5 left_image_div d-flex justify-content-center align-items-center">
                                        <div class="rotate_bg"></div>
                                        <div>
                                            <img src="{{ asset('web_assets/images/block2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <button class="fa-solid fa-pen-to-square mx-auto border-0 mb-2"
                                                data-bs-toggle="modal" data-bs-target="#createGroupModal"></button>
                                            <p class="create_group">CREATE NEW GROUP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="box image shadow-sm p-0">
                            <img src="{{ asset('web_assets/images/block3.png') }}" class="w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>


            {{-- Groups --}}
            <div class="groups">
                <div class="d-flex justify-content-between">
                    <p class="section_header">groups</p>
                    <a href="{{ route('user.view.groups') }}" class="view_all">VIEW ALL LIST</a>
                </div>
                <div class="row">
                    @forelse ($other_groups as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="box p-3 shadow-sm">
                                <div class="h-100 d-flex justify-content-between flex-column">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($item->group_logo) }}" height="50" width="50"
                                                alt="">
                                            <div class="ms-2">
                                                <p class="group_name ">$item->group_name</p>
                                                <p class="group_type ">GROUP TYPE: $item->group_type</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="number fs-2 ">$item->total_no_of_member</p>
                                            <p class=" total_no_text text-secondary">TOTAL <br> MEMBERS</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-view-details" data-bs-toggle="offcanvas"
                                            data-bs-target="#viewGroupDetails">VIEW DETAILS</button>
                                        <button class="btn btn-join"><i class="fa-solid fa-plus"></i> JOIN THE
                                            GROUP</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="box p-3 shadow-sm d-flex justify-content-center align-items-center">
                                <h4 class="no-data-found-text text-muted">No Groups Found!</h4>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            {{-- Drafted teams --}}
            <div class="col-md-12 d-none">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="drafted_teams p-4 bg-white shadow-sm">
                            <p class="section_header mb-2">drafted teams</p>
                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/arizona_cardinals_logo.png') }}" width="60"
                                        alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">ARIZONA CARDINALS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/299.png') }}" width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">ATLANTA FALCONS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/318.png') }}" width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">BALTIMORE RAVENS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/cincinnati_bengals_logo_primary_2021_sportslogosnet-2049.png') }}"
                                        width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">CINCINNATI BENGALS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/9116_new_york_jets-primary-2019.png') }}"
                                        width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">NEW YORK JETS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/2704_minnesota_vikings-primary-20131.png') }}"
                                        width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">MINNESOTA VIKINGS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/8521_las_vegas_raiders-primary-20201.png') }}"
                                        width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">LAS VEGAS RAIDERS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>

                            <div class="drafted_teams_single">
                                <div>
                                    <img src="{{ asset('web_assets/images/new_york_giants_logo_primary_20005208.png') }}"
                                        width="60" alt="">
                                </div>
                                <div class="team_details w-100">
                                    <p class="team_name">NEW YORK GIANTS</p>
                                    <span>DRAFTED</span>
                                    <span>20-07-2022</span>
                                    <button class="btn btn_view_team_profile">VIEW PROFILE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- View group details --}}
    <div class="offcanvas offcanvas-end view_details_aside" tabindex="-1" id="offCanvasModal"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                {{-- Header --}}
                <div class="view_groupDetails_header">
                    <div class="d-flex align-items-center">
                        <div>
                            <img id="view_group_logo" src="" height="100" width="100" alt="">
                        </div>
                        <div class="w-100 ms-2">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="group_name" id="view_group_name"></p>
                                    <p class="group_type" id="view_group_type"></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="number fs-2" id="view_total_group_member"></p>
                                    <p class=" total_no_text text-secondary">TOTAL <br> MEMBERS</p>
                                </div>
                            </div>
                            <P class="group_intro text-secondary" id="view_group_intro"></P>
                        </div>
                    </div>

                    <div>
                        <div class="row g-0 mt-4">
                            <div class="col-6">
                                <p class="draft_label">NEXT DRAFT DATE AND TIMING</p>
                                <p class="draft_date_time">1ST SEPT 2022 | 12:30 PM</p>
                            </div>
                            <div class="col-6">
                                <button class="btn btn_join_draft float-end shadow-none"><i class="fa-solid fa-plus"></i>
                                    JOIN
                                    THE
                                    DRAFT</button>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-join float-end bg-black text-white rounded-0 shadow-none"><i
                                        class="fa-solid fa-plus"></i>
                                    JOIN THE
                                    GROUP</button>
                                <button class="btn btn_invite bg-main text-white rounded-0 float-end shadow-none"
                                    data-bs-toggle="modal" data-bs-target="#inviteModal">INVITE</button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="group_members">
                    <p class="member_label">7 MEMBERS OF THE GROUP</p>
                    <div class="swiper member-slider">
                        <div class="swiper-wrapper members mt-4">
                            @for ($i = 0; $i < 7; $i++)
                                <div class="swiper-slide singleMember">
                                    <img src="{{ asset('web_assets/images/image.png') }}" alt="">
                                    <p class="member_name">rita jack</p>
                                </div>
                            @endfor
                        </div>
                        {{-- <div class="swiper-pagination"></div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Create group modal --}}
    <div class="modal fade" id="createGroupModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <h4 class="modal-title">CREATE GROUP</h4>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="createGroupForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Group Name<sup>*</sup></label>
                                <input type="text" class="form-control" id="group_name" name="group_name" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Group Type<sup>*</sup></label>
                                <select name="group_type" class="form-control" id="type" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Group Introduction Line</label>
                            <input type="text" class="form-control" id="group_intro" name="group_intro"
                                maxlength="100">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Group Logo<sup>*</sup></label>
                            <input type="file" class="form-control" id="group_logo" name="group_logo" required>
                        </div>
                        <div class="form-group modal-footer border-0">
                            <button type="submit" class="btn btn-success group-btn">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Invite members to group -->
    <div class="modal fade" id="inviteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">INVITE USERS</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <input type="text" class="form-control shadow-none" id="link" name="link"
                                value="https://google.com" />
                        </div>
                        <button class="btn bg-main text-white shadow-none rounded-0 col-md-4" id="copyBtn"
                            onclick="copyToClipBoard()">COPY
                            LINK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_js')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".member-slider", {
            slidesPerView: 5,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                300: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
            },
        });
    </script>

    <script>
        $('#createGroupForm').on('submit', function(e) {

            e.preventDefault();

            const formData = new FormData(this);

            $('.group-btn').text('Please wait...');
            $('.group-btn').attr('disabled', true);

            $.ajax({
                url: "{{ route('user.create.group') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                            'icon': 'success',
                            'title': 'Great',
                            'text': data.message
                        }).then(() => {
                            $('#createGroupForm')[0].reset();
                            location.reload();
                        })

                    } else {
                        Swal.fire({
                            'icon': 'error',
                            'title': 'Oops..',
                            'text': data.message
                        });

                        $('.group-btn').text('SUBMIT');
                        $('.group-btn').attr('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        'icon': 'error',
                        'title': 'Oops..',
                        'text': error
                    });

                    $('.group-btn').text('SUBMIT');
                    $('.group-btn').attr('disabled', false);
                }
            });
        });

        $('#groupDetails').on('click', function(event) {
            event.stopPropagation();
            $.ajax({
                url: "{{ route('user.view.group.details') }}",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'group_id': $('#groupDetails').data('id')
                },
                success: function(data) {
                    if (data.status == 1) {
                        document.getElementById('view_group_name').innerHTML = data.message.group_name;
                        document.getElementById('view_group_type').innerHTML = 'GROUP TYPE: ' + ' ' +
                            data.message.group_type;
                        document.getElementById('view_total_group_member').innerHTML = data.message
                            .total_no_of_member;
                        document.getElementById('view_group_intro').innerHTML = data.message
                            .group_intro;
                        document.getElementById('view_group_logo').src = '/' + data.message.group_logo;
                        let bsOffcanvas = new bootstrap.Offcanvas($('#offCanvasModal'))
                        bsOffcanvas.show()
                    } else {
                        Swal.fire({
                            'icon': 'error',
                            'title': 'Oops',
                            'text': data.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        'icon': 'error',
                        'title': 'Oops',
                        'text': error
                    });
                }
            });
        });
    </script>

    <script>
        function copyToClipBoard() {
            /* Get the text field */
            var copyText = document.getElementById("link");
            var button = document.getElementById("copyBtn");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            button.innerHTML = 'Copied';
        }
    </script>
@endsection
