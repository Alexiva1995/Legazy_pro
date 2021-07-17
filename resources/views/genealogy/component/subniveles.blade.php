<a class="met" onclick="tarjeta({{$data}}, '{{route('genealogy_type_id', [strtolower($type), base64_encode($data->id)])}}')">
    <img src="{{asset('storage/photo/'.$data->photoDB)}}" class="pt-1 rounded-circle" alt="{{$data->name}}" title="{{$data->name}}"style="width: 50px;height: 65px;margin-top: -11px;">
</a>
{{--route('genealogy_type_id', [strtolower($type), base64_encode($data->id)])--}} 