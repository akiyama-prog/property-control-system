@extends('layouts.app')

@section('content')

    <h2>{{ $property -> building_name }}　編集ページ</h2>
    {!! Form::model($property,['route' => ['properties.update', $property -> id], 'method' => 'put']) !!}
        <table class="table">
            <colgroup>
                <col style="width:30%;">
                <col style="width:70%;">
            </colgroup>
            <tr>
                <th>{!! Form::label('building_name','物件名') !!}</th>
                <td>{!! Form::text('building_name',old('building_name'), ['class' => 'form-control']) !!}</td>
            </tr>
            
            <tr>
            <th>{!! Form::label('price', '価格（億円）') !!}</th>
            <td>{!! Form::text('price', old('price'), ['class' => 'form-control' ]) !!}</td>
            </tr>
            
            <tr>
            <th>{!! Form::label('full_price', '満室想定（万）') !!}</th>
            <td>{!! Form::text('full_price', old('full_price'), ['class' => 'form-control' ]) !!}</td>
            </tr>
        </table>
        
        <table class="table">
            <colgroup>
                <col style="width:30%;">
                <col style="width:70%;">
            </colgroup>
            <div class="mt-5">
            <tr>
            <th>{!! Form::label('site_area', '土地面積') !!}</th>
            <td>{!! Form::text('site_area', old('site_area'), ['class'=> 'form-control']) !!}</td>
            </tr>
            
            <tr>            
            <th>{!! Form::label('building_area', '建物面積') !!}</th>
            <td>{!! Form::text('building_area', old('building_area'), ['class'=> 'form-control']) !!}</td>
            </tr>
            
            <tr>
            <th>{!! Form::label('architecture', '構造') !!}</th>
            <td>{!! Form::select('architecture',['選択してください','RC'=>'RC', '鉄骨'=>'鉄骨','軟鉄'=>'軟鉄','木造'=>'木造'],old('architecture'),['class'=>'select']) !!}</td>
            </tr>
            </div>
        </table>
        
        <table class="table">
            <div class="mt-5">
            <colgroup>
                <col style="width:30%;">
                <col style="width:70%;">
            </colgroup>
            
            <tr>
            <th>{!! Form::label('prefecture', '都道府県') !!}</th>
            <td>{!! Form::select('prefecture',["選択してください","北海道"=>"北海道","青森県"=>"青森県","岩手県"=>"岩手県","宮城県"=>"宮城県","秋田県"=>"秋田県",
                "山形県"=>"山形県","福島県"=>"福島県","茨城県"=>"茨城県","栃木県"=>"栃木県","群馬県"=>"群馬県","埼玉県"=>"埼玉県","千葉県"=>"千葉県","東京都"=>"東京都",
                "神奈川県"=>"神奈川県","新潟県"=>"新潟県","富山県"=>"富山県","石川県"=>"石川県","福井県"=>"福井県","山梨県"=>"山梨県","長野県"=>"長野県",
                "岐阜県"=>"岐阜県","静岡県"=>"静岡県","愛知県"=>"愛知県","三重県"=>"三重県","滋賀県"=>"滋賀県","京都府"=>"京都府","大阪府"=>"大阪府",
                "兵庫県"=>"兵庫県","奈良県"=>"奈良県","和歌山県"=>"和歌山県","鳥取県"=>"鳥取県",
                "島根県"=>"島根県","広島県"=>"広島県","岡山県"=>"岡山県","山口県"=>"山口県","徳島県"=>"徳島県","香川県"=>"香川県","愛媛県"=>"愛媛県",
                "高知県"=>"高知県","福岡県"=>"福岡県","佐賀県"=>"佐賀県","長崎県"=>"長崎県","熊本県"=>"熊本県","大分県"=>"大分県","宮崎県"=>"宮崎県",
                "鹿児島県"=>"鹿児島県","沖縄県"=>"沖縄県"], old('prefecture'), ['class' => 'select']) !!}</td>
            </tr>

            <tr>
            <th>{!! Form::label('city', '市区町村') !!}</th>
            <td>{!! Form::text('city', old('city'), ['class'=> 'form-control']) !!}</td>
            </tr>
            
            <tr>
            <th>{!! Form::label('address', '番地') !!}</th>
            <td>{!! Form::text('address', old('address'), ['class' => 'form-control']) !!}</td>
            </tr>
            
            <tr>            
            <th>{!! Form::label('station', '最寄駅') !!}</th>
            <td>{!! Form::text('station', old('station'), ['class' => 'form-control']) !!}</td>
            </tr>
            
            <tr>
            <th>{!! Form::label('on_foot', '駅徒歩') !!}</th>
            <td>{!! Form::text('on_foot', old('on_foot'), ['class' => 'form-control']) !!}</td>
            </tr>
            </div>
        </table>
        
        {!! Form::submit('変更を保存する', ['class' => 'btn btn-primary btn-block']) !!}
    
    {!! Form::close() !!}
    
@endsection
