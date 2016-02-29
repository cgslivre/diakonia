@if( $errors->any())
    <ul class="alert alert-danger">
      @foreach( $errors->all() as $error)
        <li> {{ $error }}
        </li>
      @endforeach
    </ul>
    <hr class="divider">
@endif

@if( Session::has('message') )
  <div class="alert bg-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{Session::get('message')}}
  </div>
  <hr class="divider mensagem">
@endif
