@extends('dashboard-adminlte.parent')
@section('title', 'Logs')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Causer</th>
                    <th scope="col">subject (Model)</th>
                    <th scope="col">properties</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($logs as $log )
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>  {{ $log->description }}</td>
                        <th>  {{ $log->causer?->name}}</th>
                        <th>  {{ $log->subject?->name	 }}</th>

                        <th>
                            @foreach($log->properties as $properties)
                                <ul>
                                    @if(isset($properties['name'])  && $properties['name'] != 'null')
                                        <li>
                                            Name : {{  $properties['name'] }} Task
                                        </li>
                                    @endif
                                    @if(isset($properties['url']) && $properties['url'] != 'null')
                                        <li> Url : {{$properties['url']}}</li>
                                    @endif
                                    @if(isset($properties['username']) && $properties['username'] != 'null')
                                        <li>
                                            username : {{  $properties['username'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['password']) && $properties['password'] != 'null')
                                        <li>
                                            password : {{  $properties['password'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['port']) && $properties['port'] != 'null')
                                        <li>
                                            port : {{  $properties['port'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['server']) && $properties['server'] != 'null')
                                        <li>
                                            server : {{  $properties['server'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['title']) && $properties['title'] != 'null')
                                        <li>
                                            title : {{  $properties['title'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['value']) && $properties['value'] != 'null')
                                        <li>
                                            value : {{  $properties['value'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['label']) && $properties['label'] != 'null')
                                        <li>
                                            label : {{  $properties['label'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['type']) && $properties['type'] != 'null')
                                        <li>
                                            type : {{  $properties['type'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['event']) && $properties['event'] != 'null')
                                        <li>
                                            event : {{  $properties['event'] }}
                                        </li>
                                    @endif
                                    @if(isset($properties['callback']) && $properties['callback'] != 'null')
                                        <li>
                                            callback : {{$properties['callback']}}
                                        </li>
                                    @endif
                                    @if(isset($properties['body']) && $properties['body'] != 'null')
                                        <li>
                                            body : {{$properties['body']}}
                                        </li>
                                    @endif
                                </ul>
                            @endforeach
                        </th>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
