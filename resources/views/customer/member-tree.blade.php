@extends('layouts.app')

@section('title', 'Affiliate')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/tree.css') }}" />
@endsection

@section('content')
    <div>
        <div class="py-5 lg:py-6 flex justify-between">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Affiliate
          </h2>
          <div class="space-y-2 md:space-y-2">
            <a href="{{ route('customerDirectMembers') }}" class="btn bg-primary px-3 py-1 text-xs font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 mr-2">
              MY DIRECT MEMBERS
            </a>
            {{-- <a href="{{ route('customerAllMembers') }}" class="btn bg-success px-3 py-1 text-xs font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
              ALL MEMBERS
            </a> --}}
          </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-5 space-y-1 h-8">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                Member Tree
              </h2>
              <p>
                Display members in tree view.
              </p>
              <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="btn bg-info text-xs font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">Go Back</a>
            </div>


             @php
                if (Auth::user()->user_role != "USER") {
                    $treeUrl = "admin/tree/";
                } else {
                    $treeUrl = "customer/affiliate/tree/";
                }                
            @endphp


            <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <div class="LupazTree">
                        <div class="row midline">
                            <div class="col-12">
                                <div class="tree-level1">
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                    
                                    @if ($data['parent_det'])
                                        @if (count($data['parent_det']['getActiveActivations']))
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                        @else
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                        @endif
                                        <span>{{ $data['parent_det']->login_id }}</span>
                                    @else
                                        <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                        <span>Absent</span>
                                    @endif
                                    <div class="LupazTree-tooip-text">
                                        <div class="too-mid">
                                            @if ($data['parent_det'])
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> {{ $data['parent_det']->login_id }}
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> {{ $data['parent_det']->name }}
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> {{ $data['parent_det']->sponsor_id }}
                                                    </li> 
                                                    <li>
                                                        @if ($data['parent_det']->parentId == 0)
                                                            <strong> Placement Id: </strong> NA
                                                        @else
                                                            <strong> Placement Id: </strong> {{ $data['parent_det']['getLoginIdByParentId']->login_id }}
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['parent_det']->created_at)) }}
                                                    </li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Placement Id: </strong> NA
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> NA
                                                    </li>
                                                </ul>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div> 
                        <div class="row midline">
                            <div class="line-H">
                            </div>
                            <div class="col-6">
                                <div class="tree-level2">
                                    @if ($data['left_child_1'])
                                        <a href="{{ url($treeUrl.Crypt::encrypt($data['left_child_1']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                    @else
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                    @endif
                                    
                                    @if ($data['left_child_1'])
                                        @if (count($data['left_child_1']['getActiveActivations']))
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                        @else
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                        @endif
                                        <span>{{ $data['left_child_1']->login_id }}</span>
                                    @else
                                        <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                        <span>Absent</span>
                                    @endif
                                    <div class="LupazTree-tooip-text">
                                        <div class="too-mid">
                                            @if ($data['left_child_1'])
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> {{ $data['left_child_1']->login_id }}
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> {{ $data['left_child_1']->name }}
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> {{ $data['left_child_1']->sponsor_id }}
                                                    </li> 
                                                    <li>
                                                        <strong> Placement Id: </strong> {{ $data['left_child_1']['getLoginIdByParentId']->login_id }}
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['left_child_1']->created_at)) }}
                                                    </li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Placement Id: </strong> NA
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> NA
                                                    </li>
                                                </ul>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="tree-level2">
                                    @if ($data['right_child_1'])
                                        <a href="{{ url($treeUrl.Crypt::encrypt($data['right_child_1']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                    @else
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                    @endif

                                    @if ($data['right_child_1'])
                                        @if (count($data['right_child_1']['getActiveActivations']))
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                        @else
                                            <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                        @endif
                                        <span>{{ $data['right_child_1']->login_id }}</span>
                                    @else
                                        <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                        <span>Absent</span>
                                    @endif
                                    <div class="LupazTree-tooip-text">
                                        <div class="too-mid">
                                            @if ($data['right_child_1'])
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> {{ $data['right_child_1']->login_id }}
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> {{ $data['right_child_1']->name }}
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> {{ $data['right_child_1']->sponsor_id }}
                                                    </li> 
                                                    <li>
                                                        <strong> Placement Id: </strong> {{ $data['right_child_1']['getLoginIdByParentId']->login_id }}
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['right_child_1']->created_at)) }}
                                                    </li>
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>
                                                        <strong> User Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Name: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Sponsor Id: </strong> NA
                                                    </li> 
                                                    <li>
                                                        <strong> Placement Id: </strong> NA
                                                    </li>
                                                    <li>
                                                        <strong> Daet of Joining: </strong> NA
                                                    </li>
                                                </ul>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="line-v">
                            </div>
                        </div> 
                        <div class="row t-row-3"> 
                            <div class="col-6">
                                <div class="row midline">
                                    <div class="line-H">
                                    </div>
                                    <div class="col-6 p-0">
                                        <div class="tree-level tree-level3-4">
                                            @if ($data['left_child_2'])
                                                <a href="{{ url($treeUrl.Crypt::encrypt($data['left_child_2']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @else
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @endif
                                        
                                            @if ($data['left_child_2'])
                                                @if (count($data['left_child_2']['getActiveActivations']))
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                                @else
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                                @endif
                                                <span>{{ $data['left_child_2']->login_id }}</span>
                                            @else
                                                <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                                <span>Absent</span>
                                            @endif
                                            <div class="LupazTree-tooip-text">
                                                <div class="too-mid">
                                                    @if ($data['left_child_2'])
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> {{ $data['left_child_2']->login_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> {{ $data['left_child_2']->name }}
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> {{ $data['left_child_2']->sponsor_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> {{ $data['left_child_2']['getLoginIdByParentId']->login_id }}
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['left_child_2']->created_at)) }}
                                                            </li>
                                                        </ul>
                                                    @else
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> NA
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> NA
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="col-6 p-0">
                                        <div class="tree-level">
                                            @if ($data['right_child_2'])
                                                <a href="{{ url($treeUrl.Crypt::encrypt($data['right_child_2']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @else
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @endif
                                        
                                            @if ($data['right_child_2'])
                                                @if (count($data['right_child_2']['getActiveActivations']))
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                                @else
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                                @endif
                                                <span>{{ $data['right_child_2']->login_id }}</span>
                                            @else
                                                <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                                <span>Absent</span>
                                            @endif
                                            <div class="LupazTree-tooip-text">
                                                <div class="too-mid">
                                                    @if ($data['right_child_2'])
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> {{ $data['right_child_2']->login_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> {{ $data['right_child_2']->name }}
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> {{ $data['right_child_2']->sponsor_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> {{ $data['right_child_2']['getLoginIdByParentId']->login_id }}
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['right_child_2']->created_at)) }}
                                                            </li>
                                                        </ul>
                                                    @else
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> NA
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> NA
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>  
                                    <div class="line-v">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row midline">
                                    <div class="line-H">
                                    </div>
                                    <div class="col-6 p-0">
                                        <div class="tree-level3">
                                            @if ($data['left_child_3'])
                                                <a href="{{ url($treeUrl.Crypt::encrypt($data['left_child_3']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @else
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @endif
                                        
                                            @if ($data['left_child_3'])
                                                @if (count($data['left_child_3']['getActiveActivations']))
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                                @else
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                                @endif
                                                <span>{{ $data['left_child_3']->login_id }}</span>
                                            @else
                                                <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                                <span>Absent</span>
                                            @endif
                                            <div class="LupazTree-tooip-text">
                                                <div class="too-mid">
                                                    @if ($data['left_child_3'])
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> {{ $data['left_child_3']->login_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> {{ $data['left_child_3']->name }}
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> {{ $data['left_child_3']->sponsor_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> {{ $data['left_child_3']['getLoginIdByParentId']->login_id }}
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['left_child_3']->created_at)) }}
                                                            </li>
                                                        </ul>
                                                    @else
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> NA
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> NA
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div> 
                                    <div class="col-6 p-0">
                                        <div class="tree-level3 tree-level3-1">
                                            @if ($data['right_child_3'])
                                                <a href="{{ url($treeUrl.Crypt::encrypt($data['right_child_3']->users_id)) }}" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @else
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" id="myTooltip1" class="mytooltip">
                                            @endif
                                            
                                            @if ($data['right_child_3'])
                                                @if (count($data['right_child_3']['getActiveActivations']))
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-active.png') }}"> 
                                                @else
                                                    <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-inactive.png') }}"> 
                                                @endif
                                                <span>{{ $data['right_child_3']->login_id }}</span>
                                            @else
                                                <img class="display-inline" src="{{ asset('dashboard-assets/images/avatar/user-absent.png') }}">
                                                <span>Absent</span>
                                            @endif
                                            <div class="LupazTree-tooip-text">
                                                <div class="too-mid">
                                                    @if ($data['right_child_3'])
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> {{ $data['right_child_3']->login_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> {{ $data['right_child_3']->name }}
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> {{ $data['right_child_3']->sponsor_id }}
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> {{ $data['right_child_3']['getLoginIdByParentId']->login_id }}
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> {{ date('d M Y', strtotime($data['right_child_3']->created_at)) }}
                                                            </li>
                                                        </ul>
                                                    @else
                                                        <ul>
                                                            <li>
                                                                <strong> User Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Name: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Sponsor Id: </strong> NA
                                                            </li> 
                                                            <li>
                                                                <strong> Placement Id: </strong> NA
                                                            </li>
                                                            <li>
                                                                <strong> Daet of Joining: </strong> NA
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>  
                                    <div class="line-v">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection