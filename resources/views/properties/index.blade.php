@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                {!! link_to_route('properties.create', '新規物件追加',[], ['class'=> 'btn btn-success mb-2']) !!}
            </div>
            <div class="col-4 form-inline">
                {!! Form::open(['route'=>'properties.search', 'method'=>'get' ]) !!}
                    {!! Form::text('keyword',null,['class'=>'form-control', 'placeholder'=>'物件名を入力']) !!}
                    {!! Form::submit('検索', ['class'=>'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>物件名</th>
                    <th>価格（億）</th>
                    <th>満室想定（万）</th>
                    <th>利回り</th>
                    <th>土地面積（㎡）</th>
                    <th>建物面積（㎡）</th>
                    <th>構造</th>
                    <th>都道府県</th>
                    <th>市区町村</th>
                    <th>番地</th>
                    <th>最寄駅</th>
                    <th>駅徒歩</th>
                    <th>情報入手日</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                
                @if($property -> price && round($property->full_price / ($property->price * 10000) * 100, 2) >= 9 )
                <tr class="table-warning">
                    <td>{!! link_to_route('properties.show', $property->building_name, ['id' => $property]) !!}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->full_price }}</td>
                    @if($property -> price)
                    <td>{{ round($property->full_price / ($property->price * 10000) * 100, 2) }}% </td>
                    @else
                    <td> - </td>
                    @endif
                    
                    <td>{{ $property->site_area }}</td>
                    <td>{{ $property->building_area }}</td>
                    <td>{{ $property->architecture }}</td>
                    <td>{{ $property->prefecture }}</td>
                    <td>{{ $property->city }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->station }}</td>
                    <td>{{ $property->on_foot }}</td>
                    <td>{{ $property->created_at }}</td>
                    <td>{{ $property->updated_at }}</td>
                </tr>
                @else
                
                <tr>
                    <td>{!! link_to_route('properties.show', $property->building_name, ['id' => $property]) !!}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->full_price }}</td>
                    @if($property -> price)
                    <td>{{ round($property->full_price / ($property->price * 10000) * 100, 2) }}% </td>
                    @else
                    <td> - </td>
                    @endif
                    
                    <td>{{ $property->site_area }}</td>
                    <td>{{ $property->building_area }}</td>
                    <td>{{ $property->architecture }}</td>
                    <td>{{ $property->prefecture }}</td>
                    <td>{{ $property->city }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->station }}</td>
                    <td>{{ $property->on_foot }}</td>
                    <td>{{ $property->created_at }}</td>
                    <td>{{ $property->updated_at }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        
        {{ $properties -> links('pagination::bootstrap-4') }}
        
@endsection
