@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body app-home">
        <form action="{{route('filter_group')}}" method="get">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search">
                </div>
                <div class="col-md-4">
                    <select name="date" id="date" class="form-control">
                        <option value="">All</option>
                        @foreach ($buffer as $item)
                        @php
                    $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->sent_at)->format('d M Y');
                @endphp
                        <option value="{{$item->sent_at}}">{{$time}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="col-md-4">
                    <select name="group_type" id="select" class="form-control">
                        <option value="">All</option>
                        @foreach ($group as $groups)
                        <option value="{{$groups->group_id}}">{{$groups->group_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            
            <div class="col-md-12">
                <h2>Recent post sent to buffer</h2>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text </th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($buffer as $item)
                        <tr>
                        <td>
                            @if ($item->groupInfo)
                            {{$item->groupInfo->name}}
                            @endif
                            
                        </td>
                        <td>
                            @if ($item->groupInfo)
                            {{$item->groupInfo->type}}
                            
                            @endif
                        </td>
                        <td>
                            @if ($item->accountInfo)
                            <img src="{{$item->accountInfo->avatar}}" alt="">
                            @endif
                            
                        </td>
                        <td>{{$item->post_text}}</td>
                        <td>
                            @php
                                $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->sent_at)->format('d M Y g:i A');
                            @endphp
                            {{$time}}
                        </td>
                      </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                  {{ $buffer->links() }}
            </div>
        </div>
        </div>
        
    </div>
    
@endsection