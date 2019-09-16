@extends('layouts.app')

@section('content')
    <h2>{{ $property -> building_name }}</h2>
    
    <p>情報入手日:{{ $property -> created_at }} 更新日:{{ $property -> updated_at }}</p>
    
    <table class="table table-bordered">
         <colgroup>
            <col style="width:30%;">
            <col style="width:70%;">
        </colgroup>
        <tr>
            <th>価格</th>
            <td>{{ $property -> price }}億円</td>
        </tr>
        
        <tr>
            <th>満室想定</th>
            <td>{{ $property -> full_price }}万円</td>
        </tr>
        
        <tr>
            <th>利回り</th>
            @if( $property ->price )
            <td>{{ round($property -> full_price / ($property -> price*10000) *100, 2) }}%</td>
            @endif
        </tr>
    </table>
    
    <table class="table table-bordered">
         <colgroup>
            <col style="width:30%;">
            <col style="width:70%;">
        </colgroup>
        <tr>
            <th>土地面積</th>
            <td>{{ $property -> site_area }}㎡（{{ round($property -> site_area / 3.3058, 1) }}坪） </td>
        </tr>
        
        <tr>
            <th>建物面積</th>
            <td>{{ $property -> building_area }}㎡（ {{ round($property -> building_area / 3.3058, 1) }}坪)</td>
        </tr>
        
        <tr>
            <th>構造</th>
            <td>{{ $property -> architecture }}</td>
        </tr>
    </table>
    
    <table class="table table-bordered">
         <colgroup>
            <col style="width:30%;">
            <col style="width:70%;">
        </colgroup>
        <tr>
            <th>住所</th>
            <td>{{ $property -> prefecture. $property -> city. $property -> address }}</td>
        </tr>
        
        <tr>
            <th>最寄駅</th>
            <td>{{ $property -> station }}</td>
        </tr>
        
        <tr>
            <th>駅徒歩</th>
            <td>{{ $property -> on_foot }}分</td>
        </tr>
    </table>
    
    {!! link_to_route('properties.edit','編集する',[ $property -> id],['class'=>'btn btn-primary btn-block']) !!}
    
    {!! Form::model($property,['route'=>['properties.destroy',$property -> id], 'method' => 'delete']) !!}
        {!! Form::submit('削除する',['class' => 'btn btn-danger btn-block mt-1']) !!}
    {!! Form::close() !!}
@endsection        