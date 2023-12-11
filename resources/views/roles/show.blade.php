<div class="modal fade" id="show{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Permission</h5>
            </div>

            <div class="modal-body">
                <strong> Permission Name : </strong>
                {{ $role->name }}
            </div>

            <div class="modal-body">
            @if(!empty($role->permissions))
                    @foreach($role->permissions as $v)
                        <h6>{{ $v->name }} </h6>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

