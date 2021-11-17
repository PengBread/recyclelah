@extends('layouts.navfoot')

@section('navfoot')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">

    <div>
        <div id="faqTitle" class="pt-5 pb-5" style="background: #f3fdf5d7;">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>Top Recycling Users</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center" style="text-align: center;">
                    <p class="p-3">The top 10 users in recycling.</p>
                </div>
            </div>
        </div>

        <div style="min-height: 54vh; background-image: url({{asset('/images/recyclebg1.jpg')}})">
            <div style="min-height: 54vh; background: #f3fdf5b7;">
                <div id="rankings-Main" class="container mx-auto p-lg-5">
                    <div class="border">
                        <div>
                            <table class="table" id="scheduleTable">
                                @csrf
                                
                                <thead>
                                    <tr style="">
                                    <th scope="col" style="width: 15%; text-align: center;">Rank</th>
                                    <th scope="col" style="width: 70%;">Name</th>
                                    <th scope="col" style="width: 25%; text-align: center;">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($rankList as $rank)
                                    @if($rank->name != 'root')
                                        <tr style="">
                                            <th scope="row" style="text-align: center;">
                                            @if($count == 1)
                                                <span class="mdi mdi-trophy" value="{{ $count++ }}"></span>
                                            @elseif($count == 2)
                                                <span class="mdi mdi-trophy-award" value="{{ $count++ }}"></span>
                                            @elseif($count == 3)
                                                <span class="mdi mdi-trophy-award" value="{{ $count++ }}"></span>
                                            @else
                                                <span class="">{{ $count++ }}</span>
                                            @endif
                                            </th>
                                            <td>{{ $rank->name }}</td>
                                            <td style="text-align: center;">{{ $rank->points }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

