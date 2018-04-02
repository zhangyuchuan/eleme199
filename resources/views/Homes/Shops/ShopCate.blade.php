@if(!$catesecond->isEmpty())
@foreach($catesecond as $m=>$n)
    <a class="excavator-filter-item ng-binding ng-scope catesecond" href="javascript:" onclick="getShop({{$n->id}},this)" ng-click="changeCategory(subitem)" style="">
        {{$n->catename}}
    </a>
@endforeach
@endif
