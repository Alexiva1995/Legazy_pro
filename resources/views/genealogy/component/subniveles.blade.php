<a class="met" onclick="tarjeta({{$data}}, '{{route('genealogy_type_id', [strtolower($type), base64_encode($data->id)])}}')">
    @if (empty($data->photoDB))
        <img src="{{asset('assets/img/legazy_pro/logo.svg')}}" class="pt-1 rounded-circle" alt="{{$data->name}}" title="{{$data->name}}"style="width: 50px;height: 65px;margin-top: -11px;">
    @else
        <img src="{{asset('storage/photo/'.$data->photoDB)}}" class="pt-1 rounded-circle" alt="{{$data->name}}" title="{{$data->name}}"style="width: 50px;height: 65px;margin-top: -11px;">
    @endif
</a>
{{--route('genealogy_type_id', [strtolower($type), base64_encode($data->id)])--}} 