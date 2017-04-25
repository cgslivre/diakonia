@extends( 'material.template-material')

@section('nivel2')
    <li class="active"><a href="{{ route('material.ensino.index') }}">Currículo de Ensino</a></li>
@stop
@section('content')
    @forelse ($ensinosAgrupados as $cat => $ensinos)
        <h3>
            {{$cat}}
        </h3>
        <ul>
        @foreach ($ensinos as $ensino)
            <li>
                @if($ensino->mime == "application/pdf")
                    <i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i>
                @endif
                <a href="{{URL::route('material.ensino.show',$ensino->slug)}}">
                    <strong>{{$ensino->titulo}}</strong>
                </a>
                @can('material-curriculo-edit')
                    <a href="{{URL::route('material.ensino.edit',$ensino->id)}}">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    </a>
                @endcan
            </li>
        @endforeach
        </ul>
    @empty
        <p>Nenhum ensino cadastrado.</p>
    @endforelse
@endsection
