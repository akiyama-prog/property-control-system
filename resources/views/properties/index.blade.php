@extends('layouts.app')

@section('content')

    {!! link_to_route('properties.create', '新規物件追加',[], ['class'=> 'btn btn-success']) !!}

        <table class="table table-hover table-condensed" style="td {white-space: nowrap;}">
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
                <tr>
                    <td>{!! link_to_route('properties.show', $property->building_name, ['id' => $property]) !!}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->full_price }}</td>
                    <td>{{ round($property->full_price / ($property->price * 10000) * 100, 2)}}%</td>
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
                @endforeach
            </tbody>
        </table>
@endsection
